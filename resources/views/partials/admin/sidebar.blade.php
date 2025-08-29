<style>
    .sidebar {
        height: 100vh;
        /* overflow: hidden; */
        position: fixed;
        top: 0;
        left: 0;
        width: 260px; /* or your custom width */
        background: #fff;
        z-index: 1000;
    }

    .sidebar-inner {
        height: 100%;
        overflow-y: auto;
        padding-bottom: 50px;
    }


    .sidebar-inner::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-inner::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .sidebar-inner::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .sidebar-inner::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    img.avatar.avatar-md.img-fluid.rounded {
    width: 4rem;
    height: 3rem;
    }

</style>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                        <img src="{{ asset('assets/web/images/9t9logopng-min.png') }}" class="avatar avatar-md img-fluid rounded"
                            alt="Profile">
                        <span class="text-dark ms-2 fw-normal">9 to 9 school</span>
                    </a>
                </li>
            </ul>
            <ul>
                @if (auth()->check() && auth()->user()->role === 'admin') 
                <li>
                    <h6 class="submenu-hdr"><span>Super Admin</span></h6>
                    <ul>
                        

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-user-shield"></i><span>Schools</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/school') }}">All Schools</a></li>
                                <!-- <li><a href="https://preskool.dreamstechnologies.com/html/template/guardians.html">Guardian List</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-school"></i><span>Students</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/student') }}">All Students</a></li>
                                <!-- <li><a href="https://preskool.dreamstechnologies.com/html/template/students.html">Student List</a></li>
                                <li><a href="https://preskool.dreamstechnologies.com/html/template/student-details.html">Student Details</a></li>
                                <li><a href="https://preskool.dreamstechnologies.com/html/template/student-promotion.html">Student Promotion</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-users"></i><span>Teachers</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/teacher') }}">All Teachers</a></li>
                                <!-- <li><a href="https://preskool.dreamstechnologies.com/html/template/teachers.html">Teacher List</a></li>
                                <li><a href="https://preskool.dreamstechnologies.com/html/template/teacher-details.html">Teacher Details</a></li>
                                <li><a href="https://preskool.dreamstechnologies.com/html/template/routine-teachers.html">Routine</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <h6 class="submenu-hdr"><span>Partner Schools</span></h6>
                    <ul>
                        

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-user-shield"></i><span>Schools</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/partner-school') }}">All Schools</a></li>
                                <!-- <li><a href="https://preskool.dreamstechnologies.com/html/template/guardians.html">Guardian List</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu ">
                            <a href="javascript:void(0);" ><i class="ti ti-layout-dashboard"></i><span>
                             School Detail Screen</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/partner-school-all-banner') }}" class="">Banner</a></li>
                                <li><a href="{{ url('admin/partner-school-all-gallery')}}" class="">Gallery</a></li>
                                <!-- <li><a href="{{ url('admin/partner-school-all-about-us')}}" class="">About us</a></li> -->
                                <li><a href="{{  url('admin/partner-school-all-facility') }}" class="">Facilities</a></li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                </li>
               
                <li>
                    <h6 class="submenu-hdr"><span>Web Content</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-page-break"></i><span>Web Content</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);"
                                        class="">Home<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="{{ route('webbanner.list') }}">Web Banner</a></li>
                                        <li><a href="{{url('admin/all-school-category')}}">All School Category</a></li>
                                        <li><a href="{{url('admin/all-popular')}}">All Popular</a></li>
                                        <li><a href="{{url('admin/milestone')}}">All Milestone</a></li>
                                        <li><a href="{{url('admin/all-why-we-stand-apart')}}">All WhyWeStandApart</a></li>
                                        <li><a href="{{url('admin/all-child-learning')}}">Child Learning App</a></li>
                                        <li><a href="{{url('admin/all-life-skills-hacks')}}">All Life Skills Hacks</a></li>
                                        <li><a href="{{url('admin/all-quiz-content')}}">Quiz Content</a></li> 
                                        <li><a href="{{url('admin/all-quiz')}}">Quiz Questions</a></li>
                                        <li><a href="{{url('admin/all-visit-booking')}}">Visit Booking</a></li> 
                                        <li><a href="{{route('usp.detail.list')}}">Usp Details</a></li>
                                        <li><a href="{{ route('category.list') }}">Category</a></li>
                                        <li><a href="{{ route('faq.list') }}">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);"
                                        class="">About us<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="{{url('admin/about')}}">About Us</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Pre School<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="{{ url('admin/pre-banner') }}">Banner</a></li>
                                        <li><a href="{{ route('pre.explore.index') }}">Explore and Grow</a></li>
                                        <li><a href="{{ route('pre.choose.index') }}">Why Choose Us</a></li>
                                        <li><a href="{{ route('pre.program.index') }}">Program Tailored</a></li>
                                        <li><a href="{{ route('pre.safety.index') }}">Child Safety</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Day Care
                                        <span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="{{ url('admin/daycare-banner') }}">Banner</a></li>
                                        <li><a href="{{ route('daycare.choose.index') }}">Why Choose Us</a></li>
                                        <li><a href="{{ route('daycare.program.index') }}">Appropriate Programs</a></li>
                                        <li><a href="{{ route('daycare.schedule.index') }}">Daily Schedule</a></li>
                                        <li><a href="{{ route('daycare.activites.index') }}">Engaging Activites</a></li>
                                        <li><a href="{{ route('daycare.skills.index') }}">Skills We Develop</a></li>
                                        <!-- <li><a href="{{ url('admin/gallery') }}">Gallery</a></li> -->
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Event
                                        <span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="{{ url('admin/event-list') }}">All Events</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Teacher<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                       <li><a href="{{url('admin/teacher-page')}}">Teacher Page</a></li>
                                       <li><a href="{{url('admin/why-apply-here')}}"> Teacher Why Apply Here</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('admin/franchise-content')}}"> Franchise Content</a></li>
                                <li><a href="{{ url('admin/gallery') }}">Gallery</a></li>
                            </ul>
                        </li>
                        <li class="submenu ">
                            <a href="javascript:void(0);" class="subdrop"><i class="ti ti-layout-dashboard"></i><span>
                             App Content</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('usp.list') }}" class="">USP Screen</a></li>
                                <li><a href="{{ route('pre.banner.list') }}">Pre Reg Banner</a></li>
                            </ul>
                        </li>
                        <li class="submenu ">
                            <a href="javascript:void(0);" class="subdrop"><i class="ti ti-layout-dashboard"></i><span>
                             Notifications</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{url('admin/notifications')}}">Notifications</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <h6 class="submenu-hdr"><span>User Management</span></h6>
                    <ul>                       
                        <li><a href="{{ url('admin/user') }}"><i class="ti ti-users-minus"></i><span>Users</span></a></li>
                        <li><a href="{{ route('role.list') }}"><i class="ti ti-shield-plus"></i><span>Roles &
                                    Permissions</span></a></li>
                    </ul>
                </li>
                @endif
                @if (auth()->check() && auth()->user()->role === 'admin') 

                <li>
                    <h6 class="submenu-hdr"><span>Product Management</span></h6>
                    <ul>
                        <li><a href="{{ route('product.list') }}"><i class="ti ti-users-minus"></i><span>Products</span></a></li>
                        <li><a href="{{ route('kit.list') }}"><i class="ti ti-users-minus"></i><span>Kits</span></a></li>
                    </ul>
                </li>

                @endif

                @if (auth()->check() && auth()->user()->role === 'admin' || auth()->user()->role === 'marketing') 
                @php
                    $role = auth()->user()->role;
                    $routeMap = [
                        'admin'     => 'seo.list',
                        'marketing' => 'marketing.seo.list',
                        // add more roles if needed
                    ];

                    $routeName = $routeMap[$role] ?? 'seo.list'; // fallback route
                @endphp
                
                <li>
                    <h6 class="submenu-hdr"><span>Settings</span></h6>
                    <ul>
                         @if (auth()->check() && auth()->user()->role === 'admin') 
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-shield-cog"></i><span>General Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('common.list') }}">Common Settings</a></li>

                            </ul>
                        </li>  
                        @endif 
                        <li><a href="{{ route($routeName) }}"><i class="ti ti-building"></i><span>Seo Settings</span></a>
                        </li>                
                    </ul>
                </li>
                 @endif
                 @if (auth()->check() && auth()->user()->role === 'admin') 
                <li>
                    <h6 class="submenu-hdr"><span>Academic</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-school-bell"></i><span>Time Shift</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{url('admin/shifts')}}">All Shifts</a></li>                   
                            </ul>
                        </li>
                        <li><a href="{{url('admin/academic-years')}}"><i class="ti ti-building"></i><span>Academic Year</span></a>
                        </li>
                        <li><a href="{{route('programme.list')}}"><i class="ti ti-building"></i><span>Programmes</span></a>
                        </li>
                        <li><a href="{{route('daycare.feature.list')}}"><i class="ti ti-building"></i><span>Daycare Features</span></a>
                        </li>
                        <li><a href="{{url('admin/appointment')}}"><i class="ti ti ti-message"></i><span>Appointment</span></a></li>
                         <li><a href="{{ route('progress-goals.index') }}"><i class="ti ti-building"></i><span>Progress Goal</span></a>
                        </li>
                         <li><a href="{{ route('package-services.index') }}"><i class="ti ti-building"></i><span>Package Service</span></a>
                        </li>
                         <li><a href="{{ route('event-packages.index') }}"><i class="ti ti-building"></i><span>Event Package</span></a>
                        </li>
                        <li><a href="{{url('admin/topic')}}"><i class="ti ti-building"></i><span>All Topic</span></a></li>
                        <li><a href="{{ route('sub.topic.list') }}"><i class="ti ti-building"></i><span>Sub Topics</span></a>
                        </li>
                        <li><a href="{{ route('habit.list') }}"><i class="ti ti-building"></i><span>Habits</span></a>
                        </li>  
                        <li><a href="{{ route('our-program.list') }}"><i class="ti ti-building"></i><span>Our Programs</span></a>
                        </li>                  
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Enquiry</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-bell-school"></i><span>Enquiry</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/enquiry','contact') }}">Contact us Enquiry</a></li>  
                                <li><a href="{{ url('admin/enquiry','enroll_enquiry') }}">Enroll Enquiry</a></li>   
                                <li><a href="{{ url('admin/enquiry','Events') }}">Events Enquiry</a></li>  
                                <li><a href="{{ url('admin/enquiry','franchise') }}">Franchise Enquiry</a></li>     
                                <li><a href="{{ url('admin/enquiry','pre-school') }}">Pre School Enquiry</a></li>   
                                <li><a href="{{ url('admin/partner-school-enquiry') }}">Partner School Enquiry</a></li>                         
                            </ul>
                        </li>
                        <!-- <li><a href=""><i class="ti ti-bell-school"></i><span>Contact</span></a></li>
                        <li><a href="{{ url('admin/enquiry') }}"><i class=""></i><span>Enquiry</span></a></li>
                        <li><a href="{{ url('admin/enquiry') }}"><i class="ti ti-bell-school"></i><span>Enquiry</span></a></li>
                        <li><a href="{{ url('admin/enquiry') }}"><i class="ti ti-bell-school"></i><span>Enquiry</span></a></li> -->
                        <li><a href="{{url('admin/talkexpert')}}"><i class="ti ti-user-plus"></i><span> Talk To Expert</span></a></li> 
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Accounts</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-swipe"></i><span>Accounts</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{route('kit.transaction')}}">Kit Transactions</a></li>
                                <li><a href="{{route('event.transaction')}}">Events Transactions</a></li>
                                <li><a href="{{route('fee.transaction')}}">Fees Transactions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Reports</span></h6>
                    <ul>
                        <li><a href="{{route('student.list')}}"><i class="ti ti-calendar-due"></i><span>Progress
                                    Report</span></a></li>
                    </ul>
                </li>
                
                @endif
                
            </ul>
        </div>
    </div>
</div>