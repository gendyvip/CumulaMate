@extends('layouts.admin')

@section('body')


<div class="container-fluid">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
            </div>
            <div class="card-block">
                <a href="{{ route('admin.roles.create') }}" class="edit btn btn-success btn-sm mb-2">أضافة إدارة</a>
                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>أسم الأدارة</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td><a href="{{ route('admin.roles.edit', $role->id) }}"
                                    class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <div class="edit btn btn-sm">
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}"
                                        onsubmit="return confirm('هل انت متاكد من حذف الأدارة؟')">
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
