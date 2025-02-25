@extends('layouts.dashboardlayout')
@section('title', 'Subject')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Subjects</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Subjects</li>
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
            Subjects Table
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subject</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>
                        <a href="#" onclick="viewSubject({{ json_encode($subject) }})"><i class="fa-solid fa-eye"></i></a>&nbsp;
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editSubjectModal" onclick="editSubject({{ json_encode($subject) }})"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                        <a href="#" onclick="deleteSubject({{ $subject->id }})"><i class="fa-solid fa-trash"></i></a>&nbsp;
                        
                        <form method="POST" action="{{ route('subject.destroy', $subject->id) }}" id="subject-form-{{ $subject->id }}" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubjectModalLabel">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubjectForm" method="POST" action="{{ route('subject.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="addSubjectName">Name</label>
                        <input type="text" class="form-control" id="addSubjectName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="addSubjectCode">Code</label>
                        <input type="text" class="form-control" id="addSubjectCode" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="addSubjectDescription">Description</label>
                        <textarea class="form-control" id="addSubjectDescription" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Subject</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubjectForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="editSubjectName">Name</label>
                        <input type="text" class="form-control" id="editSubjectName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editSubjectCode">Code</label>
                        <input type="text" class="form-control" id="editSubjectCode" name="code">
                    </div>
                    <div class="form-group">
                        <label for="editSubjectDescription">Description</label>
                        <textarea class="form-control" id="editSubjectDescription" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewSubjectModal" tabindex="-1" aria-labelledby="viewSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSubjectModalLabel">View Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="viewSubjectId"></span></p>
                <p><strong>Name:</strong> <span id="viewSubjectName"></span></p>
                <p><strong>Code:</strong> <span id="viewSubjectCode"></span></p>
                <p><strong>Description:</strong> <span id="viewSubjectDescription"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
    function editSubject(subject) {
        document.getElementById('editSubjectName').value = subject.name;
        document.getElementById('editSubjectCode').value = subject.code;
        document.getElementById('editSubjectDescription').value = subject.description;
        
        // Set the form action to the correct route
        document.getElementById('editSubjectForm').action = "{{ url('subject') }}/" + subject.id;

        // Ensure Bootstrap's modal is initialized and shown
        var editModal = new bootstrap.Modal(document.getElementById('editSubjectModal'), {
            keyboard: false
        });
        editModal.show();
    }

    function viewSubject(subject) {
        document.getElementById('viewSubjectId').textContent = subject.id;
        document.getElementById('viewSubjectName').textContent = subject.name;
        document.getElementById('viewSubjectCode').textContent = subject.code;
        document.getElementById('viewSubjectDescription').textContent = subject.description;

        var viewModal = new bootstrap.Modal(document.getElementById('viewSubjectModal'));
        viewModal.show();
    }

    function deleteSubject(id) {
        if (confirm('Are you sure you want to delete this subject?')) {
            document.getElementById('subject-form-' + id).submit();
        }
    }
</script>

@endsection    
                