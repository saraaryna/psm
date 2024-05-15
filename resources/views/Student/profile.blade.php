@extends('Student.base')
@section('contents')

<br>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Profile
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard-default.html">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Student Information</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $user->id }}"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Student ID</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->studentID}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Name</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">IC</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->ic}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Faculty</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->faculty}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Program</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->program}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Year</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$user->year}}</td>
                                </tr>
                                <!-- Modal for Update Profile -->
                                    <div class="modal fade" id="update-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name:</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email:</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="program" class="form-label">Program:</label>
                                                            <select class="form-select" id="program" name="program" required>
                                                                <option value="">Select Program</option>
                                                                <option value="Diploma in Computer Science" {{ $user->program === 'Diploma in Computer Science' ? 'selected' : '' }}>Diploma in Computer Science</option>
                                                                <option value="Bachelor of Computer Science (Software Engineering) with Honours" {{ $user->program === 'Bachelor of Computer Science (Software Engineering) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Software Engineering) with Honours</option>
                                                                <option value="Bachelor of Computer Science (Computer Systems & Networking) with Honours" {{ $user->program === 'Bachelor of Computer Science (Computer Systems & Networking) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Computer Systems & Networking) with Honours</option>
                                                                <option value="Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours" {{ $user->program === 'Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours</option>
                                                                <option value="Bachelor of Computer Science (Cyber Security) with Honours" {{ $user->program === 'Bachelor of Computer Science (Cyber Security) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Cyber Security) with Honours</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="year" class="form-label">Year:</label>
                                                            <select class="form-select" id="year" name="year" required>
                                                                <option value="">Select Year</option>
                                                                <option value="1" {{ $user->year === '1' ? 'selected' : '' }}>1</option>
                                                                <option value="2" {{ $user->year === '2' ? 'selected' : '' }}>2</option>
                                                                <option value="3" {{ $user->year === '3' ? 'selected' : '' }}>3</option>
                                                                <option value="4" {{ $user->year === '4' ? 'selected' : '' }}>4</option>
                                                                <option value="5" {{ $user->year === '5' ? 'selected' : '' }}>5</option>
                                                            </select>
                                                        </div>                                                                                                                <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
{{-- 
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="sem" class="form-label">Semester:</label>
                            <select class="form-select" id="sem" name="sem" required>
                                <option value="">Select Semester</option>
                                <option value="Semester 1 2023/2024">Semester 1 2023/2024</option>
                                <option value="Semester 2 2023/2024">Semester 2 2023/2024</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="accoType" class="form-label">Accomodation Type:</label>
                            <select class="form-select" id="accoType" name="accoType" required>
                                <option value="">Select accommodation type</option>
                                <option value="Rental House">Rental House</option>
                                <option value="Parents house">Parents house</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="accoAddress"required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City:</label>
                            <input type="text" class="form-control" id="city" name="accoCity"required>
                        </div>
                        <div class="mb-3">
                            <label for="poscode" class="form-label">Poscode:</label>
                            <input type="text" class="form-control" id="poscode" name="accoPoscode"required>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" class="form-control" id="state" name="accoState"required>
                        </div>
                        <div class="mb-3">
                            <label for="contactNo" class="form-label">Contact No:</label>
                            <input type="text" class="form-control" id="contactNo" name="emergencyContactNo" required>
                        </div>
                        <button type="submit" class="btn" style="background-color: #41968B; color:white;">Update Rental House Info</button>
                    </form>
                </div>
            </div>
        </div>
         --}}





@stop
