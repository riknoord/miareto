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
    @yield('content')

    <footer class="container-fluid">


    </footer>

</body>
</html>