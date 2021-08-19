@extends('layouts.students')
@section('content')

<section class="sec-padding bg-gray">
    <div class="container introductory-phase">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 form-box">
                <form role="form" action="" method="post" class="f1">
                    <h3>Terminal Phase</h3>
                    <br>
                    <p class="text-danger">Please read the following instructions carefully </p>
                    <p>Uninav would like to congratulate you on making this journey so far with us. This phase is about making sure that you have the right documents in the right order and there are tips and advice provided to boost your confidence level. </p>
                    <br>
                    <div class="image-holder">
                        <img class="img-responsive" alt="" src="{{ asset("assets/images/university/congo_.jpg") }}"> 
                    </div>

                    <p>
                        Below you will find a checklist of  documents that you will need to submit. Note that this is a general checklist which applies to all , please add any further documents if recommended by your counsellor . 
                    </p>
                    <h4><b>Check List</b></h4>
                    <ul class="iconlist dark text-left">
                        <li><i class="fa fa-check"></i> Appointment letter </li>
                        <li><i class="fa fa-check"></i> Visa Cover Letter </li>
                        <li><i class="fa fa-check"></i> Tier 4 visa application form </li>
                        <li><i class="fa fa-check"></i> Photograph affixed (printed)</li>
                        <li><i class="fa fa-check"></i> CAS Statement(printed)</li>
                        <li><i class="fa fa-check"></i> IHS payment confirmation (printed)</li>
                        <li><i class="fa fa-check"></i> Tuberculosis Report</li>
                        <li><i class="fa fa-check"></i> Financial Documents: Bank Statements , Support letter/Declaration , Affidavit </li>
                        <li><i class="fa fa-check"></i>  Academic Documents: References , Certificates, Transcripts. </li>
                    </ul> 
                </form>
            </div>
        </div>
    </div>
@endsection