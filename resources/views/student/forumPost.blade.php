@extends('layouts.master')
@section('content')

<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">We Are Uninav</h4>
        <h5 class="text-white uppercase">Create discussion and explore more about us.</h5>
      </div>
      <div class="overlay bg-opacity-5"></div>
      <img src="https://picsum.photos/1920/650" alt="" class="img-responsive"/> </div>
  </section>
  <!-- end header inner -->
  <div class="clearfix"></div>
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Create Discussion </h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links">Home / Join us / Create Post </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  <br>
<section>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-7" style="border: 1px solid #ccc; padding:35px;">
                    <div class="smart-forms bmargin">
                        <form class="user" action="{{ route('userAddnewPost') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="" for="work">Post Title</label>
                                    <input type="text" name="title" placeholder="Enter a title" class="gui-input" >
                                </div>
                                <div class="form-group row">
                                    <label class="" for="university">Add an image</label>
                                    <input type="file" name="image" placeholder="Preferred course and university..." class="gui-input" >
                                </div>
                                <div class="form-group row">
                                    <label class="" for="description">Description</label>
                                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                </div>
                            <div class="form-footer">
                            <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Create Post</button>
                            <button type="reset" class="button"> Cancel </button>
                            </div>
                        </div>
                        
                    </form>
            </div>
            
            </div>
              <!-- end .smart-forms section --> 
          </div>
      </div>
  </div>
</section>
<br>
<br>
<br>
<br>
@endsection