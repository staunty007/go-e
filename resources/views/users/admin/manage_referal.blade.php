@extends('layouts.admin') @section('content')

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>REFERRAL LIST</h4>
        </div>

        <div class="ibox-content">


            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Id #</th>
                            <th>Name of Referrer</th>
                            <th>Points Earned</th>
                            <th>Points Redeemed</th>
                            


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>G0-01</td>
                            <td>Money Come</td>
                            <td>620</td>
                            <td>20</td>
                         





                        </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@push("scripts")
<!-- Morris -->

<!-- Flot demo data -->
<script src="{{asset('js/demo/flot-demo.js')}}"></script>
<script src="{{asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{asset('js/plugins/morris/morris.js')}}"></script>
<script src="{{asset('js/demo/morris-demo.js')}}"></script>
<script src="{{asset('app-assets/js/tab.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/tab.js')}}" type="text/javascript"></script>
@endpush
@endsection