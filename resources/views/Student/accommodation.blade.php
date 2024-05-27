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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-{{ $user->id }}"><i class="align-middle fas fa-fw fa-pen"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Semester</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->sem ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Session</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->session ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Number of people in the house</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->people ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Accommodation Type</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->accoType ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Accommodation Address</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->accoAddress ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">City</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->accoCity ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Poscode</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->accoPoscode ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">State</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->accoState ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="line-height: 0; font-size: 13px;">Emergency Contact No</td>
                                    <td style="line-height: 0; font-size: 13px;">{{ $rental_house->emergencyContactNo ?? '-' }}</td>
                                </tr>
                              <!-- Modal for Add Accommodation -->
                                <div class="modal fade" id="add-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="addAccommodation" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rental_house ? 'Update' : 'Add' }} Accommodation <!-- Dynamic modal title -->
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ $rental_house ? route('accommodation.updateAccommodation', $rental_house->id) : route('accommodation.store') }}" method="POST">
                                                    @csrf
                                                    @if ($rental_house)
                                                        @method('PUT')
                                                    @endif
                                                    <div class="mb-3">
                                                        <label for="sem" class="form-label">Semester:</label>
                                                        <select class="form-select" id="sem" name="sem" required>
                                                            <option value="">Select Semester</option>
                                                            <option value="Semester 1" {{ $rental_house && $rental_house->sem == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                                                            <option value="Semester 2" {{ $rental_house && $rental_house->sem == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="session" class="form-label">Session:</label>
                                                        <select class="form-select" id="session" name="session" required>
                                                            <option value="">Select Session</option>
                                                            <option value="2023/2024" {{ $rental_house && $rental_house->session == '2023/2024' ? 'selected' : '' }}>2023/2024</option>
                                                            <option value="2024/2025" {{ $rental_house && $rental_house->session == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                                                            <option value="2025/2026" {{ $rental_house && $rental_house->session == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="accoType" class="form-label">Accommodation Type:</label>
                                                        <select class="form-select" id="accoType" name="accoType" required>
                                                            <option value="">Select Accommodation Type</option>
                                                            <option value="Rental House" {{ $rental_house && $rental_house->accoType == 'Rental House' ? 'selected' : '' }}>Rental House</option>
                                                            <option value="Parents House" {{ $rental_house && $rental_house->accoType == 'Parents House' ? 'selected' : '' }}>Parents House</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="people" class="form-label">People:</label>
                                                        <input type="text" class="form-control" id="people" name="people" value="{{ $rental_house->people ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $rental_house->accoAddress ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="city" class="form-label">City:</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="{{ $rental_house->accoCity ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="poscode" class="form-label">Poscode:</label>
                                                        <input type="text" class="form-control" id="poscode" name="poscode" value="{{ $rental_house->accoPoscode ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="state" class="form-label">State:</label>
                                                        <input type="text" class="form-control" id="state" name="state" value="{{ $rental_house->accoState ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contactNo" class="form-label">Contact No:</label>
                                                        <input type="text" class="form-control" id="contactNo" name="contactNo" value="{{ $rental_house->emergencyContactNo ?? '' }}" required>
                                                    </div>
                                                    <button type="submit" class="btn" style="background-color: #41968B; color:white;">
                                                        {{ $rental_house ? 'Update' : 'Add' }} Rental House Info
                                                    </button>                                               
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
