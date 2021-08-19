@extends('layouts.admin')

@section('content')



<div class="container">
  <h1 class="h3 mb-2 text-gray-800">Admins</h1>
  <p class="mb-4">Add Admin</p>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Add New Admin</h1>
            </div>
            <form class="user" action="{{ route('addAdminStore') }}" method="POST">
              @CSRF
              @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="name">Admin Name</label>
                    <input type="text" name="name" id="name" class="form-control" id="exampleInputEmail" placeholder="Enter Admin Name">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="email">Admin Email</label>
                    <input type="text" name="email" id="email" class="form-control" id="exampleInputEmail" placeholder="Enter Admin Email">
                    <small>Note: Admin will recieve an email with login credentials.</small>
                </div>
              </div>
             
              <button type="submit" class="btn btn-primary">
                Add Admin
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection