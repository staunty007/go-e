<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nibbs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Nibbs Payment
                </div>

                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Select Bank</label>
                            <select name="bank" class="form-control" id="bank">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Account Name</label>
                            <input id="acc_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                            <input id="acc_no" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Amount</label>
                            <input type="tel" id="amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <button id="payWithBank" class="btn btn-block btn-primary">Pay With Bank</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="{{ asset('js/nibbs.js') }}"></script>
</body>
</html>