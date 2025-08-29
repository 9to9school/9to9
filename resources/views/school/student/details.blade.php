@extends('layouts.school')

@section('content')
<style>
    .tab-button {
        padding: 10px 20px;
        cursor: pointer;
        border: 1px solid #d1d5db;
        background-color: #f3f4f6;
        font-weight: 500;
        margin-right: 8px;
        border-radius: 6px 6px 0 0;
        transition: all 0.3s ease;
    }

    .tab-button.active {
        background-color: #3b82f6;
        color: #fff;
        border-color: #3b82f6;
    }

    .tab-content {
        display: none;
        border: 1px solid #d1d5db;
        border-top: none;
        padding: 20px;
        border-radius: 0 0 6px 6px;
    }

    .tab-content.active {
        display: block;
    }

    .sub-tab-button {
        padding: 6px 12px;
        cursor: pointer;
        background: #e5e7eb;
        border: 1px solid #cbd5e1;
        margin-right: 6px;
        border-radius: 4px;
    }

    .sub-tab-button.active {
        background-color: #2563eb;
        color: white;
    }

    .sub-tab-content {
        display: none;
    }

    .sub-tab-content.active {
        display: block;
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content content-two">
<div class="container mx-auto px-4 py-6 bg-white shadow-md rounded-lg">
    @foreach($students as $student)
        <h2 class="text-2xl font-semibold mb-4">Student Info - {{ $student->first_name ?? 'N/A' }}</h2>

     

        <!-- Tab Content Panels -->
        <div class="tab-content active" id="basic-info-{{ $student->id }}">
            <div class="mb-2">
                <button class="sub-tab-button active" data-tab="personal-{{ $student->id }}">Personal</button>
                <button class="sub-tab-button" data-tab="contact-{{ $student->id }}">Contact</button>
                <button class="sub-tab-button" data-tab="guardian-{{ $student->id }}">Guardian</button>
                <button class="sub-tab-button" data-tab="school-{{ $student->id }}">School</button>
            </div>

            <!-- Personal -->
            <div class="sub-tab-content active" id="personal-{{ $student->id }}">
                <p><strong>First Name:</strong> {{ $student->first_name ?? 'N/A' }}</p>
                <p><strong>Last Name:</strong> {{ $student->last_name ?? 'N/A' }}</p>
                <p><strong>Date of Birth:</strong> {{ $student->dob ?? 'N/A' }}</p>
                <p><strong>Mother Tongue:</strong> {{ $student->mother_tongue ?? 'N/A' }}</p>
                <p><strong>Religion:</strong> {{ $student->religion ?? 'N/A' }}</p>
                <p><strong>Nationality:</strong> {{ $student->nationality ?? 'N/A' }}</p>
            </div>

            <!-- Contact -->
            <div class="sub-tab-content" id="contact-{{ $student->id }}">
                <p><strong>Email:</strong> {{ $student->email ?? 'N/A' }}</p>
                <p><strong>Primary Contact:</strong> {{ $student->primary_contact ?? 'N/A' }}</p>
                <p><strong>Phone 1:</strong> {{ $student->phone_number_1 ?? 'N/A' }}</p>
                <p><strong>Phone 2:</strong> {{ $student->phone_number_2 ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
                <p><strong>City:</strong> {{ $student->city ?? 'N/A' }}</p>
                <p><strong>State:</strong> {{ $student->state ?? 'N/A' }}</p>
                <p><strong>Zip:</strong> {{ $student->zip ?? 'N/A' }}</p>
            </div>

            <!-- Guardian -->
            <div class="sub-tab-content" id="guardian-{{ $student->id }}">
                <p><strong>Father Name:</strong> {{ $student->father_name ?? 'N/A' }}</p>
                <p><strong>Mother Name:</strong> {{ $student->mother_name ?? 'N/A' }}</p>
             
              
            </div>

            <!-- School -->
            <div class="sub-tab-content" id="school-{{ $student->id }}">
                <p><strong>Academic Year:</strong> {{ $student->academic_year ?? 'N/A' }}</p>
                <p><strong>Admission Number:</strong> {{ $student->admission_number ?? 'N/A' }}</p>
                <p><strong>Admission Date:</strong> 
                    {{ $student->admission_date ? \Carbon\Carbon::parse($student->admission_date)->format('d-m-Y') : 'N/A' }}
                </p>
              
            </div>
        </div>

      


      
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Main tabs
        document.querySelectorAll(".tab-button").forEach(button => {
            button.addEventListener("click", () => {
                const tabId = button.dataset.tab;
                const container = button.closest(".container");
                container.querySelectorAll(".tab-button").forEach(btn => btn.classList.remove("active"));
                container.querySelectorAll(".tab-content").forEach(tab => tab.classList.remove("active"));
                button.classList.add("active");
                container.querySelector(`#${tabId}`)?.classList.add("active");
            });
        });

        // Sub-tabs
        document.querySelectorAll(".sub-tab-button").forEach(button => {
            button.addEventListener("click", () => {
                const tabId = button.dataset.tab;
                const parent = button.closest(".tab-content");
                parent.querySelectorAll(".sub-tab-button").forEach(btn => btn.classList.remove("active"));
                parent.querySelectorAll(".sub-tab-content").forEach(tab => tab.classList.remove("active"));
                button.classList.add("active");
                parent.querySelector(`#${tabId}`)?.classList.add("active");
            });
        });
    });
</script>
@endsection
