<? 
$goodf = 1720;
$badf = 1000;
$total = $goodf + $badf;
$good = round($goodf / $total, 2);
?>

<html>
  <head>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="gauge">
      <div class="gauge__body">
        <div class="gauge__fill"></div>
        <div class="gauge__cover"></div>
      </div>
      <script>
const gaugeElement = document.querySelector(".gauge");

function setGaugeValue(gauge, value) {
  if (value < 0 || value > 1) {
    return;
  }
    gauge.querySelector(".gauge__fill").style.transform = `rotate(${value / 2}turn)`;
    gauge.querySelector(".gauge__cover").textContent = `<? echo "$goodf" ?>`;
}

setGaugeValue(gaugeElement, <? echo "$good" ?>);
</script>
      
  </body>
</html>

</div>