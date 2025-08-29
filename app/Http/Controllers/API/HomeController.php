<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
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
use App\Models\Topic;
use App\Models\PreRegistrationBanner;
use App\Models\SubTopic;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Define topics first
        $topics = Topic::where('status', 1)->pluck('topic_name', 'id');

        $data = [
            'title' => "Home Page",
            'nav' => "home-page",
            'web_banner' => WebBanner::active()->get(),
            'categories' => SchoolCategory::active()->get(),
            'populars' => Popular::active()->orderBy('id', 'ASC')->get(),
            // 'standApart' => WhyWeStandApart::active()->get(),
            'standApart' => WhyWeStandApart::where('status', 1)->get(),
            'events' => Event::active()->get(),
            'quizContents' => QuizContent::active()->first(),
            'visitBookings' => VisitBooking::active()->first(),
            'child_learning' => ChildLearning::active()->first(),
            'hacks' => LifeSkillsHack::active()->get(),
            'banner' => PreRegistrationBanner::active()->get(),
            'topics' => $topics,
            'milestones' => Milestone::select(
                    'id', 'popular_id', 'goal_month', 'goal_heading',
                    'goal_description', 'goal_breaf', 'topics_including',
                    'created_at', 'updated_at'
                )
                ->where('status', 1)
                ->get()
                    ->map(function ($milestone) use ($topics) {
                        $topicIds = json_decode($milestone->topics_including);
                    $milestone->topics_including = is_array($topicIds)
                ? collect($topicIds)->map(function ($topicId) use ($topics) {
                    return [
                        'id' => $topicId,
                        'name' => $topics[$topicId] ?? null,
                        'subtopics' => SubTopic::where('topic_name', $topicId)
                                            ->where('status', 'active')
                                            ->get(['id', 'name']) // Add more fields if needed
                    ];
                })->filter(fn($item) => $item['name'] !== null)->values()
                : [];

            return $milestone;
            }), 
            'faq_categories' => DB::table('categories')
                                ->where('status', 1)
                                ->whereNotIn('name', ['Teacher Page'])
                                ->get(),
            'faqs' => DB::table('faqs')
                        ->where('status', 1)
                        ->get()
                        ->groupBy('category_id'),
        ];

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function pre_school()
    {
        $data = [
            'title' => "preschool",
            'nav' => "preschool",
            'banner' => PreBanner::where('status', 1)->latest()->first(),
            'explore' => PreExplore::where('status', 1)->latest()->first(),
            'safety' => PreChildSafety::where('status', 1)->get(),
            'program' => PreProgramTailored::where('status', 1)->get(),
            'choose' => PreWhychoose::where('status', 1)->latest()->first(),
            'gallery' => Gallery::get(),
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function day_care()
    {
        $data = [
            'title' => "daycare",
            'nav' => "daycare",
            'banner' => daycare_banner::where('status', 1)->latest()->first(),
            'choose' => daycare_whychoose::get(),
            'schedule' => daycare_schedule::get(),
            'program' => daycare_program::where('status', 1)->get(),
            'activites' => daycare_activites::get(),
            'skills' => daycare_skills::get(),
            'gallery' => Gallery::get(),
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function events()
    {
        $events = \App\Models\Event::where('status', 1)->get();

        $grouped_events = $events->groupBy('age'); // Group events by age
        $age_groups = $grouped_events->keys();     // Extract unique age groups

        return response()->json([
            'status' => true,
            'age_groups' => $age_groups,
            'grouped_events' => $grouped_events
        ]);
    }

    public function event_details($url)
    {
        $event = \App\Models\Event::where('event_url', $url)->first();

        if (!$event) {
            return response()->json([
                'status' => false,
                'message' => 'Event not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'event' => $event,
        ]);
    }

    public function life_hacks_details($url)
    {
        $lifeHack = LifeSkillsHack::where('url', $url)->first();

        if (!$lifeHack) {
            return response()->json([
                'status' => false,
                'message' => 'Life skill hack not found.',
            ], 404);
        }

        $other5blogs = LifeSkillsHack::where('id', '!=', $lifeHack->id)
            ->latest()
            ->limit(5)
            ->get();

        $next3blogs = LifeSkillsHack::where('id', '!=', $lifeHack->id)
            ->latest()
            ->limit(3)
            ->get();

        return response()->json([
            'status' => true,
            'lifeHack' => $lifeHack,
            'other5blogs' => $other5blogs,
            'next3blogs' => $next3blogs,
        ]);
    }

    public function featured_services()
    {
        $standApartItems = WhyWeStandApart::where('status', 1)->get();

        return response()->json([
            'status' => true,
            'data' => $standApartItems,
        ]);
    }

}