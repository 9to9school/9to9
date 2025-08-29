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


</style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                        <img src="{{ asset('assets/admin/img/icons/global-img.svg') }}"
                             class="avatar avatar-md img-fluid rounded"
                             alt="Profile">
                        <span class="text-dark ms-2 fw-normal">Global International</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr"><span>Main</span></h6>
                    <ul>

                        <li class="submenu ">
                            <a href="javascript:void(0);" class="subdrop"><i class="ti ti-layout-dashboard"></i><span>
                             App Content</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('usp.list') }}" class="">USP Screen</a></li>
                                <li><a href="{{ route('banner.list') }}">Banner Screen</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-layout-list"></i>
                                <span>Web Content</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('webbanner.list') }}">Web Banner</a></li>
                                <li><a href="{{url('admin/all-school-category')}}">All School Category</a></li>
                                <li><a href="{{url('admin/all-school-category')}}">Gallery</a></li>
                                <li><a href="{{url('admin/all-popular')}}">All Popular</a></li>
                                <li><a href="{{url('admin/topic')}}">All Topic</a></li>
                                <li><a href="{{url('admin/milestone')}}">All Milestone</a></li>
                                <li><a href="{{url('admin/all-why-we-stand-apart')}}">All WhyWeStandApart</a></li>
                                <li><a href="{{url('admin/all-testimonials')}}">All Testimonials</a></li>
                                <li><a href="{{url('admin/all-life-skills-hacks')}}">All Life Skills Hacks</a></li>
                                <li><a href="{{url('admin/all-child-learning')}}">Child Learning App</a></li>
                                <li><a href="{{url('admin/all-quiz-content')}}">Quiz Content</a></li>
                                <li><a href="{{url('admin/all-visit-booking')}}">Visit Booking</a></li>
                                <li><a href="{{url('admin/about')}}">About Us</a></li>
                                <li><a href="{{url('admin/teacher-page')}}">Teacher Page</a></li>
                                <li><a href="{{url('admin/why-apply-here')}}"> Teacher Why Apply Here</a></li>
                                <li><a href="{{url('admin/franchise-content')}}"> Franchise Content</a></li>
                                <li><a href="{{url('admin/talkexpert')}}"> Talk To Expert</a></li>
                                <li><a href="{{url('admin/appointment')}}"> Appointment</a></li>
                                <li><a href="{{url('admin/all-package')}}">All Package</a></li>
                                   <li><a href="{{url('admin/shifts')}}">Time Shifts</a></li>
                                   <li><a href="{{url('admin/academic-years')}}">Academic Year</a></li>
                                    <li><a href="{{ url('admin/school') }}">School</a></li>
                                <li><a href="{{ url('admin/teacher') }}">Teacher</a></li>
                                <li><a href="{{ url('admin/student') }}">Student</a></li>
                                <li><a href="{{ url('admin/enquiry') }}">Enquiry</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>All Users</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/user') }}">Users</a></li>


                            </ul>
                        </li>

                        <!-- <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Registeration</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/school') }}">School</a></li>
                                <li><a href="{{ url('admin/teacher') }}">Teacher</a></li>
                                <li><a href="{{ url('admin/student') }}">Student</a></li>


                            </ul>
                        </li> -->

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Blog</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/blogs') }}">Blogs</a></li>
                                <li><a href="{{ url('admin/event-list') }}">Event List</a></li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>CommonSetting</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('common.list') }}">CommonSetting</a></li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Gallery</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/gallery') }}">Gallery Index</a></li>
                                <li><a href="{{ url('gallery/add') }}">Gallery Add</a></li>

                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Faq</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('category.list') }}">Category</a></li>
                                <li><a href="{{ route('faq.list') }}">Faq</a></li>

                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Pre School Page</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/pre-banner') }}">Banner</a></li>
                                <li><a href="{{ route('pre.explore.index') }}">Explore and Grow</a></li>
                                <li><a href="{{ route('pre.choose.index') }}">Why Choose Us</a></li>
                                <li><a href="{{ route('pre.program.index') }}">Program Tailored</a></li>
                                <li><a href="{{ route('pre.safety.index') }}">Child Safety</a></li>

                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Day Care Page</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('admin/daycare-banner') }}">Banner</a></li>
                                <li><a href="{{ route('daycare.choose.index') }}">Why Choose Us</a></li>
                                <li><a href="{{ route('daycare.program.index') }}">Appropriate Programs</a></li>
                                <li><a href="{{ route('daycare.schedule.index') }}">Daily Schedule</a></li>
                                <li><a href="{{ route('daycare.activites.index') }}">Engaging Activites</a></li>
                                <li><a href="{{ route('daycare.skills.index') }}">Skills We Develop</a></li>

                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                        class="ti ti-layout-dashboard"></i><span>Roles</span><span
                                        class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('role.list') }}">Roles</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

