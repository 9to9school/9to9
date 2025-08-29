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
                    </li>
                    <li class="breadcrumb-item active">{{$page_heading}}</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="card">
                <div class="body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form method="post" action="{{ url($rolePrefix.'/update-permission') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$edit_permission->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $edit_permission->name }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-raised btn-primary waves-effect" value="Save & Continue">
                                    <?php $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/admin/dashboard'; ?>
                                    <a href="{{ url($referer) }}" class="btn btn-raised btn-danger waves-effect">Back</a>

                                </div>

                            </div>

                        </form>

                </div>
            </div>
        </div>

    </div>

@stop

@section('js')

@stop
