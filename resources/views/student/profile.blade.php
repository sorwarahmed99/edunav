@extends('layouts.master')
@section('content')


<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Uninav-360</h4>
        <h5 class="text-white uppercase">Welcome {{ Auth::user()->name }}</h5>
      </div>
      <div class="overlay bg-opacity-5"></div>
      <img src="https://picsum.photos/1920/800" alt="" class="img-responsive"/> </div>
  </section>
  <!-- end header inner -->
  <div class="clearfix"></div>
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Profile</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/student-portal" class="btn btn-primary text-light" style="color: seashell;">Student Portal</a></div>
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
          <ul class="tabs">
            <li><a href="#demo-tab-1" target="_self">My Profile</a></li>
            <li><a href="#demo-tab-2" target="_self">My Documents</a></li>
            <li><a href="/student-update-information" target="_self">Update Information</a></li>
            <li><a href="#demo-tab-3" target="_self">Change password</a></li>
          </ul>
          <br>
          <div class="tabs-content">
            <div id="demo-tab-1" class="tabs-panel">
              <div class="col-md-12">
                <div class="smart-forms bmargin">
                    <h3>Your personal information</h3>
                    
                    <br/><br><br>
                    @foreach ($students as $student)
                        <span class="right">
                          @if ($student->status == 2)
                              <span class="badge badge-success">Accepted</span>
                          @elseif ($student->status == 3)
                          <span class="badge badge-success">Rejected</span>
                          @else 
                          <span class="badge badge-success">Pending</span>
                          @endif
                        </span>
                        <div class="row">
                          <div class="col-md-4">
                            <div style="border: 2px solid #ccc; border-radius:50%; overflow:hidden; heignt:200px; width:200px;">
                              <img src="{{ asset($student->profile_image) }}" class="img-responsive round"  alt="">
                            </div>
                          </div>
                          <div class="col-md-8">
                            <form method="POST" action="" id="smart-form">
                              @CSRF
                              <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" name="fullname" placeholder="Enter your full name" class="gui-input" value="{{ $student->fullname }}">
                                </div>
                            </div>
  
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" name="address" placeholder="Enter your address" class="gui-input" value="{{ $student->address }}">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="text" name="phone" placeholder="Enter your phone" class="gui-input" value="{{ $student->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" placeholder="Enter your email" class="gui-input" value="{{ $student->email }}" >
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <h4>Academic Background:</h4>
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
                                          $edus = App\StudentEducation::where('user_id',Auth::user()->id)->get();   
                                        @endphp
                                          @foreach ($edus as $edu)
                                            <tr>
                                              <td>
                                                  <input type="text" name="degree[]" placeholder="Degree" class="gui-input" value="{{ $edu->degree }}">
                                              </td>
                                              <td>
                                                  <input type="text" name="institution[]" placeholder="Institution" class="gui-input" value="{{ $edu->institution }}">
                                              </td>
                                              <td>
                                                  <input type="text" name="passing_year[]" placeholder="Passing Year" class="gui-input" value="{{ $edu->passing_year }}">
                                              </td>
                                              <td>
                                                  <input type="text" name="cgpa[]" placeholder="CGPA" class="gui-input" value="{{ $edu->cgpa }}">
                                              </td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                              <hr>
                              <h4>English Language Proficiency :</h4>
                              
                              <div class="row">
                                <div class="col-md-6">
                                 <h6> Ielts : @if ($student->is_ielts == 1)
                                      <span class="badge badge-success">Yes</span></h6>
                                    @else
                                    <span class="badge badge-warning">No</span>
                                  @endif
                                </div>
                                @if ($student->is_ielts == 1)

                                  <div class="col-md-4">
                                    <label class="" for="score">Test Name</label>
                                      <input type="text" name="ielts_score" placeholder="Test Name..." class="gui-input" value="{{ $student->test_name }}">
                                  </div>
                                  <div class="col-md-4">
                                          <label class="" for="score">Ielts Score</label>
                                          <input type="text" name="ielts_score" placeholder="Score..." class="gui-input" value="{{ $student->ielts_score }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="" for="score">Ielts Validity</label>
                                    <input type="text" name="ielts_score" placeholder="Score..." class="gui-input" value="{{ $student->ielts_validity }}">
                            </div>
                                @endif
                              </div>
                              <hr>
                              <div class="row">
                                <h4>Other Info:</h4>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="" for="course">Preferred Course </label>
                                        <input type="text" name="intended_course" placeholder="Preferred course and university..." class="gui-input" value="{{ $student->intended_course }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="" for="university">Preferred University </label>
                                        <input type="text" name="intended_university" placeholder="Preferred course and university..." class="gui-input" value="{{ $student->intended_university }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="" for="f1-email ">Extra Info</label>
                                        <textarea name="" id="" cols="30" rows="10" class="gui-input">{{ $student->others }}</textarea>
                                    </div>
                                </div>
                              </div>

                              <h4>Work Experience :</h4>
                              <div class="table-responsive">
                                  <table class="table table-light table-bordered">
                                      <thead>
                                          <th>Work Experience</th>
                                          <th> Year </th>
                                      </thead>
                                      <tbody>
                                        @php
                                          $works = App\WorkExperience::where('user_id',Auth::user()->id)->get();   
                                        @endphp
                                          @foreach ($works as $work)
                                            <tr>
                                              <td>
                                                  <input type="text" name="degree[]" placeholder="Degree" class="gui-input" value="{{ $work->work_experience }}">
                                              </td>
                                              <td>
                                                  <input type="text" name="institution[]" placeholder="Institution" class="gui-input" value="{{ $work->year }}">
                                              </td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                              <hr>

                              {{--  <div class="form-footer">
                                <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Update Information</button>
                                <button type="reset" class="button"> Cancel </button>
                              </div>  --}}
                          </div>
                          
                          </form>
                        </div>
                    @endforeach
                  </div>
              </div>
            </div>
            <!-- end tab 1 -->
            
            <div id="demo-tab-2" class="tabs-panel">
              <div class="col-md-12">
                <h3>Your submitted documents</h3>
                <p>To submit any document <a href="/intermediate-phase" style="font-size: 18px;">click here</a> & follow the instruction.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>File name</th>
                        <th>File Type</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($files as $file)
                      <tr>
                        <td class="text-center">{{ $file->file_type }}</td>
                        <td class="text-center"><i class="fa fa-arrow-right"></i> &nbsp;&nbsp;<a href="{{ asset($file->file_name) }}" target="_blank">Click here to view</a></td>
                        <td class="text-center">
                          @if($file->status == 2)
                            <span class="badge badge-success" style="background: green;">Accepted</span>
                          @elseif($file->status == 3)
                            <span class="badge badge-danger" style="background: red;">Rejected</span>
                            <br>
                            <a href="/intermediate-phase">Click here to submit again</a>
                            @else
                            <span class="badge badge-success">Pending</span>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- end tab 2 -->
            
            <div id="demo-tab-3" class="tabs-panel">
              <div class="col-md-12">
                <div class="smart-forms bmargin">
                    <h3>Change your password</h3>
                    <br/>                    
                      <form action="{{ route('userChangePassword',Auth::user()->id) }}" method="POST">
                        @csrf

                        @if(session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                          @endif
                          @if($errors->any())
                            <div class="alert alert-danger pt-3">
                              <ul>
                                @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                          @endif
                      <div class="section">
                        <label for="password" class="field-label">Old password</label>
                        <label class="field prepend-icon">
                              <input id="password-field" type="password" class="gui-input @error('password') is-invalid @enderror"  autocomplete="new-password" name="password" placeholder="Enter Your Old Password">
                              <span class="field-icon"><i class="fa fa-lock"></i></span>  
                          </label>
                          @error('password')
                              <span class="invalid-feedback" role="alert" style="color: red;">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div><!-- end section -->
                      <div class="section">
                        <label for="confirmPassword" class="field-label">New password</label>
                        <label class="field prepend-icon">
                              <input id="password-field" type="password" class="gui-input @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter New Password">
                              <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>  
                          </label>
                      </div><!-- end section -->
                    <div class="section">
                        <label for="confirmPassword" class="field-label">Confirm new password</label>
                        <label class="field prepend-icon">
                              <input  id="password-field" type="password" class="gui-input @error('new_password_confirmation') is-invalid @enderror" value="{{ old('new_password_confirmation') }}" autocomplete="new-password" name="new_password_confirmation" placeholder="Confirm Password">
                              <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>  
                          </label>
                      </div><!-- end section -->
                      <!-- end .form-body section -->
                      <div class="form-footer">
                        <button type="submit" class="button btn-primary darkBlue">Save</button>
                        <button type="reset" class="button"> Cancel </button>
                      </div>
                      <!-- end .form-footer section -->
                    </form>
                  </div>
                  <!-- end .smart-forms section --> 
              </div>
            </div>
          </div>
        </div>
        <!--end tab style 2--> 
        
      </div>
    </div>
  </section>


@endsection