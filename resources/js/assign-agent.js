$(document).ready(function () {
    $(document).on('click', '#assign-agent', function(e){
        $('.modal-title').text('Assign Agent')
        $('.modal-body').load('/assign-user')
        $('#myModal').modal('show');
    })

    $(document).on('click','#follow-up',function(e){
        let html = `
        <form>
            <div class="form-row">
                <div class="col-md-12 mb-4">
                    <label for="">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="uncontacted">Uncontacted</option>
                        <option value="pending">Pending</option>
                        <option value="qualified">Qualified</option>
                        <option value="lost">Lost</option>
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="">Remarks</label>
                    <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer col-md-12 mb-4">
                    <button type="submit" class="btn btn-primary" id"submit-follow">Submit</button>
                </div>
            </div>
        </form>
        `
        $('.modal-title').text('Follow Up')
        $('.modal-body').html(html)
        $('#myModal').modal('show');
    })
});