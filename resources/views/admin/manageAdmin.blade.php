@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Admins</h1>
  	<p class="mb-4">Manage Admins</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          	<div class="row">
          		<div class="col-md-12">
          			
			      
          		</div>
          		
          	</div>
        </div>
        
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  	<div class="col-md-4">
			          			<span class="float-right">{{ $admins->links() }}</span>
			          		</div>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@foreach($admins as $user)
		                <tr>
		                  <td>{{ $user->name }}</td>
		                  <td>{{ $user->email }}</td>
		                  <td>{{ $user->created_at }}</td>
		                  <td>
		                  	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal-{{ $user->id }}" >Delete</a>
		                  </td>
		                </tr>
                		@endforeach
              		</tbody>
              		
            	</table>
          	</div>
        </div>
    </div>
</div>



@foreach($admins as $user)
 <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>The admin will be removed !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-user').submit();"> Delete</a>
	          <form method="GET" id="delete-user" action="{{ route('deleteAdmin',$user->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach



@endsection