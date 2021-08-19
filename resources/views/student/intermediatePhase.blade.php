@extends('layouts.students')
@section('content')


  <section class="sec-padding bg-gray">
    <div class="container introductory-phase">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 form-box f1">
                    <h3>Intermediate Phase</h3>
                    <p class="text-danger">Please read the following Instructions carefully</p>
                    <p>
                      In this phase you are required to upload your <b>Academic Documents</b>. 
                      First, read the description of the file you are required to upload . Then , using the choose file button , select your file location. After selecting the location of your file , select upload button. You can upload only <b>pdf file</b>.  Make sure the quality is good and individual file does not exceed <b>1Mb</b>.
                      Once all files are uploaded , press submit button. </p>
                      <br>
                   
                    <fieldset>
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

                          @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                          @endif


                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Copy of passport: <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                          </div>
                          <br>
                            <div class="col-md-9">
                            <form action="{{ route('uploadPassport') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="passposrt" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>

                        
                        <hr>
                        
                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Academic Documents: (University final transcript, Higher Secondary, Secondary School)<span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">Undergraduate applicants should upload only Secondary and Higher School transcripts & Certificate. Postgraduate applicants are required to upload university transcript, higher secondary and secondary school transcript along with Certificate. If any of your documents are pending , please inform your counsellor.</p>
                          </div>
                          <br>
                           <div class="col-md-9">
                            <form action="{{ route('uploadAcademic') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="academic_documents" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Proof of English Language Proficiency: <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">IELTS(Academic) is required as a proof of English Language Proficiency. It is valid for two years and universities accept a range of scores depending  on the course you are applying for. 
                                <b>Please note that</b> if you don't have the required IELTS  then you should consult with your counsellors who can advise you for some alternatives offered by universities. 
                                </p>
                          </div>
                          <br>
                           <div class="col-md-9">
                            <form action="{{ route('uploadIelts') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="proof_of_english_language_proficiency" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Curriculum Vitae (CV) <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">An academic cv tells the reader about your academic background, objective, work experience , significant achievement(e.g. Scholarships, grants), extracurricular activities and academic referees’ contact details.</p>
                          </div>
                          <br>
                           <div class="col-md-9">
                              <form action="{{ route('uploadCV') }}" method="POST" enctype="multipart/form-data">
                                @CSRF
                                  <input type="file" name="cv" class="f1-cv form-control" id="cv">
                                </div>
                                <div class="col-md-2" align="right">
                                    <button type="submit" class="btn btn-submit">Upload</button>
                                </div>
                              </form>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Statement of Purpose (SOP) <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">SOP contains information about your academic background, why you want to study in UK, why you want to study the selected course at the university you are applying, what are your future plans when you finish the course. 
                                <b> Please note that,</b> our counsellor will provide you guidelines on writing a SOP , but it's your duty to write your own SOP. </p>
                          </div>
                          <br>
                          <div class="col-md-9">
                            <form action="{{ route('uploadSOP') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="sop" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>

                        <hr>


                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>References : (At least two references should be uploaded)</h5>
                              <p class="line" style="font-size: 14px;">You need to provide two academic references. If you are an undergraduate applicant, then your school teachers can provide those along with a school leaving certificate. On the other hand , if you are applying for a postgraduate applicant, then you are required to collect two references from your professors. The references should reflect on your academic performance , good character ,mention any significant achievement , etc. 
                               <b>Please note that</b> academic referees should be someone who has taught you in the past at school or university. The person cannot be your family member or friend or someone with whom you have personal relationship outside academics.  You are not allowed to provide fake references because these will be checked and verified.
                                </p>
                          </div>
                          <br>
                          <form action="{{ route('uploadReference') }}" method="POST" enctype="multipart/form-data">
                            @CSRF
                            <div class="col-md-5">
                              <label class="text-black" for="ref1">Reference 1</label>
                              <input type="file" name="reference1" class="f1-cv form-control" id="ref1">
                            </div>
                            <div class="col-md-5">
                              <label for="ref2">Reference 2</label>
                              <input type="file" name="reference2" class="f1-cv form-control" id="ref2">
                            </div>
                            <div class="col-md-2" align="right" style="margin-top:26px;">
                                <button type="submit" class="btn btn-submit">Upload</button>
                            </div>
                          </form>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Additional Documents: <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">You can upload documents here only when you are instructed by counsellor.</p>
                          </div>
                          <br>
                        </div>
                        <div class="form-group row">
                          <form action="{{ route('uploadAdditionalDoc') }}" method="POST" enctype="multipart/form-data">
                            @CSRF
                              <div class="col-md-6">
                                <label for="ref2">Document 1</label>
                                <input type="text" name="additional_document_name1" class="f1-cv form-control" id="cv" placeholder="Enter Document name" required>
                              </div>
                              <div class="col-md-6">
                                <label for="ref2">Upload Document</label>
                                <input type="file" name="additional_document1" class="f1-cv form-control" id="cv" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-6">
                                <label for="ref2">Document 2</label>
                                <input type="text" name="additional_document_name2" class="f1-cv form-control" id="cv" placeholder="Enter Document name">
                              </div>
                              <div class="col-md-6">
                                <label for="ref2">Upload Document</label>
                                <input type="file" name="additional_document2" class="f1-cv form-control" id="cv">
                              </div>
                            </div>
                            <div class="fa-button" align="right">
                              <button type="submit" class="btn btn-submit">Upload</button>
                            </div>
                          </form>
                        <hr>

                       
                      </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection