<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UspController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\CommonSettingController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\PopularController;
use App\Http\Controllers\API\PreBannerController;
use App\Http\Controllers\API\DaycareActivitesController;
use App\Http\Controllers\API\MileStoneController;
use App\Http\Controllers\API\TopicController;
use App\Http\Controllers\API\QuizContentController;
use App\Http\Controllers\API\SkillLearnController;
use App\Http\Controllers\API\EnrollController;
use App\Http\Controllers\API\EventBookController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\TalkController;
use App\Http\Controllers\API\DayCareEnquiryController;
use App\Http\Controllers\API\PreSchoolRegistrationController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\KitController;
use App\Http\Controllers\API\DemoController;
use App\Http\Controllers\API\TeacherController;
use App\Http\Controllers\API\KitOrderController;
use App\Http\Controllers\API\SchoollistController;
use App\Http\Controllers\API\TeacherEnquiryController;
use App\Http\Controllers\API\EventListController;
use App\Http\Controllers\API\TestingPaymentController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\EventOrderController;
use App\Http\Controllers\API\DaycareOrderController;
use App\Http\Controllers\API\StudentFeesController;
use App\Http\Controllers\API\PreferredTimeController;
use App\Http\Controllers\API\OurProgramController;
use App\Http\Controllers\API\CustomGoalController;
use App\Http\Controllers\API\GoalController;
use App\Http\Controllers\API\PartnerSchoolController;
use App\Http\Controllers\API\EnquiryPartnerSchoolController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\API\PartnerSchoolReviewController;

// Register Routes 
Route::post('/register', [UserController::class, 'sendotp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('testing-pay', [TestingPaymentController::class, 'dd']);
// Route::get('/user', [UserController::class, 'Dashboard']);
Route::get('usps', [UspController::class, 'index']); 
Route::get('banners', [BannerController::class, 'index']);
Route::get('blogs', [BlogController::class, 'index']);
// Route::get('events', [EventController::class, 'index']);
Route::get('categorys', [CategoryController::class, 'index']);
Route::get('faqs', [FaqController::class, 'index']);
Route::get('common', [CommonSettingController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);
Route::get('gallery', [GalleryController::class, 'index']);
Route::get('popular', [PopularController::class, 'index']);
Route::get('popular-for-you', [PopularController::class, 'getPopularData']);
Route::get('prebanner', [PreBannerController::class, 'index']);
Route::get('daycareactivity', [DaycareActivitesController::class, 'index']);
Route::get('milestone', [MileStoneController::class, 'index']);
Route::get('topic', [TopicController::class, 'index']);

Route::get('/pre-school', [HomeController::class, 'pre_school']);
Route::get('/day-care', [HomeController::class, 'day_care']);

Route::get('/events-list', [HomeController::class, 'events']);
Route::get('/event-details/{url}', [HomeController::class, 'events_details']);

Route::get('/life-skills-details/{url}', [HomeController::class, 'life_hacks_details']);

Route::get('/quiz', [QuizContentController::class, 'AllQuizContent']);
Route::get('/skill', [SkillLearnController::class, 'skill']);
Route::post('/enroll', [EnrollController::class, 'enroll']);
Route::get('/all-enroll', [EnrollController::class, 'index']);
Route::post('/book-event', [EventBookController::class, 'store']);
Route::get('/show-event', [EventBookController::class, 'index']);
Route::get('/show-event', [EventBookController::class, 'index']);
Route::get('/featured-services', [HomeController::class, 'featured_services']);
Route::post('/contact-us', [ContactUsController::class, 'store']);
Route::get('/contact', [ContactUsController::class, 'index']);
Route::get('/talk', [TalkController::class, 'index']);
Route::put('/talk/{id}', [TalkController::class, 'update']);

Route::post('/day-care-enquiries', [DayCareEnquiryController::class, 'store']);
Route::get('/day-care-enquiries', [DayCareEnquiryController::class, 'index']);

Route::post('/pre-school-register', [PreSchoolRegistrationController::class, 'store']);
Route::get('/pre-school-register', [PreSchoolRegistrationController::class, 'index']);

Route::get('/kit-list', [KitController::class, 'getKitList']); 
Route::get('/kit-detail/{id}', [KitController::class, 'getDetails']); 

Route::post('/demo-form', [DemoController::class, 'store']);
Route::get('/demo-list', [DemoController::class, 'index']);

Route::post('/kit-order', [KitOrderController::class, 'store']);
Route::post('/online-payment', [KitOrderController::class, 'onlinepayment']);
Route::post('/kit-order/payment', [KitOrderController::class, 'paymentSuccess']);
Route::get('/kit-payment-response', [KitOrderController::class, 'callback'])->name('payment.callback');

Route::get('/kit-order-list/{id}', [KitOrderController::class, 'kitOrderList']);
Route::get('/kit-order-details/{id}', [KitOrderController::class, 'kitOrderDetails']);

Route::get('/fees-order-list/{id}', [StudentFeesController::class, 'studenfeesList']);
Route::get('/fees-order-details/{id}', [StudentFeesController::class, 'studentfeesDetails']);

Route::get('/event-order-list/{id}', [EventOrderController::class, 'EventfeesList']);
Route::get('/event-order-details/{id}', [EventOrderController::class, 'EventfeesDetails']);


Route::post('/pre-online-payment', [KitOrderController::class, 'PreregOnlinePayment']);
Route::get('/pre-kit-payment-response', [KitOrderController::class, 'preregCallback'])->name('pre.payment.callback');

Route::post('/student-fees', [StudentFeesController::class, 'createOrder']);
Route::get('/fees-payment-response', [StudentFeesController::class, 'callback'])->name('payment.fees.callback');



Route::post('/events-orders', [EventOrderController::class, 'eventPayment']);
Route::get('/event-payment-response', [EventOrderController::class, 'callback'])->name('payment.event.callback');


Route::post('/daycare-order', [DaycareOrderController::class, 'daycarePayment']);
Route::get('/daycare-payment-response', [DaycareOrderController::class, 'callback'])->name('payment.daycare.callback');

Route::post('/teacher-enquiry', [TeacherEnquiryController::class, 'teacherenquiry']);

Route::get('/school-list', [SchoollistController::class, 'schoollist']);
Route::get('/school-pincode', [SchoollistController::class, 'schoolpincode']);
Route::get('/school-details/{id}', [SchoollistController::class, 'schoolDetails']);

Route::get('/partner-school-list', [PartnerSchoolController::class, 'partnerschoollist']);
Route::get('/partner-school-details/{id}', [PartnerSchoolController::class, 'partnerschoolDetails']);
Route::post('/get-near-by-school', [PartnerSchoolController::class, 'getNearbySchoolsGoogle']);

Route::get('/events', [EventListController::class, 'eventlist']);
Route::get('/events-details/{id}', [EventListController::class, 'eventDetails']);
Route::get('/our-program', [OurProgramController::class, 'ourPrograms']);
Route::get('/our-program-details/{id}', [OurProgramController::class, 'ourProgramsdetails']);

Route::post('/enquiry_partner_school', [EnquiryPartnerSchoolController::class, 'store']);

Route::post('/send-device-token', [NotificationController::class, 'device_token']);
Route::post('/store-partner-school-review', [PartnerSchoolReviewController::class, 'store']);
Route::get('/get-review/{id}', [PartnerSchoolReviewController::class, 'index']);



Route::prefix('parent')->group(function () {
    // Routes protected with 'auth:sanctum' and 'role:parent'
    Route::post('/prelogin', [AuthController::class, 'login']);
    Route::post('/postlogin', [AuthController::class, 'parent_post_login']);
    Route::put('/update/{id}', [StudentController::class, 'update']);
    Route::post('/preferred-times', [PreferredTimeController::class, 'store']);
    Route::get('/kids-list/{id}', [StudentController::class, 'kidslist']);
    Route::get('/remark-list/{id}', [StudentController::class, 'remarkList']);
    Route::get('/progress-list/{id}', [StudentController::class, 'ProgressList']);
    Route::post('/parent-update/{id}', [AuthController::class, 'parentupdate']);
    Route::get('/get-student-syllabus/{id}', [StudentController::class, 'getSyllabus']);
    Route::get('/get-student-attendance/{id}', [AttendanceController::class, 'getAttendanceStudents']); 
    Route::get('/profile/{id}', [AuthController::class, 'parentprofile']);
    Route::get('/get-all-goals-from-admin', [GoalController::class, 'goalslist']);
    Route::get('/parent-wallet-balance/{id}', [StudentFeesController::class, 'totalWalletBalance']);
   
    Route::get('/custom-goals-by-parent/{parentid}/{studentid}', [CustomGoalController::class, 'list']);   // custom goal by parent_id ,student_id
    Route::post('/custom-goals-add-by-parent', [CustomGoalController::class, 'store']);
    Route::post('/custom-goals-edit-by-parent', [CustomGoalController::class, 'edit']);
    Route::post('/custom-goals-delete-parent', [CustomGoalController::class, 'destroy']);    
    Route::get('/delete-parent-account/{id}', [StudentController::class, 'deleteParentAccount']);
});




Route::prefix('teacher')->group(function () {
        Route::post('/login', [AuthController::class, 'teacherlogin']);
        Route::post('/update/{id}', [TeacherController::class, 'update']);
        Route::get('/profile/{id}', [AuthController::class, 'teacherprofile']);
        Route::get('/teacher-detail/{id}', [TeacherController::class, 'getTeacherDetails']); 
        Route::get('/get-students/{id}', [TeacherController::class, 'getTeacherStudents']);
        Route::get('/get-skills', [TeacherController::class, 'getSkills']);
        Route::get('/get-teacher-skills/{id}', [TeacherController::class, 'getteacherSkills']);
        Route::post('/add-remark', [TeacherController::class, 'storeRemark']);
        Route::post('/store-performance', [TeacherController::class, 'storePerformance']);
        Route::post('/apply-leave', [TeacherController::class, 'applyLeave']);
        Route::post('/mark-attendance', [AttendanceController::class, 'saveAttendance']);
        Route::post('/upload-gallery', [TeacherController::class, 'uploadGalleryFile']);
        Route::get('/get-gallery/{id}', [TeacherController::class, 'fetchGallery']);
        Route::get('/get-teacher-leave/{id}', [TeacherController::class, 'getLeave']);
        Route::get('/transaction-list/{id}', [TransactionController::class, 'transactionList']); 
        Route::get('/get-teacher-attendance/{id}', [AttendanceController::class, 'getAttendanceTeacher']); 
        Route::post('/mark-teacher-attendance', [AttendanceController::class, 'storeTeacher']); 
        Route::get('/teacher-list/{id}', [TeacherController::class, 'teacherList']);
        Route::get('/teacher-wallet/{id}', [TeacherController::class, 'getWalletByTeacherId']);
        Route::post('/teacher-wallet-list', [TeacherController::class, 'getWalletlistByTeacherId']);
        Route::get('/delete-teacher-account/{id}', [TeacherController::class, 'deleteTeacherAccount']);


  

//         Route::get('/teacher-detail/{id}', [TeacherController::class, 'getTeacherDetails']); 
//         Route::get('/get-students/{id}', [TeacherController::class, 'getTeacherStudents']);
//         Route::get('/get-skills', [TeacherController::class, 'getSkills']);
//         Route::get('/get-teacher-skills/{id}', [TeacherController::class, 'getteacherSkills']);
//         Route::post('/add-remark', [TeacherController::class, 'storeRemark']);
//         Route::post('/store-performance', [TeacherController::class, 'storePerformance']);
//         Route::post('/mark-attendance', [AttendanceController::class, 'saveAttendance']);
//         Route::get('/transaction-list/{id}', [TransactionController::class, 'transactionList']);

 
});

Route::get('notifications/sendto/{type}', [NotificationController::class, 'fetchBySendto'])
->name('notifications.fetchBySendto')
->whereIn('type', [
    'school-pre-registration',
    'school-post-reg',
    'teacher-pre-registration',
    'teacher-post-registration',
]);








