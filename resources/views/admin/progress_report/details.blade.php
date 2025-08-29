@extends('layouts.admin')

@section('title', 'Progress Report Details')

@section('content')
 <style>
        #myPieChart {
            width: 250px;
            height: 250px;
            margin: 40px auto;
        }
    </style>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
    @php
        $id = request()->route('id');
    @endphp
            <!-- Page Header -->
            <div class="col-md-12">
                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">Progress Report Details</h3>
                            <nav>
                                <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('student.list') }}">Students</a></li>
                                <li class="breadcrumb-item active">Report Details</li>
                                </ol>
                            </nav>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center  flex-wrap">			
                        <a href="javascript:void(0)" onclick="savePdfAjax()" class="btn btn-primary me-2 mb-2"><i class="ti ti-lock me-2"></i>Download Report</a>					
                        <!-- <a href="https://preskool.dreamstechnologies.com/html/template/edit-teacher.html" class="btn btn-primary d-flex align-items-center mb-2"><i class="ti ti-edit-circle me-2"></i>Edit Teacher</a>  -->
                    </div>
                    
                    
                </div>
            </div>
            <!-- /Page Header -->


            <!-- Section to convert -->
        <div id="report-section">
            <div class="row">

                <!-- Student Information -->
                <div class="col-xxl-8 col-xl-8">
                    <div class="card border-white">
                        <div class="card-header">
                            <div class="d-flex align-items-center flex-wrap row-gap-3">                                                 
                                <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                                    <img src="{{ !empty($student->student_image) ? asset($student->student_image) : '' }}" class="img-fluid" alt="img">
                                </div>                                              
                                <div class="overflow-hidden">
                                    <span class="badge badge-soft-success d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-5 me-1"></i>{{ $student->status }}</span>
                                    <h5 class="mb-1 text-truncate">{{ $student->first_name }} {{ $student->last_name }}</h5>
                                    <p class="text-primary">{{ $student->admission_number }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="card-body">
                            <h5 class="mb-3">Basic Information</h5>
                            <dl class="row mb-0"> 
                                <dt class="col-6 fw-medium text-dark mb-3">Father name</dt> 
                                <dd class="col-6 mb-3">{{ $student->father_name }}</dd> 
                                <dt class="col-6 fw-medium text-dark mb-3">Mother Name</dt> 
                                <dd class="col-6 mb-3">{{ $student->mother_name }}</dd> 
                                <dt class="col-6 fw-medium text-dark mb-3">Admission Date</dt> 
                                <dd class="col-6 mb-3">{{ $student->admission_date }}</dd> 
                                <dt class="col-6 fw-medium text-dark mb-3">Age</dt> 
                                <dd class="col-6 mb-3">{{ $student->ages->title ?? '' }}</dd> 
                            </dl>
                        </div>
                        <!-- /Basic Information -->
                    </div> 
                </div>

                <!-- Progress Chart -->
                <div class="col-xxl-4 col-xl-4">
                    <div class="row">
                       <div class="">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Progress Chart</h5>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <canvas id="chart-single" style="max-width: 400px; max-height: 400px; width: 100%; height: auto;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Line Tabs -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Report Information</h5>
                        </div>
                       <div class="card-body">
                            {{-- Nav Tabs --}}
                            <ul class="nav nav-tabs nav-tabs-top mb-3">
                                @foreach($report as $topicId => $group)
                                    @php
                                        $topic = \App\Models\Topic::find($topicId);
                                    @endphp
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#tab-{{ $topicId }}">
                                            {{ $topic->topic_name ?? 'Topic ' . $loop->iteration }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            {{-- Tab Content --}}
                            <div class="tab-content">
                                <?php $i = 1; ?>
                                @foreach($report as $topicId => $group)
                                    @php
                                        $topic = \App\Models\Topic::find($topicId);
                                    @endphp

                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $topicId }}">
                                        <div class="row">
                                            {{-- LEFT: Info Card --}}
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="card-title mb-0">{{ $topic->topic_name ?? 'Topic' }}</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive custom-table no-datatable_length">
                                                           <table class="table datanew">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Teacher Name</th>
                                                                        <th>Percentage</th>
                                                                        <th>Subtopics</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($group as $data)
                                                                        @php
                                                                            $subTopicIds = json_decode($data->sub_topic ?? '[]');
                                                                            $subTopics = \App\Models\SubTopic::whereIn('id', $subTopicIds)->pluck('name')->toArray();
                                                                        @endphp
                                                                        <tr>
                                                                            <td>{{ $i++ }}</td>
                                                                            <td>{{ $data->teacher->first_name ?? 'N/A' }}</td>
                                                                            <td>{{ $data->percent }}%</td>
                                                                            <td>
                                                                                @if (!empty($subTopics))
                                                                                    <ul class="list-unstyled mb-0">
                                                                                        @foreach($subTopics as $subTopic)
                                                                                            <li>{{ $subTopic }},</li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @else
                                                                                    N/A
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <a class="btn btn-primary btn-sm" href="{{ route('remarks.index', $data->id) }}">
                                                                                    Remark
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- RIGHT: Chart Card --}}
                                            
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    @if($reportlatest)
        const completed = {{ $reportlatest->percent }};
        const remaining = 100 - completed;

        const ctx = document.getElementById('chart-single').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Completed ({{ $reportlatest->percent }}%)',
                    'Remaining (' + remaining + '%)'
                ],
                datasets: [{
                    data: [completed, remaining],
                    backgroundColor: ['#90ee90', '#dc3545'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // allows height to control size
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });
    @endif
});
</script>



<script>
function savePdfAjax() {
    const element = document.getElementById('report-section');

    const opt = {
        margin: 0.2,
        filename: 'progress-report.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).outputPdf('blob').then(function(pdfBlob) {
        // Save locally
        html2pdf().set(opt).from(element).save();

        // Send to Laravel backend via AJAX
        let formData = new FormData();
        formData.append('pdf', pdfBlob, 'progress-report.pdf');

        $.ajax({
            url: '{{ url("/save-pdf") }}',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('PDF saved:', response.file_path);
                alert('PDF saved to server at: ' + response.file_path);
            },
            error: function (xhr) {
                console.error('Error saving PDF:', xhr.responseText);
                alert('PDF upload failed!');
            }
        });
    });
}
</script>


@endsection






