@extends('layouts.admin')

@section('title', 'Add Safety')
@section('content')

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">List  Daycare Skills</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('daycare.skills.index') }}"> Daycare Skills</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-md-12">
                    <!-- Students List -->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                            <h4 class="mb-3"> Daycare Skills List</h4>

                            <div class="mb-2">
                                <a href="{{ route('daycare.skills.create') }}" class="btn btn-primary d-flex align-items-center"><i
                                            class="ti ti-square-rounded-plus me-2"></i>Add  Daycare Skills</a>
                            </div>
                        </div>
                        <div class="card-body p-0 py-3">

                            <!-- Student List -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>

                                        <th>id</th>
                                        <th>Heading</th>
                                        <th>image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->heading }}</td>
                                            <td>
                                                @if($row->image)
                                                    <img src="{{ asset($row->image) }}" width="50" height="50" alt="Banner Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($row->description, 50) }}</td>

                                            <td>
                                                            <span class="badge {{ $row->status ? 'badge-success' : 'badge-danger' }}">
                                                              {{ $row->status ? 'Active' : 'Inactive' }}
                                                            </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('daycare.skills.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('daycare.skills.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection