
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        @foreach ($reciepts as $reciept)
        
        <div class="flex-center position-ref full-height">
                <div class="content">
                    <div v-else>   
                        <div v-if="sent" style="margin-top: 1em">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="alert alert-success">
                                        Your Payment Was Successful
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <td>From: </td>
                                                    <td>EKEDC</td>
                                                </tr>
                                                <tr>
                                                    <td>Date: </td>
                                                    <td>{{ $reciept->created_at->format('d/m/Y g:i A') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transaction Ref.: </td>
                                                    <td>{{ $reciept->transaction_ref }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4 d-sm-none d-md-block">
                                            <div class="text-center">
                                            <img src="/images/ekedc.jpg" height="80" style="margin: 1em;"/> 
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Service Paid For.</th>
                                                        <th>Meter Type.</th>
                                                        @if(session('payment_type') == 'Prepaid')
                                                        <th>Meter No.</th>
                                                        @else
                                                        <th>Meter No.</th>
                                                        @endif
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>EKEDC 
                                                            @if($reciept->user_type == 1) 
                                                                Prepaid
                                                            @else
                                                                Postpaid
                                                            @endif
                                                         Electricity Payment</td>
                                                        <td>{{ $reciept->transaction_type }}
                                                        <td>{{ $reciept->meter_no }}</td>
                                                        <td>
                                                            <span class="label label-success">Successful</span>
                                                        </td>
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                <p>Amount: N</p>
                                                <p>Convenience Fee: N100</p>
                                                <div>Total Amount: <span style="font-size: 2em">
                                                    {{ number_format($reciept->transaction->total_amount) }}
                                                </span></div>
                                                <br>
                                                <div style="margin-top: 1em">
                                                    <a class="btn btn-success" href="{{action('AccountController@pdfDownload', $reciept->id)}}">Download Reciept</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach
    </div>
</div>