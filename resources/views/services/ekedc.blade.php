<!DOCTYPE html>

<head>

    <title>GOENERGEE</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    {{-- <link href="/css/main.css" rel='stylesheet' type='text/css'> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <style>
        body {
            background-image: url(/images/transformers.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        #postpaid {
            min-width: 50%;
            max-width: 100%;
            margin: 1em auto;
            box-shadow: 0px 0px 3px 4px #e6e6e61f;
            padding: 2em;
            border-radius: 3px;
            line-height: 2.5;
            display: none;
        }
        input {
            background: none;
            border: 1px solid #dcdcdc;
        }
        .form-control {
            border-radius: 0;
        }
        .btn {
            border-radius: 0;
        }
    </style>

    
</head>

<body class="bg-img">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 2rem 3rem; background: transparent !important;">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                    
                <div class="nav-item">
                    @if(Auth::check())
                    <a class="btn btn-danger" href="/home"><i class="fas fa-home"></i> Go Home</a>
                    @else
                    <a class="btn btn-danger" href="/"><i class="fas fa-home"></i> Go Home</a>
                    @endif
                </div>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-8">
                <div style="background-color: #fff; border-radius: .3em">
                    <br>
                    <h4 class="text-center">EKEDC Electricity Bill Payment</h4>
                    <br>

                </div>
            </div>
            <div class="col-4">
                <div style="background: #fff; border-radius: .3em">
                        <br>
                        <h3 class="text-center">EKEDC Electricity Bill Payment</h3>
                        <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>