<?php
include 'dbconn.php';
// to use this run the docker-compose file at /Users/chrismcallister/Documents/docker
//from a browser http://localhost 8000
ini_set('memory_limit', '-1');

  
// select query
$sql = "SELECT * FROM salt_returns WHERE fun NOT LIKE 'runner%' ORDER BY jid DESC LIMIT 40";

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

$sql = "SELECT * FROM salt_returns WHERE success = '1'";
if ($result2 = $conn->query($sql)) {
    while ($data2 = $result2->fetch_object()) {
        $users2[] = $data2;
    }
}

if (empty($users2)){
  $goodqs = "No data";
}else{
  $goodqs = count($users2);
}

$sql = "SELECT * FROM salt_returns WHERE success = '0'";
if ($result3 = $conn->query($sql)) {
    while ($data3 = $result3->fetch_object()) {
        $users3[] = $data3;
    }
}

if (empty($users3)){
  $badqs = "No data";
}else{
  $badqs = count($users3);
}

if (empty($users2)){
  $goodqs = "No data";
}else{
  $goodqs = count($users2);
}

//Gauge stuff
$total = (int)$goodqs + (int)$badqs;
$gooddec = round((int)$goodqs / $total, 2);
$baddec = round((int)$badqs / $total, 2);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Saltdash</title>
    <link href="/css/gauge.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/docs/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php  include 'nav.php'; ?>
  
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-6 placeholder">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Successfull Queries</h3>
                </div>
                  <div class="panel-body">
                  <div class="gauge">
  <div class="gauge__body">
    <div class="gauge__fill"></div>
    <div class="gauge__cover"></div>
  </div>
</div>
                  </div>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 placeholder">
            <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title">Failed Queries</h3>
                </div>
                  <div class="panel-body">
                  <div class="gauge2">
  <div class="gauge__body2">
    <div class="gauge__fill2"></div>
    <div class="gauge__cover2"></div>
  </div>
</div>
                  </div>
            </div>
            </div>

          <h2 class="sub-header">Recent Jobs</h2>
          <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
            <form action="/results.php">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Jobs..." name="search">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Go!</button>
                </span>
              </div><!-- /input-group -->
</form>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Minion</th>
                  <th>Module</th>
                  <th>State</th>
                  <th>Job ID</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Timestamp</th>
                </tr>
              </thead>
              <tbody>
              <? foreach ($users as $user) : ?>
                <? if ($user->success == "0"){ echo "<tr class=\"danger\">";} else { echo "<tr>"; } ?>
                <td><? echo $user->id; ?></td>
                <td><? echo $user->fun; ?></td>

                <?preg_match('/(?<=sls__": ").*?(?=\.|")/', $user->full_ret, $output_array);
                if (empty($output_array)){
                  echo "<td>None</td>";
                }else{
                  echo "<td>$output_array[0]</td>";
               } ?>
                <td><? $job = $user->jid; echo $job; ?></td>
                <? if ($user->success > "0"){ echo "<td>Success</td>";} else { echo "<td>Fail</td>"; } ?>
                <td><a href="detail.php?job=<? echo $job; ?>&minion=<? echo $user->id; ?>"><button type="button" class="btn btn-primary btn-sm">details</button></a></td>
                <td><? echo $user->alter_time; ?></td>
              </tr>
              <? endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script>
      const gaugeElement = document.querySelector(".gauge");

function setGaugeValue(gauge, value) {
  if (value < 0 || value > 1) {
    return;
  }

  gauge.querySelector(".gauge__fill").style.transform = `rotate(${
    value / 2
  }turn)`;
  gauge.querySelector(".gauge__cover").textContent = `<? echo "$goodqs" ?>`;
}

const gaugeElement2 = document.querySelector(".gauge2");

function setGaugeValue2(gauge2, value) {
  if (value < 0 || value > 1) {
    return;
  }

  gauge2.querySelector(".gauge__fill2").style.transform = `rotate(${
    value / 2
  }turn)`;
  gauge2.querySelector(".gauge__cover2").textContent = `<? echo "$badqs" ?>`;
}

setGaugeValue(gaugeElement, <? echo "$gooddec" ?>);
setGaugeValue2(gaugeElement2, <? echo "$baddec" ?>);
    </script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://kit.fontawesome.com/f8c057d86e.js" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
