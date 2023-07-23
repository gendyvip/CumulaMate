@extends('layouts.admin')

@section('body')
<!-- Breadcrumb -->


<div class="container-fluid">

  <div class="animated fadeIn">
    <form action="{{ Route('admin.users.store') }}" method="post">
      @csrf
      @method('POST')
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

            <div class="form-group col-md-12">
              <label>الأسم كامل</label>
              <input type="text" name="name" class="form-control" placeholder="الأسم كامل">
            </div>
            <div class="form-group col-md-12">
              <label>البريد الالكتروني</label>
              <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني">
            </div>

          </div>

          <div class="form-group col-md-12">
            <label>كلمة السر</label>
            <input type="password" name="password" class="form-control" placeholder="كلمة السر">
          </div>




          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
              Submit</button>

          </div>



        </div>
    </form>
  </div>
</div>
@endsection
