<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Empowered</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|PT+Sans+Narrow:400,700|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>

    <script src="../js/jquery-2.1.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>
	<header>

        <div class="container">
            <div class="col-md-4">
                @include('partials.navprofile')
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="zoekentext" class="form-control search" placeholder="zoeken">
                </div>
            </div>
        </div>

	</header>

    @if(Auth::Check())
	<div class="profilemenu">
	    <div class="container">
	        <div class="col-lg-12">
                <ul class="items">
                    <li class="item"><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Home</a></li>
                    <li class="item"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;My profile</a></li>
                    <li class="item"><a class="pop-menu" href="/images/edit"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;&nbsp;My images</a></li>
                    <li class="item"><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;&nbsp;My messages</a></li>
                    <li class="item"><a href="#"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>&nbsp;&nbsp;My friends</a></li>
                </ul>
	        </div>
	    </div>
	</div>
    @endif

    @yield('content')

    <footer class="container-fluid">


    </footer>

    <div id="pop-menu" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="w-box content"></div>
      </div>
    </div>
</body>
</html>
