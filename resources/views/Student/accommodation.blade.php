@extends('Student.base')
@section('contents')

<br>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Accommodation
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Student Accommodation</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $user->id }}"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Semester</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->sem}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Accommodation Type</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->accoType}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Accommodation Address</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->accoAddress}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">City</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->accoCity}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Poscode</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->accoPoscode}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">State</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->accoState}}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Emergency Contact No</td>
                                    <td style="line-height: 0; font-size: 13px;">{{$rental_house->emergencyContactNo}}</td>
                                </tr>
                                  <!-- Modal for Update Profile -->
                                  <div class="modal fade" id="update-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateProfileModalLabel">Update Accommodation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $rental_house->address ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="city" class="form-label">City:</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="{{ $rental_house->city ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="poscode" class="form-label">Poscode:</label>
                                                        <input type="text" class="form-control" id="poscode" name="poscode" value="{{ $rental_house->poscode ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="state" class="form-label">State:</label>
                                                        <input type="text" class="form-control" id="state" name="state" value="{{ $rental_house->state ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contactNo" class="form-label">Contact No:</label>
                                                        <input type="text" class="form-control" id="contactNo" name="contactNo" value="{{ $rental_house->contactNo ?? '' }}" required>
                                                    </div>
                                                    <button type="submit" class="btn" style="background-color: #41968B; color:white;">Update Rental House Info</button>
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
    </div>
</div>


@stop
