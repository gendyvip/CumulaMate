<x-admin-layout>
    @section('body')
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                </div>
                <div class="card-block">
                    <a href="{{ route('admin.permissions.create') }}" class="edit btn btn-success btn-sm mb-2">أضافة
                        تصريح</a>
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>أسم التصريح</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                        class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <div class="edit btn btn-sm">
                                        <form method="POST"
                                            action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                            onsubmit="return confirm('هل انت متاكد من حذف التصريح؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="edit btn btn-danger btn-sm" type="submit"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-layout>
