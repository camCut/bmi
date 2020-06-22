<?php
header("Content-Type: text/html; charset=utf-8");

require "./bmi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
  <?php
    echo "var bmiData = " . getBmiRaw() . ";";
    ?>
  </script>
  
  <!-- <script src="./chart.js"></script> -->
</head>
<body>
<div>
    <table class="submitBmi">
    <tr><td>
    <form method="POST" name="form" action="index.php">
    <input type="number" name="arm" placeholder="Arm">
    <br>
    <input type="number" name="schulter" placeholder="Schulter">
    <br>
    <input type="number" name="brustumfang" placeholder="Brustumfang" >
    <br>
    <input type="number" name="unterbrustumfang" placeholder="Unterbrustumfang">
    <br>
    <input type="number" name="taille" placeholder="Taille">
    <br>
    <input type="number" name="bundumfang" placeholder="Bundumfang">
    <br>
    <input type="number" name="hueftumfang" placeholder="Hueftumfang">
    <br>
    <input type="number" name="bein" placeholder="Bein">
    <br>
    <input type="submit">
    </td>
    <td>
    <img src="./bmi.jpg" height="400">
    </td>
</tr>
</table>
    
</form>
</div>
   
 <?php
 
submit();
delete();
// deleteNote();
printBmi();

?>   
<div id="chart-container" style="width:100%; height:800px;"></div>
<script>
function alert() {
  alert("I am an alert box!");
}
</script>

</body>
</html>


