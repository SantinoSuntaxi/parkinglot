<html>
  <head>
  <title></title>


  <style type="text/css">
  body { background-color: #ddd; }
  #container { height: 100%; width: 100%; display: table; }
  #inner {  display: table-cell; }
  #gauge_div { width: 120px; margin: 0 auto; }

  div.a {text-align: center;}
  div.b {text-align: center;}
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

  // load the data
  $(document).ready(function co(){


     $("button").click(function co(){

    // variable for the data point
    var p1;
    var p2;
    var p3;

    // get the data from thingspeak
    
    $.getJSON('https://api.thingspeak.com/channels/' + channel_id + '/feed/last.json?api_key=' + api_key, function(data) {

      // get the data point
      //p1 = data.field1;
      //p2 = data.field2;
      //p3 = data.field3;

         // get the data point
      p1 = 1 ;
      p2 = 0 ;
      p3 = 1 ;

document.write("<table border=0 width=1400>")
document.write(" <tr>")
document.write(" <td width=100% align=center>")
document.write("<font face=&quot;Garamond, Times New Roman, Georgia&quot; size=3 color=&quot;#FF0000&quot;>")
document.write("<h1><font face=Verdana color=red>PARQUEADERO</font></h1>")
document.write("</font>")
document.write(" </td>")
document.write(" </tr>")
document.write("</table>")
document.write("<table border=0 width=550>")
document.write(" <tr>")
document.write(" <td width=100%>")

      
      document.write(p1);
      document.write(p2);
      document.write(p3);

      if (p1 == 1){
            document.write(" <h3><font face=Verdana color=red>PARQUEADERO UNO OCUPADO</font></h3>");
            document.write('<br/>  <img src="./image/carrob.jpeg" width="200" height="100" >'); 
            
         }
      
      if (p1 == 0){
            document.write("<br/> <h3><font face=Verdana color=red>PARQUEADERO UNO LIBRE</font></h3>");
            document.write('<br/>  <img src="./image/x.png" width="200" height="100" >'); 
            
         }


      if (p2 == 0){
            document.write("<br/> <h3><font face=Verdana color=red>PARQUEADERO DOS LIBRE</font></h3>");
            document.write('<br/>  <img src="./image/x.png" width="200" height="100" >'); 
            
         }

         
      if (p2 == 1){
        document.write("<br/> <h3><font face=Verdana color=red>PARQUEADERO DOS LLENO</font></h3>");
            document.write('<br/> <img src="./image/carro.jpeg"width="200" height="100" >'); 
          }

      if (p3 == 1){
        document.write("<br/> <h3><font face=Verdana color=red>PARQUEADERO TRES LLENO</font></h3>");
            document.write('<br/> <img src="./image/carro.jpeg" width="200" height="100" >'); 
                  }

 setInterval('co()', 15000);
 
        });

         


    });
    
    
  });



</script>
    


    
</head>

<body>

<div class="a">
<h2>UNIVERSIDAD</h2>
<p>PARQUEADERO sofware de pruebas</p>
</div>

<br> <br>
<br> <br>


<div class="b">
<button>Get JSON data</button>
</div>
<div></div>
  

</body>
</html>


