@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-white text-center">Add Why Uk</h1>
  <!-- <p class="mb-4">Add Why Uk</p> -->
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header">
        <h3><span><a href="{{ route('whyUkAdmin') }}" class="btn btn-primary">Go Back</a></span></h3>
      </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <form class="user" action="{{ route('addwhyUkStore') }}" method="POST" enctype="multipart/form-data">
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
                <label for="title">Title<span class="text-danger"> *</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" placeholder="Enter Title">
              </div>

              <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" id="subtitle" placeholder="Enter Subtitle">
                <small>This is optional, should be a small paragaraph.</small>
              </div>

              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label for="mytextarea">Descrirption<span class="text-danger"> *</span></label>
                  <textarea name="description" id="mytextarea" rows="5" class="form-control">{{ old('description') }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="form-control-label">Upload Image</label>
                <input name="image" class="form-control" type="file">
              </div>

             
              <button type="submit" class="btn btn-primary">
                Add News
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection