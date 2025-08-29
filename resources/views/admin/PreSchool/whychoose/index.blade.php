@extends('layouts.admin')

@section('title', 'Add Banner')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">Add Banner</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pre.program.index') }}">Program</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        @foreach($data as $row)
                            <div class="row justify-content-center align-items-center mb-5">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <span class="badge rounded-circle h3 bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">1</span>
                                        <h4>{!! $row->title !!}</h4>
                                        <p>{!! $row->paragraph !!}</p>
                                    </div>
                                    <div>
                                        <span class="badge rounded-circle h3 bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">2</span>
                                        <h4>{!! $row->title2 !!}</h4>
                                        <p>{!! $row->paragraph2 !!}</p>
                                    </div>
                                </div>

                                <div class="col-md-4 d-flex justify-content-center">
                                    <img width="100%" src="{!! asset($row->image) !!}" alt="Center Image" class="img-fluid">
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <span class="badge rounded-circle h3 bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">3</span>
                                        <h4>{!! $row->title3 !!}</h4>
                                        <p>{!! $row->paragraph3 !!}</p>
                                    </div>
                                    <div>
                                        <span class="badge rounded-circle h3 bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">4</span>
                                        <p>{!! $row->paragraph4 !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <a href="{{ route('pre.choose.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pre.choose.destroy', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection