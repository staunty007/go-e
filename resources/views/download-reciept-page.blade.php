<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reciept for {{ $reciept->first_name .' '. $reciept->last_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Trebuchet MS';
    }

    body {
        margin-top: 20px;
        font-size: 15px;
    }

    .container {
        width: 60%;
        /* border: 2px solid black; */
        margin: auto;
    }

    .container h4 {
        text-align: center;
        width: 100%;
        margin: auto;
        font-weight: normal;
    }

    .name {
        margin-top: 15px;
        font-size: 14px;
    }

    .name .left {
        font-weight: bold;
        font-size: 14px;
        float: left;
    }

    .name .right {
        font-weight: bolder;
        float: right;
    }

    .name .right span {
        font-weight: normal;
    }

    .clearfix {
        clear: both;
    }

    .address {
        margin-top: 15px;
    }

    .address .left {
        font-size: 13px;
        float: left;
    }

    .address .right {
        font-size: 13px;
        float: right;
    }

    .table {
        margin-top: 15px;
        width: 100%;
    }
    .table table{
        width: 100%;
        font-size: 13px;
    }
    .table table tr:nth-child(odd) {
    background-color:whitesmoke;;
    }
    .boxes {
        margin-top: 20px;
        width: 100%;
    }
    .boxes li {
        width: 25%;
        height: 70px;
        background-color: silver;
        list-style: none;
        display: inline-block;
        margin-right: 7.5%;
        text-align: left;

    }
    .boxes li p{
        padding: 5px;
        font-weight: bolder;
    }
    .bold {
      font-weight: bold;
    }
</style>

<body>
    <div class="container">
        <h4>EKO ELECTRICITY DISTRIBUTION COMPANY HEADQUARTERS OFFICE 24/25 MARINA LAGOS</h4>
        <br><br>
        <h5 style="float:right; clear:both;">GoEnergee</h5>
        <br>
        <div class="name">
            <p class="left">{{ $reciept->first_name .' '. $reciept->last_name }}</p>
            <p class="right">Account Number: <span>09778528755</span></p>
        </div>
        <div class="clearfix"></div>
        <div class="address">
            <p class="left">{{ $reciept->customer_address }}</p>
            <p class="right"><b>BILL FOR</b>: {{ $reciept->created_at->format('F Y ') }}
        </div>
        <div class="clearfix"></div>
        <div class="table">
            <table >
                <tr>
                    <td class="bold">Email Address: </td>
                    <td>{{ $reciept->email }}</td>
                    <td class="bold">Meter No:</td>
                    <td>{{ $reciept->meter_no }}</td>
                </tr>
                <tr>
                    <td class="bold">Mobile No:</td>
                    <td> {{ $reciept->phone_number }}</td>
                    <td class="bold">Payment Type:</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td class="bold">Transaction Ref:</td>
                    <td>{{ $reciept->transaction_ref }}</td>
                    <td class="bold">Payment Purpose</td>
                    <td>{{ $reciept->purpose }}</td>
                </tr>
                <tr>
                    <td class="bold">Order ID:</td>
                    <td>{{ $reciept->order_id }}</td>
                    <td class="bold">Value of Kwh:</td>
                    <td>{{ $reciept->value_of_kwh }}</td>
                </tr>
                <tr>
                    <td class="bold">Bill No: </td>
                    <td>22661078</td>
                    <td class="bold">ADC:</td>
                    <td>22</td>
                </tr>
                <tr>
                    <td class="bold">Bill Date:</td>
                    <td>Not Available</td>
                    <td class="bold">Old Account No:</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td class="bold">Cycle No:</td>
                    <td></td>
                    <td class="bold">Present Kwh:</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bold">Tariff Code:</td>
                    <td>R2T</td>
                    <td class="bold">Previous Kwh:</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <ul class="boxes">
            <li>
                <p>Initial Amount</p>
                <p>NGN {{ number_format($reciept->transaction->initial_amount,2) }}</p>
            </li>
            <li>
                <p>Convinience Fee</p>
                <p>NGN {{ number_format($reciept->transaction->conv_fee,2) }}</p>
            </li>
            <li>
                <p>Total Amount</p>
                <p>NGN {{ number_format($reciept->transaction->total_amount,2) }}</p>
            </li>
        </ul>
    </div>
</body>

</html>