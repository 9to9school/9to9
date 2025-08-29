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
            <li>
                <a href="javascript:void(0);" class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                    <img src="{{ asset('assets/admin/img/icons/global-img.svg') }}" class="avatar avatar-md img-fluid rounded" alt="Profile">
                    <span class="text-dark ms-2 fw-normal">Global International</span>
                </a>
            </li>
        </ul>
        
    </div>
</div>
</div>
