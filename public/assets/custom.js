
function clearValidation(form) {
    form.find('.help-block').remove();
    form.find('.form-group').children().removeClass('is-invalid');
}

function showMessage(mode, str) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    Toast.fire({
        icon: mode,
        title: str
    })
}

function swalDeleteMessage() {
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    )
}

function addCategories() {
    var form = $("#categories-form");
    form.trigger("reset");
    form.find('[name=id_form]').removeAttr('value');
    form.find('.modal-title').text('Add Category');
    form.find('.btn-primary').attr('disabled', false).text('Submit');
    clearValidation(form);
    
    $("#categories_modal").modal({backdrop: 'static', keyboard: false});
}

function category_edit(url){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        beforeSend: function () {
        },
        success: function (response) {
            var form = $("#categories-form");
            form.trigger("reset");
            form.find('.modal-title').text('Update category Data');
            form.find('.btn-primary').attr('disabled', false).text('Save');
            form.find('#title-form').val(response.data.title);
            
            form.find('#id_form').val(response.data.id);
            clearValidation(form);
            $('#categories_modal').modal({ backdrop: 'static', keyboard: false });
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if (xhr.status == 401) {
                alert(auth.message.unauthorize)
                window.location.href = auth.routes.unauthorize;
            }
            console.log(res)
        }
    });
}

function delete_data(url, token, datatable, unit) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to delete this data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            return new Promise(function (resolve) {
                $.post(url, { '_method': 'DELETE', '_token': token }, function (data) {
                    swalDeleteMessage()
                    $('#' + datatable).DataTable().ajax.reload();
                }).fail(function (error) {
                    showMessage('error', 'Delete ' + unit + ' failed!')
                });
            });
        }
    });
}