@extends('layouts.master')
@section('content')


<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Update Information</h4>
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
            <h3>Update Information</h3>
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
        <div class="col-md-12">
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <div class="smart-forms bmargin">
                <br/>
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
                        <form method="POST" action="{{ route('personalInfoUpdate',$student->id) }}"  enctype="multipart/form-data">
                        @CSRF
                      <div class="col-md-4">
                        <div style="border: 2px solid #ccc; border-radius:50%; overflow:hidden; heignt:200px; width:200px;">
                          <img src="{{ asset($student->profile_image) }}" class="img-responsive round"  alt="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Change Picture</label>
                            <input type="file" name="profile_image" class="gui-input">
                        </div>
                        
                      </div>
                      <div class="col-md-8">
                        
                          <div class="form-group row">
                            <div class="col-md-12">
                                <label for="">Your name</label>
                                <input type="text" name="fullname" placeholder="Enter your full name" class="gui-input" value="{{ $student->fullname }}">
                            </div>
                        </div>

              
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="">Your Address</label>
                                <input type="text" name="address" placeholder="Enter your address" class="gui-input" value="{{ $student->address }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Your Contact Number</label>
                                <input type="text" name="phone" placeholder="Enter your phone" class="gui-input" value="{{ $student->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Your Email</label>
                                <input type="text" name="email" placeholder="Enter your email" class="gui-input" value="{{ $student->email }}" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="form-footer ">
                                <button type="submit"  class="button btn-primary darkBlue">Update</button>
                            </div>
                        </div>
                      </div>
                    </form>
                    </div>
                    <hr>
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
                                    <form action="{{ route('EducationInfoUpdate') }}" method="POST">
                                      @CSRF
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
                                            <input type="hidden" name="id[]" placeholder="CGPA" class="gui-input" value="{{ $edu->id }}">
                                          </tr>
                                      @endforeach

                                      @for($i = 0; $i < $eduCount; $i++)
                                      <tr>
                                        <td>
                                            <input type="text" name="degree_add[]" placeholder="Degree" class="gui-input">
                                        </td>
                                        <td>
                                            <input type="text" name="institution_add[]" placeholder="Institution" class="gui-input" >
                                        </td>
                                        <td>
                                            <input type="text" name="passing_year_add[]" placeholder="Passing Year" class="gui-input" >
                                        </td>
                                        <td>
                                            <input type="text" name="cgpa_add[]" placeholder="CGPA" class="gui-input" >
                                        </td>
                                      </tr>
                                      
                                      @endfor
                                      <tr>
                                        <td colspan="5">
                                          <div class="form-footer ">
                                              <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Update</button>
                                          </div>
                                        </td>
                                      </tr>
                                    </form>
                                  </tbody>
                              </table>
                          </div>
                          <hr>
                          <h4>English Language Proficiency :</h4>
                          
                          <div class="row">
                            <form action="{{ route('ieltsInfoUpdate') }}" method="POST">
                              @csrf
                              <div class="col-md-12">
                                <h5> IELTS : @if ($student->is_ielts == 1)
                                     <span class="badge badge-success">Yes</span></h5>
                                   @else
                                   <span class="badge badge-warning">No</span>
                                   <br>
                                   <br>
                 
                                    <div class="section">
                                      <label class="switch block">
                                          <input type="checkbox" name="is_ielts" id="showIelts" value="1">
                                          <span class="switch-label" for="showIelts" data-on="YES" data-off="NO"></span> 
                                          <span>Do you want to add IELTS to your personal information ?</span>
                                      </label>
                                    </div>

                                    <div class="row ielts" style="display: none;" id="ielts">
                                      <div class="col-md-4">
                                          <label class="" for="score">Score <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                          <input type="text" name="ielts_score" placeholder="Score..." class="score gui-input">
                                      </div>
                                      <div class="col-md-4">
                                          <label class="" for="ielts_validity">Valid till<span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                          <input type="text" id="ielts_validity" name="ielts_validity" placeholder="Your ielts validity..." class="ielts_validity gui-input">
                                      </div>
                                      
                                      <div class="col-md-4" style="margin-top: 20px;">
                                        <button type="submit" class="button btn-primary darkBlue">Update</button>
                                      </div>
                                      
                                  </div>
                                 @endif
                               </div>
                            </form>
                            
                          </div>
                          @if ($student->is_ielts == 1)
                          <form action="{{ route('ieltsInfoUpdate') }}" method="POST">
                          @CSRF
                          <div class="row">
                            <div class="col-md-3">
                              <label class="" for="score">Test Name</label>
                                <input type="text" name="ielts_score" placeholder="Test Name..." class="gui-input" value="{{ $student->test_name }}">
                            </div>
                            <div class="col-md-3">
                                <label class="" for="score">Ielts Score</label>
                                <input type="text" name="ielts_score" placeholder="Score..." class="gui-input" value="{{ $student->ielts_score }}">
                            </div>
                            <div class="col-md-3">
                              <label class="" for="score">Ielts Validity</label>
                              <input type="text" name="ielts_validity" placeholder="Score..." class="gui-input" value="{{ $student->ielts_validity }}">
                            </div>
                            <div class="col-md-3" style="margin-top: 20px;">
                              <button type="submit" class="button btn-primary darkBlue">Update</button>
                            </div>
                          </div>
                          
                          </form>
                          @endif
                          <hr>
                          

                          <h4>Work Experience :</h4>
                          <div class="table-responsive">
                              <table class="table table-light table-bordered">
                                  <thead>
                                      <th>Work Experience</th>
                                      <th width="20%"> Year </th>
                                  </thead>
                                  <tbody>
                                    <form action="{{ route('workExperienceInfoUpdate') }}" method="POST">
                                    @CSRF
                                    @php
                                      $works = App\WorkExperience::where('user_id',Auth::user()->id)->get();   
                                    @endphp
                                      @foreach ($works as $work)
                                        <tr>
                                          <td>
                                            <input type="text" name="work_experience[]" placeholder="Work Experience" value="{{ $work->work_experience }}" class="f1-email gui-input" >
                                        </td>
                                        <td>
                                            <input type="text" name="year[]" placeholder="Year" value="{{ $work->year }}" class="f1-email gui-input" >
                                        </td>
                                        <input type="hidden" name="id[]" placeholder="Year" value="{{ $work->id }}" class="f1-email gui-input" >

                                        </tr>
                                      @endforeach
                                      @for($i = 0; $i < $workCount; $i++)
                                      <tr>
                                        <td>
                                          <input type="text" name="work_experience_add[]" placeholder="Work Experience" class="f1-email gui-input" >
                                      </td>
                                      <td>
                                          <input type="text" name="year_add[]" placeholder="Year" class="f1-email gui-input" >
                                      </td>
                                      </tr>
                                      @endfor
                                      <tr>
                                        <td colspan="5">
                                          <div class="form-footer ">
                                              <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Update</button>
                                          </div>
                                        </td>
                                      </tr>
                                    </form>
                                  </tbody>
                              </table>
                          </div>
                          <hr>
                          <div class="row">
                            <h4>Other Info:</h4>
                            <div class="col-md-12">
                              <form action="{{ route('OtherInfoUpdate') }}" method="POST">
                                @CSRF
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
                                    <textarea name="others" id="" cols="30" rows="10" class="gui-textarea">{{ $student->others }}</textarea>
                                </div>
                                <div class="form-footer ">
                                  <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Update</button>
                              </div>

                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                @endforeach
              </div>
          </div>
      </div>
  </section>

  @endsection