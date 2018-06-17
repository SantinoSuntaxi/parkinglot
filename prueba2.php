<html>
  <head>
  <title></title>

  <style type="text/css">
  body { background-color: #ddd; }
  #container { height: 100%; width: 100%; display: table; }
  #inner {  display: table-cell; }
  #gauge_div { width: 120px; margin: 0 auto; }

  div.a {text-align: center;}
  h2   {color: blue;
        font-family: georgia ;
        font-size: 300%;}


  p    {color: red;
      font-family: georgia;
      font-size: 200%;}


</style>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>

  // set your channel id here
  var channel_id = 466677;
  // set your channel's read api key here if necessary
  var api_key = 'FVMD1WSAEHIRG5F7';
  // maximum value for the gauge
  var max_gauge_value = 5;
  // name of the gauge
  var gauge_name ;

  // global variables
  var chart, charts, data;

  // load the google gauge visualization
  google.load('visualization', '1', {packages:['gauge']});
  google.setOnLoadCallback(initChart);

  // display the data
  function displayData(point, pointb) {

    data = new google.visualization.DataTable();
    data.addColumn('string', 'Label');
    data.addColumn('number', 'Value');
    data.addRows(3);

    data.setValue(0, 0, gauge_name);
    data.setValue(0, 1, point);
    
    data.setValue(1, 0, 'PARK2');
    data.setValue(1, 1, pointb);


    data.setValue(2, 0, 'PARK3');
    data.setValue(2, 1, 1);

     chart.draw(data, options);
  
  }

  // load the data
  function loadData() {
    // variable for the data point
    var p1;
    var p2;

    // get the data from thingspeak
    $.getJSON('https://api.thingspeak.com/channels/' + channel_id + '/feed/last.json?api_key=' + api_key, function(data) {

      // get the data point
      p1 = data.field5;
      p2 = data.field6;
      p3 = data.field7;

      // if there is a data point display it
      if (p1) {
        // p = Math.round((p / max_gauge_value) * 100);
        displayData(p1,p2);
       
      }



      if (p1 == 0) {

         gauge_name = 'VACIO' ;
      }

      else { 
        gauge_name = 'OCUPADO' ;
          }
      
       
       /* if (p2 == 1) {

      document.getElementById("demo").innerHTML = "OCUPADO P2"; 
      }
        */
    });
  }

  // initialize the chart
function initChart() {



    chart = new google.visualization.Gauge(document.getElementById('gauge_div'));
    options = {min: 0, max: 2 , width: 800, height: 120, greenFrom: 1, greenTo: 29, redFrom: 30, redTo: 70, yellowFrom:0, yellowTo: 0, minorTicks: 10};


    loadData();

    // load new data every 15 seconds
    
    setInterval('loadData()', 15000);

}
   
</script>


</head>
<body>

<div class="a">
<h2>UNIVERSIDAD</h2>
<p>PARQUEADERO</p>
</div>

<br> <br>
<br> <br>


    
    <div id="gauge_div">PARQUEADERO1</div>
 


   
   


  

  

  </body>
</html>


