@include('mobile.partials._header')

@yield('mobile-content')


<!--bootstapjsfile for quicker page boot-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/mobile-sys/js/popper.min.js"></script>
<script src="/mobile-sys/js/bootstrap.min.js"></script>
@include('partials._search-component')
<script src="/mobile-sys/js/app.js"></script>
@stack('scripts')
</body>

</html>