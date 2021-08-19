<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index')->name('index');


Route::post('/notifications/to', 'PublicController@notificationFetch')->name('fetch');

Route::get('/how-uni-nav-works', 'PublicController@howitworks')->name('howItWorks');
Route::get('/why-uk', 'PublicController@whyUk')->name('whyUK');
Route::get('/faq', 'PublicController@faq')->name('faq');
Route::get('/about-us', 'PublicController@about')->name('about');
Route::get('/contact-us', 'PublicController@contact')->name('contact');
Route::post('/contact-us/form', 'PublicController@contactForm')->name('contactForm');
Route::get('/news/{news}-{slug}/', 'PublicController@newsSingle')->name('newsSingle');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

Route::get('/privacy-policy', 'PublicController@privecy')->name('privecy');
Route::get('/terms-and-condition', 'PublicController@termsAndCondition')->name('termsAndCondition');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notifications-all','NotificationController@show')->name('allNotification');


Route::get('/student-portal', 'UserController@studentPortal')->name('studentPortal');
Route::get('/introductory-phase', 'UserController@introductoryPhase')->name('introductoryPhase');
Route::post('/introductory-phase/student-info', 'StudentInformationController@store')->name('studentInfo');

Route::get('/intermediate-phase', 'UserController@intermediatePhase')->name('intermediatePhase');


Route::post('/intermediate-phase/passposrt', 'StudentInformationController@uploadPassport')->name('uploadPassport');

Route::post('/intermediate-phase/cv', 'StudentInformationController@uploadCV')->name('uploadCV');
Route::post('/intermediate-phase/SOP', 'StudentInformationController@uploadSOP')->name('uploadSOP');
Route::post('/intermediate-phase/academic', 'StudentInformationController@uploadAcademic')->name('uploadAcademic');
Route::post('/intermediate-phase/ielts', 'StudentInformationController@uploadIelts')->name('uploadIelts');
Route::post('/intermediate-phase/reference', 'StudentInformationController@uploadReference')->name('uploadReference');
Route::post('/intermediate-phase/additional', 'StudentInformationController@uploadAdditionalDoc')->name('uploadAdditionalDoc');




Route::get('/transition-phase', 'UserController@transitionPhase')->name('transitionPhase');
Route::post('/transition-phase/confirmation-of-acceptence', 'StudentInformationController@ConfirmationOfAcceptenceDocuments')->name('ConfirmationOfAcceptenceDocuments');
Route::post('/transition-phase/Tuberculosistestsforvisaapplicants', 'StudentInformationController@Tuberculosistestsforvisaapplicants')->name('Tuberculosistestsforvisaapplicants');
Route::post('/transition-phase/FinancialDocumentsSupportLetterandAffidavit', 'StudentInformationController@FinancialDocumentsSupportLetterandAffidavit')->name('FinancialDocumentsSupportLetterandAffidavit');
Route::post('/transition-phase/visaApplicationandImmigrationhealthsurcharge', 'StudentInformationController@VisaApplicationandImmigrationhealthsurcharge')->name('VisaApplicationandImmigrationhealthsurcharge');
Route::post('/transition-phase/visa-cover-letter', 'StudentInformationController@visacoverletter')->name('visacoverletter');





Route::get('/terminal-phase', 'UserController@terminalPhase')->name('terminalPhase');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/change-password/{id}', 'UserController@changePassword')->name('userChangePassword');

Route::get('/student-update-information', 'UserController@studentinformationUpdate')->name('studentinformationUpdate');
Route::post('/student-update-information/update/{id}', 'UserController@personalInfoUpdate')->name('personalInfoUpdate');
Route::post('/student-update-education/update/', 'UserController@EducationInfoUpdate')->name('EducationInfoUpdate');
Route::post('/student-update-ielts/update/', 'UserController@ieltsInfoUpdate')->name('ieltsInfoUpdate');
Route::post('/student-update-workExperience/update/', 'UserController@workExperienceInfoUpdate')->name('workExperienceInfoUpdate');
Route::post('/student-update-otherInfo/update/', 'UserController@OtherInfoUpdate')->name('OtherInfoUpdate');



//---- FORUM POST
Route::get('/join-us', 'ForumPostController@joinus')->name('joinus');
Route::get('/post/{post}-{slug}/', 'ForumPostController@show')->name('newsSingle');

Route::get('/add-user-post', 'ForumPostController@create')->name('userAddPost');
Route::post('/add-user-post/new', 'ForumPostController@store')->name('userAddnewPost');

Route::post('/comment', 'ForumCommentController@store')->name('postComment');


Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/all-users', 'AdminController@allUsers')->name('allUsers');
    
	Route::get('/all-users/block/{id}', 'AdminController@blockUser')->name('blockUser');
	Route::get('/all-users/block-list', 'AdminController@blockUserList')->name('blockUserList');
	Route::get('/all-users/action', 'AdminController@action')->name('live_search.action');

	// S T U D E N T S 

	Route::get('/all-students', 'AdminController@students')->name('students');
	Route::get('/students-documents', 'AdminController@studentsDocuments')->name('studentsDocuments');
	Route::get('/students-accepted', 'AdminController@acceptedStudents')->name('acceptedStudents');
	Route::get('/rejected-students', 'AdminController@rejectedStudents')->name('rejectedStudents');

	Route::get('/students/show/{id}', 'AdminController@showInformation')->name('showInformation');


	Route::post('/students/accept/personal-info/{id}', 'NotificationController@acceptPersonalInformation')->name('acceptPersonalInformation');

	Route::post('/students/accept/{id}', 'NotificationController@acceptDocuments')->name('acceptDocuments');
	Route::post('/students/reject/{id}', 'NotificationController@rejectDocuments')->name('rejectDocuments');
	


	Route::post('/students/ask-for-documents/{id}', 'NotificationController@askForDocuments')->name('askForDocuments');
	Route::get('/students/ask-for-acceptence-doc/{id}', 'NotificationController@askForAcceptenceDocuments')->name('askForAcceptenceDocuments');

	// S L I D E R S 

	Route::get('/sliders', 'SliderController@index')->name('sliders');
	Route::get('/sliders/add/', 'SliderController@create')->name('addSlider');
	Route::post('/sliders/add/new', 'SliderController@store')->name('sliderStore');
	
	Route::get('/sliders/edit/{id}', 'SliderController@edit')->name('editSlider');
	Route::post('/sliders/edit/{id}', 'SliderController@update')->name('editSliderStore');

	Route::get('/sliders/delete/{id}', 'SliderController@destroy')->name('deleteSlider');

	// N E W S 

	Route::get('/news', 'NewsController@index')->name('news');
	Route::get('/news/add', 'NewsController@create')->name('addNews');	
	Route::post('/news/add/new', 'NewsController@store')->name('addNewsStore');
	Route::get('/news/edit/{id}', 'NewsController@edit')->name('editNews');
	Route::post('/news/edit/{id}', 'NewsController@update')->name('editNewsStore');
	Route::get('/news/delete/{id}', 'NewsController@destroy')->name('deleteNews');
	
	// Why UK

	Route::get('/why-uk', 'WhyUkController@index')->name('whyUkAdmin');
	Route::get('/why-uk/add', 'WhyUkController@create')->name('addwhyUk');	
	Route::post('/why-uk/add/new', 'WhyUkController@store')->name('addwhyUkStore');
	Route::get('/why-uk/edit/{id}', 'WhyUkController@edit')->name('editwhyUk');
	Route::post('/why-uk/edit/{id}', 'WhyUkController@update')->name('editwhyUkStore');
	Route::get('/why-uk/delete/{id}', 'WhyUkController@destroy')->name('deletewhyUk');
	
	// How it works

	Route::get('/how-it-works', 'HowItWorksController@index')->name('howItWorksAdmin');
	Route::get('/how-it-works/add', 'HowItWorksController@create')->name('addhowItWorks');	
	Route::post('/how-it-works/add/new', 'HowItWorksController@store')->name('addhowItWorksStore');
	Route::get('/how-it-works/edit/{id}', 'HowItWorksController@edit')->name('edithowItWorks');
	Route::post('/how-it-works/edit/{id}', 'HowItWorksController@update')->name('edithowItWorksStore');
	Route::get('/how-it-works/delete/{id}', 'HowItWorksController@destroy')->name('deletehowItWorks');
	

	// University List

	Route::get('/our-universities', 'UniversityController@index')->name('universities');
	Route::get('/our-universities/add', 'UniversityController@create')->name('adduniversities');	
	Route::post('/our-universities/add/new', 'UniversityController@store')->name('adduniversitiesStore');
	Route::get('/our-universities/edit/{id}', 'UniversityController@edit')->name('edituniversities');
	Route::post('/our-universities/edit/{id}', 'UniversityController@update')->name('edituniversitiesStore');
	Route::get('/our-universities/delete/{id}', 'UniversityController@destroy')->name('deleteuniversities');


	// Clients

	Route::get('/our-clients', 'ClientController@index')->name('clients');
	Route::get('/our-clients/add', 'ClientController@create')->name('addclients');	
	Route::post('/our-clients/add/new', 'ClientController@store')->name('addclientsStore');
	Route::get('/our-clients/edit/{id}', 'ClientController@edit')->name('editclients');
	Route::post('/our-clients/edit/{id}', 'ClientController@update')->name('editclientsStore');
	Route::get('/our-clients/delete/{id}', 'ClientController@destroy')->name('deleteclients');


	// FAQS

	Route::get('/faq', 'FaqController@index')->name('faqs');
	Route::get('/faq/add', 'FaqController@create')->name('addFaqs');	
	Route::post('/faq/add/new', 'FaqController@store')->name('addFaqStore');
	Route::get('/faq/edit/{id}', 'FaqController@edit')->name('editFaq');
	Route::post('/faq/edit/{id}', 'FaqController@update')->name('editFaqStore');
	Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('deleteFaq');
	

	// ADMINS

	Route::get('/manage-admin/', 'AdminController@manageAdmin')->name('manageAdmin');
	Route::get('/add-admin/', 'AdminController@addAdmin')->name('addAdmin');
	Route::post('/add-admin/', 'AdminController@addAdminStore')->name('addAdminStore');

	Route::get('/delete-admin/{id}', 'AdminController@deleteAdmin')->name('deleteAdmin');


	// Student portal

	Route::get('/student-portal', 'StudentPosrtalController@index')->name('studentportal');
	Route::get('/student-portal/add', 'StudentPosrtalController@create')->name('addstudentportal');	
	Route::post('/student-portal/add/new', 'StudentPosrtalController@store')->name('addstudentportalStore');
	Route::get('/student-portal/edit/{id}', 'StudentPosrtalController@edit')->name('editstudentportal');
	Route::post('/student-portal/edit/{id}', 'StudentPosrtalController@update')->name('editstudentportalStore');
	Route::get('/student-portal/delete/{id}', 'StudentPosrtalController@destroy')->name('deletestudentportal');
	
	
	
	// CONTACT

	Route::get('/contacts', 'AdminController@contacts')->name('contacts');
    Route::post('/contacts/reply/{id}', 'AdminController@replyContact')->name('replyContact');
	Route::get('/contacts/delete/{id}', 'AdminController@deleteContact')->name('deleteContact');
	

	// A B O U T 

	Route::get('/about-info', 'AboutController@index')->name('abouts');
	Route::get('/about-info/add', 'AboutController@create')->name('addAbout');	
	Route::post('/about-info/add/new', 'AboutController@store')->name('addAboutStore');
	Route::get('/about-info/edit/{id}', 'AboutController@edit')->name('editAbout');
	Route::post('/about-info/edit/{id}', 'AboutController@update')->name('editAboutStore');
	Route::get('/about-info/delete/{id}', 'AboutController@destroy')->name('deleteAbout');

});