@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-white text-center">Edit News</h1>
  <!-- <p class="mb-4">Edit News</p> -->
  <div class="card o-hidden border-0 shadow-lg my-5">
    <!-- <div class="card-header">
			<h1 class="h4 mb-0 text-primary">Add News</h1>
		</div> -->
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <form class="user" action="{{ route('editNewsStore',$news->id) }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="title" class="form-control" value="{{ $news->title }}" id="title" placeholder="Enter News Title">
              </div>

              <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ $news->subtitle }} id="subtitle" placeholder="Enter News Subtitle">
              </div>

              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label for="mytextarea">Descrirption<span class="text-danger"> *</span></label>
                  <textarea name="description" id="mytextarea" rows="5" class="form-control">{{ $news->description }}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label for="status">Select status</label>
                  <select name="status" class="form-control" id="status">
                      <option selected value="1">Active</option>
                      <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="form-control-label">Upload Image</label>
                <input name="image" class="form-control" type="file">
              </div>

            <div class="form-group row">
                <img src="{{ asset($news->image) }}" style="height: 100px; width: 100px;">
            </div>

             
              <button type="submit" class="btn btn-primary">
                Edit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection