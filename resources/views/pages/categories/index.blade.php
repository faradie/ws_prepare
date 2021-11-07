@extends('layouts.app')

@section('title','Categories')

@section('content')
<div class="modal fade" id="categories_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="categories-form" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title" id="categories_modal_title">Modal Title</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @include('pages.categories._form')
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categories_datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            $.fn.dataTable.ext.buttons.addData = {
                text: 'New Data',
                action: function ( e, dt, node, config ) {
                  addCategories();
                }
            };

            var categories_datatable = $('#categories_datatable').DataTable({
                "lengthMenu": [[10, 25, 50,100,200, -1], [10, 25, 50,100,200, "All"]],
                dom: 'Bfrtip',
                buttons: [ 
                    'addData',  //add this too
                {
                    extend: 'colvis',
                    text: 'Column',
                },
                    'pageLength'
                ],
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{route('categories.index')}}",
                columns: [
                    { data: 'DT_RowIndex',  orderable: false,
                        searchable: false },
                    {data: 'title', name: 'title'},
                    {data: 'slug', name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable : false, searchable : false, className: "action-center"},
                ],
                columnDefs: [
                    {   "targets": [],
                        "visible": false,
                        "searchable": true
                    }
                ],
                order:[
                    [0,"asc"]
                ],
            });

        });

        $('#categories-form').on('submit', (function (e) {
                e.preventDefault();
                var formdata = new FormData(this);
                var form = $('#categories-form');
                form.find('.btn-primary').attr('disabled', true);
                clearValidation(form);

                if(form.find('[name=id_form]').val() == ''){
                    url = '{{route('categories.store')}}';
                } else {
                    var url = '{{ route("categories.update",":id") }}';
                    url = url.replace(':id', form.find('#id_form').val());
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formdata,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $('#categories_modal').modal('hide');
                        $('#categories_datatable').DataTable().ajax.reload();
                        showMessage('success',form.find('[name=id_form]').val() == '' ? 'Add categories success' : 'Edit categories success')
                    },
                    error: function (xhr) {
                        var res = xhr.responseJSON;
                        if (xhr.status == 401) {
                            alert(auth.message.unauthorize)
                            window.location.href = auth.routes.unauthorize;
                        }
                        if ($.isEmptyObject(res) == false) {
                            $.each(res.errors, function (key, value) {
                                $('#categories-form ' + '[name="' + key + '"]')
                                    .closest('.form-group')
                                    .append('<span class="help-block"><strong>' + value + '</strong></span>')
                                $('#categories-form ' + '[name="' + key + '"]')
                                .closest('.form-group')
                                .children().addClass('is-invalid')
                            })
                        }
                        showMessage('error',form.find('[name=id_form]').val() == '' ? 'Add categories failed' : 'Edit categories failed')
                        form.find('.btn-primary').attr('disabled', false);
                    }
                })
            }));

    </script>
@endpush
