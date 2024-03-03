

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>404 Not Found</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href=" {{ asset('admin-assets/css/error.css') }}" />


</head>

<body>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
                <h2>404 - The Page can't be found</h2>
            </div>
            <a href="{{ route('sh_cat') }}">Go TO Homepage</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
