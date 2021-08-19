@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-white text-center">All Sliders</h1>
    <br>
  	<!-- <p class="mb-4">All Packages</p> -->
  	<div class="card shadow mb-4">
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
                      <th>SL.</th>
                      <th class="text-center">Image</th>
			                <th class="text-center">Title</th>
			                <th class="text-center">Description</th>
			                <th class="text-center">Added Date</th>
			                <th class="text-center">Action</th>
		                </tr>
			        </thead>

		            <tbody>		
                  @php
                    $count=0;
                  @endphp
		            	@foreach($sliders as $slider)
                    @php
                      $count++;
                    @endphp
		                <tr>
                      <td>{{ $count }}</td>
                      <td class="text-center">
                        <img src="{{ asset($slider->slider_image) }}" height="50" width="100" alt="">
                      </td>
                      <td class="text-center">{{ $slider->slider_title }}</td>
                      <td class="text-center"> {{ Str::limit($slider->slider_description, 50, ' (...)') }}</td>
		                  <td class="text-center">
                        <span><small><b>Date:</b> {{$slider->created_at->format('d-m-Y')}}</small></span><br>
                        <span><small><b>Time:</b> {{$slider->created_at->format('h:i a')}}</small></span>
                      </td>
		                  <td class="text-center">
                        <a href="{{ route('editSlider',$slider->id) }}" class="btn btn-sm btn-primary" >Edit</a>
                        <a href="{{ route('index') }}" class="btn btn-sm btn-primary" target="_blank" >View</a>
		                  	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePackageModal-{{ $slider->id }}" >Delete</a>
		                  </td>
		                </tr>
                	@endforeach
              	</tbody>	
            	</table>
          	</div>
        </div>
    </div>
</div>



@foreach($sliders as $slider)
 <div class="modal fade" id="deletePackageModal-{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>The slider will be lost !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-slider').submit();"> Delete</a>
	          <form method="GET" id="delete-slider" action="{{ route('deleteSlider',$slider->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach



@endsection