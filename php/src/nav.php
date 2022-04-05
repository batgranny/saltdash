<? $saltgui = $_ENV["SALTGUI"]; 
$nav1 = "<li>";
$nav2 = "<li>";
$nav3 = "<li>";

if (!empty($page)) {
  if ($page == "index"){
    $nav1 = "<li class=\"active\">";
  }elseif ($page == "events"){
    $nav2 = "<li class=\"active\">";
  }elseif ($page == "about"){
    $nav3 == "<li class=\"active\">";
  }
}?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="icon.png" width="30" height="30" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php $_SERVER['PHP_SELF']; ?>"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;&nbsp;Reload page</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="<?php $_SERVER['PHP_SELF']; ?>"><i class="fa-solid fa-user"></i></a></i></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <? echo "$nav1" ?><a href="index.php"><i class="fa-solid fa-list-ul"></i>  Jobs <span class="sr-only">(current)</span></a></li>
            <? echo "$nav2" ?><a href="events.php"><i class="fa-solid fa-list-check"></i></i>  Events</a></li>
            <? echo "$nav3" ?><a href="about.php"><i class="fa-solid fa-circle-info"></i>  About</a></li>
            <li><a href="<? echo $saltgui; ?>"><i class="fa-solid fa-cube"></i>  Salt GUI</a></li>
          </ul>
        </div>