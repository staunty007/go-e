@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-8">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $e)
                        <p>{{ $e }}</p>
                    @endforeach
                </div>
                @endif
                
                <div class="ibox">
                    <div class="ibox-content">
                        <h2>Add New Agent</h2>
                        <hr>
                        <form action="{{ route('agents.store') }}" method="post">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="">Location / Address</label>
                                <input type="text" class="form-control location" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Agent ID</label>
                                <input type="text" class="form-control" name="agent_id" readonly id="agentId">
                            </div>
                            <div class="form-group"><button class="btn btn-primary">Add Agent</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function(){
            var location = document.querySelector('.location');
            var agentId = document.querySelector('#agentId');
            location.addEventListener('keyup', function(){
                var sliced = this.value.slice(0,3);
                var agentval = "GO-"+sliced + ""+Math.floor((Math.random() * 12345) + 1);
                agentId.value = agentval.toUpperCase();
            });
        })();
    </script>
@stop

    

