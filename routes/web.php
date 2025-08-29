<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UspController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CommonSettingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WebBannerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolCategoryController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\WhyWeStandApartController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LifeSkillsHackController;
use App\Http\Controllers\ChildLearningController;
use App\Http\Controllers\QuizContentController;
use App\Http\Controllers\VisitBookingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeacherPageController;
use App\Http\Controllers\TeacherWhyApplyHereController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\PreBannerController;
use App\Http\Controllers\PreExploreController;
use App\Http\Controllers\PreWhychooseController;
use App\Http\Controllers\PreChildSafetyController;
use App\Http\Controllers\PreProgramTailoredController;
use App\Http\Controllers\DaycareBannerController;
use App\Http\Controllers\DaycareProgramController;
use App\Http\Controllers\DaycareActivitesController;
use App\Http\Controllers\DaycareScheduleController;
use App\Http\Controllers\DaycareSkillsController;
use App\Http\Controllers\DaycareWhychooseController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\activityPayController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\UspDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KitController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\DaycareRegisterController;
use App\Http\Controllers\ProgressGoalController;
use App\Http\Controllers\PackageServiceController;
use App\Http\Controllers\EventPackageController;
use App\Http\Controllers\daycarePayController;
use App\Http\Controllers\SubTopicController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SchoolBannerController;
use App\Http\Controllers\SchoolGalleryController;
use App\Http\Controllers\SchoolAboutusController;
use App\Http\Controllers\SchoolfacilityController;
use App\Http\Controllers\TeacherAppController;
use App\Http\Controllers\TestingPaymentController;
use App\Http\Controllers\SpecializedClassController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PreRegistrationBannerController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\OurProgramController;
use App\Http\Controllers\PartnerSchoolController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\BecomePartnerController;


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});


// payment test
Route::get('/kitpay', [TestingPaymentController::class, 'testkit']);
Route::get('/eventpay', [TestingPaymentController::class, 'testEvent']);
Route::get('/feespay', [TestingPaymentController::class, 'testFees']);


Route::get('/payment/success', function () {
    return "Payment Successful!";
})->name('payment.success');

Route::get('/payment/failure', function () {
    return "Payment Failed!";
})->name('payment.failure');


// Route::post('/cashfree-webhook', [WebhookController::class, 'handle']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'AboutUs']);
Route::get('/pre-school', [HomeController::class, 'pre_school']);
Route::get('/day-care', [HomeController::class, 'day_care']);
Route::get('/popular-for-you', [HomeController::class, 'popular_for_you']);
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy']);
Route::get('/refund-policy', [HomeController::class, 'refund_policy']);
Route::get('/terms-and-condition', [HomeController::class, 'terms_and_condition']);
Route::get('/thank-you', [HomeController::class, 'thankyou']);
Route::get('/quiz', [HomeController::class, 'showQuiz']);

//Route::get('/about-us',function (){
//    return view('web.about');
//});
Route::get('/contact-us', function () {
    return view('web.contact_us');
});

// Route::get('/quiz', function () {
//     return view('web.quiz');
// });

Route::get('/life-skills', function () {
    $data['life_skills'] = \App\Models\LifeSkillsHack::latest()->get();
//    print_r($data);die;
    return view('web.life-skills',$data);
});

Route::get('/life-skills/{url}', [\App\Http\Controllers\LifeSkillsHackController::class, 'life_hacks_details']);




//Route::get('/events', [EventController::class, 'events']);
//Route::get('/event-details', function () {
//    return view('web.event-details');
//});

// Route::get('/day-care', function () {
//     return view('web.day-care');
// });

//Route::get('/events', function () {
//    return view('web.events');
//});
Route::get('/events', [EventController::class, 'events']);
Route::get('/event-details/{url}', [EventController::class, 'events_details']);


Route::get('/usp-details', function () {
    return view('web.usp');
});


//Route::get('/usp-details', function () {
//    return view('web.usp');
//});

//enroll pages
// Route::get('/enroll1', [EnrollController::class, 'enroll1']);
Route::get('/enroll-enquiry', [EnrollController::class, 'enroll1']);
Route::get('/enroll2/{school_id}', [EnrollController::class, 'enroll2'])
     ->name('enroll2.show');
Route::post('/enroll2-save', [EnrollController::class, 'saveEnroll2'])
     ->name('enroll2.save');
Route::post('/enroll-enquiry-save', [EnquiryController::class, 'enrollEnquirySubmit'])->name('enrollenquiry.save');
Route::post('/pre-school-enquiry-save', [EnquiryController::class, 'preschoolEnquirySubmit'])->name('preschoolenquiry.save');
Route::post('/teacher-apply-save', [TeacherAppController::class, 'save'])->name('apply.save');



// Route::get('/enroll1', function () {
//     return view('enrollpages.enroll1');
// });
// Route::get('/enroll2', function () {
//     return view('enrollpages.enroll2');
// });
Route::get('/enroll3', function () {
    return view('enrollpages.enroll3');
});
Route::get('/enroll4', function () {
    return view('enrollpages.enroll4');
});
Route::get('/enroll5', function () {
    return view('enrollpages.enroll5');
});

//Route::get('/teachers', function () {
//    return view('web.teachers');
//});

Route::get('/teachers', [HomeController::class, 'Teachers']);
Route::get('/franchise', [HomeController::class, 'Franchise']);
Route::get('/blog', [HomeController::class, 'Blog']);
Route::get('/blog-details', [HomeController::class, 'BlogDetails']);

//Route::get('/franchise', function () {
//    return view('web.franchise');
//});

Route::post('/enquiry-submit', [EnquiryController::class, 'submit'])->name('enquiry.submit');
Route::get('/talk-expert', [TalkController::class, 'TalkExpert'])->name('talk.expert');
Route::post('/talk_expert', [TalkController::class, 'submitTalkExpert'])->name('talk.expert.submit');

Route::get('/book-appointment', [AppointmentController::class, 'appointmnent'])->name('book.appointment');
Route::post('/book_appointment', [AppointmentController::class, 'bookappointment'])->name('appointment.store');
Route::post('/apply_fren', [FranchiseController::class, 'applyFranchiSubmit'])->name('apply.fren');

Route::get('/partner-school-get/{state}', [PartnerSchoolController::class, 'searchPreschools']);
Route::get('/become-a-partner', [BecomePartnerController::class, 'index']);
Route::post('/become-a-partner-store', [BecomePartnerController::class, 'store']);

// Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::get('/login-form', [AuthController::class, 'signin'])->name('admin.loginform');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm'])->name('admin.password.emailform');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

});


// Route::middleware(['auth'])->group(function () {
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [HomeController::class, 'edit'])->name('profile.edit');
        Route::post('edit/{id}', [HomeController::class, 'update'])->name('update');
       
        Route::get('/usp', [UspController::class, 'index'])->name('usp.list');
        Route::get('/usp/create', [UspController::class, 'create'])->name('usp.create');
        Route::post('/usp', [UspController::class, 'store'])->name('usp.store');
        Route::get('/usp/{id}/edit', [UspController::class, 'edit'])->name('usp.edit');
        Route::put('/usp/{id}', [UspController::class, 'update'])->name('usp.update');
        Route::delete('/usp/{id}', [UspController::class, 'destroy'])->name('usp.destroy');

        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.list');
        Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::post('/gallery/update', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        Route::get('/banners', [BannerController::class, 'index'])->name('banner.list');
        Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

        Route::get('pre/banner', [PreBannerController::class, 'index'])->name('pre.banner.list');
        Route::match(['get','post'],'/pre-banner/{id?}', [PreBannerController::class, 'store']);

        Route::delete('pre/banner/{id}', [PreBannerController::class, 'destroy'])->name('pre.banner.destroy');

        Route::get('pre/explore', [PreExploreController::class, 'index'])->name('pre.explore.index');
        Route::get('pre/explore/create', [PreExploreController::class, 'create'])->name('pre.explore.create');
        Route::post('pre/explore', [PreExploreController::class, 'store'])->name('pre.explore.store');
        Route::delete('pre/explore/{id}', [PreExploreController::class, 'destroy'])->name('pre.explore.destroy');
        Route::get('/pre-explore/{id}/edit', [PreExploreController::class, 'edit'])->name('pre.explore.edit');
        Route::post('/pre-explore/{id}/update', [PreExploreController::class, 'update'])->name('pre.explore.update');


        Route::get('pre/choose-us', [PreWhychooseController::class, 'index'])->name('pre.choose.index');
        Route::get('pre/choose-us/create', [PreWhychooseController::class, 'create'])->name('pre.choose.create');
        Route::post('pre/choose-us', [PreWhychooseController::class, 'store'])->name('pre.choose.store');
        Route::delete('pre/choose/{id}', [PreWhychooseController::class, 'destroy'])->name('pre.choose.destroy');
        Route::get('/pre-choose/{id}/edit', [PreWhychooseController::class, 'edit'])->name('pre.choose.edit');
    //    Route::post('/pre-choose/{id}/update', [PreWhychooseController::class, 'update'])->name('pre.choose.update');
        Route::post('/pre-choose/{id}/update', [PreWhychooseController::class, 'update'])->name('pre.choose.update');

        Route::get('pre/program', [PreProgramTailoredController::class, 'index'])->name('pre.program.index');
        Route::get('pre/program/create', [PreProgramTailoredController::class, 'create'])->name('pre.program.create');
        Route::post('pre/program', [PreProgramTailoredController::class, 'store'])->name('pre.program.store');
        Route::delete('pre/program/{id}', [PreProgramTailoredController::class, 'destroy'])->name('pre.program.destroy');
        Route::get('/pre-program/{id}/edit', [PreProgramTailoredController::class, 'edit'])->name('pre.program.edit');
        Route::post('/pre-program/{id}/update', [PreProgramTailoredController::class, 'update'])->name('pre.program.update');

        Route::get('pre/safety', [PreChildSafetyController::class, 'index'])->name('pre.safety.index');
        Route::get('pre/safety/create', [PreChildSafetyController::class, 'create'])->name('pre.safety.create');
        Route::post('pre/safety', [PreChildSafetyController::class, 'store'])->name('pre.safety.store');
        Route::delete('pre/safety/{id}', [PreChildSafetyController::class, 'destroy'])->name('pre.safety.destroy');
        Route::get('/pre-safety/{id}/edit', [PreChildSafetyController::class, 'edit'])->name('pre.safety.edit');
        Route::post('/pre-safety/{id}/update', [PreChildSafetyController::class, 'update'])->name('pre.safety.update');


        //PreBannerController
        Route::get('daycare/banner', [DaycareBannerController::class, 'index'])->name('daycare.banner.list');
        Route::match(['get','post'],'/daycare-banner/{id?}', [DaycareBannerController::class, 'store']);
        Route::delete('pre/banner/{id}', [DaycareBannerController::class, 'destroy'])->name('daycare.banner.destroy');

        Route::get('daycare/program', [DaycareProgramController::class, 'index'])->name('daycare.program.index');
        Route::get('daycare/program/create', [DaycareProgramController::class, 'create'])->name('daycare.program.create');
        Route::post('daycare/program', [DaycareProgramController::class, 'store'])->name('daycare.program.store');
        Route::delete('daycare/program/{id}', [DaycareProgramController::class, 'destroy'])->name('daycare.program.destroy');
        Route::get('/daycare/program/{id}/edit', [DaycareProgramController::class, 'edit'])->name('daycare.program.edit');
        Route::post('/daycare/program/{id}/update', [DaycareProgramController::class, 'update'])->name('daycare.program.update');

        Route::get('daycare/choose', [DaycareWhychooseController::class, 'index'])->name('daycare.choose.index');
        Route::get('daycare/choose/create', [DaycareWhychooseController::class, 'create'])->name('daycare.choose.create');
        Route::post('daycare/choose', [DaycareWhychooseController::class, 'store'])->name('daycare.choose.store');
        Route::delete('daycare/choose/{id}', [DaycareWhychooseController::class, 'destroy'])->name('daycare.choose.destroy');
        Route::get('/daycare-choose/{id}/edit', [DaycareWhychooseController::class, 'edit'])->name('daycare.choose.edit');
        Route::post('/daycare-choose/{id}/update', [DaycareWhychooseController::class, 'update'])->name('daycare.choose.update');

        Route::get('daycare/activites', [DaycareActivitesController::class, 'index'])->name('daycare.activites.index');
        Route::get('daycare/activites/create', [DaycareActivitesController::class, 'create'])->name('daycare.activites.create');
        Route::post('daycare/activites', [DaycareActivitesController::class, 'store'])->name('daycare.activites.store');
        Route::delete('daycare/activites/{id}', [DaycareActivitesController::class, 'destroy'])->name('daycare.activites.destroy');
        Route::get('/daycare-activites/{id}/edit', [DaycareActivitesController::class, 'edit'])->name('daycare.activites.edit');
        Route::post('/daycare-activites/{id}/update', [DaycareActivitesController::class, 'update'])->name('daycare.activites.update');


        Route::get('daycare/schedule', [DaycareScheduleController::class, 'index'])->name('daycare.schedule.index');
        Route::get('daycare/schedule/create', [DaycareScheduleController::class, 'create'])->name('daycare.schedule.create');
        Route::post('daycare/schedule', [DaycareScheduleController::class, 'store'])->name('daycare.schedule.store');
        Route::delete('daycare/schedule/{id}', [DaycareScheduleController::class, 'destroy'])->name('daycare.schedule.destroy');
        Route::get('/daycare-schedule/{id}/edit', [DaycareScheduleController::class, 'edit'])->name('daycare.schedule.edit');
        Route::post('/daycare-schedule/{id}/update', [DaycareScheduleController::class, 'update'])->name('daycare.schedule.update');


        Route::get('daycare/skills', [DaycareSkillsController::class, 'index'])->name('daycare.skills.index');
        Route::get('daycare/skills/create', [DaycareSkillsController::class, 'create'])->name('daycare.skills.create');
        Route::post('daycare/skills', [DaycareSkillsController::class, 'store'])->name('daycare.skills.store');
        Route::delete('daycare/skills/{id}', [DaycareSkillsController::class, 'destroy'])->name('daycare.skills.destroy');
        Route::get('/daycare-skills/{id}/edit', [DaycareSkillsController::class, 'edit'])->name('daycare.skills.edit');
        Route::post('/daycare-skills/{id}/update', [DaycareSkillsController::class, 'update'])->name('daycare.skills.update');


        Route::get('/blogs', [BlogController::class, 'index']);
        Route::match(['get', 'post'], '/add-blog/{id?}', [BlogController::class, 'addBlog']);
        //        Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
        //        Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        //        Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
        //        Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

        Route::get('/category', [CategoryController::class, 'index'])->name('category.list');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        //Route::get('/school-category', [SchoolCategoryController::class, 'index'])->name('school-category.list');
        Route::match(['get', 'post'],'/school-category/{id?}', [SchoolCategoryController::class, 'AddCategory']);
        Route::get('/all-school-category', [SchoolCategoryController::class, 'AllSchoolCategory']);
        Route::get('/school-category/create', [SchoolCategoryController::class, 'create'])->name('school-category.create');
        Route::post('/school-category', [SchoolCategoryController::class, 'store'])->name('school-category.store');
        Route::get('/school-category/{id}/edit', [SchoolCategoryController::class, 'edit'])->name('school-category.edit');
        Route::put('/school-category/{id}', [SchoolCategoryController::class, 'update'])->name('school-category.update');
        Route::delete('/school-category/{id}', [SchoolCategoryController::class, 'destroy'])->name('school-category.destroy');

        //add Popular
        Route::match(['get', 'post'],'/popular/{id?}', [PopularController::class, 'AddPopular']);
        Route::get('/all-popular', [PopularController::class, 'AllPopular']);
        Route::get('/delete-popular/{id}', [PopularController::class, 'destroy']);

        // Why We Stand Apart
        Route::match(['get', 'post'],'/why-we-stand-apart/{id?}', [WhyWeStandApartController::class, 'AddWhyWeStandApart']);
        Route::get('/all-why-we-stand-apart', [WhyWeStandApartController::class, 'AllWhyWeStandApart']);
        Route::get('/delete-whywsapart/{id}', [WhyWeStandApartController::class, 'destroy']);

        // Testimonials
        Route::match(['get', 'post'],'/testimonial/{id?}', [TestimonialController::class, 'AddTestimonial']);
        Route::get('/all-testimonials', [TestimonialController::class, 'AllTestimonial']);
        Route::get('/delete-testimonials/{id}', [TestimonialController::class, 'destroy']);

        // Life Skills Hacks
        Route::match(['get', 'post'],'/life-skills-hacks/{id?}', [LifeSkillsHackController::class, 'AddLifeSkillsHack']);
        Route::get('/all-life-skills-hacks', [LifeSkillsHackController::class, 'AllLifeSkillsHack']);
        Route::get('/delete-testilife-skills-hacks/{id}', [LifeSkillsHackController::class, 'destroy']);
      
        Route::post('/update-content/{id?}', [LifeSkillsHackController::class, 'updateContents']);
        

        //Add Content Routes
        Route::get('/add-content-list/{id}', [LifeSkillsHackController::class, 'addcontentList'])->name('add.content.list');
        Route::get('/add-content/{id}', [LifeSkillsHackController::class, 'AddContent']);
        Route::post('/save-content/{id}', [LifeSkillsHackController::class, 'saveContents']);
        Route::post('/update-content/{id?}', [LifeSkillsHackController::class, 'updateContents']);
        Route::get('/edit-content/{id}', [LifeSkillsHackController::class, 'editContent']);
        Route::get('/edit-content/{id}', [LifeSkillsHackController::class, 'editContent']);
        Route::get('/content-delete/{id}', [LifeSkillsHackController::class, 'destroyContent'])->name('content.destroy');


        // Child Learning
        Route::match(['get', 'post'],'/child-learning/{id?}', [ChildLearningController::class, 'AddChildLearning']);
        Route::get('/all-child-learning', [ChildLearningController::class, 'AllChildLearning']);

        // Quiz Content
        Route::match(['get', 'post'],'/quiz-content/{id?}', [QuizContentController::class, 'AddQuizContent']);
        Route::get('/all-quiz-content', [QuizContentController::class, 'AllQuizContent']);

        // Quiz Content
        Route::match(['get', 'post'],'/visit-booking/{id?}', [VisitBookingController::class, 'AddVisitBooking']);
        Route::get('/all-visit-booking', [VisitBookingController::class, 'AllVisitBookings']);

        //About Us
        Route::match(['get', 'post'],'/add-about/{id?}', [AboutController::class, 'addOrUpdateAbout']);
        Route::get('/about', [AboutController::class, 'AboutContent']);

        //TeacherPage Controller
        Route::match(['get', 'post'],'/add-teacher-page/{id?}', [TeacherPageController::class, 'addOrUpdateTeacher']);
        Route::get('/teacher-page', [TeacherPageController::class, 'TeacherContent']);
        Route::match(['get', 'post'],'/teacher-why-apply-here/{id?}', [TeacherWhyApplyHereController::class, 'addWhyApplyHere']);
        Route::get('/why-apply-here', [TeacherWhyApplyHereController::class, 'WhyApplyHere']);

        // Franchise Page Controller
        Route::match(['get', 'post'],'/add-franchise/{id?}', [FranchiseController::class, 'addOrUpdateFranchise']);
        Route::get('/franchise-content', [FranchiseController::class, 'FranchiseContent']);
     
        Route::get('/faq', [FaqController::class, 'index'])->name('faq.list');
        Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
        Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
        Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
        Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
        Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

        Route::get('/common', [CommonSettingController::class, 'index'])->name('common.list');
        Route::get('/common/{id}/edit', [CommonSettingController::class, 'edit'])->name('common.edit');
        Route::put('/common/{id}', [CommonSettingController::class, 'update'])->name('common.update');
        Route::delete('/common/{id}', [CommonSettingController::class, 'destroy'])->name('common.destroy');

        Route::match(['get', 'post'], '/event/{id?}', [EventController::class, 'AddEvent']);
        Route::get('/event-list', [EventController::class, 'index']);
        Route::get('/get-event-amount/{id}', [EventController::class, 'getAmount']);
        Route::get('/delete-events/{id}', [EventController::class, 'destroy'])->name('events.delete');
//        Route::post('/event', [EventController::class, 'store'])->name('event.store');
//        Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
//        Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
//        Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');

        Route::get('/webbanner', [WebBannerController::class, 'index'])->name('webbanner.list');
        Route::get('/webbanner/create', [WebBannerController::class, 'create'])->name('webbanner.create');
        Route::post('/webbanner', [WebBannerController::class, 'store'])->name('webbanner.store');
        Route::get('/webbanner/{id}/edit', [WebBannerController::class, 'edit'])->name('webbanner.edit');
        Route::put('/webbanner/{id}', [WebBannerController::class, 'update'])->name('webbanner.update');
        Route::delete('/webbanner/{id}', [WebBannerController::class, 'destroy'])->name('webbanner.destroy');

        // role permissions
        Route::get('/all-permissions', [PermissionController::class, 'index']);
        Route::get('/add-permissions', [PermissionController::class, 'create']);
        Route::post('/save-permissions', [PermissionController::class, 'save']);
        Route::post('/update-permissions-status/{id}', [PermissionController::class, 'status']);
        Route::get('/delete-permissions/{id}', [PermissionController::class, 'destroy']);
        Route::get('/edit-permissions/{id}', [PermissionController::class, 'edit']);
        Route::post('/update-permission/', [PermissionController::class, 'update']);
        
         Route::get('/topic', [TopicController::class, 'index'])->name('topic.list');
        Route::get('/topic/create', [TopicController::class, 'create'])->name('topic.create');
        Route::post('/topic', [TopicController::class, 'store'])->name('topic.store');
        Route::get('/topic/{id}/edit', [TopicController::class, 'edit'])->name('topic.edit');
        Route::put('/topic/{id}', [TopicController::class, 'update'])->name('topic.update');
        Route::delete('/topic/{id}', [TopicController::class, 'destroy'])->name('topic.destroy');

        Route::get('/milestone', [MilestoneController::class, 'index'])->name('milestone.list');
        Route::get('/milestone/create', [MilestoneController::class, 'create'])->name('milestone.create');
        Route::post('/milestone', [MilestoneController::class, 'store'])->name('milestone.store');
        Route::get('/milestone/{id}/edit', [MilestoneController::class, 'edit'])->name('milestone.edit');
        Route::put('/milestone/{id}', [MilestoneController::class, 'update'])->name('milestone.update');
        Route::delete('/milestone/{id}', [MilestoneController::class, 'destroy'])->name('milestone.destroy');
        
        Route::get('/talkexpert', [TalkController::class, 'index'])->name('talk.list');
        
        Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.list');

        Route::get('/enquiry/{page}', [EnquiryController::class, 'index'])->name('enquiry.list');
        Route::get('/partner-school-enquiry', [EnquiryController::class, 'enquiryPartnerSchool'])->name('partner.enquiry.list');

        Route::get('/user', [UserController::class, 'index'])->name('user.list');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/school', [SchoolController::class, 'index'])->name('school.list');
        Route::get('/school/create', [SchoolController::class, 'create'])->name('school.create');
        Route::post('/school', [SchoolController::class, 'store'])->name('school.store');
        Route::get('/school/{id}/edit', [SchoolController::class, 'edit'])->name('school.edit');
        Route::post('/school/{id}', [SchoolController::class, 'update'])->name('school.update');
        Route::delete('/school/{id}', [SchoolController::class, 'destroy'])->name('school.destroy');

        Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.list');
        Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

        Route::get('/student', [StudentController::class, 'index'])->name('student.list');
        Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('/student/edit', [StudentController::class, 'store'])->name('student.store');
        Route::get('/student/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/student-save', [StudentController::class, 'update'])->name('student.update');
        Route::get('/student-delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
        Route::get('/generate-admission-id/{schoolId}', [StudentController::class, 'generateAdmissionIdAjax']);
        Route::get('/generate-student-id/{schoolId}', [StudentController::class, 'generateAjaxstudentId']);

        Route::get('/getparentdata/{parentid}', [StudentController::class, 'getParentData']);
        Route::get('/student-pay-list/{id}', [StudentController::class, 'PayList'])->name('pay.fee.list');
        Route::post('/get-amount', [StudentController::class, 'getAmount'])->name('admin.student.getamount');

        // payment Routes
        Route::post('/create-order', [PaymentController::class, 'createOrder']) ->name('studentfees.create-order'); 
        Route::get('/admin-callback', [PaymentController::class, 'callback'])->name('admin.callback');
        Route::get('/admin-confirmpay', [PaymentController::class, 'confirmpay'])->name('admin.confirmpay');

        //Activity Routes
        Route::get('/activity-pay-list/{id}', [StudentController::class, 'activityPayList'])->name('activity.pay.list');
        Route::get('/get-event/{id}', [StudentController::class, 'getEventDetails'])->name('get.event.details');
        Route::get('/get-program/{id}', [StudentController::class, 'getprogramDetails'])->name('get.program.details');

        //Daycare Routes
        Route::get('/daycare-pay-list/{id}', [StudentController::class, 'DaycarePayList'])->name('daycare.pay.list');
        Route::get('/get-daycare/{id}', [StudentController::class, 'getDaycareDetails'])->name('get.daycare.details');

        //activity  payment Routes
        Route::post('/activity/create-orders', [activityPayController::class, 'createOrder'])->name('activity.create-order');

       //activity  payment Routes
        Route::post('/daycare/create-order', [daycarePayController::class, 'createOrder'])->name('daycare.create-order');

        //transaction  list Routes
        Route::get('/transaction-list/{id}', [StudentController::class, 'TransactionList'])->name('transaction.list');


        // Role Controller
        Route::get('/all-roles', [RoleController::class, 'index'])->name('role.list');
        Route::get('/add-roles', [RoleController::class, 'create'])->name('role.create');
        Route::post('/save-roles', [RoleController::class, 'save'])->name('role.save');
        Route::get('/edit-roles/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/update-role', [RoleController::class, 'update'])->name('role.update');
        Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('role.delete');
        Route::get('/status-change', [RoleController::class, 'status'])->name('role.status');
        Route::get('/get-routes', [RoleController::class, 'getRoutes'])->name('roles.getRoutes');

        //add Packages
        Route::match(['get', 'post'],'/package/{id?}', [PackageController::class, 'AddPackage']);
        Route::get('/all-package', [PackageController::class, 'AllPackage']);

        Route::get('/shifts', [ShiftsController::class, 'index'])->name('shift.list');
        Route::get('/shifts/create', [ShiftsController::class, 'create'])->name('shift.create');
        Route::post('/shifts', [ShiftsController::class, 'store'])->name('shift.store');
        Route::get('/shifts/{id}/edit', [ShiftsController::class, 'edit'])->name('shift.edit');
        Route::put('/shifts/{id}', [ShiftsController::class, 'update'])->name('shift.update');
        Route::delete('/shifts/{id}', [ShiftsController::class, 'destroy'])->name('shift.destroy');

        Route::get('/academic-years', [AcademicYearController::class, 'index'])->name('academic.list');
        Route::get('/academic-years/create', [AcademicYearController::class, 'create'])->name('academic.create');
        Route::post('/academic-years', [AcademicYearController::class, 'store'])->name('academic.store');
        Route::get('/academic-years/{id}/edit', [AcademicYearController::class, 'edit'])->name('academic.edit');
        Route::put('/academic-years/{id}', [AcademicYearController::class, 'update'])->name('academic.update');
        Route::delete('/academic-years/{id}', [AcademicYearController::class, 'destroy'])->name('academic.destroy');

        Route::get('/webcontent', [WebcontentController::class, 'index'])->name('webcontent.list');
        Route::get('/webcontent/create', [WebcontentController::class, 'create'])->name('webcontent.create');
        Route::post('/webcontent', [WebcontentController::class, 'store'])->name('webcontent.store');

        Route::get('/all-quiz', [QuizQuestionController::class, 'index'])->name('quiz.list');
        Route::get('/quiz/create', [QuizQuestionController::class, 'create'])->name('quiz.create');
        Route::post('/quiz', [QuizQuestionController::class, 'store'])->name('quiz.store');
        Route::get('/quiz/{id}/edit', [QuizQuestionController::class, 'edit'])->name('quiz.edit');
        Route::put('/quiz/{id}', [QuizQuestionController::class, 'update'])->name('quiz.update');
        Route::delete('/quiz/{id}', [QuizQuestionController::class, 'destroy'])->name('quiz.destroy');

        // Usp details routes        
        Route::get('/all-usp-detals', [UspDetailsController::class, 'index'])->name('usp.detail.list');
        Route::get('/add-usp-detail', [UspDetailsController::class, 'create'])->name('usp.detail.create');
        Route::post('/save-usp-detail', [UspDetailsController::class, 'store'])->name('usp.detail.store');
        Route::get('/edit-usp-detail/{id}', [UspDetailsController::class, 'edit'])->name('usp.detail.edit');
        Route::post('/update-usp-detail/{id}', [UspDetailsController::class, 'update'])->name('usp.detail.update');
        Route::delete('/delete-usp-detail/{id}', [UspDetailsController::class, 'destroy'])->name('usp.detail.destroy');

        // Product Routes
        Route::get('/all-products', [ProductController::class, 'index'])->name('product.list');
        Route::get('/add-products', [ProductController::class, 'create'])->name('product.add');
        Route::Post('/save-products', [ProductController::class, 'save'])->name('product.post');
        Route::get('/edit-products/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('update-products', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

         // Kit Routes
        Route::get('/all-kits', [KitController::class, 'index'])->name('kit.list');
        Route::get('/add-kits', [KitController::class, 'create'])->name('kit.add');
        Route::Post('/save-kits', [KitController::class, 'save'])->name('kit.post');
        Route::get('/edit-kits/{id}', [KitController::class, 'edit'])->name('kit.edit');
        Route::post('update-kits', [KitController::class, 'update'])->name('kit.update');
        Route::get('/delete-kits/{id}', [KitController::class, 'destroy'])->name('kit.delete');

         // programme Routes
        Route::get('/all-programmes', [ProgrammeController::class, 'index'])->name('programme.list');
        Route::get('/add-programmes', [ProgrammeController::class, 'create'])->name('programme.add');
        Route::Post('/save-programmes', [ProgrammeController::class, 'save'])->name('programme.post');
        Route::get('/edit-programmes/{id}', [ProgrammeController::class, 'edit'])->name('programme.edit');
        Route::post('update-programmes', [ProgrammeController::class, 'update'])->name('programme.update');
        Route::get('/delete-programmes/{id}', [ProgrammeController::class, 'destroy'])->name('programme.delete');

         // programme Routes
        Route::get('/all-daycare', [DaycareRegisterController::class, 'index'])->name('daycare.feature.list');
        Route::get('/add-daycare', [DaycareRegisterController::class, 'create'])->name('daycare.feature.create');
        Route::post('/save-daycare', [DaycareRegisterController::class, 'store'])->name('daycare.feature.store');
        Route::get('/edit-daycare/{id}', [DaycareRegisterController::class, 'edit'])->name('daycare.feature.edit');
        Route::post('/update-daycare/{id}', [DaycareRegisterController::class, 'update'])->name('daycare.feature.update');
        Route::delete('/delete-daycare/{id}', [DaycareRegisterController::class, 'destroy'])->name('daycare.feature.destroy');
         
        // progress gols  routes
        Route::get('/all-progress-goals', [ProgressGoalController::class, 'index'])->name('progress-goals.index');
        Route::get('/add-progress-goal', [ProgressGoalController::class, 'create'])->name('progress-goals.create');
        Route::post('/save-progress-goal', [ProgressGoalController::class, 'store'])->name('progress-goals.store');
        Route::get('/edit-progress-goal/{id}', [ProgressGoalController::class, 'edit'])->name('progress-goals.edit');
        Route::post('/update-progress-goal/{id}', [ProgressGoalController::class, 'update'])->name('progress-goals.update');
        Route::delete('/delete-progress-goal/{id}', [ProgressGoalController::class, 'destroy'])->name('progress-goals.destroy');
        
           // Packages service routes
        Route::get('/all-package-services', [PackageServiceController::class, 'index'])->name('package-services.index');
        Route::get('/add-package-service', [PackageServiceController::class, 'create'])->name('package-services.create');
        Route::post('/save-package-service', [PackageServiceController::class, 'store'])->name('package-services.store');
        Route::get('/edit-package-service/{id}', [PackageServiceController::class, 'edit'])->name('package-services.edit');
        Route::post('/update-package-service/{id}', [PackageServiceController::class, 'update'])->name('package-services.update');
        Route::delete('/delete-package-service/{id}', [PackageServiceController::class, 'destroy'])->name('package-services.destroy');

        // Event Packages routes
        Route::get('/all-event-packages', [EventPackageController::class, 'index'])->name('event-packages.index');
        Route::get('/add-event-package', [EventPackageController::class, 'create'])->name('event-packages.create');
        Route::post('/save-event-package', [EventPackageController::class, 'store'])->name('event-packages.store');
        Route::get('/edit-event-package/{id}', [EventPackageController::class, 'edit'])->name('event-packages.edit');
        Route::post('/update-event-package/{id}', [EventPackageController::class, 'update'])->name('event-packages.update');
        Route::delete('/delete-event-package/{id}', [EventPackageController::class, 'destroy'])->name('event-packages.destroy');

        
        // Product Routes
        Route::get('/all-sub-topics', [SubTopicController::class, 'index'])->name('sub.topic.list');
        Route::get('/add-sub-topics', [SubTopicController::class, 'create'])->name('sub.topic.add');
        Route::Post('/save-sub-topics', [SubTopicController::class, 'save'])->name('sub.topic.post');
        Route::get('/edit-sub-topics/{id}', [SubTopicController::class, 'edit'])->name('sub.topic.edit');
        Route::post('update-sub-topics', [SubTopicController::class, 'update'])->name('sub.topic.update');
        Route::get('/delete-sub-topics/{id}', [SubTopicController::class, 'destroy'])->name('sub.topic.delete');
        Route::get('/get-topics-by-age/{popular_id}', [SubTopicController::class, 'getTopicsByAge']);
        Route::get('/get-subtopics-by-topic/{id}', [SubTopicController::class, 'getSubTopicsByTopic']);

        // Habit Routes
        Route::get('/all-habits', [HabitController::class, 'index'])->name('habit.list');
        Route::get('/add-habits', [HabitController::class, 'create'])->name('habit.add');
        Route::Post('/save-habits', [HabitController::class, 'save'])->name('habit.post');
        Route::get('/edit-habits/{id}', [HabitController::class, 'edit'])->name('habit.edit');
        Route::post('update-habits', [HabitController::class, 'update'])->name('habit.update');
        Route::get('/delete-habits/{id}', [HabitController::class, 'destroy'])->name('habit.delete');

        // Seo Routes
        Route::get('/seo', [SeoController::class, 'index'])->name('seo.list');
        Route::get('/seo/create', [SeoController::class, 'create'])->name('seo.create');
        Route::post('/add-seo', [SeoController::class, 'store'])->name('seo.store');
        Route::get('/seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
        Route::put('/seo/{id}', [SeoController::class, 'update'])->name('seo.update');
        Route::delete('/seo/{id}', [SeoController::class, 'destroy'])->name('seo.destroy');

        // Specialized Class Routes
        Route::match(['get', 'post'], '/specialized-class/{id?}', [SpecializedClassController::class, 'AddClass']);
        Route::get('/specialized-class-list', [SpecializedClassController::class, 'index'])->name('specialized-class-list');
        Route::delete('/specialized-class-list/{id}', [SpecializedClassController::class, 'destroy'])->name('specialized.destroy');

        // Transaction list Routes
        Route::get('/kits-transaction', [TransactionController::class, 'getkitorder'])->name('kit.transaction');
        Route::get('/kits-invoice/{id}', [TransactionController::class, 'kitinvoice'])->name('kit.invoice');
        Route::get('/events-transaction', [TransactionController::class, 'getEventorder'])->name('event.transaction');
        Route::get('/events-invoice/{id}', [TransactionController::class, 'Eventinvoice'])->name('event.invoice');
        Route::get('/fee-transaction', [TransactionController::class, 'getStudentFee'])->name('fee.transaction');
        Route::get('/fee-invoice/{id}', [TransactionController::class, 'Feetinvoice'])->name('fee.invoice');


        //Pre Reg Banner Routes
        Route::get('/all-prereg-banner', [PreRegistrationBannerController::class, 'index'])->name('pre.banner.list');
        Route::get('/add-prereg-banner', [PreRegistrationBannerController::class, 'create'])->name('pre.banner.add');
        Route::post('/save-prereg-banner', [PreRegistrationBannerController::class, 'store'])->name('pre.banner.store');
        Route::get('/edit-prereg-banner/{id}', [PreRegistrationBannerController::class, 'edit'])->name('pre.banner.edit');
        Route::post('/update-pre-banner', [PreRegistrationBannerController::class, 'update'])->name('pre.banner.update');
        Route::get('/delete-prebanner/{id}', [PreRegistrationBannerController::class, 'destroy'])->name('pre.banner.delete');

        // Progress report route
        Route::get('/progress-reports-list/{id}', [ProgressReportController::class, 'index'])->name('progress-reports.list');
        Route::delete('/progress-reports/{id}', [ProgressReportController::class, 'destroy'])->name('progress-reports.destroy');
        Route::get('/progress-reports-details/{id}', [ProgressReportController::class, 'progressdetails'])->name('progress-reports.show');
        // Route::get('/progress-report/{id}', [ProgressReportController::class, 'downloadReport'])->name('progress.download');
        Route::post('/save-pdf', [ProgressReportController::class, 'savePdf']);

        // remark report route
        Route::get('/remarks-list/{id?}', [RemarkController::class, 'index'])->name('remarks.index');
        Route::delete('/remarks/{id}', [RemarkController::class, 'destroy'])->name('remarks.destroy');


        //Our Program
        Route::get('/all-our-programs', [OurProgramController::class, 'index'])->name('our-program.list');
        Route::get('/add-our-program', [OurProgramController::class, 'create'])->name('our-program.create');
        Route::post('/save-our-program', [OurProgramController::class, 'store'])->name('our-program.store');
        Route::get('/edit-our-program/{id}', [OurProgramController::class, 'edit'])->name('our-program.edit');
        Route::post('/update-our-program/{id}', [OurProgramController::class, 'update'])->name('our-program.update');
        Route::get('/delete-our-program/{id}', [OurProgramController::class, 'destroy'])->name('our-program.destroy');

        // Partner School Routes
        Route::get('/partner-school', [PartnerSchoolController::class, 'index'])->name('partner.school.list');
        Route::get('/school/partner-school-create', [PartnerSchoolController::class, 'create'])->name('partner.school.create');
        Route::post('/partner-school', [PartnerSchoolController::class, 'store'])->name('partner.school.store');
        Route::get('/school/{id}/partner-edit', [PartnerSchoolController::class, 'edit'])->name('partner.school.edit');
        Route::post('/partner-school/{id}', [PartnerSchoolController::class, 'update'])->name('partner.school.update');
        Route::delete('/partner-school/{id}', [PartnerSchoolController::class, 'destroy'])->name('partner.school.destroy');

         //Banner Routes
        Route::get('/partner-school-all-banner', [PartnerSchoolController::class, 'Partnerindex'])->name('partner.banner.list');
        Route::get('/partner-school-add-banner', [PartnerSchoolController::class, 'Partnercreate'])->name('partner.banner.add');
        Route::Post('/partner-school-save-banner', [PartnerSchoolController::class, 'Partnersave'])->name('partner.banner.post');
        Route::get('/partner-school-edit-banner/{id}', [PartnerSchoolController::class, 'Partneredit'])->name('partner.banner.edit');
        Route::post('/partner-school-update-banner', [PartnerSchoolController::class, 'Partnerupdate'])->name('partner.banner.update');
        Route::get('/partner-school-delete-banner/{id}', [PartnerSchoolController::class, 'Partnerdestroy'])->name('partner.banner.delete');


        //gallery Routes
        Route::get('/partner-school-all-gallery', [PartnerSchoolController::class, 'galleryindex'])->name('partner.gallery.list');
        Route::get('/partner-school-add-gallery', [PartnerSchoolController::class, 'gallerycreate'])->name('partner.gallery.add');
        Route::Post('/partner-school-save-gallery', [PartnerSchoolController::class, 'gallerysave'])->name('partner.gallery.post');
        Route::get('/partner-school-edit-gallery/{id}', [PartnerSchoolController::class, 'galleryedit'])->name('partner.gallery.edit');
        Route::post('partner-school-update-gallery', [PartnerSchoolController::class, 'galleryupdate'])->name('partner.gallery.update');
        Route::get('/partner-school-delete-gallery/{id}', [PartnerSchoolController::class, 'gallerydestroy'])->name('partner.gallery.delete');

        //Facility Routes
        Route::get('/partner-school-all-facility', [PartnerSchoolController::class, 'facilityindex'])->name('partner.facility.list');
        Route::get('/partner-school-add-facility', [PartnerSchoolController::class, 'facilitycreate'])->name('partner.facility.add');
        Route::Post('/partner-school-save-facility', [PartnerSchoolController::class, 'facilitysave'])->name('partner.facility.post');
        Route::get('/partner-school-edit-facility/{id}', [PartnerSchoolController::class, 'facilityedit'])->name('partner.facility.edit');
        Route::post('partner-school-update-facility', [PartnerSchoolController::class, 'facilityupdate'])->name('partner.facility.update');
        Route::get('/partner-school-delete-facility/{id}', [PartnerSchoolController::class, 'facilitydestroy'])->name('partner.facility.delete');

        //About us Routes
        Route::get('/partner-school-all-about-us', [PartnerSchoolController::class, 'aboutusindex'])->name('partner.aboutus.list');
        Route::get('/partner-school-add-about-us', [PartnerSchoolController::class, 'aboutuscreate'])->name('partner.aboutus.add');
        Route::Post('/partner-school-save-about-us', [PartnerSchoolController::class, 'aboutusstore'])->name('partner.aboutus.post');
        Route::get('/partner-school-about-us/{id}', [PartnerSchoolController::class, 'aboutusedit'])->name('partner.aboutus.edit');
        Route::post('/partner-school-update-about-us', [PartnerSchoolController::class, 'aboutusupdate'])->name('partner.aboutus.update');
        Route::get('/partner-school-delete-about-us/{id}', [PartnerSchoolController::class, 'aboutusdestroy'])->name('partner.aboutus.delete');


        // Notifications 
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notification.list');
        Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notification.create');
        Route::post('/notifications/save', [NotificationController::class, 'store'])->name('notification.store');
        Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notification.edit');
        Route::post('/notifications/update', [NotificationController::class, 'update'])->name('notification.update');
        Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    });
});

 Route::prefix('school')->group(function () {
    Route::get('/login-form', [SchoolController::class, 'signin'])->name('school.login');
    Route::post('/login', [AuthController::class, 'login'])->name('school.post');
 });

//  School Routes
Route::middleware(['school'])->group(function () {
    Route::prefix('school')->group(function () {
    Route::get('/dashboard', [SchoolController::class, 'dashboard'])->name('school.dashboard');
    Route::get('/profile', [SchoolController::class, 'Profile'])->name('school.profile');
    Route::post('/update-profile/{id}', [AuthController::class, 'updateProfile'])->name('update.profile');
   
    // Student Routes
    Route::get('/all-students', [StudentController::class, 'studentList'])->name('school.student.list');
    Route::get('/add-students', [StudentController::class, 'studentAddForm'])->name('school.student.add');
    Route::Post('/save-students', [StudentController::class, 'studentPostForm'])->name('school.student.post');
    Route::get('/edit-students/{id}', [StudentController::class, 'studentEditForm'])->name('school.student.edit');
    Route::post('update-students', [StudentController::class, 'studentUpdateForm'])->name('school.student.update');
    Route::get('/delete-student/{id}', [StudentController::class, 'destroyStudent'])->name('student.delete');
    Route::get('/details', [StudentController::class, 'show'])->name('school.student.show');
    Route::get('/get-topics-by-age/{popular_id}', [SubTopicController::class, 'getTopicsByAge']);
    Route::get('/get-subtopics-by-topic/{id}', [SubTopicController::class, 'getSubTopicsByTopic']);
    // Route::post('/get-amount', [StudentController::class, 'getAmount'])->name('school.student.getamount');

    Route::post('/get-amount', [StudentController::class, 'getAmount'])->name('student.getamount');
    Route::get('/pay-list/{id}', [StudentController::class, 'studentPayList'])->name('student.pay.fee.list');
    Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('school.student.create-order');
    Route::get('/callback', [PaymentController::class, 'callback'])->name('callback');
    Route::get('/confirmpay', [PaymentController::class, 'confirmpay'])->name('confirmpay');
    Route::get('/details', [StudentController::class, 'show'])->name('school.student.show');
 
    //Collect Fee Routes
    Route::get('/collect-fee-receipt', [FeesController::class, 'collectfeeAdd'])->name('school.collect.fee.add');
    Route::post('/create-order-collect-fee', [FeesController::class, 'createOrdercollectfee'])->name('collect.fee.create-order');
    Route::get('/collected-fee', [FeesController::class, 'collectfeeList'])->name('collect.fee.list');
    Route::get('/student-invoice-details/{id}', [FeesController::class, 'invoiceDetails'])->name('collect.fee.invoice');
    Route::get('/callback-collect-fee', [FeesController::class, 'callback'])->name('callback.collected.fee');

    //Student Attendance routes
    Route::get('/student-attendance', [AttendanceController::class, 'ShowStudent'])->name('student.attendance');
    Route::post('save-attendance', [AttendanceController::class, 'store'])->name('attendance.store'); 
    Route::get('/student-attendance-report', [AttendanceController::class, 'studentattReport'])->name('student.attendance.report');
    Route::get('/teacher-attendance-report', [AttendanceController::class, 'teacherattReport'])->name('teacher.attendance.report');

     
    // Roles Routes
    Route::get('/all-role', [RoleController::class, 'schoolroleIndex'])->name('school.role.list');
    Route::get('/add-role', [RoleController::class, 'scoolrolecreate'])->name('school.role.create');
    Route::post('/save-role', [RoleController::class, 'scoolroleSave'])->name('school.role.save');
    Route::get('/edit-role/{id}', [RoleController::class, 'SchoolroleEdit'])->name('school.role.edit');
    Route::post('/update-role', [RoleController::class, 'schoolroleUpdate'])->name('school.role.update');
    Route::get('/delete-roles/{id}', [RoleController::class, 'schoolroledestroy'])->name('school.role.delete');
    Route::get('/school-status-change', [RoleController::class, 'schoolroleStatus'])->name('school.role.status');
    Route::get('/school-get-routes', [RoleController::class, 'schoolroleGetRoutes'])->name('school.roles.getRoutes');
    Route::get('/generate-admission-id/{schoolId}', [StudentController::class, 'generateAdmissionIdAjax']);
    Route::get('/getparentdata/{parentid}', [StudentController::class, 'getParentData']);


    // Setting routes
    Route::get('/school-settings', [CommonSettingController::class, 'showSchoolsetting'])->name('school.setting');
    Route::post('/update-setting', [CommonSettingController::class, 'updatesetting'])->name('update.setting');
     
    
    //Activity Routes
    Route::get('/activity-pay-list/{id}', [StudentController::class, 'activityPayList'])->name('school.activity.pay.list');
    Route::get('/get-event/{id}', [StudentController::class, 'getEventDetails'])->name('school.get.event.details');
    Route::get('/get-program/{id}', [StudentController::class, 'getprogramDetails'])->name('school.get.program.details');

    //Daycare Routes
    Route::get('/daycare-pay-list/{id}', [StudentController::class, 'DaycarePayList'])->name('school.daycare.pay.list');
    Route::get('/get-daycare/{id}', [StudentController::class, 'getDaycareDetails'])->name('school.get.daycare.details');


    // //activity  payment Routes
    Route::post('/activity/create-order', [activityPayController::class, 'createOrder'])->name('school.create-order');
    

    //activity  payment Routes
    Route::post('/daycare/create-order', [daycarePayController::class, 'createOrder'])->name('school.daycare.create-order');

    //transaction  list Routes
    Route::get('/transaction-list/{id}', [StudentController::class, 'TransactionList'])->name('school.transaction.list');

    //school Screen Details  Routes
    //Banner Routes
    Route::get('/all-banner', [SchoolBannerController::class, 'index'])->name('school.banner.list');
    Route::get('/add-banner', [SchoolBannerController::class, 'create'])->name('school.banner.add');
    Route::Post('/save-banner', [SchoolBannerController::class, 'save'])->name('school.banner.post');
    Route::get('/edit-banner/{id}', [SchoolBannerController::class, 'edit'])->name('school.banner.edit');
    Route::post('update-banner', [SchoolBannerController::class, 'update'])->name('school.banner.update');
    Route::get('/delete-banner/{id}', [SchoolBannerController::class, 'destroy'])->name('school.banner.delete');

    //gallery Routes
    Route::get('/all-gallery', [SchoolGalleryController::class, 'index'])->name('school.gallery.list');
    Route::get('/add-gallery', [SchoolGalleryController::class, 'create'])->name('school.gallery.add');
    Route::Post('/save-gallery', [SchoolGalleryController::class, 'save'])->name('school.gallery.post');
    Route::get('/edit-gallery/{id}', [SchoolGalleryController::class, 'edit'])->name('school.gallery.edit');
    Route::post('update-gallery', [SchoolGalleryController::class, 'update'])->name('school.gallery.update');
    Route::get('/delete-gallery/{id}', [SchoolGalleryController::class, 'destroy'])->name('school.gallery.delete');

    //About us Routes
    Route::get('/about-us/{id?}', [SchoolAboutusController::class, 'edit'])->name('school.about-us.edit');
    Route::post('/update-about-us', [SchoolAboutusController::class, 'update'])->name('school.about-us.update');


    //Facility Routes
    Route::get('/all-facility', [SchoolfacilityController::class, 'index'])->name('school.facility.list');
    Route::get('/add-facility', [SchoolfacilityController::class, 'create'])->name('school.facility.add');
    Route::Post('/save-facility', [SchoolfacilityController::class, 'save'])->name('school.facility.post');
    Route::get('/edit-facility/{id}', [SchoolfacilityController::class, 'edit'])->name('school.facility.edit');
    Route::post('update-facility', [SchoolfacilityController::class, 'update'])->name('school.facility.update');
    Route::get('/delete-facility/{id}', [SchoolfacilityController::class, 'destroy'])->name('school.facility.delete');

    // teacher leaves
    Route::get('/teacher-leaves', [TeacherAttendanceController::class, 'teacherleave'])->name('teacher.leaves');
    Route::put('teacher-leaves/{id}', [TeacherAttendanceController::class, 'managestatus'])->name('teacher-leaves.status');
    
    //Teacher Attendance routes
    Route::get('/teacher-attendance', [AttendanceController::class, 'ShowTeacher'])->name('teacher.attendance');
    Route::post('teacher-attendance', [AttendanceController::class, 'storeTeacher'])->name('attendance.teacher.store'); 

    //Progress Route
    Route::get('/progress-reports-list/{id}', [ProgressReportController::class, 'progresslist'])->name('school.progress.reports.list');
    Route::get('/progress-reports-details/{id}', [ProgressReportController::class, 'details'])->name('school.progress-reports.show');
    Route::delete('/progress-reports/{id}', [ProgressReportController::class, 'progressdestroy'])->name('school.progress-reports.destroy');
    
    //Remarks routes
    Route::get('/remarks/{id}', [RemarkController::class, 'remarklist'])->name('school.remarks.index');
    Route::get('/remarksdetails/{id}', [RemarkController::class, 'details'])->name('school.remarks.show');
    Route::delete('/remark/{id}', [RemarkController::class, 'remarkdestroy'])->name('school.remark.destroy');

    // teacher routes
    Route::get('/teacher', [TeacherController::class, 'indexTeacher'])->name('school.teacher.list');
    Route::get('/teacher/create', [TeacherController::class, 'createTeacher'])->name('school.teacher.create');
    Route::post('/teacher', [TeacherController::class, 'storeTeacher'])->name('school.teacher.store');
    Route::get('/teacher/{id}/edit', [TeacherController::class, 'editTeacher'])->name('school.teacher.edit');
    Route::post('/teacher/{id}', [TeacherController::class, 'updateTeacher'])->name('school.teacher.update');
    Route::delete('/teacher/{id}', [TeacherController::class, 'destroyTeacher'])->name('school.teacher.destroy');  
    
    // Financial Report Report
    Route::get('/financial-report', [FinancialReportController::class, 'show'])->name('school.financial.report');

    });
});


Route::prefix('teacher')->group(function () {
    Route::get('/login-form', [TeacherController::class, 'signin'])->name('teacher.login');
    Route::post('/login', [AuthController::class, 'login'])->name('teacher.post');
});

Route::middleware(['teacher'])->group(function () {
    Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/profile', [TeacherController::class, 'Profile'])->name('teacher.profile');
    Route::post('/update-profile/{id}', [AuthController::class, 'updateProfile'])->name('techer.update.profile'); 
    });
});


Route::prefix('marketing')->group(function () {
    Route::get('/login-form', [AuthController::class, 'signin'])->name('marketing.loginform');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
});
//  marketing  Routes
Route::middleware(['marketing'])->group(function () {
    Route::prefix('marketing')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('marketing.dashboard');
    Route::get('/profile', [HomeController::class, 'edit'])->name('marketing.profile.edit');
    Route::post('edit/{id}', [HomeController::class, 'update'])->name('marketing.update');
     // Seo Routes
    Route::get('/seo', [SeoController::class, 'index'])->name('marketing.seo.list');
    Route::get('/seo/create', [SeoController::class, 'create'])->name('marketing.seo.create');
    Route::post('/add-seo', [SeoController::class, 'store'])->name('marketing.seo.store');
    Route::get('/seo/{id}/edit', [SeoController::class, 'edit'])->name('marketing.seo.edit');
    Route::put('/seo/{id}', [SeoController::class, 'update'])->name('marketing.seo.update');
    Route::delete('/seo/{id}', [SeoController::class, 'destroy'])->name('marketing.seo.destroy');

});
});

