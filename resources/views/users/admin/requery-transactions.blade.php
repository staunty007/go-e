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

                        <div class="form-group">
                            <label>Enter Transaction Reference</label>
                            <input type="text" class="form-control" name="t_ref" id="t_ref" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Query</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection