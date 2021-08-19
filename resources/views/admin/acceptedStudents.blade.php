@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-white text-center">All Accepted Students</h1>
  	<br>
  	<!-- <p class="mb-4">All Students</p> -->
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          	<div class="row">
          		<div class="col-md-8">
          			<form class=" navbar-search">
			            <div class="input-group">
			            	<div class="input-group-append">
			                <button class="btn btn-primary" type="button">
			                  <i class="fas fa-search fa-sm"></i>
			                </button>
			              </div>
			              <input type="text" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
			              
			            </div>
			        </form>
          		</div>
          	</div>
        </div>
        <script src="{{ asset('resource/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $("#table-hide").hide();
             
	            fetch_customer_data();
	             
	            function fetch_customer_data(query = '')
	            {
	                $.ajax({
	                url:"{{ route('live_search.action') }}",
	                method:'GET',
	                data:{query:query},
	                dataType:'json',
	                success:function(data)
	                {
		                $("#table-hide").fadeIn("slow");
		                $('#table-data').html(data.table_data);
		                $('#total_records').text(data.total_data);
	                }
	              })
	            }

	             $(document).on('keyup', '#search', function(){
	              var query = $(this).val();
	              fetch_customer_data(query);
	            });
            });
        </script>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
							<th>SL.</th>
							<th></th>
							<th>URN</th>
			                <th>Name</th>
			                <th class="text-center">Email</th>
			                <th class="text-center">Application Date</th>
			                <th class="text-center">Action</th>
		                </tr>
			        </thead>
		            <tbody>
		            	@php
		                    $count=0;
		                @endphp
		                  @forelse($students as $user)
		                    @php
		                        $count++;
		                    @endphp
		                <tr>
						  <td>{{ $count }}</td>
						  <td>
							@if ($user->profile_image != '')
							<img class="img-profile rounded-circle" src="{{ asset($user->profile_image) }}" alt="" style="height: 50px; width:50px;">
							@else 
							<img class="img-profile rounded-circle" src="{{ asset('resource/assets/img/avatar1.png') }}" style="height: 50px; width:50px;">
							@endif
						</td>
						<td>{{ $user->urn }}</td>
		                  <td>
		                  	<b>{{ $user->fullname }}</b>
		                  </td>
		                  <td class="text-center">{{ $user->email }}</td>
		                  
		                  <td class="text-center">{{ $user->created_at }}</td>
		                  <td class="text-center">
							<a href="{{ route('showInformation',$user->user_id) }}" class="btn btn-sm btn-primary" >View</a>
		                  </td>
                        </tr>
		                @empty
		                  <tr>
		                      <td colspan="9" align="center">No Student registered yet</td>
		                  </tr>
		                @endforelse
					  </tbody>
            	</table>
          	</div>
		</div>
		<div class="card-footer">
			<span>{{ $students->links() }}</span>
		</div>
    </div>
</div>



@foreach($students as $user)
 <div class="modal fade" id="viewModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Student information of {{ $user->fullname }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div  class="modal-body">
        	<ul class="list-group">
				<li align="center" class="list-group-item p-l-1">
					<img class="img-profile rounded-circle" src="{{ asset($user->profile_image) }}" alt="" style="height: 80px; width:80px;">
					<h5 class="m-2"><b>{{ $user->fullname }}</b></h5>
					<span><b>Date of birth: </b>{{ $user->dob }}</span><br>
				    <span><b>Email: </b>{{ $user->email }}</span><br>
				    <span><b>Phone: </b>{{ $user->phone }}</span><br>
				</li>
				<li class="list-group-item p-l-1">
				    <b>Nationality:</b> {{  $user->nationality }}<br>
            		<b>Country of recidency:</b> {{  $user->country_of_recidency }}
				</li>
				<li class="list-group-item p-l-1">
				    <b>Address:</b> {{  $user->address }}
				</li>

				<h4 class="text-center p-2">Academic Information</h4>
				<li class="list-group-item p-l-1">
				    <div class="table-responsive">
						<table class="table table-light table-bordered">
							<thead>
								<th width="20%">Degree </th>
								<th width="40%">Institution </th>
								<th width="20%">Passing Year </th>
								<th width="15%">CGPA </th>
							</thead>
							<tbody>
							  @php
								$edus = App\StudentEducation::where('user_id',$user->id)->get();   
							  @endphp
								@foreach ($edus as $edu)
								  <tr>
									<td>
										{{ $edu->degree }}
									</td>
									<td>
										{{ $edu->institution }}
									</td>
									<td>
										{{ $edu->passing_year }}
									</td>
									<td>
										{{ $edu->cgpa }}
									</td>
								  </tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</li>	
				
				<li class="list-group-item p-l-1">
				    <b>Is Ielts:</b> @if($user->is_ielts == 1) Yes @else No @endif<br>
            		<b>Ielts Score:</b> {{  $user->ielts_score }}
				</li>

				<li class="list-group-item p-l-1">
				    <b>Work eperience:</b> {{ $user->work_experience }}<br>
            		<b>Extras:</b> {{  $user->others }}
				</li>

				<li class="list-group-item p-l-1">
				    <b>Application Date:</b> {{  $user->created_at }}
				</li>
				<h4 class="text-center p-2">Intended Information</h4>
				<li class="list-group-item p-l-1">
				    <b>Intended University: </b>
				    <span class="badge badge-success p-2">{{  $user->intended_university }}</span>
	                <br>
	                <b>Intended Course: </b>
	                <span class="badge badge-success p-2">{{ $user->intended_course }}</span>
				</li>			
			</ul>
        </div>
        <div class="modal-footer">
			<button class="btn btn-dark" type="button" data-dismiss="modal">Go back</button>
			<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewDocument-{{ $user->id }}" >View Documents</a>	
        </div>
      </div>
    </div>
  </div>
@endforeach

@foreach($students as $user)
<div class="modal fade" id="viewDocument-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Student Documents of {{ $user->fullname }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div  class="modal-body">

			@php
				$files = App\StudentDocument::where('user_id',$user->id)->get();
				@dump($files);
			@endphp

			<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
					<tr>
					<th>Academic document</th>
					<th>CV</th>
					<th>Letter of acceptence</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@if ($files->isEmpty())
						<tr>
							<td colspan="4" class="text-danger">No documents Submitted yet</td>
						</tr>
					@else

					@foreach ($files as $file)
					
					<tr>
						<td>
							<a href="{{ $file->academic_document }}" target="_blank">Click here to view</a>
						</td>
						<td>
							<a href="{{ $file->cv }}" target="_blank">Click here to view</a>
						</td>
						<td>
							<a href="{{ $file->accceptence_letter }}" target="_blank">Click here to view</a>
						</td>
						<td>
							@if($file->accepted_status == 1)
							<span class="badge badge-success">Accepted</span>
							@else
							<span class="badge badge-success">Pending</span>
							@endif
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
				</table>
			</div>
		</div>
	  </div>
	</div>
</div>
@endforeach

@endsection