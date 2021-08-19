@extends('layouts.admin')
@section('title') OPG Surveyors | Contact Messages @endsection

@section('content')
<div class="main-panel">
    <div class="content" data-color="dark2">
        <div class="page-inner">
            
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card">
					        <div class="card-body">
					            <h5 class="card-title m-b-0">Manage Contacts</h5>
					        </div>
					        <div class="table-responsive table-hoverable">
					            <table id="basic-datatables" class="display table table-striped table-hover" >
					                <thead class="thead-light">
					                    <tr>
					                        <th scope="col">Sr No.</th>
					                        <th scope="col">Name</th>
					                        <th scope="col">Email</th>
					                        <th scope="col">Contact For</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Reply status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
					                    </tr>
					                </thead>
					                <tbody class="customtable">
					                	<?php $sr = 1; ?>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $sr }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>
                                                @if ($contact->is_replied == false)
                                                <form method="POST" id="contact-status" action="{{ route('replyContact',$contact->id) }}">@csrf</form>
                                                <button class="btn btn-secondary btn-sm" onclick="document.getElementById('contact-status').submit();" >Is replied ?</button>
                                                @else 
                                                    <span class="badge badge-success">Replied</span>
                                                @endif
                                            </td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <p class="demo mt-1">
                                                    <button type="button" data-toggle="modal" data-target="#deleteContactModal-{{ $contact->id }}" class="btn btn-xs btn-danger">Delete</button>
                                                </p>
                                            </td>
                                        </tr>

                                        <?php $sr++; ?>
                                        @endforeach 		                    
					                </tbody>
					            </table>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@foreach($contacts as $contact)
<div class="modal fade" id="deleteContactModal-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">YOU ARE ABOUT TO DELETE CONTACT <b>{{ $contact->name }} </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h1>ARE YOU SURE ?</h1>
                <strong>Note: By deleting contact, all the related contact informations will be deleted</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Keep IT</button>
                <form id="deleteuser-{{ $contact->id }}" action="{{ Route('deleteContact', $contact->id) }}" method="GET">@csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection