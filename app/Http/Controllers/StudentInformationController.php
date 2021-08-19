<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\WorkExperience;
use App\StudentDocument;
use App\StudentEducation;
use File;
use App\StudentInformation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {   
        $validation = $request->validate([
            'fullname' => 'required|string',
            'address' => 'required|string', 
            'phone' => 'required', 
            'email' => 'required', 
            'is_ielts' => 'required', 
            'work_experience' => 'required',
        ]);
        
        DB::beginTransaction();
        
        $student = array();
        $urn = rand(1111,9999);
        $student['urn'] = $urn;
        $student['fullname'] = $request['fullname'];
        
        $student['address'] = $request['address'];
        $student['phone'] = $request['phone'];
        $student['email'] = $request['email'];
        $student['is_ielts'] = $request['is_ielts'];
        $student['user_id'] = Auth::user()->id;
        $student['intended_course'] = $request['intended_course'];
        $student['intended_university'] = $request['intended_university'];
        $student['others'] = $request['others'];

        $student['created_at'] = Carbon::now();

        if($request['is_ielts'] == 1){
            $validation = $request->validate([
                'test_name' => 'required',
                'ielts_score' => 'required',
                'ielts_validity' => 'required',  
            ]);
        
            $student['ielts_score'] = $request['ielts_score'];
            $student['test_name'] = $request['test_name'];
            $student['ielts_validity'] = $request['ielts_validity'];
        }

        if($request->hasFile('profile_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
			$image = $request->file('profile_image')->move('uploads', $filenametostore);
			$student['profile_image'] = $image;
		}

        $student_id = DB::table('student_information')->insertGetId($student);

        $degrees = $request['degree'];

        foreach ($degrees as $edu => $v) {
           if (!empty($degrees[$edu])) {
               if (!empty($request->degree[$edu]) && !empty($request->institution[$edu]) && !empty($request->passing_year[$edu]) && !empty($request->cgpa[$edu])) 
               {
                    $data = array(
                        'user_id' => Auth::user()->id,
                        'degree' => $request->degree[$edu],
                        'institution' => $request->institution[$edu],
                        'passing_year' => $request->passing_year[$edu],
                        'cgpa' => $request->cgpa[$edu],
                        'created_at' => Carbon::now()
                    );
                    StudentEducation::insert($data);
               } else {
                   //echo "All Educational information must be filled up properly !";
                   return back()->with('error','All Educational information must be filled up properly !');
               }
           }
        }

        $work_experiences = $request['work_experience'];

        foreach($work_experiences as $work => $value){
            if (!empty($work_experiences[$work])) {
                if (!empty($request->work_experience[$work]) && !empty($request->year[$work])) 
                {
                        $data = array(
                            'user_id' => Auth::user()->id,
                            'work_experience' => $request->work_experience[$work],
                            'year' => $request->year[$work],
                            'created_at' => Carbon::now()
                        );
                        WorkExperience::insert($data);
                } else {
                    return back()->with('error','Work Experience must be filled up properly !');
                }
            }
        }

        DB::commit();
        return redirect()->back()->withSuccessMessage('Thank you for submitting your information. Your Unique Reference number is <h5><b>#'.$urn.'</b></h5>,Please save it for future use');
    }


    public function uploadPassport(Request $request){
    
        $request->validate([
            'passposrt' => 'required|mimes:pdf|max:2048',
        ]);
        
        $check = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Passposrt')->first();
        if (empty($check)) {

            $basename = Str::random();
            $passposrt = $basename.'.'.$request->passposrt->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->passposrt->move(public_path('uploads'), $passposrt);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'Passport';
            $doc->file_name = 'uploads/' . $passposrt;
            $doc->status = 1;
            $doc->save();
            
        } else {

            $file = $check->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $passposrt = $basename.'.'.$request->passposrt->extension();  
            $request->passposrt->move(public_path('uploads'), $passposrt);
            $check->file_name = 'uploads/' . $passposrt;
            $check->save();
        }
        

        return back()->with('success','Thank you for submitting your Copy of passport. We will let you know after we check.');
   
    }
    

    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);
        
        $check = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','CV')->first();
        if (empty($check)) {

            $basename = Str::random();
            $cv = $basename.'.'.$request->cv->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->cv->move(public_path('uploads'), $cv);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'CV';
            $doc->file_name = 'uploads/' . $cv;
            $doc->status = 1;
            $doc->save();
            
        } else {

            $file = $check->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $cv = $basename.'.'.$request->cv->extension();  
            $request->cv->move(public_path('uploads'), $cv);
            $check->file_name = 'uploads/' . $cv;
            $check->save();
        }
        

        return back()->with('success','Thank you for submitting your Curriculum Vitae (CV). We will let you know after we check.');
    }



    public function uploadSOP(Request $request)
    {
        $request->validate([
            'sop' => 'required|mimes:pdf|max:2048',
        ]);

        $checkSOP = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','SOP')->first();
        if (empty($checkSOP)) {
        
            $basename = Str::random();
            $sop = $basename.'.'.$request->sop->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->sop->move(public_path('uploads'), $sop);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'SOP';
            $doc->file_name = 'uploads/' . $sop;
            $doc->status = 1;
            $doc->save();
        } else {

            $file = $checkSOP->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $sop = $basename.'.'.$request->sop->extension();  
            $request->sop->move(public_path('uploads'), $sop);
            $checkSOP->file_name = 'uploads/' . $sop;
            $checkSOP->save();

        }

        return back()->with('success','Thank you for submitting your Statement of purpose (SOP). We will let you know after we check.');
    }



    public function uploadAcademic(Request $request)
    {
        $request->validate([
            'academic_documents' => 'required|mimes:pdf|max:2048',
        ]);

        $checkAcademic = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Academic Documents')->first();
        if (empty($checkAcademic)) {
        
            $basename = Str::random();
            $academic = $basename.'.'.$request->academic_documents->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->academic_documents->move(public_path('uploads'), $academic);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'Academic Documents';
            $doc->file_name = 'uploads/' . $academic;
            $doc->status = 1;
            $doc->save();

        } else {

            $file = $checkAcademic->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $academic_documents = $basename.'.'.$request->academic_documents->extension();  
            $request->academic_documents->move(public_path('uploads'), $academic_documents);
            $checkAcademic->file_name = 'uploads/' . $academic_documents;
            $checkAcademic->save();

        }

        return back()->with('success','Thank you for submitting your Academic Documents. We will let you know after we check.');
    }


    public function uploadReference(Request $request)
    {
        $request->validate([
            'reference1' => 'required|mimes:pdf|max:2048',
            'reference2' => 'required|mimes:pdf|max:2048',
        ]);
        
        $basename1 = Str::random();
        $reference1 = $basename1.'.'.$request->reference1->extension();

        $basename2 = Str::random();
        $reference2 = $basename2.'.'.$request->reference2->extension();

        
        $request->reference1->move(public_path('uploads'), $reference1);
        $request->reference2->move(public_path('uploads'), $reference2);


        DB::beginTransaction();

        $doc = new StudentDocument;
        $doc->user_id = Auth::user()->id;
        $doc->file_type = 'Reference 1';
        $doc->file_name = 'uploads/' . $reference1;
        $doc->status = 1;
        $doc->save();

        $doc2 = new StudentDocument;
        $doc2->user_id = Auth::user()->id;
        $doc2->file_type = 'Reference 2';
        $doc2->file_name = 'uploads/' . $reference2;
        $doc2->status = 1;
        $doc2->save();

        DB::commit();

        return back()->with('success','Thank you for submitting your References. We will let you know after we check.');
    }

    public function uploadIelts(Request $request)
    {
        $request->validate([
            'proof_of_english_language_proficiency' => 'required|mimes:pdf|max:2048',
        ]);

        
        $checkIelts = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Proof of English Language Proficiency')->first();
        if (empty($checkIelts)) {
            $basename = Str::random();
            $proof_of_english_language_proficiency = $basename.'.'.$request->proof_of_english_language_proficiency->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->proof_of_english_language_proficiency->move(public_path('uploads'), $proof_of_english_language_proficiency);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'Proof of English Language Proficiency';
            $doc->file_name = 'uploads/' . $proof_of_english_language_proficiency;
            $doc->status = 1;
            $doc->save();
        } else {

            $file = $checkIelts->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $proof_of_english_language_proficiency = $basename.'.'.$request->proof_of_english_language_proficiency->extension();  
            $request->proof_of_english_language_proficiency->move(public_path('uploads'), $proof_of_english_language_proficiency);
            $checkIelts->file_name = 'uploads/' . $proof_of_english_language_proficiency;
            $checkIelts->save();

        }

        return back()->with('success','Thank you for submitting your Proof of English Language Proficiency. We will let you know after we check.');
    }



    public function uploadAdditionalDoc(Request $request)
    {
        $request->validate([
            'additional_document_name1' => 'required',
            'additional_document1' => 'required|mimes:pdf|max:2048',
        ]);


        $basename = Str::random();
        $additional_document1 = $basename.'.'.$request->additional_document1->extension();  
        
        DB::beginTransaction();

        $doc = new StudentDocument;
        $doc->user_id = Auth::user()->id;

        $request->additional_document1->move(public_path('uploads'), $additional_document1);

        $doc->user_id = Auth::user()->id;
        $doc->file_type = $request['additional_document_name1'];
        $doc->file_name = 'uploads/' . $additional_document1;
        $doc->status = 1;
        $doc->save();

        if($request->additional_document_name2 != ''){
            $request->validate([
                'additional_document2' => 'required|mimes:pdf|max:2048',
            ]);

            $basename2 = Str::random();
            $additional_document2 = $basename2.'.'.$request->additional_document2->extension();  
    
            $doc2 = new StudentDocument;
            $doc2->user_id = Auth::user()->id;
    
            $request->additional_document2->move(public_path('uploads'), $additional_document2);
    
            $doc2->user_id = Auth::user()->id;
            $doc2->file_type = $request['additional_document_name2'];
            $doc2->file_name = 'uploads/' . $additional_document2;
            $doc2->status = 1;
            $doc2->save();

        } elseif ($request->additional_document2 != '') {
            $request->validate([
                'additional_document_name2' => 'required',
            ]);

            $basename2 = Str::random();
            $additional_document2 = $basename2.'.'.$request->additional_document2->extension();  
    
            $doc2 = new StudentDocument;
            $doc2->user_id = Auth::user()->id;
    
            $request->additional_document2->move(public_path('uploads'), $additional_document2);
    
            $doc2->user_id = Auth::user()->id;
            $doc2->file_type = $request['additional_document_name2'];
            $doc2->file_name = 'uploads/' . $additional_document2;
            $doc2->status = 1;
            $doc2->save();
        }
    
        DB::commit();

        return back()->with('success','Thank you for submitting additional documents. We will let you know after we check.');
    }

        
    public function ConfirmationOfAcceptenceDocuments(Request $request)
    {
        $request->validate([
            'letter_of_accceptence' => 'required|mimes:pdf,JPEG,jpg|max:2048',
        ]);

        $checkCAS = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Confirmation of Acceptance for Studies (CAS)')->first();
        if (empty($checkCAS)) {

            $basename = Str::random();
            $doc = new StudentDocument;
            $letter_of_accceptence = $basename.'.'.$request->letter_of_accceptence->extension();  

        // $doc = StudentDocument::findOrFail($user);
            $doc->user_id = Auth::user()->id;
            $request->letter_of_accceptence->move(public_path('uploads'), $letter_of_accceptence);
            $doc->file_name = 'uploads/' . $letter_of_accceptence;
            $doc->file_type = 'Confirmation of Acceptance for Studies (CAS)';
            $doc->status = 1;
            $doc->save();
        } else {

            $file = $checkCAS->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $letter_of_accceptence = $basename.'.'.$request->letter_of_accceptence->extension();  
            $request->letter_of_accceptence->move(public_path('uploads'), $letter_of_accceptence);
            $checkCAS->file_name = 'uploads/' . $letter_of_accceptence;
            $checkCAS->save();

        }

        return back()->with('success','Thank you for submitting your Confirmation of Acceptance for Studies (CAS). We will let you know after we check.');

    }

    public function Tuberculosistestsforvisaapplicants(Request $request)
    {
        $request->validate([
            'tuberculosis_tests_for_visa_applicants' => 'required|mimes:pdf,JPEG,jpg|max:2048',
        ]);

        $checkTuberculosis = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Tuberculosis tests for visa applicants')->first();
        if (empty($checkTuberculosis)) {
            $basename = Str::random();
            $doc = new StudentDocument;
            $tuberculosis_tests_for_visa_applicants = $basename.'.'.$request->tuberculosis_tests_for_visa_applicants->extension();  

            $doc->user_id = Auth::user()->id;
            $request->tuberculosis_tests_for_visa_applicants->move(public_path('uploads'), $tuberculosis_tests_for_visa_applicants);
            $doc->file_name = 'uploads/' . $tuberculosis_tests_for_visa_applicants;
            $doc->file_type = 'Tuberculosis tests for visa applicants';
            $doc->status = 1;
            $doc->save();
        } else {

            $file = $checkTuberculosis->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $tuberculosis_tests_for_visa_applicants = $basename.'.'.$request->tuberculosis_tests_for_visa_applicants->extension();  
            $request->tuberculosis_tests_for_visa_applicants->move(public_path('uploads'), $tuberculosis_tests_for_visa_applicants);
            $checkTuberculosis->file_name = 'uploads/' . $tuberculosis_tests_for_visa_applicants;
            $checkTuberculosis->save();

        }

        return back()->with('success','Thank you for submitting your Tuberculosis tests for visa applicants. We will let you know after we check.');

    }
    
    public function FinancialDocumentsSupportLetterandAffidavit(Request $request)
    {
        if(empty($request->financial_document) && empty($request->support_letter) && empty($request->afidevit) ){
            return back()->withErrors('You must submit at least one Document !');
        }

        DB::beginTransaction();

        if ($request->financial_document) {
            $request->validate([
                'financial_document' => 'mimes:pdf|max:2048',
            ]);
        
            $checkFinance = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Financial Document')->first();
            if (empty($checkFinance)) {

                $basename = Str::random();
                $doc = new StudentDocument;
                $financial_document = $basename.'.'.$request->financial_document->extension();  

                $doc->user_id = Auth::user()->id;
                $request->financial_document->move(public_path('uploads'), $financial_document);
                $doc->file_name = 'uploads/' . $financial_document;
                $doc->file_type = 'Financial Document';
                $doc->status = 1;
                $doc->save();

            } else {
                $file = $checkFinance->file_name;

                if(is_file($file))
                {
                    File::delete($file);
                }

                $basename = Str::random();
                $financial_document = $basename.'.'.$request->financial_document->extension();  
                $request->financial_document->move(public_path('uploads'), $financial_document);
                $checkFinance->file_name = 'uploads/' . $financial_document;
                $checkFinance->save();
            }
        }

        if ($request->support_letter) {
            $request->validate([
                'support_letter' => 'mimes:pdf|max:2048',
            ]);

            $checkSupport = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Support Letter')->first();
            if (empty($checkSupport)) {

                $basename1 = Str::random();
                $doc = new StudentDocument;
                $support_letter = $basename1.'.'.$request->support_letter->extension();  
    
                $doc->user_id = Auth::user()->id;
                $request->support_letter->move(public_path('uploads'), $support_letter);
                $doc->file_name = 'uploads/' . $support_letter;
                $doc->file_type = 'Support Letter';
                $doc->status = 1;
                $doc->save();
            } else {
                $file = $checkSupport->file_name;
                if(is_file($file))
                {
                    File::delete($file);
                }
                $basename = Str::random();
                $support_letter = $basename.'.'.$request->support_letter->extension();  
                $request->support_letter->move(public_path('uploads'), $support_letter);
                $checkSupport->file_name = 'uploads/' . $support_letter;
                $checkSupport->save();
            }
            
        }

        if ($request->afidevit) {
            $request->validate([
                'afidevit' => 'mimes:pdf|max:2048',
            ]);

            $checkAffidevit = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Affidavit')->first();
            if (empty($checkAffidevit)) {

                $basename1 = Str::random();
                $doc = new StudentDocument;
                $afidevit = $basename1.'.'.$request->afidevit->extension();  
    
                $doc->user_id = Auth::user()->id;
                $request->afidevit->move(public_path('uploads'), $afidevit);
                $doc->file_name = 'uploads/' . $afidevit;
                $doc->file_type = 'Affidavit';
                $doc->status = 1;
                $doc->save();
            } else {
                $file = $checkAffidevit->file_name;
                if(is_file($file))
                {
                    File::delete($file);
                }
                $basename = Str::random();
                $afidevit = $basename.'.'.$request->afidevit->extension();  
                $request->afidevit->move(public_path('uploads'), $afidevit);
                $checkAffidevit->file_name = 'uploads/' . $afidevit;
                $checkAffidevit->save();
            }
            
        }
        DB::commit();
        return back()->with('success','Thank you for submitting your Financial Documents, Support Letter and Affidavit. We will let you know after we check.');
    }
    


// ================================================


    public function VisaApplicationandImmigrationhealthsurcharge(Request $request)
    {

        if(empty($request->visa_application1) && empty($request->visa_application2) && empty($request->visa_application3) ){
            return back()->withErrors('You must submit at least one visa application !');
        }


        DB::beginTransaction();

       

        if ($request->visa_application1) {
            $request->validate([
                'visa_application1' => 'mimes:pdf|max:2048',
            ]);
        
            $checkFinance = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Visa Application 1')->first();
            if (empty($checkFinance)) {

                $basename = Str::random();
                $doc = new StudentDocument;
                $visa_application1 = $basename.'.'.$request->visa_application1->extension();  

                $doc->user_id = Auth::user()->id;
                $request->visa_application1->move(public_path('uploads'), $visa_application1);
                $doc->file_name = 'uploads/' . $visa_application1;
                $doc->file_type = 'Visa Application 1';
                $doc->status = 1;
                $doc->save();

            } else {
                $file = $checkFinance->file_name;

                if(is_file($file))
                {
                    File::delete($file);
                }

                $basename = Str::random();
                $visa_application1 = $basename.'.'.$request->visa_application1->extension();  
                $request->visa_application1->move(public_path('uploads'), $visa_application1);
                $checkFinance->file_name = 'uploads/' . $visa_application1;
                $checkFinance->save();
            }
        }

        if ($request->visa_application2) {
            $request->validate([
                'visa_application2' => 'mimes:pdf|max:2048',
            ]);

            $checkSupport = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Visa Application 2')->first();
            if (empty($checkSupport)) {

                $basename1 = Str::random();
                $doc = new StudentDocument;
                $visa_application2 = $basename1.'.'.$request->visa_application2->extension();  
    
                $doc->user_id = Auth::user()->id;
                $request->visa_application2->move(public_path('uploads'), $visa_application2);
                $doc->file_name = 'uploads/' . $visa_application2;
                $doc->file_type = 'Visa Application 2';
                $doc->status = 1;
                $doc->save();
            } else {
                $file = $checkSupport->file_name;
                if(is_file($file))
                {
                    File::delete($file);
                }
                $basename = Str::random();
                $visa_application2 = $basename.'.'.$request->visa_application2->extension();  
                $request->visa_application2->move(public_path('uploads'), $visa_application2);
                $checkSupport->file_name = 'uploads/' . $visa_application2;
                $checkSupport->save();
            }
            
        }

        if ($request->visa_application3) {
            $request->validate([
                'visa_application3' => 'mimes:pdf|max:2048',
            ]);

            $checkAffidevit = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Visa Application 3')->first();
            if (empty($checkAffidevit)) {

                $basename1 = Str::random();
                $doc = new StudentDocument;
                $visa_application3 = $basename1.'.'.$request->visa_application3->extension();  
    
                $doc->user_id = Auth::user()->id;
                $request->visa_application3->move(public_path('uploads'), $visa_application3);
                $doc->file_name = 'uploads/' . $visa_application3;
                $doc->file_type = 'Visa Application 3';
                $doc->status = 1;
                $doc->save();
            } else {
                $file = $checkAffidevit->file_name;
                if(is_file($file))
                {
                    File::delete($file);
                }
                $basename = Str::random();
                $visa_application3 = $basename.'.'.$request->visa_application3->extension();  
                $request->visa_application3->move(public_path('uploads'), $visa_application3);
                $checkAffidevit->file_name = 'uploads/' . $visa_application3;
                $checkAffidevit->save();
            }
            
        }
        DB::commit();
        return back()->with('success','Thank you for submitting your Visa Application, We will let you know after we check.');
    }
    
    

    public function visacoverletter(Request $request)
    {
        $request->validate([
            'visa_cover_letter' => 'required|mimes:pdf|max:2048',
        ]);
        
        $check = StudentDocument::where('user_id',Auth::user()->id)->where('file_type','Visa Cover Letter')->first();
        if (empty($check)) {

            $basename = Str::random();
            $visa_cover_letter = $basename.'.'.$request->visa_cover_letter->extension();  

            $doc = new StudentDocument;
            $doc->user_id = Auth::user()->id;

            $request->visa_cover_letter->move(public_path('uploads'), $visa_cover_letter);

            $doc->user_id = Auth::user()->id;
            $doc->file_type = 'Visa Cover Letter';
            $doc->file_name = 'uploads/' . $visa_cover_letter;
            $doc->status = 1;
            $doc->save();
            
        } else {

            $file = $check->file_name;

            if(is_file($file))
            {
                File::delete($file);
            }

            $basename = Str::random();
            $visa_cover_letter = $basename.'.'.$request->visa_cover_letter->extension();  
            $request->visa_cover_letter->move(public_path('uploads'), $visa_cover_letter);
            $check->file_name = 'uploads/' . $visa_cover_letter;
            $check->save();
        }
        

        return back()->with('success','Thank you for submitting your Visa Cover Letter. We will let you know after we check.');
    }



}
