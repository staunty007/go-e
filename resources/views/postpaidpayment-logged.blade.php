@extends('customer.master')

@section('customer-section')
<script type="text/javascript">
    $(function () {
        function tally(selector) {
            $(selector).each(function () {
                var total = 0,
                    column = $(this).siblings(selector).andSelf().index(this);
                $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                    total += parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
                })
                $(this).html(total);
            });
        }
        tally('td.subtotal');
        tally('td.total');
    });
</script>



<script type="text/javascript">
    function num(id) {
        var e = document.getElementById(id);
        if (e != null) {
            var v = e.value;
            if (/^\\d+$/.test(v)) {
                return parseInt(v, 10);
            }
        }
        return 0;
    }
    function sum() {
        var subtotal1 = num("subtotal1");
        var subtotal2 = num("subtotal2");
        var subtotal3 = num("subtotal3");
        var subtotal4 = num("subtotal4");
        var r = document.getElementById("result");
        if (r != null) {
            r.value = subtotal1 + subtotal2 + subtotal3 + subtotal4;
        }
    }
    function addHandler(element, eventName, handler) {
        if (element.addEventListener) {
            element.addEventListener(eventName, handler, false);
        } else if (element.attachEvent) {
            element.attachEvent("on" + eventName, handler);
        }
    }
</script>

<style>
    #forSelf, #forOthers, #ifAdmin {
        display: none;
    }

    #forOthers > .panel , #forOthers > .panel-body, #forOthers > .ibox-content {
        min-height: 800px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins" style="height: 100%;">
                <div class="ibox-title">
                    {{-- <span class="label label-info pull-right">Instant Top Up</span> --}}
                    <h5>Current Meter Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
                    <small>Your Current Meter Balance is 25,800</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span>
                    <span class="label label-primary pull-right">Week</span>
                    <span class="label label-primary pull-right">Today</span> --}}
                    <h5>Average Daily Charge</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><span>&#8358;</span>120</h1>
                    {{-- <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div> --}}
                    <small>Average Cost of Electricity Per day</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-success pull-right">Year</span>
                    <span class="label label-success pull-right">Quater</span>
                    <span class="label label-success pull-right">Month</span> --}}
                    <h5>Average Electrical Consumption</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">4.2KwH</h1>
                    {{-- <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div> --}}
                    <small>Avg Daily Electrical Power Consumed</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Pay for Your Post Paid Bill
                </div>

                <div class="ibox-content">
                    {{-- @if(isset($before)) --}}
                    <img src="/images/ekedc.jpg" width="80" />
                    <span style="font-size: 16px"> Eko Electric Distribution Company </span>
                    <br><br>
                    <form action="" method="POST" class="meterSelf">
                        {{ csrf_field()}}
                        <div id="postpaid">
                                <form class="postpay" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Account or Meter Number</label>
                                                <input type="text" name="meter_no" class="meterno form-control" value="">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
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
                                        </div> --}}
    
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            {{-- <div class="form-group">
                                                <label for="">Amount</label>
                                                <input type="text" name="amount" placeholder="0.00" class="amount form-control">
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name2">
                                                    <input type="checkbox" id="postPaidPaymentCheckbox"/>
                                                    Postpaid Payment
                                                </label>
                                                <input id="postPaidPaymentInput" id="v1" placeholder="0.00" class="prc" name="postpaid" type="text"
                                                 disabled="disabled" />
                                                <span class="form-msg" id="form-msg"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="reconnection">
                                                    <input type="checkbox" id="reconnectionPaymentCheckbox" />
                                                    Reconnection Fee
                                                </label>
    
                                                <input id="reconnectionPaymentInput" placeholder="0.00" class="prc" name="reconnection" type="text"
                                                 disabled="disabled" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="penalties">
                                                    <input type="checkbox" id="penaltiesPaymentCheckbox" />
                                                    Penalties
                                                </label>
                                                <input id="penaltiesPaymentInput" placeholder="0.00" class="prc" name="penalties" type="text"
                                                 disabled="disabled"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="revenuee">
                                                    <input type="checkbox" id="revenuePaymentCheckbox" />
                                                    Loss of Revenue
                                                </label>
                                                <input id="revenuePaymentInput" placeholder="0.00" class="prc" name="revenue" type="text"
                                                 disabled="disabled" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Convenience Fee</label>
                                                <input type="text" name="conv_fee" value="100.00" id="conv_fee" name="conv_fee" class="prc" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Total</label>
                                                <output type="text" name="result" value="" id="result" class="prc" readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="total">
                                                Total
                                            </label>
                                            <input id="totalPayment" class="form-control" name="total" type="text" />
                                        </div> --}}
                                    
                                    <input type="hidden" id="payType" value="" />
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-block" id="payPostpaid">Continue</button>
                                        </div>
                                    </div>
                            </div>
                    </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Information Portal</h5>
                </div>
                <div class="ibox-content ">
                    <div class="carousel slide" id="carousel2">
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                            <li data-slide-to="1" data-target="#carousel2"></li>
                            <li data-slide-to="2" data-target="#carousel2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big1.png" >

                            </div>
                            <div class="item ">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big2.jpg">

                            </div>

                        </div>
                        <a data-slide="prev" href="#carousel2" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel2" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center" id="ifAdmin">
            <div class="alert alert-danger">
                <h2>Please Contact Admin</h2>
                <h5>
                    <b>Phone:</b> 08052313815
                </h5>
                <h5>
                    <b>Email:</b> customersupport@goenergee.com
                </h5>
            </div>
        </div>

    </div>

</div>

@endsection
@push('scripts')
</div>
</div>
<script>
	$('.form-group').on('input','.prc',function(){
		var totalSum = 0;
		$('.form-group .prc').each(function(){
			var inputVal = $(this).val();
			if($.isNumeric(inputVal)){
				totalSum += parseFloat(inputVal);
			}
		});
	$('#result').text(totalSum)

	});
	</script>

{{-- <script>
        var form = document.getElementById("theForm");
        var inps = form.getElementsByTagName("input");
        for ( var i = 0; i < inps.length; ++i )
        {
            var inp = inps[i];
            if ( ! inp.readonly ) inp.onchange = getValue;
        }
        var sels = form.getElementsByTagName("select");
        for ( var s = 0; s < sels.length; ++s )
        {
            sels[s].onchange = getValue;
        }
        
        function getValue()
        {
            // extract the number (e.g., 2) from the name (e.g. item[2])
            var num = Number( this.name.replace(/\D/g, "") );
        
            // for demo purposes, I'm only going to do total = price times quantity
            var postpaid = Number( form["postpaid[" + num + "]"].value );
            var reconnection   = Number( form["reconnection[" + num + "]"].value );
            var penalties = Number( form["penalties[" + num + "]"].value );
            var revenue   = Number( form["revenue[" + num + "]"].value );
            var conv_fee   = Number( form["conv_fee[" + num + "]"].value );
            
            form["sub_total[" + num + "]"].value = ( postpaid + reconnection + penalties + revenue + conv_fee).toFixed(2);
        }
        </script> --}}
        </body>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
</script>
<script src="/js/sweetalert.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@include('partials._search-component')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    // Payment Handler

</body>
@endpush