@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-white text-center">All About Info</h1>
    <br>
  	<!-- <p class="mb-4">All Packages</p> -->
  	<div class="card shadow mb-4">
      <div class="card-body">
			  <div class="table-responsive">
			    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
                <tr>
                    <th>SL.</th>
                    <th class="text-center">About Image</th>
                    <th width="50%" class="text-center">About Texts</th>
                    <th class="text-center">Added Date</th>
                    <th class="text-center">Action</th>
                </tr>
			        </thead>

		          <tbody>
                  @php
                      $sr = 1;
                  @endphp
		            	@foreach($abouts as $about)
	                <tr>
                      <td>{{ $sr  }}</td>
                      <td class="text-center"><img src="{{ asset($about->image) }}" height="50" width="100" alt=""></td>
                      <td width="5s0%">{{ $about->texts }}</td>
                      <td class="text-center">{{$about->created_at->format('d-m-Y, h:i a')}}</td>
	                    <td class="text-center">
                  	    <a href="/about-us" class="btn btn-sm btn-primary" >View</a>
                  	    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePackageModal-{{ $about->id }}" >Delete</a>
	                    </td>
                  </tr>
                  @php
                       $sr++;
                  @endphp
              		@endforeach
              </tbody>	
          </table>
        </div>
      </div>
    </div>
</div>



@foreach($abouts as $about)
 <div class="modal fade" id="deletePackageModal-{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>The about text will be lost !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-about').submit();"> Delete</a>
	          <form method="GET" id="delete-about" action="{{ route('deleteAbout',$about->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach



@endsection