@extends('layouts.admin')

@section('content')
@foreach ($student->studentinfos as $stu)
<div class="container-fluid">
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          	<h4>Infromation of <b>{{ $stu->fullname }}</b>  <span class="float-right"><a href="" data-toggle="modal" data-target="#AskFORDOCUMENTSModal-{{ $stu->id }}" class="btn btn-primary">Ask for documents</a></span></h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Personal Information 
                                <span class="float-right">
                                    @if($stu->status == 1)
                                    <span class="badge badge-success">Accepted</span>
                                    @else
                                    <a href="#" data-toggle="modal" data-target="#acceptPersonalModal-{{ $stu->id }}" class="btn btn-sm btn-info">Accept</a>
                                    @endif
                                </span>
                            </h5>
                        </div>
                        <div class="card-body">
                            
                            <ul class="list-group">
                                <li align="center" class="list-group-item p-l-1">
                                    <img class="img-profile rounded-circle" src="{{ asset($stu->profile_image) }}" alt="" style="height: 80px; width:80px;">
                                    <h5 class="m-2"><b>{{ $stu->fullname }}</b></h5>
                                    <span><b>Date of birth: </b>{{ $stu->dob }}</span><br>
                                    <span><b>Email: </b>{{ $stu->email }}</span><br>
                                    <span><b>Phone: </b>{{ $stu->phone }}</span><br>
                                </li>
                                <li class="list-group-item p-l-1">
                                    <b>Nationality:</b> {{  $stu->nationality }}<br>
                                    <b>Country of recidency:</b> {{  $stu->country_of_recidency }}
                                </li>
                                <li class="list-group-item p-l-1">
                                    <b>Address:</b> {{  $stu->address }}
                                </li>
                
                                
                                
                                <li class="list-group-item p-l-1">
                                    <b>Is Ielts:</b> @if($stu->is_ielts == 1) Yes @else No @endif<br>
                                    <b>Ielts Score:</b> {{  $stu->ielts_score }}
                                </li>
                
                                <li class="list-group-item p-l-1">
                                    <b>Extras:</b> {{  $stu->others }}
                                </li>
                
                                <li class="list-group-item p-l-1">
                                    <b>Application Date:</b> {{  $stu->created_at }}
                                </li>
                                <h4 class="text-center p-2">Intended Information</h4>
                                <li class="list-group-item p-l-1">
                                    <b>Intended University: </b>
                                    <span class="badge badge-success ">{{  $stu->intended_university }}</span>
                                    <br>
                                    <b>Intended Course: </b>
                                    <span class="badge badge-success float-right">{{ $stu->intended_course }}</span>
                                </li>			
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Academic Background</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th width="20%">Degree </th>
                                        <th width="40%">Institution </th>
                                        <th width="20%">Passing Year </th>
                                        <th width="15%">CGPA </th>
                                    </thead>
                                    <tbody>
                                        @foreach($student->studentedus as $edu)
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
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Work Experience</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Work Experience </th>
                                        <th width="20%">Year</th>
                                    </thead>
                                    <tbody>
                                        @if ($student->studentwork->isNotEmpty())
                                            
                                        
                                        @foreach($student->studentwork as $work)
                                          <tr>
                                            <td>
                                                {{ $work->work_experience }}
                                            </td>
                                            <td>
                                                {{ $work->year }}
                                            </td>
                                          </tr>
                                        @endforeach

                                        @else 
                                        <tr>
                                            <td>No Work experience.</td>
                                            <td></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Documents</h5>
                        </div>
                        @php
                            $files = App\StudentDocument::where('user_id',$student->id)->get();
                        @endphp
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Document name</th>
                                        <th>Document </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if ($files->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-danger">
                                                    No documents submitted yet
                                                    <br>
                                                    <a href="" data-toggle="modal" data-target="#AskFORDOCUMENTSModal-{{ $stu->id }}" class="btn btn-primary">Ask for documents</a>
                                                </td>
                                                
                                            </tr>
                                        @else
                    
                                        @foreach ($files as $file)
                                        <tr>
                                            <td>
                                                {{ $file->file_type }}
                                            </td>
                                            <td>
                                                <a href="{{ asset($file->file_name) }}" target="_blank">Click here to view</a>
                                            </td>
                                            
                                            <td>
                                                @if($file->status == 2)
                                                <span class="badge badge-success">Accepted</span>
                                                @elseif($file->accepted_status == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                                @else
                                                <span class="badge badge-primary">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($file->status == 2)
                                                <a href="#" data-toggle="modal" data-target="#rejectModal-{{ $file->id }}"  class="btn btn-danger btn-sm">Reject</a>
                                                @elseif($file->accepted_status == 3)
                                                <a href="#" data-toggle="modal" data-target="#acceptModal-{{ $file->id }}" class="btn btn-primary btn-sm text-white">Accept</a>
                                                @else
                                                <a href="#" data-toggle="modal" data-target="#acceptModal-{{ $file->id }}" class="btn btn-primary btn-sm text-white">Accept</a> <a href="#" data-toggle="modal" data-target="#rejectModal-{{ $file->id }}"  class="btn btn-danger btn-sm text-white">Reject</a>
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
        </div>
    </div>
</div>

{{--  /// ========== A C C E P T D O C U M E N T =================  --}}

@foreach($files as $user)
<div class="modal fade right modal-scrolling" id="acceptModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="heading">Accept {{ $user->user->name }}'s {{ $user->file_type }} ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="row">
                    <div class="donatedForm col-12" id="donatedForm">
                      <form action="{{ route('acceptDocuments',$user->id) }}" method="POST" class="pl-3 pr-3">
                        @csrf
                        <div class="form-field">
                            <label for="reason" class="text-muted text-left">Additional message to user ?</label>
                            <input type="text" id="reason" name="message" class="form-control ml-0" placeholder="Message to student...">
                            <small>If you don't, click accept.</small>
                        </div>
                        <input type="hidden" value="{{ $user->file_type }}" name="file_type">
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary btn-lg">Accept</button>
                          <button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                
              </div>
          </div>
      </div>
  </div>

@endforeach


{{--  /// R E J E C T D O C U M E NT  --}}


@foreach($files as $user)
<div class="modal fade right modal-scrolling" id="rejectModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="heading">Reject {{ $user->user->name }}'s {{ $user->file_type }} ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="row">
                    <div class="donatedForm col-12" id="donatedForm">
                      <form action="{{ route('rejectDocuments',$user->id) }}" method="POST" class="pl-3 pr-3">
                        @csrf
                        <div class="form-field">
                            <label for="reason" class="text-muted text-left">Specify any reason ?</label>
                            <input type="text" id="reason" name="message" class="form-control ml-0" placeholder="Message to student...">
                            <small>If you don't want to specify, click reject.</small>
                        </div>
                        <input type="hidden" value="{{ $user->file_type }}" name="file_type">
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary btn-lg">Reject</button>
                          <button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                
              </div>
          </div>
      </div>
  </div>

@endforeach


{{--  /// ==================== ACCEPT INFORMATION ====================  --}}

@foreach ($student->studentinfos as $stu)
<div class="modal fade right modal-scrolling" id="acceptPersonalModal-{{ $stu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="heading">Accept {{ $stu->fullname }}'s information ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="row">
                    <div class="donatedForm col-12" id="donatedForm">
                      <form action="{{ route('acceptPersonalInformation',$stu->id) }}" method="POST" class="pl-3 pr-3">
                        @csrf
                        <div class="form-field">
                            <label for="reason" class="text-muted text-left">Specify any additional message to student ?</label>
                            <input type="text" id="reason" name="message" class="form-control ml-0" placeholder="Message to student...">
                            <small>If you don't want, click accept.</small>
                        </div>
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary btn-lg">Accept</button>
                          <button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                
              </div>
          </div>
      </div>
  </div>

@endforeach


{{--  /// =================== ASK FOR D O C U M E NT =======================  --}}

@foreach ($student->studentinfos as $stu)
<div class="modal fade right modal-scrolling" id="AskFORDOCUMENTSModal-{{ $stu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="heading">Ask {{ $stu->fullname }} for Documents</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="row">
                    <div class="donatedForm col-12" id="donatedForm">
                      <form action="{{ route('askForDocuments',$stu->id) }}" method="POST" class="pl-3 pr-3">
                        @csrf
                        <div class="form-field">
                            <label for="reason" class="text-muted text-left">Name of document ?</label>
                            <input type="text" id="reason" name="about" class="form-control ml-0" placeholder="Name of doc.." required>
                        </div>
                        <br>
                        <div class="form-field">
                            <label for="reason" class="text-muted text-left">Specify any additional message to student ?</label>
                            <input type="text" id="reason" name="message" class="form-control ml-0" placeholder="Message to student...">
                            <small>If you don't want, click ask.</small>
                        </div>
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary btn-lg">Ask</button>
                          <button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                
              </div>
          </div>
      </div>
  </div>

@endforeach


@endsection