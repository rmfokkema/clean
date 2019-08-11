<?
  if (is_numeric($_POST["i"]))
  {
    $f = fopen("i.log", "w");
    fwrite($f, $_POST["i"]);
  } else {
    $f = fopen("i.log", "r");
    $i = fgets($f);
  }
    fclose($f);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>c</title>
  <style>
  * {margin: 0; padding: 0; }
  html, body { overflow: hidden; background-color: black; }
  body { background-color: black; }
  table { margin: auto; margin-top:2px;}
  td { background-color: #333; width: 91px; height: 91px; min-width: 91px; min-height: 91px; }
  </style>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  
  <link href="c.png" rel="apple-touch-icon" />
  <link href="launch_portrait.png"
      media="(device-width: 768px) and (device-height: 1024px)
         and (orientation: portrait)
         and (-webkit-device-pixel-ratio: 1)"
      rel="apple-touch-startup-image" />
  <link href="launch_landscape.png"
      media="(device-width: 768px) and (device-height: 1024px)
         and (orientation: landscape)
         and (-webkit-device-pixel-ratio: 1)"
      rel="apple-touch-startup-image" />

  <script type="text/javascript">
    var YES=<?= "$i" ?>;
    function init() {
    var hi_cells = document.getElementsByTagName('TD');
    var max = hi_cells.length;
    for (var i=0; i<max; i++)
    {
      hi_cells[i].style['background-color']='#333';
      if (i<YES) hi_cells[i].style['background-color']='white';

    } 
    hi_cells[0].onclick = reset;
  }

  function reset()
  {
    if (YES>0) set_c(0);
    else set_c(1);
  }

  function set_c(num)
  {
    
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      YES = num;
      init();
    }
  };
  xhttp.open("POST", "./", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("i=" + num);
  }

  
  
  </script>
</head>
<body onload="init()">
  <table>
   <?
   $c=1;
  for ($i=0; $i<8; $i++) {
              echo "<tr>";
              for ($k=0; $k<11; $k++) {
                echo "<td onclick=\"set_c($c)\"></td>";
                $c++;
              }
              echo "</tr>";
  }
  ?>
  </table>
</body>
</html>
