<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activating Your Account</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Rubik", sans-serif;
        }
        .p-4 {
            padding: 5rem; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(isset($done) && $done == 1) 
                    <div class="text-center p-4">
                        <img src="/images/done.svg" class="img-responsive" width="500" alt="setup wizard"/>
                    </div>

                    <h3 class="text-center">Oooops!, We've done this before, Logging You in...</h3>
                @else
                    <div class="text-center p-4">
                        <img src="/images/setup.svg" class="img-responsive" draggable="false" alt="setup wizard" />
                    </div>

                    <h3 class="text-center">Please Wait while we setup your account...</h3>
                @endif
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => window.location.href = '/home', 3000);
    </script>
</body>
</html>

