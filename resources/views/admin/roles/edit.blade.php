<x-admin-layout>
  @section('body')

  <div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ Session::get('message') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="animated fadeIn">
      <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
        @csrf
        @method('PUT')
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
                <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="أسم الأدارة">
              </div>


            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                تعديل</button>
            </div>




          </div>
      </form>
      <div class="card">

        <div class="card-header">
          <strong>role permissions</strong>
        </div>
        @if ($role->permissions)
        <div class="card-block">
          <div class="form-inline">
            @foreach ($role->permissions as $role_permission)
            <form class="my-3 mr-5 form-control" method="POST"
              action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger form-control" type="submit">{{ $role_permission->name }}</button>
            </form>
            @endforeach

          </div>
          @endif
          <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
            @csrf
            <div class="form-group col-md-12">
              <label>Permissions</label>
              <select id="permission" name="permission" autocomplete="permission-name" class="form-control">
                @foreach ($permissions as $permission)
                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                أضافة تصريح</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  @endsection

</x-admin-layout>
