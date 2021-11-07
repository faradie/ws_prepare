
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

function addCategories() {
    var form = $("#categories-form");
    form.trigger("reset");
    form.find('[name=id_form]').removeAttr('value');
    form.find('.modal-title').text('Add Category');
    form.find('.btn-primary').attr('disabled', false).text('Submit');
    clearValidation(form);
    
    $("#categories_modal").modal({backdrop: 'static', keyboard: false});
}