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
            <li><a href="#">Dashboard</a></li>
            <li><a href="<?php $_SERVER['PHP_SELF']; ?>">Reload page</a></li>
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
            <li class="active"><a href="dashboard.php"><i class="fa-solid fa-list-ul"></i>  Jobs <span class="sr-only">(current)</span></a></li>
            <li><a href="events.php"><i class="fa-solid fa-list-check"></i></i>  Events</a></li>
            <li><a href="#"><i class="fa-solid fa-circle-info"></i>  About</a></li>
            <li><a href="#"><i class="fa-solid fa-cube"></i>  Salt GUI</a></li>
          </ul>
        </div>