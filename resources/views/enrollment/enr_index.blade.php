@extends('layouts.dashboardlayout')
@section('title', 'Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Enrollment</li>
    </ol>

    @if(session('confirmMessage'))
    <div class="alert alert-{{ session('alertType') }} alert-dismissible fade show" role="alert">
        {{ session('confirmMessage') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Enrollment List
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEnrollmentModal">Add Enrollment</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($enrollmentList as $enrollment)
                <tr>
                    <td>{{ $enrollment->id }}</td>
                    <td>{{ $enrollment->student ? $enrollment->student->name : 'N/A' }}</td>
                    <td>{{ $enrollment->subject ? $enrollment->subject->name : 'N/A' }}</td>
                    <td>{{ $enrollment->semester }}</td>
                    <td>{{ $enrollment->status }}</td>
                    <td>
                        <a href="#" onclick="viewEnrollment({{ json_encode($enrollment) }})"><i class="fa-solid fa-eye"></i></a>&nbsp;
                        <a href="#" onclick="editEnrollment({{ json_encode($enrollment) }})"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                        <form method="POST" action="{{ route('enrollment.destroy', $enrollment->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none;">
                                <i class="fa-solid fa-trash trash-icon"></i>
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

<!-- View Modal -->
<div class="modal fade" id="viewEnrollmentModal" tabindex="-1" aria-labelledby="viewEnrollmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEnrollmentModalLabel">View Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="viewEnrollmentId"></span></p>
                <p><strong>Student:</strong> <span id="viewEnrollmentStudent"></span></p>
                <p><strong>Subject:</strong> <span id="viewEnrollmentSubject"></span></p>
                <p><strong>Semester:</strong> <span id="viewEnrollmentSemester"></span></p>
                <p><strong>Status:</strong> <span id="viewEnrollmentStatus"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editEnrollmentModal" tabindex="-1" aria-labelledby="editEnrollmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEnrollmentModalLabel">Edit Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEnrollmentForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="editEnrollmentStudent">Student</label>
                        <select class="form-control" id="editEnrollmentStudent" name="student_id">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editEnrollmentSubject">Subject</label>
                        <select class="form-control" id="editEnrollmentSubject" name="subject_id">
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editEnrollmentSemester">Semester</label>
                        <input type="text" class="form-control" id="editEnrollmentSemester" name="semester">
                    </div>
                    <div class="form-group">
                        <label for="editEnrollmentStatus">Status</label>
                        <input type="text" class="form-control" id="editEnrollmentStatus" name="status">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Enrollment Modal -->
<div class="modal fade" id="addEnrollmentModal" tabindex="-1" aria-labelledby="addEnrollmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEnrollmentModalLabel">Add Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEnrollmentForm" method="POST" action="{{ route('enrollment.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="addEnrollmentStudent">Student</label>
                        <select class="form-control" id="addEnrollmentStudent" name="student_id" required>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addEnrollmentSubject">Subject</label>
                        <select class="form-control" id="addEnrollmentSubject" name="subject_id" required>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addEnrollmentSemester">Semester</label>
                        <input type="text" class="form-control" id="addEnrollmentSemester" name="semester" required>
                    </div>
                    <div class="form-group">
                        <label for="addEnrollmentStatus">Status</label>
                        <input type="text" class="form-control" id="addEnrollmentStatus" name="status" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Enrollment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function viewEnrollment(enrollment) {
        document.getElementById('viewEnrollmentId').textContent = enrollment.id;
        document.getElementById('viewEnrollmentStudent').textContent = enrollment.student ? enrollment.student.name : 'N/A';
        document.getElementById('viewEnrollmentSubject').textContent = enrollment.subject ? enrollment.subject.name : 'N/A';
        document.getElementById('viewEnrollmentSemester').textContent = enrollment.semester;
        document.getElementById('viewEnrollmentStatus').textContent = enrollment.status;

        var viewModal = new bootstrap.Modal(document.getElementById('viewEnrollmentModal'));
        viewModal.show();
    }

    function editEnrollment(enrollment) {
        document.getElementById('editEnrollmentStudent').value = enrollment.student_id;
        document.getElementById('editEnrollmentSubject').value = enrollment.subject_id;
        document.getElementById('editEnrollmentSemester').value = enrollment.semester;
        document.getElementById('editEnrollmentStatus').value = enrollment.status;

        // Set the form action to the correct route
        document.getElementById('editEnrollmentForm').action = "{{ url('enrollment') }}/" + enrollment.id;

        var editModal = new bootstrap.Modal(document.getElementById('editEnrollmentModal'));
        editModal.show();
    }
</script>

<style>
    .trash-icon {
        color: blue; /* Change this to the desired color */
    }
</style>

@endsection    
                