@extends('layouts.admin')

@section('body')



<div class="container-fluid">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Striped Table
            </div>
            <div class="card-block">
                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>mail</th>
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


{{-- delete --}}
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.delete') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <p>هل انت متأكد من حذف المستخدم؟</p>
                        <input type="hidden" name="id" id="id">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('words.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('words.delete') }} </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- delete --}}
@endsection
@push('javascripts')
<script type="text/javascript">
    $(function() {
            var table = $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ Route('admin.users.all') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false

                    }
                ]
            });

        });



        $('#table_id tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
</script>
@endpush
