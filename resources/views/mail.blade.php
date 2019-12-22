<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{url('/postmail')}}" accept="file">
        {{csrf_field()}}
        
        <input type="submit" class="form-control btn btn-lg btn-primary" name="submit" value="submit">
    </form>
            </div>
        </div>
    </div>
    
</body>
 <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>