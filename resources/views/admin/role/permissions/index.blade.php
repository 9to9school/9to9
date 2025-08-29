@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css"/>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
@stop
@section('body')
    <?php
    $rolePrefix = getRolePrefix();
    ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>{{$page_heading}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url($rolePrefix.'/dashboard')}}"><i class="zmdi zmdi-home"></i> Admin </a></li>


                    <li class="breadcrumb-item">
                        <a href="{{url($rolePrefix.'/all-permissions')}}">
                            All Collection Type </a>
                    </li>  <li class="breadcrumb-item active">{{$page_heading}}</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tabledata">

                            <thead>
                            <tr>

                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($permisssion as $permisssions)
                                <tr>
                                    <td>
                                        <b>Name : </b>{{ $permisssions->name }} <br>
                                    </td>

                                    <td>
                                        <a href="{{ url($rolePrefix.'/edit-permissions/' . $permisssions->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ url($rolePrefix.'/delete-permissions/' . $permisssions->id) }}" class="btn btn-danger btn-sm">Delete</a>
{{--                                        @if($permisssions->status == '1')--}}
{{--                                            <form action="{{ url($rolePrefix.'/update-permissions-status/' . $permisssions->id) }}" method="POST" style="display:inline;">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" class="btn btn-secondary btn-sm">Deactivate</button>--}}
{{--                                            </form>--}}
{{--                                        @else--}}
{{--                                            <form action="{{ url($rolePrefix.'/update-permissions-status/' . $permisssions->id) }}" method="POST" style="display:inline;">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" class="btn btn-success btn-sm">Activate</button>--}}
{{--                                            </form>--}}
{{--                                        @endif--}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No admins found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/admin')}}/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="{{asset('assets/admin')}}assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
    <script src="{{asset('assets/admin')}}/assets/js/pages/tables/jquery-datatable.js"></script>

    <script>

        $(function() {
            // Listen for changes on the toggle switch
            $('#tabledata tbody').on("change", ".status-toggle", function() {
                var status = $(this).is(':checked') ? 1 : 0;  // Check if the switch is on or off
                var id = $(this).data('id');
                var table = 'categories';

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ url("admin/change-permissions-status") }}',
                    data: { 'status': status, 'id': id, 'table': table },
                    success: function(data){
                        swal("Status Changed!");
                        location.reload();  // Optionally reload the page
                        console.log(data.success);
                    },
                    error: function(xhr, status, error) {
                        swal("Error", "There was an issue changing the status", "error");
                    }
                });
            });
        });



        function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'get',
                        url: "{{url($rolePrefix.'/delete/permissions')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                location.reload();
                            } else {
                                swal("Error!", results.message, "error");
                                location.reload();
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@stop
