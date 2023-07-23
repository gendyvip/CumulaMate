<x-admin-layout>

    @section('body')



    <div class="container-fluid">

        <div class="animated fadeIn">
            <form method="POST" action="{{ Route('admin.roles.store') }}">
                @csrf
                <div class="row">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">

                        <div class="card-block">

                            <div class="form-group mt-3 col-md-12">
                                <label>أسم الأدارة</label>
                                <input type="text" name="name" class="form-control" placeholder="أسم الأدارة">
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                إضافة</button>
                        </div>



                    </div>
            </form>
        </div>
    </div>
    @endsection
</x-admin-layout>
