@extends('layouts.admin')

@section('title', 'Quiz Question Management')

@section('content')

<div class="content">
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">{{ $title }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="pe-1 mb-2">
                        <a href="{{ route('quiz.create') }}" class="btn btn-outline-primary">
                            <i class="ti ti-plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Quiz Question List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">{{ $title }}</h4>
                </div>
                <div class="card-body p-0 py-3">

                    <!-- Quiz Question Table -->
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quizQuestions as $key => $quiz)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($quiz->image)
                                        <img src="{{ asset($quiz->image) }}" width="70" alt="Question Image">
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $quiz->question }}</td>
                                    <td>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer_{{ $quiz->id }}" id="option1_{{ $quiz->id }}" value="{{ $quiz->option1 }}" disabled>
            <label class="form-check-label" for="option1_{{ $quiz->id }}">
                {{ $quiz->option1 }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer_{{ $quiz->id }}" id="option2_{{ $quiz->id }}" value="{{ $quiz->option2 }}" disabled>
            <label class="form-check-label" for="option2_{{ $quiz->id }}">
                {{ $quiz->option2 }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer_{{ $quiz->id }}" id="option3_{{ $quiz->id }}" value="{{ $quiz->option3 }}" disabled>
            <label class="form-check-label" for="option3_{{ $quiz->id }}">
                {{ $quiz->option3 }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer_{{ $quiz->id }}" id="option4_{{ $quiz->id }}" value="{{ $quiz->option4 }}" disabled>
            <label class="form-check-label" for="option4_{{ $quiz->id }}">
                {{ $quiz->option4 }}
            </label>
        </div>
    </div>
</td>
                                    <td>
                                        <span class="badge {{ $quiz->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $quiz->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" class="d-inline">
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
            <!-- /Quiz Question List -->

        </div>
    </div>
</div>

@endsection
