@extends('layout.main')

@section('title', "Assignment Management")
    
@section('container')

    <div class="container">
        <div class="row mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Agent Name</td>
                        <td>Assign by</td>
                        <td>Customer Assignment</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myAssigns as $myAssign)
                        <tr>
                            <td>{{$myAssign->id}}</td>
                            <td>{{$myAssign->email}}</td>
                            <td>{{$myAssign->user_name}}</td>
                            <td>{{$myAssign->customer_name}}</td>
                            <td>{{$myAssign->status}}</td>
                            <td>
                                <span style="text-decoration: underline;color:blue; cursor: pointer;" id="follow-up">Follow Up</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection