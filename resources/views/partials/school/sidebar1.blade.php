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

            <!-- Profile -->
            <ul>
                <li>
                    <a href="javascript:void(0);" class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                        <img src="{{ asset('assets/admin/img/icons/global-img.svg') }}"
                             class="avatar avatar-md img-fluid rounded"
                             alt="Profile">
                        <span class="text-dark ms-2 fw-normal">Global International</span>
                    </a>
                </li>
            </ul>

            <!-- Main Menu -->
            <ul>
                <li>
                    <h6 class="submenu-hdr"><span>Main</span></h6>
                    <ul>
                      <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop active"><i class="ti ti-school"></i><span>Students</span><span class="menu-arrow"></span></a>
                            <ul>  
                                <li><a href="{{route('school.student.list')}}">Student List</a></li>

        
                              <li><a href="{{route('school.student.show')}}">Student Details</a></li>


                              //  <li><a href="{{route('school.student.show')}}">Student Details</a></li>


    <li>
        <a href="{{ route('school.student.show') }}">Student Details</a>
    </li>


                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop active"><i class="ti ti-report-money"></i><span>Fees Mangement</span><span class="menu-arrow"></span></a>
                            <ul>  
                                <li><a href="{{ route('school.collect.fee.add')}}">Collect Payment</a></li>
                                <li><a href="{{ route('collect.fee.list')}}">Collected Fee</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop active"><i class="ti ti-calendar-share"></i><span>Attendance</span><span class="menu-arrow"></span></a>
                            <ul>  
                                <li><a href="{{ route('student.attendance')}}">Stiudent</a></li>
                                <!-- <li><a href="{{ route('collect.fee.list')}}">Collected Fee</a></li> -->
                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
