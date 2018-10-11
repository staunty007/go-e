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
    {{-- <link href="css/main.css" rel='stylesheet' type='text/css'> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
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

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 1.5rem 3rem; background: transparent !important;">
            <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png">
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
        <div class="container" style="background: #ffffffe3; min-height: 100vh; max-height: 100%">
            <br><br><br>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-md-offset-2 m-auto">
                    <div class="text-center">
                        <img src="/images/ekedc.jpg" width="80"/> 
                        <span style="font-size: 16px"> Eko Electric Distribution Company Ltd</span>
                    </div>
                    <br>
                    <h3 class="text-center font-weight-light">Select a Payment Category</h3><br>
                    <div class="form-group text-center">
                       
                        <div class="">
                            <button id="postpaidBtn" class="btn btn-success btn-md">Postpaid Payment</button>
                            <button id="reconnectionBtn" class="btn btn-primary btn-md">Reconnection Fee</button>
                            <button id="penaltyBtn" class="btn btn-danger btn-md">Penalties</button>
                            <button id="lossOfRevenueBtn" class="btn btn-warning btn-md">Loss of Revenue</button>
                        </div>
                        <div style="margin-top: 5rem;" id="cardy">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNjAuNTMxIDYwLjUzMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNjAuNTMxIDYwLjUzMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik05LjA5LDQyLjk1Yy0wLjExNSwwLjAyLTAuMTk3LDAuMDQ1LTAuMjQ3LDAuMDc0Yy0wLjA4NCwwLjA0OS0wLjEyNywwLjEyNC0wLjEyNywwLjIyOGMwLDAuMDkyLDAuMDI2LDAuMTU5LDAuMDc3LDAuMiAgICBjMC4wNTMsMC4wNCwwLjExNSwwLjA2MSwwLjE5LDAuMDYxYzAuMTE4LDAsMC4yMjYtMC4wMzQsMC4zMjUtMC4xMDJjMC4xLTAuMDY4LDAuMTUtMC4xOTIsMC4xNTQtMC4zNzJ2LTAuMiAgICBjLTAuMDM0LDAuMDIxLTAuMDY5LDAuMDM4LTAuMTA0LDAuMDUxYy0wLjAzNSwwLjAxNS0wLjA4MywwLjAyNy0wLjE0NSwwLjAzN0w5LjA5LDQyLjk1eiIgZmlsbD0iI0Q4MDAyNyIvPgoJCTxwb2x5Z29uIHBvaW50cz0iMTguMDgsMzQuMDM4IDE3LjMwMiwzNS4zODMgMTguMDgsMzUuMzgzICAgIiBmaWxsPSIjRDgwMDI3Ii8+CgkJPHBhdGggZD0iTTIxLjM0LDQyLjk1Yy0wLjExNSwwLjAyLTAuMTk3LDAuMDQ1LTAuMjQ3LDAuMDc0Yy0wLjA4NCwwLjA0OS0wLjEyNywwLjEyNC0wLjEyNywwLjIyOGMwLDAuMDkyLDAuMDI2LDAuMTU5LDAuMDc3LDAuMiAgICBjMC4wNTIsMC4wNCwwLjExNCwwLjA2MSwwLjE4OSwwLjA2MWMwLjExOCwwLDAuMjI2LTAuMDM0LDAuMzI1LTAuMTAyYzAuMDk5LTAuMDY4LDAuMTUtMC4xOTIsMC4xNTQtMC4zNzJ2LTAuMiAgICBjLTAuMDM1LDAuMDIxLTAuMDY5LDAuMDM4LTAuMTA0LDAuMDUxYy0wLjAzNiwwLjAxNS0wLjA4MywwLjAyNy0wLjE0NSwwLjAzN0wyMS4zNCw0Mi45NXoiIGZpbGw9IiNEODAwMjciLz4KCQk8cGF0aCBkPSJNMTQuNzYzLDQyLjE3Yy0wLjEzOCwwLTAuMjQ1LDAuMDQtMC4zMjEsMC4xMThjLTAuMDc2LDAuMDc3LTAuMTI0LDAuMTg0LTAuMTQ0LDAuMzE4aDAuOTI3ICAgIGMtMC4wMS0wLjE0NC0wLjA1Ny0wLjI1MS0wLjE0NC0wLjMyNEMxNC45OTYsNDIuMjA4LDE0Ljg5LDQyLjE3LDE0Ljc2Myw0Mi4xN3oiIGZpbGw9IiNEODAwMjciLz4KCQk8cGF0aCBkPSJNMjMuMTg4LDM1Ljk2M2MwLjA3OC0wLjEwNCwwLjExNy0wLjIzNiwwLjExNy0wLjM5OWMwLTAuMTgzLTAuMDQ0LTAuMzIyLTAuMTMzLTAuNDE5QzIzLjA4MywzNS4wNDgsMjIuOTc0LDM1LDIyLjg0NSwzNSAgICBjLTAuMTA1LDAtMC4xOTcsMC4wMzEtMC4yNzgsMC4wOTVjLTAuMTIxLDAuMDk0LTAuMTgxLDAuMjQzLTAuMTgxLDAuNDUzYzAsMC4xNjcsMC4wNDUsMC4zMDUsMC4xMzUsMC40MTEgICAgYzAuMDksMC4xMDUsMC4yMDYsMC4xNTgsMC4zNDUsMC4xNThDMjMuMDAyLDM2LjExNywyMy4xMDksMzYuMDY0LDIzLjE4OCwzNS45NjN6IiBmaWxsPSIjRDgwMDI3Ii8+CgkJPHBhdGggZD0iTTUuNjg3LDM2LjExM2MwLjE4MywwLDAuMzAyLTAuMDk2LDAuMzU4LTAuMjg2czAuMDg1LTAuNDY1LDAuMDg1LTAuODIyYzAtMC4zNzctMC4wMjgtMC42NTQtMC4wODUtMC44MzcgICAgYy0wLjA1Ni0wLjE4MS0wLjE3Ni0wLjI3MS0wLjM1OC0wLjI3MWMtMC4xODIsMC0wLjMwMywwLjA5Mi0wLjM2MSwwLjI3MWMtMC4wNTksMC4xODItMC4wODgsMC40Ni0wLjA4OCwwLjgzNyAgICBjMCwwLjM1NywwLjAyOSwwLjYzMiwwLjA4OCwwLjgyMkM1LjM4NCwzNi4wMTcsNS41MDQsMzYuMTEzLDUuNjg3LDM2LjExM3oiIGZpbGw9IiNEODAwMjciLz4KCQk8cGF0aCBkPSJNNjAuNTMxLDYuMDI5aC0zLjU2bC0xLjExOCwxLjExOUw1NC43MzUsNi4wM2gtMS4xMDRoLTAuNzY0aC0xLjEwNGwtMS4xMTgsMS4xMThMNDkuNTI3LDYuMDNoLTEuMTA1aC0wLjc2M2gtMS4xMDQgICAgbC0xLjExOCwxLjExOEw0NC4zMTgsNi4wM2gtMS4xMDRoLTAuNzYzaC0xLjEwNGwtMS4xMTgsMS4xMThMMzkuMTEsNi4wM2gtMS4xMDRoLTAuNzY0aC0xLjEwNEwzNS4wMiw3LjE0OEwzMy45MDIsNi4wM2gtMy4yNzkgICAgbC0wLjE5NSwwLjQ5NWMtMC4wMjQsMC4wNjItMC44MjQsMi4xNjItMS42MjksNS45MzhIMy43NzZDMS42OTQsMTIuNDYyLDAsMTQuMTc4LDAsMTYuMjg4djI4LjE2NSAgICBjMCwyLjEwOSwxLjY5NCwzLjgyNSwzLjc3NiwzLjgyNWgyNS4zMjhjMC4zNywxLjgzNiwwLjc5NiwzLjcxMywxLjI5NCw1LjY0bDAuMTUyLDAuNTg1aDMuMjMxbDEuMjM4LTEuMjM4bDEuMjM5LDEuMjM4aDEuMTA0ICAgIGgwLjUyMWgxLjEwNGwxLjIzOC0xLjIzOGwxLjIzNywxLjIzOGgxLjEwN2gwLjUyMWgxLjEwNGwxLjIzOC0xLjIzOGwxLjIzOCwxLjIzOGgxLjEwNmgwLjUyMWgxLjEwNWwxLjIzNy0xLjIzOGwxLjIzOCwxLjIzOCAgICBoMS4xMDZoMC41MjFoMS4xMDRsMS4yMzgtMS4yMzhsMS4yMzcsMS4yMzhoMy4zNDNsLTAuMjY3LTAuOTg3Yy03LjE3OC0yNi40MTktMC4wOTMtNDYuMjM2LTAuMDItNDYuNDM1TDYwLjUzMSw2LjAyOXogICAgIE01NS45NzksMTkuMzAzYy0wLjAzLDAuMjU0LTAuMDY0LDAuNDkzLTAuMDkzLDAuNzUzYy0wLjU0Nyw0Ljk3OS0wLjgxNywxMS44MjUsMC4wOTMsMTkuODQ3ICAgIGMwLjQ2Myw0LjA3MSwxLjIyMyw4LjQ0MSwyLjQxOCwxMy4wMzVoLTAuNjU3bC0xLjg4Ni0xLjg4NmwtMS44ODcsMS44ODZoLTEuNDM2bC0xLjg4OC0xLjg4NmwtMS44ODcsMS44ODZINDcuMzJsLTEuODg2LTEuODg2ICAgIGwtMS44ODYsMS44ODZoLTEuNDM3bC0xLjg4Ny0xLjg4NmwtMS44ODgsMS44ODZoLTEuNDM2bC0xLjg4Ny0xLjg4NmwtMS44ODYsMS44ODZoLTEuMzczYy0wLjQwMS0xLjU4NS0wLjc1NC0zLjEzOS0xLjA2Ny00LjY2MyAgICBjLTAuMDcyLTAuMzUtMC4xMzUtMC42OTMtMC4yMDItMS4wNDJjLTAuMDY4LTAuMzQ2LTAuMTQtMC42OTctMC4yMDItMS4wNDFjLTAuMTQ0LTAuNzgzLTAuMjc1LTEuNTU3LTAuMzk3LTIuMzIxICAgIGMtMC4wNTktMC4zNzMtMC4xMTItMC43NC0wLjE2Ni0xLjEwOWMtMC4wMTYtMC4xMDQtMC4wMzMtMC4yMDktMC4wNDctMC4zMTNjLTAuMDE4LTAuMTE5LTAuMDM4LTAuMjQyLTAuMDU0LTAuMzYgICAgYy0xLjY3Ny0xMS45NDMtMC43NzgtMjEuNDY1LDAuMzQ1LTI3LjU0MmMwLjA2Ni0wLjM1OSwwLjEzMy0wLjcwNywwLjIwMS0xLjA0MmMwLjA3My0wLjM2MiwwLjE0Ni0wLjcwOSwwLjIxOS0xLjA0MiAgICBjMC41MzQtMi40MzgsMS4wNTMtNC4wOTgsMS4zMTUtNC44N2gxLjU0OWwxLjc2NSwxLjc2NWwxLjc2NS0xLjc2NWgxLjY3OGwxLjc2NiwxLjc2NWwxLjc2NC0xLjc2NWgxLjY3OGwxLjc2NiwxLjc2NWwxLjc2NS0xLjc2NSAgICBoMS42NzhsMS43NjUsMS43NjVMNTIuNCw3LjU5MmgxLjY3OWwxLjc2NSwxLjc2NWwxLjc2Ni0xLjc2NWgwLjcxMkM1Ny43NzEsOS40LDU2LjY3MiwxMy40ODIsNTUuOTc5LDE5LjMwM3ogTTI3LjIzNCw0MS43ODQgICAgaDAuNTIxdjAuMzAxYzAuMDY4LTAuMTA2LDAuMTM0LTAuMTgzLDAuMTk2LTAuMjI5YzAuMDE5LTAuMDE0LDAuMDQzLTAuMDIxLDAuMDY0LTAuMDMyYzAuMDE4LDAuMTI4LDAuMDM4LDAuMjU4LDAuMDU2LDAuMzg4ICAgIGMtMC4xMDgsMC4wMzEtMC4xOTgsMC4wODgtMC4yNDgsMC4yYy0wLjAzNCwwLjA4MS0wLjA1MiwwLjE4Ny0wLjA1MiwwLjMxM3YxLjExMmgtMC41MzlMMjcuMjM0LDQxLjc4NEwyNy4yMzQsNDEuNzg0eiAgICAgTTI1LjUwOSw0My40MjljMC4wMjEsMC4wMjEsMC4wODYsMC4wMzEsMC4xOTYsMC4wMzFjMC4wMTcsMCwwLjAzMywwLDAuMDUyLTAuMDAyYzAuMDE5LDAsMC4wMzcsMCwwLjA1NC0wLjAwMnYwLjQwMmwtMC4yNTUsMC4wMSAgICBjLTAuMjU0LDAuMDA4LTAuNDI5LTAuMDM2LTAuNTIxLTAuMTMzYy0wLjA2MS0wLjA2Mi0wLjA5MS0wLjE1NS0wLjA5MS0wLjI4NnYtMS4yNjZoLTAuMjg4VjQxLjhoMC4yODh2LTAuNTc0aDAuNTMyVjQxLjhoMC4zMzQgICAgdjAuMzg0aC0wLjMzNHYxLjA4N0MyNS40NzcsNDMuMzU1LDI1LjQ4OCw0My40MDcsMjUuNTA5LDQzLjQyOXogTTI1LjYxMywzNS4xMzVjLTAuMDg4LDAuMTkzLTAuMTY3LDAuNDI5LTAuMjM3LDAuNzEgICAgYy0wLjA3MSwwLjI4LTAuMTA1LDAuNTEtMC4xMDUsMC42ODhoLTAuNjM4YzAuMDE5LTAuNTYsMC4yMDItMS4xNDIsMC41NTEtMS43NDVjMC4yMjUtMC4zNzYsMC40MTUtMC42MzYsMC41NjYtMC43ODNoLTEuNTU1ICAgIGwwLjAwOS0wLjU1MmgyLjIwNHYwLjQ4Yy0wLjA5MSwwLjA5LTAuMjIsMC4yNTEtMC4zODQsMC40ODJDMjUuODU4LDM0LjY0OCwyNS43MjQsMzQuODg5LDI1LjYxMywzNS4xMzV6IE0xNi44NDUsMzUuODYzdi0wLjUzNyAgICBsMS4xNDctMS44OTVoMC42ODh2MS45NTFoMC4zNTN2MC40OEgxOC42OHYwLjY3MWgtMC42di0wLjY3MUgxNi44NDV6IE0xOC4yNDksNDEuMDU2aDAuNTgydjIuMjgzaDEuMzg5djAuNDk5aC0xLjk3MVY0MS4wNTZ6ICAgICBNMTkuNjE1LDM2LjM3OGMtMC4xOTEtMC4xNi0wLjI5Ny0wLjM4Ny0wLjMxOC0wLjY3OWgwLjYxMmMwLjAyNCwwLjEzMywwLjA3MSwwLjIzNiwwLjEzOSwwLjMxICAgIGMwLjA2OSwwLjA3MiwwLjE2OSwwLjEwOCwwLjMwMSwwLjEwOGMwLjE1MiwwLDAuMjY4LTAuMDU0LDAuMzQ3LTAuMTYxYzAuMDgtMC4xMDcsMC4xMTktMC4yNDEsMC4xMTktMC40MDIgICAgYzAtMC4xNi0wLjAzNy0wLjI5NS0wLjExMS0wLjQwNGMtMC4wNzUtMC4xMDgtMC4xOS0wLjE2My0wLjM0OC0wLjE2M2MtMC4wNzQsMC0wLjEzOSwwLjAwOC0wLjE5MywwLjAyNyAgICBjLTAuMDk2LDAuMDM0LTAuMTY3LDAuMDk4LTAuMjE3LDAuMTkybC0wLjU1LTAuMDI2bDAuMjE5LTEuNzI1aDEuNzE2djAuNTIxaC0xLjI3NWwtMC4xMTEsMC42ODMgICAgYzAuMDk1LTAuMDYxLDAuMTY5LTAuMTA0LDAuMjIyLTAuMTIzYzAuMDg4LTAuMDMzLDAuMTk3LTAuMDQ5LDAuMzI1LTAuMDQ5YzAuMjU4LDAsMC40ODMsMC4wODcsMC42NzUsMC4yNjEgICAgYzAuMTkxLDAuMTc0LDAuMjg5LDAuNDI2LDAuMjg5LDAuNzU4YzAsMC4yODgtMC4wOTMsMC41NDUtMC4yNzcsMC43NzJjLTAuMTg1LDAuMjI3LTAuNDYxLDAuMzQtMC44MywwLjM0ICAgIEMyMC4wNDksMzYuNjE2LDE5LjgwNSwzNi41MzYsMTkuNjE1LDM2LjM3OHogTTIxLjYyNCw0Mi4yMTNjLTAuMDU5LTAuMDMzLTAuMTQ3LTAuMDQ4LTAuMjYxLTAuMDQ4ICAgIGMtMC4xMjksMC0wLjIyLDAuMDMxLTAuMjc0LDAuMDk1Yy0wLjAzOSwwLjA0Ny0wLjA2NCwwLjEwOS0wLjA3NiwwLjE4OGgtMC41MTljMC4wMTEtMC4xODEsMC4wNjItMC4zMjgsMC4xNTItMC40NDQgICAgYzAuMTQzLTAuMTgxLDAuMzg5LTAuMjcxLDAuNzM2LTAuMjcxYzAuMjI2LDAsMC40MjcsMC4wNDUsMC42MDMsMC4xMzVjMC4xNzYsMC4wODksMC4yNjQsMC4yNTgsMC4yNjQsMC41MDZ2MC45NDQgICAgYzAsMC4wNjUsMC4wMDEsMC4xNDUsMC4wMDQsMC4yMzhjMC4wMDQsMC4wNzEsMC4wMTQsMC4xMTgsMC4wMzIsMC4xNDRjMC4wMTgsMC4wMjUsMC4wNDMsMC4wNDYsMC4wNzksMC4wNjJ2MC4wNzloLTAuNTg1ICAgIGMtMC4wMTctMC4wNC0wLjAyNy0wLjA3OS0wLjAzNS0wLjExNWMtMC4wMDYtMC4wMzctMC4wMTEtMC4wNzktMC4wMTQtMC4xMjVjLTAuMDc1LDAuMDgtMC4xNjEsMC4xNDgtMC4yNTgsMC4yMDYgICAgYy0wLjExNywwLjA2Ni0wLjI0OCwwLjEtMC4zOTUsMC4xYy0wLjE4OCwwLTAuMzQzLTAuMDUzLTAuNDY1LTAuMTU5cy0wLjE4My0wLjI1OC0wLjE4My0wLjQ1MmMwLTAuMjUzLDAuMDk4LTAuNDM3LDAuMjk0LTAuNTUxICAgIGMwLjEwNy0wLjA2MSwwLjI2Ni0wLjEwNSwwLjQ3Ni0wLjEzMmwwLjE4NS0wLjAyMmMwLjEtMC4wMTMsMC4xNzItMC4wMjgsMC4yMTQtMC4wNDdjMC4wNzctMC4wMzIsMC4xMTYtMC4wODMsMC4xMTYtMC4xNTMgICAgQzIxLjcxNCw0Mi4zMDMsMjEuNjgzLDQyLjI0NSwyMS42MjQsNDIuMjEzeiBNMjEuOTg3LDM2LjEyM2MtMC4xNDUtMC4yNTgtMC4yMTgtMC41ODktMC4yMTgtMC45OTQgICAgYzAtMC4yMzksMC4wMTEtMC40MzQsMC4wMzEtMC41ODJjMC4wMzUtMC4yNjYsMC4xMDUtMC40ODYsMC4yMDgtMC42NjJjMC4wODktMC4xNTIsMC4yMDYtMC4yNzIsMC4zNTEtMC4zNjMgICAgYzAuMTQzLTAuMDkyLDAuMzE2LTAuMTM5LDAuNTE3LTAuMTM5YzAuMjksMCwwLjUyMSwwLjA3NCwwLjY5MywwLjIyNGMwLjE3MiwwLjE0OCwwLjI2OSwwLjM0NiwwLjI5MSwwLjU5MmgtMC42MSAgICBjMC0wLjA1LTAuMDItMC4xMDQtMC4wNTktMC4xNjRjLTAuMDY2LTAuMDk5LTAuMTY2LTAuMTQ3LTAuMjk5LTAuMTQ3Yy0wLjE5OSwwLTAuMzQyLDAuMTEtMC40MjYsMC4zMzUgICAgYy0wLjA0NiwwLjEyMy0wLjA3NywwLjMwNi0wLjA5NSwwLjU0N2MwLjA3Ni0wLjA5LDAuMTY1LTAuMTU2LDAuMjY0LTAuMTk3YzAuMS0wLjA0MiwwLjIxNi0wLjA2MywwLjM0NS0wLjA2MyAgICBjMC4yNzcsMCwwLjUwNCwwLjA5NCwwLjY4MSwwLjI4M2MwLjE3NywwLjE4NywwLjI2NiwwLjQyOCwwLjI2NiwwLjcycy0wLjA4NiwwLjU0OS0wLjI2LDAuNzcxICAgIGMtMC4xNzQsMC4yMjQtMC40NDQsMC4zMzQtMC44MSwwLjMzNEMyMi40NjMsMzYuNjE2LDIyLjE3NCwzNi40NTEsMjEuOTg3LDM2LjEyM3ogTTIzLjg1Myw0My4xNjcgICAgYy0wLjA1LTAuMDMxLTAuMjM5LTAuMDg2LTAuNTYzLTAuMTYzYy0wLjIzMy0wLjA1OC0wLjM5OC0wLjEzLTAuNDk0LTAuMjE3Yy0wLjA5Ni0wLjA4NS0wLjE0NC0wLjIwOC0wLjE0NC0wLjM2OSAgICBjMC0wLjE5LDAuMDc1LTAuMzU0LDAuMjI0LTAuNDljMC4xNDktMC4xMzYsMC4zNTktMC4yMDUsMC42MzItMC4yMDVjMC4yNTcsMCwwLjQ2NiwwLjA1MiwwLjYyOCwwLjE1NCAgICBjMC4xNjMsMC4xMDQsMC4yNTUsMC4yOCwwLjI3OSwwLjUzMWgtMC41MzdjLTAuMDA3LTAuMDY5LTAuMDI3LTAuMTI0LTAuMDYtMC4xNjVjLTAuMDYtMC4wNzItMC4xNjEtMC4xMDgtMC4zMDMtMC4xMDggICAgYy0wLjExOCwwLTAuMjAxLDAuMDE3LTAuMjUxLDAuMDU0Yy0wLjA1LDAuMDM2LTAuMDc1LDAuMDc5LTAuMDc1LDAuMTNjMCwwLjA2MiwwLjAyNywwLjEwNSwwLjA4LDAuMTM1ICAgIGMwLjA1MywwLjAyOCwwLjI0MSwwLjA3OCwwLjU2MSwwLjE0OGMwLjIxNSwwLjA1LDAuMzc1LDAuMTI2LDAuNDgzLDAuMjI4YzAuMTA1LDAuMTA0LDAuMTU4LDAuMjMyLDAuMTU4LDAuMzg4ICAgIGMwLDAuMjA0LTAuMDc3LDAuMzcxLTAuMjI5LDAuNDk5Yy0wLjE1MiwwLjEyOS0wLjM4NiwwLjE5My0wLjcwNCwwLjE5M2MtMC4zMjQsMC0wLjU2My0wLjA2OS0wLjcxNy0wLjIwNSAgICBjLTAuMTU0LTAuMTM3LTAuMjMxLTAuMzExLTAuMjMxLTAuNTIyaDAuNTQ1YzAuMDEyLDAuMDk3LDAuMDM2LDAuMTY0LDAuMDc0LDAuMjA1YzAuMDY3LDAuMDcxLDAuMTkxLDAuMTA3LDAuMzcyLDAuMTA3ICAgIGMwLjEwNiwwLDAuMTkxLTAuMDE2LDAuMjUzLTAuMDQ3YzAuMDYyLTAuMDMyLDAuMDkzLTAuMDc5LDAuMDkzLTAuMTQyQzIzLjkyOCw0My4yNDQsMjMuOTAzLDQzLjE5NywyMy44NTMsNDMuMTY3eiBNMTQuNSw0My4zOTYgICAgYzAuMDgzLDAuMDUyLDAuMTgyLDAuMDc3LDAuMjk3LDAuMDc3YzAuMTIzLDAsMC4yMjItMC4wMzEsMC4yOTktMC4wOTVjMC4wNDItMC4wMzQsMC4wNzktMC4wODEsMC4xMS0wLjE0MmgwLjU0OSAgICBjLTAuMDE0LDAuMTIyLTAuMDgxLDAuMjQ2LTAuMTk5LDAuMzcyYy0wLjE4NCwwLjE5OS0wLjQ0MiwwLjMtMC43NzQsMC4zYy0wLjI3MywwLTAuNTE1LTAuMDg0LTAuNzI1LTAuMjUzICAgIGMtMC4yMS0wLjE2OS0wLjMxMy0wLjQ0My0wLjMxMy0wLjgyNGMwLTAuMzU1LDAuMDk1LTAuNjMxLDAuMjgzLTAuODJjMC4xODktMC4xODksMC40MzUtMC4yODQsMC43MzYtMC4yODQgICAgYzAuMTc5LDAsMC4zNCwwLjAzMiwwLjQ4MywwLjA5N2MwLjE0NCwwLjA2MywwLjI2MywwLjE2NiwwLjM1NSwwLjMwNGMwLjA4NCwwLjEyMywwLjEzOSwwLjI2NSwwLjE2NCwwLjQyNyAgICBjMC4wMTQsMC4wOTUsMC4wMjEsMC4yMywwLjAxOCwwLjQwN2gtMS40OTlDMTQuMjk0LDQzLjE2OCwxNC4zNjYsNDMuMzEyLDE0LjUsNDMuMzk2eiBNMTIuODE4LDQyLjMzNyAgICBjLTAuMDQ4LTAuMDk2LTAuMTM1LTAuMTQ1LTAuMjY1LTAuMTQ1Yy0wLjE0OSwwLTAuMjUxLDAuMDYyLTAuMzA3LDAuMTg2Yy0wLjAyOSwwLjA2NS0wLjA0MywwLjE0NC0wLjA0MywwLjIzNXYxLjIyNWgtMC41NDIgICAgdi0xLjIyNWMwLTAuMTIyLTAuMDEzLTAuMjEyLTAuMDM4LTAuMjY2Yy0wLjA0Ni0wLjEwMS0wLjEzNC0wLjE0OS0wLjI2Ny0wLjE0OWMtMC4xNTMsMC0wLjI1NiwwLjA1MS0wLjMxLDAuMTQ5ICAgIGMtMC4wMjksMC4wNTctMC4wNDQsMC4xNDEtMC4wNDQsMC4yNTR2MS4yMzhoLTAuNTQ1di0yLjA1NWgwLjUyM3YwLjMwMWMwLjA2Ni0wLjEwNywwLjEyOS0wLjE4NCwwLjE4OC0wLjIyOSAgICBjMC4xMDQtMC4wNzksMC4yNC0wLjEyLDAuNDA2LTAuMTJjMC4xNTcsMCwwLjI4NSwwLjAzNSwwLjM4MSwwLjEwNGMwLjA3OSwwLjA2NCwwLjEzOCwwLjE0NiwwLjE3NywwLjI0NyAgICBjMC4wNzEtMC4xMjEsMC4xNTktMC4yMSwwLjI2Mi0wLjI2N2MwLjExMS0wLjA1NywwLjIzNS0wLjA4NSwwLjM3MS0wLjA4NWMwLjA5LDAsMC4xOCwwLjAxOSwwLjI2OSwwLjA1MyAgICBjMC4wODcsMC4wMzYsMC4xNjgsMC4wOTgsMC4yMzksMC4xODZjMC4wNTksMC4wNzIsMC4wOTcsMC4xNjEsMC4xMTcsMC4yNjVjMC4wMTMsMC4wNjksMC4wMTksMC4xNzEsMC4wMTksMC4zMDVsLTAuMDA0LDEuMjk2ICAgIGgtMC41NTF2LTEuMzFDMTIuODU2LDQyLjQ1LDEyLjg0Myw0Mi4zODcsMTIuODE4LDQyLjMzN3ogTTcuMjMsMzQuMzgydi0wLjQxOGMwLjE5My0wLjAxLDAuMzI5LTAuMDIxLDAuNDA3LTAuMDM5ICAgIGMwLjEyMy0wLjAyNywwLjIyMy0wLjA4MSwwLjMwMS0wLjE2M2MwLjA1My0wLjA1NywwLjA5My0wLjEzMSwwLjEyLTAuMjI1YzAuMDE1LTAuMDU3LDAuMDI0LTAuMDk4LDAuMDI0LTAuMTI1aDAuNTEydjMuMTIxSDcuOTY0ICAgIHYtMi4xNTFINy4yM3ogTTUuOTQ3LDI2Ljc4MXYtMS45ODZINy45NHYyLjAzMUg1Ljk1MkM1Ljk1MiwyNi44MTEsNS45NDcsMjYuNzk2LDUuOTQ3LDI2Ljc4MXogTTEzLjc1MSwyNi43ODEgICAgYzAsMC4wMTYtMC4wMDQsMC4wMy0wLjAwNCwwLjA0NWgtMS45OXYtMi4wMzFoMS45OTRWMjYuNzgxeiBNNy45NCwyOS40MzdjLTAuNzk1LTAuMjM4LTEuNDQ4LTAuODA5LTEuNzcxLTEuNTY0SDcuOTRWMjkuNDM3eiAgICAgTTguOTg2LDI3Ljg3MmgxLjcyNHYxLjY5Mkg4Ljk4NlYyNy44NzJ6IE0xMS43NTcsMjcuODcyaDEuNzcxYy0wLjMyMywwLjc1NS0wLjk3NSwxLjMyNy0xLjc3MSwxLjU2NFYyNy44NzJ6IE0xMS4yMzQsMjMuNzQ5ICAgIEwxMS4yMzQsMjMuNzQ5TDEwLjcxLDIzLjc1djMuMDc2SDguOTg2di01LjA2N2gxLjk4YzEuMjU3LDAsMi4zMSwwLjg0MywyLjY1NCwxLjk5SDExLjIzNHogTTcuOTQsMjMuNzQ5SDYuMDc2ICAgIGMwLjI2OS0wLjg5NSwwLjk3LTEuNTk0LDEuODY0LTEuODYxVjIzLjc0OXogTTUuNjg3LDMzLjM5MWMwLjM5OCwwLDAuNjc2LDAuMTQxLDAuODM2LDAuNDIyYzAuMTYxLDAuMjc5LDAuMjQsMC42NzYsMC4yNCwxLjE5MiAgICBjMCwwLjUxNS0wLjA4MSwwLjkxMS0wLjI0LDEuMTg5Yy0wLjE2MSwwLjI3OS0wLjQzOCwwLjQxOC0wLjgzNiwwLjQxOFM1LjAxLDM2LjQ3NCw0Ljg1LDM2LjE5NCAgICBjLTAuMTYxLTAuMjc3LTAuMjM5LTAuNjc1LTAuMjM5LTEuMTg5YzAtMC41MTcsMC4wOC0wLjkxMywwLjIzOS0xLjE5MkM1LjAwOSwzMy41MzEsNS4yOSwzMy4zOTEsNS42ODcsMzMuMzkxeiBNNS41NTgsNDEuMDU2ICAgIGgwLjYwOWwxLjEwNSwxLjk0MXYtMS45NDFoMC41NDJ2Mi43ODRINy4yMzRMNi4xLDQxLjg2NHYxLjk3Nkg1LjU1OFY0MS4wNTZ6IE05LjM3NCw0Mi4yMTNjLTAuMDU5LTAuMDMzLTAuMTQ3LTAuMDQ4LTAuMjYyLTAuMDQ4ICAgIGMtMC4xMjksMC0wLjIyLDAuMDMxLTAuMjczLDAuMDk1Yy0wLjAzOSwwLjA0Ny0wLjA2MywwLjEwOS0wLjA3NiwwLjE4OGgtMC41MmMwLjAxMi0wLjE4MSwwLjA2Mi0wLjMyOCwwLjE1Mi0wLjQ0NCAgICBjMC4xNDMtMC4xODEsMC4zODktMC4yNzEsMC43MzUtMC4yNzFjMC4yMjYsMCwwLjQyNywwLjA0NSwwLjYwMywwLjEzNWMwLjE3NiwwLjA4OSwwLjI2NCwwLjI1OCwwLjI2NCwwLjUwNnYwLjk0NCAgICBjMCwwLjA2NSwwLjAwMSwwLjE0NSwwLjAwNCwwLjIzOGMwLjAwNCwwLjA3MSwwLjAxNSwwLjExOCwwLjAzMywwLjE0NGMwLjAxNywwLjAyNSwwLjA0NCwwLjA0NiwwLjA3OSwwLjA2MnYwLjA3OUg5LjUyNyAgICBDOS41MTEsNDMuOCw5LjUsNDMuNzYxLDkuNDkzLDQzLjcyNWMtMC4wMDctMC4wMzctMC4wMTItMC4wNzktMC4wMTUtMC4xMjVjLTAuMDc1LDAuMDgtMC4xNiwwLjE0OC0wLjI1OCwwLjIwNiAgICBjLTAuMTE2LDAuMDY2LTAuMjQ4LDAuMS0wLjM5NSwwLjFjLTAuMTg4LDAtMC4zNDMtMC4wNTMtMC40NjQtMC4xNTljLTAuMTIyLTAuMTA2LTAuMTg0LTAuMjU4LTAuMTg0LTAuNDUyICAgIGMwLTAuMjUzLDAuMDk4LTAuNDM3LDAuMjk1LTAuNTUxYzAuMTA3LTAuMDYxLDAuMjY3LTAuMTA1LDAuNDc2LTAuMTMybDAuMTg0LTAuMDIyYzAuMS0wLjAxMywwLjE3Mi0wLjAyOCwwLjIxNS0wLjA0NyAgICBjMC4wNzctMC4wMzIsMC4xMTUtMC4wODMsMC4xMTUtMC4xNTNDOS40NjIsNDIuMzAzLDkuNDM0LDQyLjI0NSw5LjM3NCw0Mi4yMTN6IE05LjUxNCwzNi41MzQgICAgYzAuMDA2LTAuMjI0LDAuMDU0LTAuNDI4LDAuMTQ0LTAuNjEzYzAuMDg3LTAuMjA5LDAuMjk0LTAuNDI4LDAuNjItMC42NmMwLjI4Mi0wLjIwMiwwLjQ2NS0wLjM0OCwwLjU0OS0wLjQzNiAgICBjMC4xMjgtMC4xMzYsMC4xOTItMC4yODUsMC4xOTItMC40NDdjMC0wLjEzMy0wLjAzNy0wLjI0MS0wLjEwOS0wLjMyOWMtMC4wNzMtMC4wODctMC4xNzgtMC4xMzEtMC4zMTUtMC4xMzEgICAgYy0wLjE4NiwwLTAuMzEzLDAuMDY5LTAuMzgxLDAuMjA4Yy0wLjAzOSwwLjA4MS0wLjA2MiwwLjIwOS0wLjA2OSwwLjM4NEg5LjU0OGMwLjAxMS0wLjI2NywwLjA1OS0wLjQ3OSwwLjE0NS0wLjY0NSAgICBjMC4xNjMtMC4zMTIsMC40NTQtMC40NjYsMC44NzMtMC40NjZjMC4zMywwLDAuNTkyLDAuMDkyLDAuNzg4LDAuMjczYzAuMTk2LDAuMTg0LDAuMjkzLDAuNDI1LDAuMjkzLDAuNzI3ICAgIGMwLDAuMjMtMC4wNjksMC40MzctMC4yMDgsMC42MTVjLTAuMDksMC4xMTktMC4yMzksMC4yNTItMC40NDYsMC4zOTdsLTAuMjQ2LDAuMTc0Yy0wLjE1NCwwLjExLTAuMjU5LDAuMTg4LTAuMzE1LDAuMjM2ICAgIGMtMC4wNTcsMC4wNS0wLjEwNCwwLjEwNS0wLjE0MywwLjE3MWgxLjM2MnYwLjU0TDkuNTE0LDM2LjUzNEw5LjUxNCwzNi41MzR6IE0xMy4wMTUsMzYuNjExYy0wLjQ0MSwwLTAuNzQ4LTAuMTQ1LTAuOTItMC40MzIgICAgYy0wLjA5MS0wLjE1NC0wLjE0MS0wLjM1NS0wLjE1LTAuNjA0aDAuNjAzYzAsMC4xMjUsMC4wMiwwLjIyOCwwLjA2MSwwLjMxMWMwLjA3NCwwLjE1MSwwLjIwOSwwLjIyNywwLjQwNiwwLjIyNyAgICBjMC4xMiwwLDAuMjI1LTAuMDQzLDAuMzE0LTAuMTI0YzAuMDktMC4wODQsMC4xMzUtMC4yMDEsMC4xMzUtMC4zNTdjMC0wLjIwNC0wLjA4My0wLjM0My0wLjI1LTAuNDExICAgIGMtMC4wOTQtMC4wMzgtMC4yNDQtMC4wNTgtMC40NDUtMC4wNTh2LTAuNDM5YzAuMTk5LTAuMDA0LDAuMzM3LTAuMDIyLDAuNDE3LTAuMDU5YzAuMTM1LTAuMDYyLDAuMjA0LTAuMTgzLDAuMjA0LTAuMzY2ICAgIGMwLTAuMTE4LTAuMDM0LTAuMjE2LTAuMTA0LTAuMjljLTAuMDY5LTAuMDc1LTAuMTY2LTAuMTExLTAuMjkyLTAuMTExYy0wLjE0NSwwLTAuMjUxLDAuMDQ1LTAuMzE5LDAuMTM3ICAgIGMtMC4wNjcsMC4wOTItMC4xLDAuMjE2LTAuMDk4LDAuMzY4aC0wLjU3M2MwLjAwNi0wLjE1NSwwLjAzMy0wLjMwMywwLjA4LTAuNDQxYzAuMDUtMC4xMjIsMC4xMjktMC4yMzQsMC4yMzYtMC4zMzggICAgYzAuMDgxLTAuMDczLDAuMTc2LTAuMTI5LDAuMjg1LTAuMTY4YzAuMTExLTAuMDM5LDAuMjQ2LTAuMDU4LDAuNDA3LTAuMDU4YzAuMjk3LDAsMC41MzksMC4wNzcsMC43MjIsMC4yMyAgICBzMC4yNzQsMC4zNjEsMC4yNzQsMC42MjJjMCwwLjE4My0wLjA1NCwwLjMzNy0wLjE2NCwwLjQ2NGMtMC4wNjksMC4wNzktMC4xNDEsMC4xMzItMC4yMTYsMC4xNjFjMC4wNTcsMCwwLjEzNiwwLjA0OCwwLjI0MSwwLjE0NCAgICBjMC4xNTYsMC4xNDUsMC4yMzQsMC4zNDMsMC4yMzQsMC41OTRjMCwwLjI2NC0wLjA5MSwwLjQ5Ni0wLjI3NCwwLjY5NkMxMy42NDQsMzYuNTEyLDEzLjM3NCwzNi42MTEsMTMuMDE1LDM2LjYxMXoiIGZpbGw9IiNEODAwMjciLz4KCQk8cG9seWdvbiBwb2ludHM9IjM1LjgwNSw0MS43NjcgMzQuMjAzLDQxLjc2NyAzMy45MDcsNDEuNzY3IDMyLjk2Nyw0MS43NjcgMzIuNjQxLDQxLjc2NyAzMi42NDEsNDIuMiAzMi42NDEsNDMuOTcxICAgICA1Mi44MTQsNDMuOTcxIDUyLjgxNCw0MS43NjcgMzYuMjQ0LDQxLjc2NyAgICIgZmlsbD0iI0Q4MDAyNyIvPgoJCTxwb2x5Z29uIHBvaW50cz0iMzYuOTMsMTguMzkgMzguOTc5LDE4LjM5IDM5LjA4OSwxOC4zOSA0MS4xMzgsMTguMzkgNDEuOTU3LDE4LjM5IDQyLjExNiwxOC4zOSA0Mi44MzEsMTguMzkgNDQuMTM0LDE4LjM5ICAgICA0Ni4zMjYsMTguMzkgNDcuNjI4LDE4LjM5IDQ4LjUwMywxOC4zOSA1MC4zOTEsMTguMzkgNTAuMzkxLDE2LjgyNyAzMy4zMjcsMTYuODI3IDMzLjMyNywxOC4zOSAzNS45NTIsMTguMzkgICAiIGZpbGw9IiNEODAwMjciLz4KCQk8cG9seWdvbiBwb2ludHM9IjM0LjU3OCwyMy43MjIgMzUuMTIyLDIzLjcyMiAzOS4xODIsMjMuNzIyIDQwLjMwNywyMy43MjIgNDAuODQ5LDIzLjcyMiA0MS4zOTMsMjMuNzIyIDQyLjk0NCwyMy43MjIgICAgIDQzLjQ4OCwyMy43MjIgNDQuMDMxLDIzLjcyMiA0NC42MDcsMjMuNzIyIDQ5LjA2NiwyMy43MjIgNDkuMzQ5LDIzLjcyMiA0OS4zNDksMjIuMTYgNDkuMzEyLDIyLjE2IDQ0LjE1OSwyMi4xNiA0My42MzgsMjIuMTYgICAgIDQzLjExNSwyMi4xNiA0MS4xNDYsMjIuMTYgNDAuNjI1LDIyLjE2IDQwLjEwNCwyMi4xNiAzNC45NTEsMjIuMTYgMzQuNDMsMjIuMTYgMzMuOTA5LDIyLjE2IDMyLjI4NSwyMi4xNiAzMi4yODUsMjMuNzIyICAgICAzNC4wMzUsMjMuNzIyICAgIiBmaWxsPSIjRDgwMDI3Ii8+CgkJPHBvbHlnb24gcG9pbnRzPSI0OS4zNDksMjcuNDkyIDQwLjI3NywyNy40OTIgMzcuNzksMjcuNDkyIDMyLjI4NSwyNy40OTIgMzIuMjg1LDI5LjA1NCA0OS4zNDksMjkuMDU0ICAgIiBmaWxsPSIjRDgwMDI3Ii8+CgkJPHBvbHlnb24gcG9pbnRzPSIzMy4zMjcsMzMuNjUxIDMzLjMyNywzNC4zODYgMzMuNjg4LDM0LjM4NiAzNC45MjksMzQuMzg2IDM1LjU1NywzNC4zODYgMzYuNTI3LDM0LjM4NiAzNy4xMjEsMzQuMzg2ICAgICAzNy45OCwzNC4zODYgMzguNjA4LDM0LjM4NiA0MS40MTYsMzQuMzg2IDQxLjk5LDM0LjM4NiA0Mi43OCwzNC4zODYgNDMuMzk1LDM0LjM4NiA0NC4zNzksMzQuMzg2IDQ0Ljg0MywzNC4zODYgNDUuMDQ1LDM0LjM4NiAgICAgNDUuNjQ2LDM0LjM4NiA0Ni40NiwzNC4zODYgNDYuOTUyLDM0LjM4NiA0OC44LDM0LjM4NiA0OS4zODgsMzQuMzg2IDUwLjM5MSwzNC4zODYgNTAuMzkxLDM0LjE5OCA1MC4zOTEsMzMuNTI3IDUwLjM5MSwzMi44MjMgICAgIDMzLjMyNywzMi44MjMgICAiIGZpbGw9IiNEODAwMjciLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"  width="150"/>
                        </div>
                    </div>

                    <div id="postpaid">
                        <h4>Please fill in your details for <span class="holder"></span></h4>
                        <form class="postpay" action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Account or Meter Number</label>
                                        <input type="text" name="meter_no" class="meterno form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Firstname</label>
                                        <input type="text" name="first_name" class="meterno form-control" value="">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Lastname</label>
                                        <input type="text" name="last_name" class="meterno form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="email form-control" value="">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="mobile" class="mobile form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Convenience Fee</label>
                                        <input type="text" name="conv_fee" value="100.00" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" name="amount" placeholder="0.00" class="amount form-control">
                                    </div>
                                </div>
                            <input type="hidden" id="payType" value="" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-block" id="payPostpaid">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <footer style="padding: 1rem 2rem; background-color: #111; color: #fff; text-align: center">
        Powered by GOENERGEE
    </footer>

    <script>
        $("#postpaidBtn").click(() => {
            document.querySelector('.holder').innerHTML = "Postpaid Payment";
            $("#payType").val("Postpaid");
            $("#postpaid").css({'display':'block','border-left':'5px solid #218838'});
            $("#payPostpaid").addClass('btn-success')
            $("#reconnectionBtn").hide();
            $("#penaltyBtn").hide();
            $("#lossOfRevenueBtn").hide();
            $("#cardy").hide();
        });

        $("#reconnectionBtn").click(() => {
            document.querySelector('.holder').innerHTML = "Reconnection Fee";
            $("#payType").val("Reconnection");
            $("#postpaid").css({'display':'block','border-left':'5px solid #0062CC'});
            $("#payPostpaid").addClass('btn-primary')
            $("#postpaidBtn").hide();
            $("#penaltyBtn").hide();
            $("#lossOfRevenueBtn").hide();
            $("#cardy").hide();
        });

        $("#penaltyBtn").click(() => {
            document.querySelector('.holder').innerHTML = "Penalties";
            $("#payType").val("Penalties");
            $("#postpaid").css({'display':'block','border-left':'5px solid #C82333'});
            $("#payPostpaid").addClass('btn-danger')
            $("#reconnectionBtn").hide();
            $("#postpaidBtn").hide();
            $("#lossOfRevenueBtn").hide();
            $("#cardy").hide();
        });

        $("#lossOfRevenueBtn").click(() => {
            document.querySelector('.holder').innerHTML = "Loss of Revenue";
            $("#payType").val("Loss of Revenue");
            $("#postpaid").css({'display':'block','border-left':'5px solid #E0A800'});
            $("#payPostpaid").addClass('btn-warning')
            $("#reconnectionBtn").hide();
            $("#penaltyBtn").hide();
            $("#postpaidBtn").hide();
            $("#cardy").hide();
        });

        var sum = 0;
        $(document).ready(function () {
            $('.carousel').carousel();
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".txt").each(function () {

                $(this).keyup(function () {
                    calculateSum();
                });
            });

        });

        function calculateSum() {
            var sum = 0;
            $(".txt").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    var subtotal = parseFloat(this.value) + 100;
                    sum += subtotal;
                    jQuery(this).closest('tr').find("td:last input").val(subtotal);
                }
            });
            console.log(sum);
            $("#totalPayblleAmount").val(sum.toFixed(2));
            $("#sum").val(sum.toFixed(2));
        }
    </script>


    <script type="text/javascript">
        
        var payUrl = "payment/hold/postpaid";
                   
        $("#payPostpaid").click((e) => {
            e.preventDefault();
            $('#payPostpaid').prop('disabled', true);
            $('#payPostpaid').html('Verifying...');

            formdata = $(".postpay").serialize();
            
            $.ajax({
                url: '/meter/api',
                method: "POST",
                data: { meter_no: $(".meterno").val() },
                success: (data) => {
                    if(data.code == '419') {
                        swal('Ooops!','Invalid Meter No');
                        $('#payPostpaid').prop('disabled', false);
                        $('#payPostpaid').html('Continue');
                    }else {
                        continuePay();
                    }
                }
            })
            
            function continuePay() {
                $.ajax({
                url: payUrl,
                method: 'POST',
                data: formdata,
                success: (response) => {
                    if (response.code == "ok") {
                        $('#payPostpaid').html('Connecting...');
                        payWithPaystack();
                    }else if(response.code == "no"){
                        swal('Ooops!','Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com','danger');
                        $('#payPostpaid').prop('disabled', false);
                    }else {
                        swal('Ooops',''+response.errorText+'','error');
                    }
                },
                error: (err) => {
                    $('#payPostpaid').prop('disabled', false);
                }
            });
            $('#payPostpaid').prop('disabled', false);
            }
        })

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                email: document.querySelector('.email').value,
                amount: parseInt(document.querySelector('.amount').value) + 100 + "00",
                ref: 'GOEPOS' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                callback: function (response) {
                    // console.log(response);
                    setTimeout(() => {
                        window.location.href = '/postpaidpayment/' + response.reference +'/success';
                    }, 1000);
                    
                },
                onClose: function () {
                    alert('Payment cancelled Thank you');
                }
            });
            handler.openIframe();
                
        }
    </script>



</body>

</html>