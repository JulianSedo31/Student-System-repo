@extends('layouts.dashboardlayout')
@section('title', 'Student')
@section('content')
                
<div class="container-fluid px-4">
                        <h1 class="mt-4">Student</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Student</li>
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
                                DataTable Example
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Moto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Moto</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($studentList as $student)
                <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->address}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->moto}}</td>
                        <td>
                        <a href="#" onclick="viewStudent({{ json_encode($student) }})"><i class="fa-solid fa-eye"></i></a>&nbsp
                        <a href="#" onclick="editStudent({{ json_encode($student) }})"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp
                        <a href="#" onclick="deleteStudent({{$student->id}})"><i class="fa-solid fa-trash"></i></a>&nbsp
                        
                            <form method="POST" action="{{route('student.destroy', $student->id)}}" id="student-form-{{$student->id}}">
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
                        function deleteStudent(id){
                            alert(id);
                            form=document.getElementById('student-form-'+id);
                            form.submit();
                        }
                    </script>
                    <!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Edit Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="editStudentName">Name</label>
                        <input type="text" class="form-control" id="editStudentName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editStudentAddress">Address</label>
                        <input type="text" class="form-control" id="editStudentAddress" name="address">
                    </div>
                    <div class="form-group">
                        <label for="editStudentEmail">Email</label>
                        <input type="email" class="form-control" id="editStudentEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editStudentAge">Age</label>
                        <input type="number" class="form-control" id="editStudentAge" name="age">
                    </div>
                    <div class="form-group">
                        <label for="editStudentMoto">Moto</label>
                        <input type="text" class="form-control" id="editStudentMoto" name="moto">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editStudent(student) {
        document.getElementById('editStudentName').value = student.name;
        document.getElementById('editStudentAddress').value = student.address;
        document.getElementById('editStudentEmail').value = student.email;
        document.getElementById('editStudentAge').value = student.age;
        document.getElementById('editStudentMoto').value = student.moto;
        
        // Set the form action to the correct route
        document.getElementById('editStudentForm').action = "{{ url('student') }}/" + student.id;

        var editModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
        editModal.show();
    }
</script>

<!-- Add Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addStudentForm" method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="addStudentName">Name</label>
                        <input type="text" class="form-control" id="addStudentName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="addStudentAddress">Address</label>
                        <input type="text" class="form-control" id="addStudentAddress" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="addStudentEmail">Email</label>
                        <input type="email" class="form-control" id="addStudentEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="addStudentAge">Age</label>
                        <input type="number" class="form-control" id="addStudentAge" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="addStudentMoto">Moto</label>
                        <input type="text" class="form-control" id="addStudentMoto" name="moto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStudentModalLabel">View Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="viewStudentId"></span></p>
                <p><strong>Name:</strong> <span id="viewStudentName"></span></p>
                <p><strong>Address:</strong> <span id="viewStudentAddress"></span></p>
                <p><strong>Email:</strong> <span id="viewStudentEmail"></span></p>
                <p><strong>Age:</strong> <span id="viewStudentAge"></span></p>
                <p><strong>Moto:</strong> <span id="viewStudentMoto"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
    function viewStudent(student) {
        document.getElementById('viewStudentId').textContent = student.id;
        document.getElementById('viewStudentName').textContent = student.name;
        document.getElementById('viewStudentAddress').textContent = student.address;
        document.getElementById('viewStudentEmail').textContent = student.email;
        document.getElementById('viewStudentAge').textContent = student.age;
        document.getElementById('viewStudentMoto').textContent = student.moto;

        var viewModal = new bootstrap.Modal(document.getElementById('viewStudentModal'));
        viewModal.show();
    }
</script>

 @endsection    
                