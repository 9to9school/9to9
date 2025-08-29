@extends('layouts.admin')
@section('title', 'Edit Quiz Question')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Quiz Question</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Quiz Question</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Alerts -->
        <div class="row mb-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session('success') }}</strong>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session('error') }}</strong>
                </div>
            @endif
        </div>

        <!-- Form -->
        <div class="col-md-12">
            <form action="{{ route('quiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex align-items-center">
                            <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                <i class="ti ti-edit fs-16"></i>
                            </span>
                            <h4 class="text-dark">Edit Quiz Question</h4>
                        </div>
                    </div>

                    <div class="card-body pb-1">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Question</label>
                                <input type="text" name="question" value="{{ old('question', $quiz->question) }}" class="form-control" placeholder="Enter question">
                                @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Option 1</label>
                                <input type="text" name="option1" value="{{ old('option1', $quiz->option1) }}" class="form-control" placeholder="Option 1">
                                @error('option1') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Option 2</label>
                                <input type="text" name="option2" value="{{ old('option2', $quiz->option2) }}" class="form-control" placeholder="Option 2">
                                @error('option2') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Option 3</label>
                                <input type="text" name="option3" value="{{ old('option3', $quiz->option3) }}" class="form-control" placeholder="Option 3">
                                @error('option3') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Option 4</label>
                                <input type="text" name="option4" value="{{ old('option4', $quiz->option4) }}" class="form-control" placeholder="Option 4">
                                @error('option4') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Existing Image</label><br>
                                @if($quiz->image)
                                    <img src="{{ asset($quiz->image) }}" alt="Question Image" width="100" class="mb-2 rounded">
                                @else
                                    <p class="text-muted">No image uploaded.</p>
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Replace Image (optional)</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('quiz.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
