@extends('layouts.school')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">
    @if($students->isEmpty())
        <div class="text-center py-12 text-gray-500">
            <h2 class="text-xl font-semibold">No student records found.</h2>
            <p>Please add students to view their details.</p>
        </div>
    @else
        <div x-data="{ activeTab: null }">
            <!-- Student Tabs -->
            <div class="flex space-x-4 border-b mb-6 overflow-x-auto">
                @foreach($students as $student)
                    <button 
                        @click="activeTab === '{{ $student->id }}' ? activeTab = null : activeTab = '{{ $student->id }}'"
                        :class="activeTab === '{{ $student->id }}' 
                            ? 'border-blue-500 text-blue-600' 
                            : 'border-transparent text-gray-600'"
                        class="px-4 py-2 border-b-2 text-sm font-medium whitespace-nowrap">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </button>
                @endforeach
            </div>

            <!-- Student Details (shown only when clicked) -->
            <template x-for="student in {{ $students->toJson() }}" :key="student.id">
                <div x-show="activeTab === student.id" x-cloak class="mt-6">
                    <!-- Header -->
                    <div class="flex items-center space-x-6 mb-6">
                        <img :src="'/storage/' + student.student_image" alt="Student Image" class="w-32 h-32 rounded-full border shadow">
                        <div>
                            <h2 class="text-2xl font-bold" x-text="student.first_name + ' ' + student.last_name"></h2>
                            <p class="text-gray-600" x-text="'Admission No: ' + student.admission_number"></p>
                            <p class="text-sm text-gray-500" x-text="'Academic Year: ' + student.academic_year"></p>
                        </div>
                    </div>

                    <!-- Personal Info -->
                    <div class="mb-4" x-show="student.email || student.primary_contact || student.phone_number_1">
                        <h3 class="font-semibold text-lg mb-2">Personal Info</h3>
                        <p><strong>Email:</strong> <span x-text="student.email"></span></p>
                        <p><strong>Primary Contact:</strong> <span x-text="student.primary_contact"></span></p>
                        <p><strong>Phone 1:</strong> <span x-text="student.phone_number_1"></span></p>
                        <p><strong>Phone 2:</strong> <span x-text="student.phone_number_2"></span></p>
                        <p><strong>Address:</strong> <span x-text="student.address + ', ' + student.city + ', ' + student.state + ' - ' + student.zip"></span></p>
                    </div>

                    <!-- Academic Info -->
                    <div class="mb-4" x-show="student.school || student.admission_date">
                        <h3 class="font-semibold text-lg mb-2">Academic Details</h3>
                        <p><strong>School:</strong> <span x-text="student.school?.name || 'N/A'"></span></p>
                        <p><strong>Admission Date:</strong> <span x-text="(new Date(student.admission_date)).toLocaleDateString()"></span></p>
                    </div>

                    <!-- Family & Language -->
                    <div class="mb-4" x-show="student.father_name || student.mother_tongue || student.language_known">
                        <h3 class="font-semibold text-lg mb-2">Family & Language</h3>
                        <p><strong>Father Name:</strong> <span x-text="student.father_name"></span></p>
                        <p><strong>Mother Tongue:</strong> <span x-text="student.mother_tongue"></span></p>
                        <p><strong>Languages Known:</strong> <span x-text="student.language_known"></span></p>
                    </div>
                </div>
            </template>
        </div>
    @endif
</div>
@endsection
