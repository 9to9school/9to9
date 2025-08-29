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
                            <li class="breadcrumb-item"><a href="{{ route('banner.list') }}">Banners</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
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
                            <h4 class="mb-3">Banner List</h4>
                            <div class="mb-2">
                                <a href="{{ route('pre.banner.create') }}" class="btn btn-primary d-flex align-items-center"><i
                                            class="ti ti-square-rounded-plus me-2"></i>Add Banner</a>
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
                                        <th>button Name 1</th>
                                        <th>button link 1</th>
                                        <th>button name 2</th>
                                        <th>button link 2</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
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
                                            <td>{{ $banner->button_name1 }}</td>
                                            <td>
                                                @if($banner->button_link1)
                                                    <a href="{{ $banner->button_link1 }}" target="_blank">view Link</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $banner->button_name2 }}</td>
                                            <td>
                                                @if($banner->button_link2)
                                                    <a href="{{ $banner->button_link2 }}" target="_blank">view Link</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                                  {{ $banner->status ? 'Active' : 'Inactive' }}
                                                </span>
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

@push('scripts')
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
@endpush
