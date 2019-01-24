
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reciept for {{ $reciept->first_name .' '. $reciept->last_name }}</title>
    <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 20cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>INVOICE-{{ $reciept->order_id }}</h1>
      <div id="company" class="clearfix">
        <div>Eko Electricity Distribution Company</div>
        <div> Headquaters Office 24/25 Marina Lagos</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
      <div><span>FUll-NAME</span> {{ $reciept->first_name .' '. $reciept->last_name }}</div>
      <div><span>ADDRESS</span> {{ $reciept->customer_address }}</div>
      <div><span>MOBILE-NO</span> {{ $reciept->phone_number }}</div>
        <div><span>EMAIL</span> <a href="">{{ $reciept->email }}</a></div>
        <div><span>DATE</span> {{ $reciept->created_at->format('jS \\of F Y ') }}</div>
        <div><span>METER-NO</span> {{ $reciept->meter_no }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PURPOSE</th>
            <th class="desc">TANSACTTION REF.</th>
            <th>KWH-VALUE</th>
            <th>AMOUNT-PAID</th>
            <th>CONV - FEE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td class="service">{{ $reciept->purpose }}</td>
            <td class="desc">{{ $reciept->transaction_ref }}</td>
            <td class="desc">{{ $reciept->value_of_kwh }}</td>
            <td class="desc">NGN{{ number_format($reciept->transaction->initial_amount,2) }}</td>
            <td class="desc">NGN{{ number_format($reciept->transaction->conv_fee,2) }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL AMOUNT</td>
            <td class="grand total">NGN{{ number_format($reciept->transaction->total_amount,2) }}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>