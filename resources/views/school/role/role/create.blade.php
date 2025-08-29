@extends('layouts.school')

@section('title', 'Add Roles')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Roles</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('school.role.list') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Roles</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('school.role.save') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Role</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class=" col-md-6"> 
                  <div class="mb-3">
                    <label class="form-label">Guard Name</label>    
                    <input type="text" name="group_name" class="form-control"  value="school" readonly id="role_name">              
                      
                  </div> 
                   @error('group_name') <span class="text-danger">{{ $message }}</span> @enderror                
                </div>

                <div class=" col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" >
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                
                </div>

      
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Permission</label>
                     <div>
                          <label style="display:none;" id="select_all">
                              <input type="checkbox" id="select_all_routes"> Select All
                          </label>
                      </div>
                      <div id="route_list" ></div>
         
                  </div>
                </div>               
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Role</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    function loadRoutesForRole() {
    let role = $('#role_name').val();

    if (role.length > 3) {
        $.ajax({
            url: '{{ route("school.roles.getRoutes") }}',
            type: 'GET',
            data: { role: role },
            success: function(response) {
                console.log(response);
                let routesArray = Object.values(response.routes);
                let html = '';

                routesArray.forEach(route => {
                    html += `
                        <div>
                            <label>
                                <input type="checkbox" class="route_checkbox" name="permissions[]" value="${route}">
                                ${route} — (${route})
                            </label>
                        </div>
                    `;
                });

                $('#route_list').html(html);
                $('#select_all').show();
            }
        });
          } else {
              $('#route_list').html('');
              $('#select_all').hide();
          }
      }

    // Run on page load
    $(document).ready(function() {
        loadRoutesForRole(); // Automatically load if role already selected

        // Also re-run on dropdown change
        // $('#role_name').on('change', loadRoutesForRole);
    });


   
    $('#select_all_routes').on('change', function() {
        const checked = $(this).is(':checked');
        $('.route_checkbox').prop('checked', checked);
    });

  
    $(document).on('change', '.route_checkbox', function() {
        const total = $('.route_checkbox').length;
        const checked = $('.route_checkbox:checked').length;
        $('#select_all_routes').prop('checked', total === checked);
    });
</script>
  @endsection