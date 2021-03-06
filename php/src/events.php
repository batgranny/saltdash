<?php
// to use this run the docker-compose file at /Users/chrismcallister/Documents/docker
//from a browser http://localhost 8000

include 'dbconn.php';

// select query
$sql = 'SELECT * FROM salt_events ORDER BY id DESC';

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
  <?php  $page = "events";
  include_once("nav.php");?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <h2 class="sub-header">Recent Events</h2>
          <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Jobs...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Tag</th>
                  <th>alter time</th>
                  <th>master id</th>
                  <th>Status</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
              <? foreach ($users as $user) : ?>
                <tr>
                <td><? echo $user->tag; ?></td>
                <td><? echo $user->alter_time; ?></td>
                <td><? $job = $user->id; echo $job; ?></td>
                <td><a href="detail.php?job=<? echo $job; ?>"><button type="button" class="btn btn-primary btn-sm">details</button></a></td>
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
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://kit.fontawesome.com/f8c057d86e.js" crossorigin="anonymous"></script>
  </body>
</html>
