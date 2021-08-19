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
    <div class="container introductory-phase ">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 form-box f1">
                
                    <h3>Transition Phase</h3>
                    <p class="text-danger">Please read the following  Instructions carefully</p>
                    <br>
                    <p>
                      Transition phase is all about Tier-4 Visa application preparation. As part of this , you are required to do Tuberculosis test at designated medical centres in your country, make sure your financial documents are ready , launch visa application and book an appointment for document, biometric submission. 
                    </p>
                    <hr>
                   
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
                          <form role="form" action="{{ route('ConfirmationOfAcceptenceDocuments') }}" method="post" enctype="multipart/form-data">
                            @CSRF
                            <div class="form-group row">
                              <div class="col-md-12">
                                    <h5>Confirmation of Acceptance for Studies (CAS) <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                                    <p class="line" style="font-size: 14px;">A Confirmation of Acceptance for Studies (CAS) is an electronic document issued to students who need to make a Tier 4 (General) application. Your CAS number , which is required on your visa application will be found on the CAS statement email you receive from the University. </p>
                                </div>
                                <br>
                                <div class="col-md-12">
                                  <label class="" for="f1-first-name">Confirmation of Acceptance for Studies (CAS)</label>
                                  <input type="file" name="letter_of_accceptence" class="f1-first-name form-control" id="f1-first-name">
                                </div>
                            </div>
                          
                            <div class="f1-buttons">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                          </form>
                        </div>

                        <hr>
                        <div class="form-group row">
                          <hr>
                          <div class="col-md-12">
                              <h5>Tuberculosis tests for visa applicants <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">Tier 4 visa applicants who intend to come to the UK for more than six months are required to do Tuberculosis test at designated medical centres. Your counsellor will provide you with a list of places in your home country where you can book an appointment for such medical tests. </p>
                          </div>
                          <br>
                          <div class="col-md-9">
                            <form action="{{ route('Tuberculosistestsforvisaapplicants') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="tuberculosis_tests_for_visa_applicants" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>
                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                              <h5>Financial Documents, Support Letter and Affidavit.  <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">Tier 4 visa applicants are also required to show that they are financially solvent to study in the UK. Students are required to show first year  tuition fees and accommodation expenses held for at least 28 days in financial institutions recognised by British High Commission in respective countries. Counsellors will help you in this regard. </p>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                <form action="{{ route('FinancialDocumentsSupportLetterandAffidavit') }}" method="POST" enctype="multipart/form-data">
                                  @CSRF
                                  <div class="col-md-6">
                                    <label class="text-black" for="ref1">Financial Documents</label>
                                    <input type="file" name="financial_document" class="f1-cv form-control" id="ref1">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="ref2">Support Letter</label>
                                    <input type="file" name="support_letter" class="f1-cv form-control" id="ref2">
                                  </div>
                                  <br>
                                    <div class="col-md-6">
                                      <label for="ref2">Affidavit</label>
                                      <input type="file" name="afidevit" class="f1-cv form-control" id="ref2">
                                    </div>
                                    <div class="col-md-4" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-submit">Upload</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        <hr>

                        <div class="form-group row" style="padding:15px;">
                          <div class="col-md-12">
                              <h5>Tier 4 visa application and Immigration health surcharge (IHS) <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">Visa application can be filled online with all necessary documents in hand . At one stage , applicant is required to pay mandatory IHS fees. Once IHS has been paid , visa application can be submitted which finally generates a unique reference number . Students can do their visa application online and or our counsellors can do it on their behalf . </p>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-12">
                              <form action="{{ route('VisaApplicationandImmigrationhealthsurcharge') }}" method="POST" enctype="multipart/form-data">
                                  @CSRF
                                  <div class="col-md-6">
                                    <label class="text-black" for="ref1">Visa application 1</label>
                                    <input type="file" name="visa_application1" class="f1-cv form-control" id="ref1">
                                  </div>
                                  <div class="col-md-6">
                                    <label class="text-black" for="ref1">Visa application 2</label>
                                    <input type="file" name="visa_application2" class="f1-cv form-control" id="ref2">
                                  </div>
                                  <br>
                                  <br>
                                    <div class="col-md-6">
                                      <label class="text-black" for="ref1">Visa application 3</label>
                                      <input type="file" name="visa_application3" class="f1-cv form-control" id="ref2">
                                    </div>
                                    <div class="col-md-4" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-submit">Upload</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        <hr>

                        <div class="form-group row" style="padding:15px;">
                          <div class="col-md-12">
                              <h5>VISA COVER LETTER  <span class="text-danger text-bold" style="font-size: 19px;">*</span></h5>
                              <p class="line" style="font-size: 14px;">Visa cover letter is a formal statement submitted by the applicant along with their application. It gives the entry clearance officer an idea about students study plan, financial solvency and intentions of returning home country after visa expires. Your counsellor will send you sample letters, which you can edit and modify to fit your personal circumstances. </p>
                          </div>
                          <br>
                          <div class="col-md-9">
                            <form action="{{ route('visacoverletter') }}" method="POST" enctype="multipart/form-data">
                              @CSRF
                                <input type="file" name="visa_cover_letter" class="f1-cv form-control" id="cv">
                              </div>
                              <div class="col-md-2" align="right">
                                  <button type="submit" class="btn btn-submit">Upload</button>
                              </div>
                            </form>
                        </div>
                        <hr>

                    </fieldset>
                
                
           
               
            </div>
        </div>
    </div>
@endsection