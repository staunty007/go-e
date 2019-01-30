@extends('layouts.admin') @section('content')

<link href="{{ asset('css/3dpie.css') }}" rel="stylesheet">
<link href="{{ asset('css/donut.css') }}" rel="stylesheet">

<div class="row">
<div id="chartdiv2" height="140"></div>
</div>
@stop

@push("scripts")



<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/animated.js') }}"></script>
<script src="{{ asset('js/3dpie.js') }}"></script>
<script src="{{ asset('js/donut.js') }}"></script>


@endpush

