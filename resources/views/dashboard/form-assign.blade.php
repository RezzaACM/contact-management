<form action="{{url('/create-assign')}}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col-md-12 mb-4">
            <label for="">Agent Name</label>
            <select name="agent" class="form-control" id="agent">
                <option value="">--Select Agent--</option>
                @foreach ($agents as $agent)
                    <option value="{{$agent->id}}">{{$agent->email}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mb-4">
            <label for="">Customer Name</label>
            <select name="customer" class="form-control" id="customer">
                <option value="">--Select Agent--</option>
                @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>