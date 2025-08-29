<div class="header">
  <?php
  $common = getCommonSetting();
  ?>
  <!-- Logo -->
  <div class="header-left active">
    <a href="{{ route('admin.dashboard') }}" class="logo logo-normal">
      <img src="{{ asset($common->logo_header) }}" alt="{{$common->site_title ?? ''}}">
    </a>
    <a href="" class="logo-small">
      <img src="{{ asset($common->logo_header) }}" alt="Logo">
    </a>
    <a href="" class="dark-logo">
      <img src="{{ asset($common->logo_header) }}" alt="Logo">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
      <i class="ti ti-menu-deep"></i>
    </a>
  </div>
  <!-- /Logo -->

  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>

  <div class="header-user">
    <div class="nav user-menu">
      <!-- Search -->
      <div class="nav-item nav-search-inputs me-auto">
        <div class="top-nav-search">
          <a href="javascript:void(0);" class="responsive-search">
            <i class="fa fa-search"></i>
          </a>
          <form action="#" class="dropdown">
            <div class="searchinputs" id="dropdownMenuClickable">
              <input type="text" placeholder="Search">
              <div class="search-addon">
                <button type="submit"><i class="ti ti-command"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /Search -->

      <div class="d-flex align-items-center">
        <div class="dropdown me-2">
          <a href="#" class="btn btn-outline-light fw-normal bg-white d-flex align-items-center p-2"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ti ti-calendar-due me-1"></i>Academic Year : 2024 / 2025
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
              Academic Year : 2023 / 2024
            </a>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
              Academic Year : 2022 / 2023
            </a>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
              Academic Year : 2021 / 2022
            </a>
          </div>
        </div>

        <div class="pe-1">
          <a href="" class="btn btn-outline-light bg-white btn-icon position-relative me-1">
            <i class="ti ti-brand-hipchat"></i>
            <span class="chat-status-dot"></span>
          </a>
        </div>
        <div class="pe-1">
          <a href="#" class="btn btn-outline-light bg-white btn-icon me-1">
            <i class="ti ti-chart-bar"></i>
          </a>
        </div>
        <div class="pe-1">
          <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" id="btnFullscreen">
            <i class="ti ti-maximize"></i>
          </a>
        </div>
        <div class="dropdown ms-1">
          <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
            <span class="avatar avatar-md rounded">
              <img src="{{ asset('assets/admin/img/profiles/avatar-27.jpg') }}" alt="Img" class="img-fluid">
            </span>
          </a>
          <div class="dropdown-menu">
            <div class="d-block">
              <div class="d-flex align-items-center p-2">
                <span class="avatar avatar-md me-2 online avatar-rounded">
                  <img src="{{ asset('assets/admin/img/profiles/avatar-27.jpg') }}" alt="img">
                </span>
                <div>
                  <h6 class="">Kevin Larry</h6>
                  <p class="text-primary mb-0">Administrator</p>
                </div>
              </div>
              <hr class="m-0">
              <a class="dropdown-item d-inline-flex align-items-center p-2" href="{{ route('teacher.profile') }}">
                <i class="ti ti-user-circle me-2"></i>My Profile</a>
              <a class="dropdown-item d-inline-flex align-items-center p-2" href=""><i
                  class="ti ti-settings me-2"></i>Settings</a>
              <hr class="m-0">
              <a class="dropdown-item d-inline-flex align-items-center p-2" href="{{ route('admin.logout')}}"><i
                  class="ti ti-login me-2"></i>Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
