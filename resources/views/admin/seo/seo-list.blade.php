@extends('layouts.admin')

@section('title', 'SEO List')
@section('content')

<div class="content">
  <div class="page-wrapper">
    <div class="content">

    @php
    $role = auth()->user()->role;

    if($role == 'admin' ){
      $dashbaord = 'admin.dashboard';
      $crete = 'seo.create';
      $edit = 'seo.edit';
      $destroy = 'seo.destroy';
    }else{
      $dashbaord = 'marketing.dashboard';
      $crete = 'marketing.seo.create';
      $edit = 'marketing.seo.edit';
      $destroy = 'marketing.seo.destroy';
    }

    @endphp

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">SEO Entries</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route($dashbaord) }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">SEO</li>
              <li class="breadcrumb-item active" aria-current="page">All Entries</li>
            </ol>
          </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
          <div class="mb-2">
            <a href="{{ route($crete) }}" class="btn btn-primary d-flex align-items-center">
              <i class="ti ti-square-rounded-plus me-2"></i>Add SEO Entry
            </a>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <!-- SEO List -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">SEO Entries</h4>
        </div>
        <div class="card-body p-0 py-3">
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>URL</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Keyword</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($seos as $seo)
                <tr>
                  <td>{{ $seo->id }}</td>
                  <td>{{ $seo->url }}</td>
                  <td>{{ $seo->title }}</td>
                  <td>{{ \Illuminate\Support\Str::limit($seo->description, 50) }}</td>
                  <td>{{ $seo->keyword }}</td>
                  <td>
                                            @if($seo->image)
                                                <img src="{{ asset($seo->image) }}" width="50" height="50" alt="seo Image">
                                            @else
                                                No Image
                                            @endif
                                         </td>
                  <td>
                    <span class="badge {{ $seo->status == 1 ? 'badge-success' : 'badge-danger' }}">
                      {{ $seo->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route($edit, $seo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route($destroy, $seo->id) }}" method="POST" style="display:inline;">
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

@endsection
