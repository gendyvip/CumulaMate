@extends('layouts.admin')
@section('body')
<!-- Breadcrumb -->


<div class="container-fluid">

  <div class="animated fadeIn">
    <form action="{{ Route('admin.users.update', $user) }}" method="post">
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
          <div class="card-header">
            <strong>{{ __('words.users') }}</strong>
          </div>
          <div class="card-block">




            <div class="form-group col-md-12">
              <label>الاسم</label>
              <input type="text" name="name" class="form-control" placeholder="الاسم كامل" value="{{ $user->name }}">
            </div>
            <div class="form-group col-md-12">
              <label>البريد الالكتروني</label>
              <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني"
                value="{{ $user->email }}">
            </div>

          </div>




          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
              Submit</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
              Reset</button>
          </div>



        </div>
    </form>
  </div>
</div>
@endsection
