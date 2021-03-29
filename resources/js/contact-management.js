$(document).ready(function () {

    let isEditMode;

    $("#update-button").attr('disabled', true);
    setTimeout(() => {
        isEditMode = false
    }, 100);

    $("#form-contact").submit((e) => {
        e.preventDefault();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        let data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            name: name,
            phone: phone,
            email: email
        }

        if (!isEditMode) {
            $.ajax({
                type: 'POST',
                url: '/create-contact',
                data: data,
                dataType: 'json',
                success: function (res) {
                    if (res.status === true) {
                        alert("Success to Insert");
                        $('#name').val('');
                        $('#phone').val('');
                        $('#email').val('');
                        // $("#update-button").html('fuck');
                        getCustomers();
                    }
                },
                error: function (err) {
                    alert(err.responseText)
                }
            });
        } else {
            let id = $('#update-customer').attr("data-id")
            data["id"] = parseInt(id);
            $.ajax({
                type: 'POST',
                url: '/update-contact',
                data: data,
                dataType: 'json',
                success: function (res) {
                    $("#update-button").attr("disabled", true)
                    $("#submit-button").attr("disabled", false)
                    $('#name').val('');
                    $('#phone').val('');
                    $('#email').val('');
                    alert("Success to Update");
                    getCustomers();
                },
                error: function (err) {
                    alert(err.responseText)
                }
            });
        }
    })


    function getCustomers() {
        $.ajax({
            type: "GET",
            url: "/customers",
            dataType: "JSON",
            success: function (response) {
                let html;
                response.map((res, i) => {
                    html += `
                    <tr>
                        <td>${i + 1}.</td>
                        <td>${res.name}</td>
                        <td>${res.phone}</td>
                        <td>${res.email}</td>
                        <td> <label id="delete-customer" data-id=${res.id} style="cursor:pointer;color:blue">Delete</label> || <label data-id=${res.id} id="update-customer" style="cursor:pointer; color:blue; ">Update</label> </td>
                    </tr>
                    `

                    $("#customers").html(html);
                })
            }
        });
    }

    $(document).on('click', "#delete-customer", function () {
        let id = $(this).attr("data-id")
        let data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        }
        $.ajax({
            type: "post",
            url: "/customer-delete",
            data: data,
            dataType: "JSON",
            success: function (response) {
                getCustomers();
            }
        });
    })

    $(document).on('click', '#update-customer', function () {
        $("#update-button").attr('disabled', false);
        $("#submit-button").attr('disabled', true);

        let id = $(this).attr("data-id")
        isEditMode = true
        $.ajax({
            type: "get",
            url: "/customer/" + id,
            dataType: "JSON",
            success: function (response) {
                $('#name').val(response.name);
                $('#phone').val(response.phone);
                $('#email').val(response.email);
            }
        });
    })

    getCustomers();

});