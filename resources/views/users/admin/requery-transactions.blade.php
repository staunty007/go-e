@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>Requery Transaction</h3>
                        <div id="res"></div>
                        <div class="form-group">
                            <label>Enter Transaction ID</label>
                            <input type="text" class="form-control" name="t_ref" id="t_ref" />
                        </div>
                        <div class="form-group">
                            <label>Enter CPay Reference</label>
                            <input type="text" class="form-control" name="c_ref" id="c_ref" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" id="query">Query</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script>
        $("#query").click(() => {
            $("#query").attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i>');
            let t_id = document.querySelector('#t_ref').value;
            let c_ref = document.querySelector('#c_ref').value;

            axios
                .post('/nibbs/requery-transaction', {
                    transaction_id: t_id,
                    cpay_ref: c_ref
                })
                .then((res) => {
                    $("#res").html(`
                        <div class="alert alert-warning">${res.data.data.ResponseDesc}</div>
                    `);
                    $("#query").attr('disabled', false).html('Query Again');
                })  
                .catch(err => {
                     $("#res").html(`
                        <div class="alert alert-warning">${err.response.data.data}</div>
                    `);
                    $("#query").attr('disabled', false).html('Query Again');
                });
        });
    </script>    
@endpush