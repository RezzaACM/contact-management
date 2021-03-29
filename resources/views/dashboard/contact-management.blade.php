@extends('layout.main')

@section('title', "Contact Management")
    
@section('container')

<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                <tbody id="customers">
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form id="form-contact" >
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                            <button id="update-button" type="submit" class="btn btn-primary col-md-5">Update</button>
                            <button id="submit-button" type="submit" class="btn btn-success col-md-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection