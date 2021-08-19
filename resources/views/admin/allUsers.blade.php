@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-white text-center">All Users</h1>
  	<br>
  	<!-- <p class="mb-4">All Users</p> -->
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
			                <th>Name</th>
			                <th class="text-center">Email</th>
			                <th class="text-center">Join Date</th>
			                <th class="text-center">Action</th>
		                </tr>
			        </thead>
		            <tbody>
		            	@php
		                    $count=0;
		                @endphp
		                  @forelse($users as $user)
		                    @php
		                        $count++;
		                    @endphp
		                <tr>
		                  <td>{{ $count }}</td>
		                  <td>
		                  	<b>{{ $user->name }}</b>
		                  </td>
		                  <td class="text-center">{{ $user->email }}</td>
		                  
		                  <td class="text-center">{{ $user->created_at }}</td>
		                  <td class="text-center">
		                  	@if($user->status == 1)
		                  	<a href="{{ route('blockUser', $user->id) }}" class="btn btn-sm btn-danger" >Block User</a>
		                  	@else
		                  	<a href="{{ route('blockUser', $user->id) }}" class="btn btn-sm btn-success" >Unblock</a>
		                  	@endif
		                  </td>
		                </tr>
		                @empty
		                  <tr>
		                      <td colspan="9" align="center">No User registered yet</td>
		                  </tr>
		                @endforelse
					  </tbody>
            	</table>
          	</div>
		</div>
		<div class="card-footer">
			<span>{{ $users->links() }}</span>
		</div>
    </div>
</div>

@endsection