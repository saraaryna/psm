@extends('Admin.base')
@section('contents')

<br>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            User Listing
        </h1>    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/manageUser-Admin">Manage User</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }} </li>
            </ol>
        </nav>

    </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title">Student Information</h5>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if($rental_house)
<!-- New Table for Accommodation Details -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title">Accommodation Details</h5>
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
                                <td style="line-height: 0; font-size: 13px;">Address</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- Display message if there's no rental house data -->
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            No accommodation details available for this student.
        </div>
    </div>
</div>
@endif

@stop