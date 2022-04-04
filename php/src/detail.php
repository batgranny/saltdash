<?php
// to use this run the docker-compose file at /Users/chrismcallister/Documents/docker
//from a browser http://localhost 8000
include 'dbconn.php';

$job = $_GET['job'];
$minion = $_GET['minion'];

$conn = new mysqli($servername, $username, $password, $dbname);
// select query //
// $sql = 'SELECT * FROM salt_returns';
// $sql = "SELECT * from salt_returns WHERE jid = '" . $job . "20220402084729473204'";
$sql = "SELECT * from salt_returns WHERE jid = '".$job."' AND id = '".$minion."'";

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
} 
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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Salt Cache</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Salt GUI</a></li>
            <li><a href="#">Export</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Successfull Queries</h3>
                </div>
                  <div class="panel-body">
                  <h1>135</h1>
                  </div>
            </div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title">Failed Queries</h3>
                </div>
                  <div class="panel-body">
                  <h1>25</h1>
                  </div>
            </div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Successfull Queries</h3>
                </div>
                  <div class="panel-body">
                  <h1>135</h1>
                  </div>
            </div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Successfull Queries</h3>
                </div>
                  <div class="panel-body">
                  <h1>135</h1>
                  </div>
            </div>
            </div>
          </div>

          <h2 class="sub-header">Job Detail <? echo $job; ?></h2>

          <div class="col-sm-12" style="background-color:#343a40;"> <p class="text-muted">
            <?foreach ($users as $user) :

              echo "<pre>"; 
              echo json_encode(json_decode($user->full_ret), JSON_PRETTY_PRINT); 
              echo "</pre>";
            endforeach; ?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
