<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\SchoolCategory;
use App\Models\Popular;
use App\Models\About;
use App\Models\Milestone;
use App\Models\TeacherPage;
use App\Models\QuizContent;
use App\Models\VisitBooking;
use App\Models\ChildLearning;
use App\Models\WhyWeStandApart;
use App\Models\LifeSkillsHack;
use App\Models\Event;
use App\Models\Franchise;
use App\Models\TeacherWhyApplyHere;
use App\Models\PreBanner;
use App\Models\PreExplore;
use App\Models\PreChildSafety;
use App\Models\PreProgramTailored;
use App\Models\PreWhychoose;
use App\Models\daycare_banner;
use App\Models\daycare_whychoose;
use App\Models\daycare_schedule;
use App\Models\daycare_program;
use App\Models\daycare_activites;
use App\Models\daycare_skills;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\WebBanner;
use App\Models\UspDetails;
 
use App\Models\Webcontent;
use App\Models\QuizQuestion;
use App\Models\School;

class HomeController extends Controller
{

    public function index()
    {
        $title = "Home Page";
        $nav = "home-page";
        $web_banner = WebBanner::where('status', 1)->get();
        $categories = SchoolCategory::where('status', 1)->get();
        $populars = Popular::where('status', 1)->orderBy('id', 'ASC')->get();
        $standApart = WhyWeStandApart::where('status', 1)->get();
        $events = Event::where('status', 1)->get();
        $quizContents = QuizContent::where('status', '1')->first();
        $visitBookings = VisitBooking::where('status', '1')->first();
        $child_learning = ChildLearning::where('status', '1')->first();
        $hacks = LifeSkillsHack::where('status', '1')->get();
        $milestones = Milestone::where('status', '1')->where('popular_id','1')->get();

        $feesdata = Popular::where('status', 1)->where('id',1)->first();


        $franchises = Franchise::where('status', '1')->get();
        $webcontents = Webcontent::where('status', '1')->orderBy('id', 'desc')->first();



        $faq_categories = DB::table('categories')
            ->where('status', 1)
            ->whereNotIn('name', ['Teacher Page'])
            ->get();

        $faqs = DB::table('faqs')
            ->where('status', 1)
            ->get()
            ->groupBy('category_id');
        return view('web.index', compact('title', 'nav', 'categories', 'webcontents', 'hacks', 'populars','standApart','events', 'quizContents','visitBookings', 'child_learning', 'faq_categories', 'faqs', 'web_banner','milestones','franchises','feesdata'));

    }
    
    
    public function popular_for_you(Request $request){
        // echo "test";die;
        $title = "Home Page";
        $nav = "home-page";
        $populars = Popular::where('status', 1)->orderBy('id', 'ASC')->get();
        $feesdata = Popular::where('status', 1)->where('id',$request->popularid)->first();
        if (!empty($request->all())) {
            
            $milestones = Milestone::where('status', '1')->where('popular_id',$request->popularid)->get();
        
        } else {
        
            $milestones = Milestone::where('status', '1')->where('popular_id','1')->get();
        
        }
       return view('web.popular-for-you', compact('title', 'nav', 'milestones', 'populars','feesdata'));
    }

    public function AboutUs()
    {
        $title = "About Us";
        $nav = "about-us";
        $gallery = Gallery::where('type','image')->get();

        $about = About::where('status', 1)->first();
        return view('web.about', compact('title', 'nav', 'about', 'gallery'));
    }

    public function usp()
    {
        $title = "usp";
        $nav = "usp";
        $data = UspDetails::where('status', 1)->first();
        return view('web.usp', compact('title', 'nav', 'data'));
    }

    public function thankyou()
    {
        $title = "Thank You";
        $nav = "thankyou";
        return view('web.thankyou', compact('title', 'nav'));
    }

    public function privacy_policy()
    {
        $title = "privacy_policy";
        $nav = "privacy_policy";
        return view('web.privacy-policy', compact('title', 'nav'));
    }

    public function refund_policy()
    {
        $title = "refund_policy";
        $nav = "refund_policy";
        return view('web.refund-policy', compact('title', 'nav'));
    }

    public function terms_and_condition()
    {
        $title = "terms_and_condition";
        $nav = "terms_and_condition";
        return view('web.terms-and-condition', compact('title', 'nav'));
    }

    public function Teachers()
    {
        $title = "Teachers";
        $nav = "teachers";

        $teacher = TeacherPage::where('status', 1)->first();
        $description = $teacher->description ?? '';

        // Extract <li> items from HTML
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($description);
        libxml_clear_errors();

        $heading = '';
        $h3s = $dom->getElementsByTagName('h3');
        if ($h3s->length > 0) {
            $heading = trim($h3s->item(0)->textContent);
        }

        $steps = [];
        foreach ($dom->getElementsByTagName('li') as $li) {
            $steps[] = trim($li->textContent);
        }

        $data = TeacherWhyApplyHere::where(['status' => '1', 'type' => 'teacher'])->get();

        $teacherCategory = DB::table('categories')
            ->where('name', 'Teacher Page')
            ->where('status', 1)
            ->first();

        // If category found, fetch its FAQs
        $faqs = [];
        if ($teacherCategory) {
            $faqs = DB::table('faqs')
                ->where('category_id', $teacherCategory->id)
                ->where('status', 1)
                ->get();
        }

        return view('web.teachers', compact('title', 'nav', 'teacher', 'data','heading', 'steps', 'faqs'));
    }

    public function Franchise()
    {
        $title = "Franchise";
        $nav = "franchise";
        $franchise = Franchise::where('status', 1)->first();
        $data = TeacherWhyApplyHere::where(['status' => '1','type' => 'franchise'])->get();
        $blogs = Blog::where(['status' => '1'])->get();
        return view('web.franchise', compact('title','blogs', 'nav', 'franchise', 'data'));
    }

    public function Blog()
    {
        $title = "Blog";
        $nav = "blog";
        $franchise = Franchise::where('status', 1)->first();
        $blogs = Blog::where(['status' => '1'])->get();
        return view('web.blog', compact('title','blogs', 'nav', 'franchise'));
    }

    public function BlogDetails()
    {
        $title = "Blog-Details";
        $nav = "blog-details";
        $franchise = Franchise::where('status', 1)->first();
        $blogs = Blog::where(['status' => '1'])->get();
        return view('web.blog-details', compact('title','blogs', 'nav', 'franchise'));
    }

    public function pre_school()
    {
        $title = "preschool";
        $nav = "preschool";
        $populars = Popular::where('status', 1)->orderBy('id', 'ASC')->get();
        $milestones = Milestone::where('status', '1')->where('popular_id','1')->get();
        $banner = PreBanner::where('status', 1)->latest()->first();
        $explore= PreExplore::where('status', 1)->latest()->first();
        $safety = PreChildSafety::where('status', 1)->get();
        $program = PreProgramTailored::where('status', 1)->get();
        $choose = PreWhychoose::where('status', 1)->latest()->first();
        $gallery = Gallery::get();
        return view('web.preschool', compact('title', 'nav', 'banner', 'explore','program','choose', 'milestones','populars','safety'));
    }

    public function day_care()
    {
        $title = "daycare";
        $nav = "daycare";
        $banner = daycare_banner::where('status', 1)->latest()->first();
        $choose= daycare_whychoose::get();
        $schedule = daycare_schedule::get();
        $program = daycare_program::where('status', 1)->get();
        $activites = daycare_activites::get();
        $skills = daycare_skills::get();
        $gallery = Gallery::where('type','image')->get();


        return view('web.day-care', compact('title', 'nav', 'banner', 'schedule','activites','skills','program','choose','gallery'));
    }

    public function edit()
    {
        return view('admin.user.edit-profile', ['user' => Auth::user()]);
    }

    // Update Profile
    public function update(Request $request ,$id)
    {

        $user=User::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'required|string|unique:users,phone_number,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        // if ($request->hasFile('avtar')) {
        //     $file = $request->file('avtar');
        //     $filename = 'avatars/' . uniqid() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('public', $filename); // stores in storage/app/public/avatars
        //     $user->avtar = $filename;
        // }
        if ($request->hasFile('avtar')) {
            $file = $request->file('avtar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/profile'), $filename);
            $user->avtar = 'assets/images/profile/' . $filename;
        }


        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }

    
    public function showQuiz()
    {
        $title = "Take the Quiz";
        $nav = "quiz";

        // Load all quiz questions from the database
        $quizQuestions = QuizQuestion::all();

        return view('web.quiz', compact('title', 'nav', 'quizQuestions'));
    }

}
