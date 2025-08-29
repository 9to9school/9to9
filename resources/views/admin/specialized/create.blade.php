@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">{{ $title }}</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/specialized-class-list') }}">Specialized Classes</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Flash Messages -->
    <div class="mb-3">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
      </div>
      @endif

      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session('success') }}</strong>
      </div>
      @endif
    </div>

    <form action="{{ url('admin/specialized-class/' . ($class->id ?? '')) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="card">
        <div class="card-header bg-light">
          <div class="d-flex align-items-center">
            <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
              <i class="ti ti-info-square-rounded fs-16"></i>
            </span>
            <h4 class="text-dark">{{ $title }}</h4>
          </div>
        </div>

        <div class="card-body pb-1">
          <div class="row">

            {{-- Class Name --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Class Name</label>
                <input type="text" name="class_name" class="form-control" placeholder="Class Name" value="{{ $class->class_name }}">
                @error('class_name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Class URL --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Class URL</label>
                <input type="text" name="class_url" class="form-control" placeholder="Class URL" value="{{ $class->class_url }}">
                @error('class_url') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Image --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Description --}}
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $class->description }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Banner Image --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Banner Image</label>
                <input type="file" name="banner_image" class="form-control" accept="image/*">
                @error('banner_image') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Banner Heading --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Banner Heading</label>
                <input type="text" name="banner_heading" class="form-control" placeholder="Banner Heading" value="{{ $class->banner_heading }}">
                @error('banner_heading') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Sub Heading --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Sub Heading</label>
                <input type="text" name="sub_heading" class="form-control" placeholder="Sub Heading" value="{{ $class->sub_heading }}">
                @error('sub_heading') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Banner Description --}}
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label">Banner Description</label>
                <textarea name="banner_description" class="form-control" rows="3">{{ $class->banner_description }}</textarea>
                @error('banner_description') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Duration --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ $class->duration }}">
                @error('duration') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Age Group --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Age Group</label>
                <select class="form-control" name="age">
                  <option value="2 - 3" {{ $class->age == '2 - 3' ? 'selected' : '' }}>2 - 3 Years</option>
                  <option value="4 - 5" {{ $class->age == '4 - 5' ? 'selected' : '' }}>4 - 5 Years</option>
                  <option value="5 - 6" {{ $class->age == '5 - 6' ? 'selected' : '' }}>5 - 6 Years</option>
                </select>
                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- No Of Student --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">No Of Student</label>
                <select name="no_of_student[]" class="select2" multiple="multiple">
                  <option value="">--Select--</option>
                  @php $selected = json_decode($class->no_of_student); @endphp
                  @foreach($progdata as $data)
                    <option value="{{ $data->no_of_student }}" @if(is_array($selected) && in_array($data->no_of_student, $selected)) selected @endif>
                      {{ $data->no_of_student }}
                    </option>
                  @endforeach
                </select>
                @error('no_of_student') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- No Of Teacher --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">No Of Teacher</label>
                <select name="no_of_teacher[]" class="select2" multiple="multiple">
                  <option value="">--Select--</option>
                  @php $selected = json_decode($class->no_of_teacher); @endphp
                  @foreach($progdata as $data)
                    <option value="{{ $data->no_of_teacher }}" @if(is_array($selected) && in_array($data->no_of_teacher, $selected)) selected @endif>
                      {{ $data->no_of_teacher }}
                    </option>
                  @endforeach
                </select>
                @error('no_of_teacher') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Fees --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Fees</label>
                <select name="fees[]" class="select2" multiple="multiple">
                  <option value="">--Select--</option>
                  @php $selected = json_decode($class->fees); @endphp
                  @foreach($progdata as $data)
                    <option value="{{ $data->fees }}" @if(is_array($selected) && in_array($data->fees, $selected)) selected @endif>
                      {{ $data->fees }}
                    </option>
                  @endforeach
                </select>
                @error('fees') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Materials --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Materials</label>
                <input type="text" name="materials" class="form-control" value="{{ $class->materials }}">
                @error('materials') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Skills --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Skills</label>
                <input type="text" name="skills" class="form-control" value="{{ $class->skills }}">
                @error('skills') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
