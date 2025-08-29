@extends('layouts.admin')

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
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('role.list') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Roles</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('role.save') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label">Group Name</label>                  
                      <select name="group_name" class="form-control" fdprocessedid="rbblr" id="role_name">
                        <option value="">Select</option>
                        <option value="super_admin">Super admin</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="school">School</option>
                        <option value="student">Student</option>
                         <option value="marketing">Marketing</option>
                      </select>
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
    $('#role_name').on('click', function() {
        let role = $(this).val();

        if (role.length > 3) {
            $.ajax({
                url: '{{ route("roles.getRoutes") }}',
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