@extends('layouts.admin')
@section('body')


<div class="container-fluid">

  <div class="animated fadeIn">

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
        <form action="{{ Route('admin.users.update', $user) }}" method="post">
          @csrf
          @method('PUT')
          <div class="card-header">
            <strong>المستخدمين</strong>
          </div>
          <div class="card-block">




            <div class="form-group col-md-12">
              <label>الاسم</label>
              <input type="text" name="name" class="form-control" placeholder="الاسم" value="{{ $user->name }}">
            </div>
            <div class="form-group col-md-12">
              <label>البريد الالكتروني</label>
              <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني"
                value="{{ $user->email }}">
            </div>
            <div class="form-group col-md-12">
              <label>كلمة السر</label>
              <input type="password" name="password" class="form-control" placeholder="كلمة السر" value="">
            </div>
          </div>




          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
              Submit</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
              Reset</button>
          </div>
        </form>

      </div>
      <div class="card">

        <div class="card-header">
          <strong>role User</strong>
          <h6>اذا كنت تريد تغيير الادارة يجب الضغط على الادارة وحذفها اولا</h6>
        </div>
        @if ($user->roles)
        @foreach ($user->roles as $user_role)
        <form class="my-3 mr-5" method="POST"
          action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
          onsubmit="return confirm('Are you sure?');">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">{{ $user_role->name }}</button>
        </form>
        @endforeach
        @endif
        <div class="card">
          @if (!$user->roles)
          <div class="card-block">
            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
              @csrf
              <div class="sm:col-span-6">
                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                <select id="role" name="role" autocomplete="role-name" class="form-control">
                  @foreach ($roles as $role)
                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('role')
              <span class="text-red-400 text-sm">{{ $message }}</span>
              @enderror
              <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary">مزامنة الادارة</button>
              </div>
            </form>
          </div>
          @endif
        </div>
      </div>

    </div>

  </div>
  @endsection
