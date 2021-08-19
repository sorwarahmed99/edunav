@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-white text-center">How it works</h1>
    <br>
  	<div class="card shadow mb-4">
      <div class="card-header">
        <h3><span><a href="{{ route('addhowItWorks') }}" class="btn btn-primary">Add New</a></span></h3>
      </div>
      <div class="card-body">
			  <div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
	                <tr>
                    <th>SL.</th>
		                <th>Image</th>
		                <th>Title</th>
		                <th class="text-center">description</th>
		                <th class="text-center">Date</th>
		                <th class="text-center">Action</th>
	                </tr>
			        </thead>

		          <tbody>
                  @php
                    $count=0;
                  @endphp
		            	@foreach($hows as $news)
                    @php
                      $count++;
                    @endphp
	                <tr>
                    <td>{{ $count }}</td>
                    <td><img src="{{ asset($news->image) }}" height="50" width="100" alt=""></td>
                    <td>{{ $news->title }}</td>
                    <td class="text-center">{{ substr($news->subtitle, 0, 30) }}</td>
                    <td class="text-center">
                      <span><small><b>Date:</b> {{$news->created_at->format('d-m-Y')}}</small></span><br>
                      <span><small><b>Time:</b> {{$news->created_at->format('h:i a')}}</small></span>
                    </td>
                  
	                  <td class="text-center">
                      <a href="{{ route('howItWorks') }}" class="btn btn-sm btn-dark" >View</a>
	                  	<a href="{{ route('editNews',$news->id) }}" class="btn btn-sm btn-primary" >Edit</a>
	                  	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNewsModal-{{ $news->id }}" >Delete</a>
	                  </td>
	                </tr>
              		@endforeach
              </tbody>	
          </table>
        </div>
      </div>
    </div>
</div>



@foreach($hows as $news)
 <div class="modal fade" id="deleteNewsModal-{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>The News will be lost !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-news').submit();"> Delete</a>
	          <form method="GET" id="delete-news" action="{{ route('deleteNews',$news->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach



@endsection