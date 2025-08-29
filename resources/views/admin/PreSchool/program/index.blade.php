@extends('layouts.admin')

@section('title', 'Pre Program List')
@section('content')

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">Pre Program List</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pre.program.index') }}">Pre Program List</a></li>

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
                            <h4 class="mb-3">Pre Program List</h4>
                            <div class="mb-2">
                                <a href="{{ route('pre.program.create') }}" class="btn btn-primary d-flex align-items-center"><i
                                            class="ti ti-square-rounded-plus me-2"></i>Add Pre Program</a>
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
                                        <th>Key Heading</th>
                                        <th>Key 1</th>
                                        <th>Key 2</th>
                                        <th>Key 3</th>
                                        <th>Key 3</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $banner)
                                        <tr>
                                            <td>{{ $banner->id }}</td>
                                            <td>{{ $banner->heading }}</td>
                                            <td>
                                                @if($banner->image)
                                                    <img src="{{ asset($banner->image) }}" width="50" height="50" alt="Banner Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($banner->description, 50) }}</td>
                                            <td>{{ $banner->sub_heading }}</td>
                                            <td>{{ $banner->key1 }}</td>
                                            <td>{{ $banner->key2 }}</td>
                                            <td>{{ $banner->key3 }}</td>
                                            <td>{{ $banner->key4 }}</td>

                                            <td>
                                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                                  {{ $banner->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('pre.program.edit', $banner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('pre.program.destroy', $banner->id) }}" method="POST" style="display:inline;">
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

@section('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
