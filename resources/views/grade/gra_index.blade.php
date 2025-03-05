@extends('layouts.dashboardlayout')
@section('title', 'Grade')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Grades</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Grades</li>
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
            Grades Table
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGradeModal">Add Grade</button>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Subject ID</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Subject ID</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->id }}</td>
                    <td>{{ $grade->student_id }}</td>
                    <td>{{ $grade->subject_id }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>{{ $grade->remarks }}</td>
                    <td>
                        <a href="#" onclick="viewGrade({{ json_encode($grade) }})"><i class="fa-solid fa-eye"></i></a>&nbsp
                        <a href="#" onclick="editGrade({{ json_encode($grade) }})"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp
                        <a href="#" onclick="deleteGrade({{ $grade->id }})"><i class="fa-solid fa-trash"></i></a>&nbsp
                        
                        <form method="POST" action="{{ route('grade.destroy', $grade->id) }}" id="grade-form-{{ $grade->id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteGrade(id){
        alert(id);
        form=document.getElementById('grade-form-'+id);
        form.submit();
    }

    function editGrade(grade) {
        document.getElementById('editStudentId').value = grade.student_id;
        document.getElementById('editSubjectId').value = grade.subject_id;
        document.getElementById('editGrade').value = grade.grade;
        document.getElementById('editRemarks').value = grade.remarks;
        
        // Set the form action to the correct route
        document.getElementById('editGradeForm').action = "{{ url('grade') }}/" + grade.id;

        var editModal = new bootstrap.Modal(document.getElementById('editGradeModal'));
        editModal.show();
    }

    function viewGrade(grade) {
        document.getElementById('viewGradeId').textContent = grade.id;
        document.getElementById('viewStudentId').textContent = grade.student_id;
        document.getElementById('viewSubjectId').textContent = grade.subject_id;
        document.getElementById('viewGrade').textContent = grade.grade;
        document.getElementById('viewRemarks').textContent = grade.remarks;

        var viewModal = new bootstrap.Modal(document.getElementById('viewGradeModal'));
        viewModal.show();
    }
</script>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Add Modal -->
<div class="modal fade" id="addGradeModal" tabindex="-1" aria-labelledby="addGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGradeModalLabel">Add Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addGradeForm" method="POST" action="{{ route('grade.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="number" class="form-control" id="student_id" name="student_id" required>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Subject ID</label>
                        <input type="number" class="form-control" id="subject_id" name="subject_id" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="number" step="0.1" class="form-control" id="grade" name="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Grade</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGradeModalLabel">Edit Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editGradeForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="editStudentId">Student ID</label>
                        <input type="number" class="form-control" id="editStudentId" name="student_id" required>
                    </div>
                    <div class="form-group">
                        <label for="editSubjectId">Subject ID</label>
                        <input type="number" class="form-control" id="editSubjectId" name="subject_id" required>
                    </div>
                    <div class="form-group">
                        <label for="editGrade">Grade</label>
                        <input type="number" step="0.1" class="form-control" id="editGrade" name="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="editRemarks">Remarks</label>
                        <input type="text" class="form-control" id="editRemarks" name="remarks">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewGradeModal" tabindex="-1" aria-labelledby="viewGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewGradeModalLabel">View Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="viewGradeId"></span></p>
                <p><strong>Student ID:</strong> <span id="viewStudentId"></span></p>
                <p><strong>Subject ID:</strong> <span id="viewSubjectId"></span></p>
                <p><strong>Grade:</strong> <span id="viewGrade"></span></p>
                <p><strong>Remarks:</strong> <span id="viewRemarks"></span></p>
            </div>
        </div>
    </div>
</div>

@endsection    
                