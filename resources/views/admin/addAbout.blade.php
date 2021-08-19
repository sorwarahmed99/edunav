@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-white text-center">Add About info</h1>
  <!-- <p class="mb-4">Add About info</p> -->
  <div class="card o-hidden border-0 shadow-lg my-5">
    <!-- <div class="card-header">
			<h1 class="h4 mb-0 text-primary">Add New About info 
      <span class="float-right"><a href="{{ route('about') }}" target="_blank" class="btn btn-primary">See about layouts</a></span></h1>
		</div> -->
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <form class="user" action="{{ route('addAboutStore') }}" method="POST" enctype="multipart/form-data">
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
                <label for="image">About Image</label>
                <input type="file" name="image" class="form-control p-2" id="image" placeholder="Choose an image">
              </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="price">About info Text</label>
                <textarea name="texts" rows="8" id="mytextarea" class="form-control">{{ old('texts') }}</textarea>
                <span><small style="color:red;">Please write at least 250 words*</small></span>
                </div>
            </div>

              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection