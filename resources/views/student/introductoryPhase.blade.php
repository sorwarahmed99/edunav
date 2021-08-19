@extends('layouts.students')
@section('content')

{{--  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Introductory Phase</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/">Home</a><i> / </i> <a href="index.html">Introductory Phase</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>  --}}

  <section class="sec-padding bg-gray">
    <div class="container introductory-phase">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 form-box">
                <form role="form" action="{{ route('studentInfo') }}" method="POST" class="f1" enctype="multipart/form-data">
                    @csrf
                    <h3>Introductory Phase</h3>
                    <p>Fill up with your personal and academic informations:</p>
                    <br>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>Personal Details</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-graduation-cap"></i></div>
                            <p>Education</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                            <p>Others</p>
                        </div>
                    </div>

                    <br>
                    <fieldset>
                        <div class="col-md-12">
                            <h5>Parsonal Information:</h5>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="" for="f1-first-name">Full Name <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="fullname" placeholder="Enter your full name" class="f1-first-name form-control" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="" for="f1-last-name">Email <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="email" placeholder="Enter your email" class="f1-last-name form-control" value="{{ Auth::user()->email }}" >
                                </div>
                            </div>

                        

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="" for="f1-last-name">Address <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="address" placeholder="Enter your address" class="f1-last-name form-control" value="{{ old('address') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="" for="f1-last-name">Phone <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="phone" placeholder="Enter your phone" class="f1-last-name form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="" for="f1-last-name">Add Your photo <span class="text-info text-bold" style="font-size: 10px;">Optional</span></label>
                                    <input type="file" name="profile_image" class="f1-last-name form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5>Academic Background:</h5>
                                <p style="font-size: 15px; font-weight:bold; color:red;">Educational Info must be filled properly !</p>
                                <div class="table-responsive">
                                    <table class="table table-light table-bordered">
                                        <thead>
                                            <th width="20%">Degree <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                            <th width="40%">Institution <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                            <th width="20%">Passing Year <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                            <th width="15%">CGPA <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                            {{-- <th width="5%"><a href="" class="btn btn-pramary btn-sm"><i class="fa fa-plus"></i></a></th> --}}
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="degree[]" placeholder="Undergraduate" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="institution[]" placeholder="Institution" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year[]" placeholder="Passing Year" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="cgpa[]" placeholder="CGPA" class="f1-email form-control" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="degree[]" placeholder="High School" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="institution[]" placeholder="Institution" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year[]" placeholder="Passing Year" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="cgpa[]" placeholder="CGPA" class="f1-email form-control" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="degree[]" placeholder="Secondary School" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="institution[]" placeholder="Institution" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year[]" placeholder="Passing Year" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="cgpa[]" placeholder="CGPA" class="f1-email form-control" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="degree[]" placeholder="Other" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="institution[]" placeholder="Institution" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year[]" placeholder="Passing Year" class="f1-email form-control" >
                                                </td>
                                                <td>
                                                    <input type="text" name="cgpa[]" placeholder="CGPA" class="f1-email form-control" >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
        
                                <h4>English Language Proficiency :</h4>
                                
                                <div class="form-group row">
                                    <div class="col-md-12 mt-4">
                                        <span>Have you ever sit for <b>IELTS</b> or any other <b>English Language Certificate Exam</b> ? <span class="text-danger text-bold" style="font-size: 19px;">*</span></span>
                                        <label class="switch block" style="margin-left: 10px;">
                                            <input type="radio" name="is_ielts"  value="1" id="showIelts" >
                                            <span> Yes </span>
                                        </label>
                                        <label class="switch block" style="margin-left: 10px;">
                                            <input type="radio" name="is_ielts"  value="0" id="hideIelts">
                                            <span> No </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row ielts" style="display: none;" id="ielts">
                                    <div class="col-md-4">
                                        <label class="" for="test_name">Name of test <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                        <input type="text" name="test_name" placeholder="Name of test.." class="score form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" for="score">Score <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                        <input type="text" name="ielts_score" placeholder="Score..." class="score form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" for="ielts_validity">Valid till<span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                        <input type="text" id="ielts_validity" name="ielts_validity" placeholder="Your ielts validity..." class="ielts_validity form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5>Work Experience:</h5>
                                        <p style="font-size: 15px;">
                                            [Please mention any work experience that you have. It could be voluntary or paid work. Mention the work description and how long you have worked for. Incase you don't have any work experience , you can leave this section blank ]
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-light table-bordered">
                                                <thead>
                                                    <th width="70%">Work Experience <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                                    <th width="30%">Year <span class="text-danger text-bold" style="font-size: 19px;">*</span></th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="work_experience[]" placeholder="Work Experience" class="f1-email form-control" >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year[]" placeholder="Year" class="f1-email form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="work_experience[]" placeholder="Work Experience" class="f1-email form-control" >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year[]" placeholder="Year" class="f1-email form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="work_experience[]" placeholder="Work Experience" class="f1-email form-control" >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year[]" placeholder="Year" class="f1-email form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="work_experience[]" placeholder="Work Experience" class="f1-email form-control" >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year[]" placeholder="Year" class="f1-email form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="work_experience[]" placeholder="Work Experience" class="f1-email form-control" >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year[]" placeholder="Year" class="f1-email form-control" >
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Preferred Course & University</h5>
                                    <p style="font-size: 15px;">Please mention name of the preferred course and university where you want to study. you can include multiple courses or university of your choice. If you have nothing particular in mind , you can leave this space empty.</p>
                                </div>
                                <div class="form-group row">
                                    <label class="" for="course">Preferred Course <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="intended_course" placeholder="Preferred course ..." class="course form-control" value="{{ old('intended_course') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="" for="university">Preferred University <span class="text-danger text-bold" style="font-size: 19px;">*</span></label>
                                    <input type="text" name="intended_university" placeholder="Preferred university..." class="university form-control" value="{{ old('intended_university') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="" for="f1-email ">Anything in particular you want us to know about.</label>
                                    <textarea name="others" class="form-control">{{ old('others') }}</textarea>
                                </div>
                                <div class="f1-buttons">
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
      
    </div>
  <!--end item -->
  <div class="clearfix"></div>

@endsection