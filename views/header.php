<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,700,800" rel="stylesheet" media="screen">

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
  <link href="color/default.css" rel="stylesheet" media="screen">

    <title>YouAreStrong</title>
	
	  <link rel="stylesheet" href="/styles.css">
  </head>
  <br>
  <body background="https://images.unsplash.com/photo-1454942901704-3c44c11b2ad1?ixlib=rb-0.3.5&s=c8096cb6fe87fc4d3ea1315b4abbadba&auto=format&fit=crop&w=1350&q=80" style="height:900px; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">YouAreStrong</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?page=blog">Blog
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php if (isset($_SESSION['id'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=pevents">Probable Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=cevents">Confirmed Events</a>
              </li>
            <?php } ?>
          </ul>
           <div class="form-inline pull-xs-right">
      
              <?php if ($_SESSION['id']) { ?>
      
              <a class="btn btn-default" href="?function=logout">Logout</a>
                
                <?php } else { ?>
                
              <button class="btn btn-default" data-toggle="modal" data-target="#myModal">Login/Signup</button>
                
                <?php } ?>
            </div>
          </div>
        </div>
    </nav>


<br><br>