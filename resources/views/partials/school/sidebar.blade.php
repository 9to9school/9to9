<style>
    .sidebar {
        height: 100vh;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
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
                <a href="{{ route('school.dashboard') }}"
                    class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                    <img src="{{ asset('assets/web/images/9t9logopng-min.png') }}" class="avatar avatar-md img-fluid rounded"
                        alt="Profile">
                    <span class="text-dark ms-2 fw-normal">9 to 9 school</span>
                </a>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr"><span>School</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" ><i class="ti ti-school"></i><span>Students</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('school.student.list')}}">All Students</a></li>
                                <li><a href="{{route('school.student.show')}}">Student Details</a></li>                          
                          </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" ><i class="ti ti-school"></i><span>Teachers</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('school.teacher.list')}}">All Teachers</a></li>
                      
                          </ul>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Progress Reports</span></h6>
                    <ul>
                        <li><a href="{{route('school.student.list')}}"><i class="ti ti-calendar-due"></i><span>Progress
                                    Report</span></a></li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Management</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-report-money"></i><span>Fees
                                    Collection</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('school.collect.fee.add')}}">Collect Payment</a></li>
                                <li><a href="{{ route('collect.fee.list')}}">Collect Fees</a></li>
                            </ul>
                        </li>                        
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>HRM</span></h6>
                    <ul>                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-calendar-share"></i><span>Attendance</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('student.attendance')}}">Student Attendance</a></li>
                                <li><a href="{{ route('teacher.attendance')}}">Teacher Attendance</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-calendar-share"></i><span>Attendanc Report</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('student.attendance.report')}}">Student Attendance</a></li>
                                <li><a href="{{ route('teacher.attendance.report')}}">Teacher Attendance</a></li>
                            </ul>
                        </li>        
                    </ul>
                    <ul>                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    class="ti ti-calendar-share"></i><span>Leaves</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('teacher.leaves')}}">Teacher Leaves</a></li>
                            </ul>
                        </li>        
                    </ul>
                </li>
                
                <li>
                    <h6 class="submenu-hdr"><span>Reports</span></h6>
                    <ul>
                        <li><a href="{{ route('school.financial.report') }}"><i class="ti ti-calendar-due"></i><span>Financial
                                    Report</span></a></li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>Settings</span></h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-shield-cog"></i><span>General Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('school.setting') }}">Common Settings</a></li>
                                <li><a href="{{ route('school.role.list') }}"><i class="ti ti-shield-plus"></i><span>Roles &
                                    Permissions</span></a></li>

                            </ul>
                        </li>                  
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>App Content</span></h6>
                    <ul>
                        
                        <li class="submenu ">
                            <a href="javascript:void(0);" ><i class="ti ti-layout-dashboard"></i><span>
                             School Detail Screen</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('school.banner.list') }}" class="">Banner</a></li>
                                <li><a href="{{ route('school.gallery.list') }}" class="">Gallery</a></li>
                                <li><a href="{{ route('school.about-us.edit', Auth::id()) }}" class="">About us</a></li>
                                <li><a href="{{ route('school.facility.list') }}" class="">Facilities</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
         </ul>
        </div>
    </div>
</div>