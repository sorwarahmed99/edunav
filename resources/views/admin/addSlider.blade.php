@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-white text-center">Add Sliders</h1>
  <!-- <p class="mb-4">Add Slider</p> -->
  <div class="card o-hidden border-0 shadow-lg my-5">
    <!-- <div class="card-header">
			<h1 class="h4 mb-0 text-primary">Add New Slider</h1>
		</div> -->
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <form class="user" action="{{ route('sliderStore') }}" method="POST" enctype="multipart/form-data">
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
                <label for="slider_title">Slider Title<span class="text-danger"> *</span></label>
                <input type="text" name="slider_title" class="form-control" value="{{ old('slider_title') }}" id="slider_title" placeholder="Enter Slider Title">
              </div>

              <div class="form-group">
                <label for="slider_image">Slider Image<span class="text-danger"> *</span></label>
                <input type="file" name="slider_image" class="form-control p-2" id="slider_image" placeholder="Choose an image">
              </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="price">Slider Descrirption<span class="text-danger"> *</span></label>
                <textarea name="slider_description" id="mytextarea" class="form-control">{{ old('slider_description') }}</textarea>
                </div>
            </div>

             
              <button type="submit" class="btn btn-primary">
                Add Slider
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection