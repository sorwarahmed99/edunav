@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-white text-center">Add University</h1>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header">
        <h3><span><a href="{{ route('universities') }}" class="btn btn-dark">Go Back</a></span></h3>
      </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <form class="user" action="{{ route('adduniversitiesStore') }}" method="POST" enctype="multipart/form-data">
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

              <div class="form-group">
                <label for="logo">University Logo<span class="text-danger"> *</span></label>
                <input type="file" name="logo" class="form-control" id="logo" placeholder="Choose an image">
              </div>
             
              <button type="submit" class="btn btn-primary">
                Add University
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection