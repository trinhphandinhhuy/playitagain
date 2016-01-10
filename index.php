<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Play it again</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    body {
        padding-top: 70px;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://playitaga.in">Playitaga.in</a>
            </div>

            <div class="collapse navbar-collapse navbar-main-collapse" id="search-navbar">
              
              <ul class="nav navbar-nav list-inline navbar-right">
                <li><a href="https://www.facebook.com/trinhphandinhhuy" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a></li>
              <li><a href="https://instagram.com/trinhphandinhhuy/" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a></li>
              <li><a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a></li>
              </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->

    <div id="contenthere">
      <header class="intro">
        <div class="intro-body">
          <div id="greeting" class="container">
            <div class="row">
              <div class="col-md-6 pull-left">
                <h1 class="brand-heading">Play it again</h1>
                <p class="intro-text">Play your favourite youtube video over and over again until it bores you.</p>

                <form class="search search-header" role="search" id="search" method="GET" action="handlesearch.php">
                        <input type="search" class="center-block search-header widthsize-input nice-input" placeholder="Search the video" name="q" id="q">
                        <input class="submit search-header btn-lg nice-button" type="submit" id="submit" value="Search"></input>
                </form>

              </div><!-- End col-md-6 -->
            </div><!-- End row div -->
          </div><!-- End greeting div -->
        </div>
      </header>
    </div><!-- End div contenthere -->


    <!-- Footer -->
    <footer class="navbar-fixed-bottom">
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <p class="text-center">Playitaga.in is a small music tool made by <a href="http://www.trinhphandinhhuy.com/" target="_blank">Huy Trinh</a></p>

            </div>
          </div><!-- End row div -->
        </div><!-- End container div-->
      </div><!-- End footer div -->
    </footer>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/youtubesearch.js"></script>

</body>

</html>
