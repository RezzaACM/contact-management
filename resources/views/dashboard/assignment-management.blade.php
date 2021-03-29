@extends('layout.main')

@section('title', "Assignment Management")
    
@section('container')

<div class="container">
    
    <div class="row mt-4">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="assign-agent">
                Assign Agent
              </button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Agent Name</td>
                        <td>Assign by</td>
                        <td>Customer Assignment</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assigns as $agent)
                        <tr>
                            <td>{{$agent->id}}</td>
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->user_name}}</td>
                            <td>{{$agent->customer_name}}</td>
                            <td>{{$agent->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>



@endsection