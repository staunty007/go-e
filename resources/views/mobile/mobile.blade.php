<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>GOENERGEE Mobile</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app-root"></div>
    {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>