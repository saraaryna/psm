@extends('Admin.base')
@section('contents')




<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Manage Property
        </h1>    
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right; background-color: #7AB3D2; color:white;" data-bs-toggle="modal" data-bs-target="#addApp">+ Add property</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Property Name</th>
                            <th>Property Type</th>
                            <th>Owner Phone No.</th>
                            <th>No Complaint</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($property as $property)
                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs"><a href="{{ route('showProperty', ['id' => $property->propertyID]) }}">{{$property->propertyName}}</a></td>
                        <td class="text-xs">{{$property->propertyType}}</td>
                        <td class="text-xs">{{$property->ownerPhoneNo}}</td>
                        <td class="text-xs">2</td>
                        <td class="table-action">
                            <a href="{{ route('showProperty', ['id' => $property->propertyID]) }}"><i class="align-middle fas fa-fw fa-eye"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $property->propertyID }}"><i class="align-middle fas fa-fw fa-pen"></i></a>                            <a href="/KP-appForm/{{$property->propertyID}}/delete" class="delete-link">
                                <i class="align-middle fas fa-fw fa-trash"></i>
                            </a>                        
                        </td>
                    </tr>        
            <!-- Modal Update -->
            <div class="modal fade" id="update-{{ $property->propertyID }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Property</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('properties.update', $property->propertyID) }}" method="POST">
                            @csrf
                            @method('PUT')                            
                            <div class="modal-body m-3">
                                <div class="form-step step-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="propertyName">Property Name</label>
                                                <input type="text" class="form-control" id="propertyName" name="propertyName" value="{{ $property->propertyName }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="propertyAddress">Property Address</label>
                                                <input type="text" class="form-control" id="propertyAddress" name="propertyAddress" value="{{ $property->propertyAddress }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="propertyType">Property Type</label>
                                                <select class="form-control" id="propertyType" name="propertyType">
                                                    <option value="" disabled>Select Property Type</option>
                                                    <option value="Landed" {{ $property->propertyType == 'Landed' ? 'selected' : '' }}>Landed</option>
                                                    <option value="Bungalow" {{ $property->propertyType == 'Bungalow' ? 'selected' : '' }}>Bungalow</option>
                                                    <option value="Flat" {{ $property->propertyType == 'Flat' ? 'selected' : '' }}>Flat</option>
                                                    <option value="Apartment" {{ $property->propertyType == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                                    <option value="Condo" {{ $property->propertyType == 'Condo' ? 'selected' : '' }}>Condo</option>
                                                </select>
                                            </div>
                                        </div>                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{ $property->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="poscode">Poscode</label>
                                                <input type="text" class="form-control" id="poscode" name="poscode" value="{{ $property->poscode }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="state" name="state" value="{{ $property->state }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bedroom">Bedroom</label>
                                                <input type="number" class="form-control" id="bedroom" name="bedroom" value="{{ $property->bedroom }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="bathroom">Bathroom</label>
                                                <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ $property->bathroom }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Gender preferred</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="" disabled>Select gender</option>
                                                    <option value="Female" {{ $property->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Male" {{ $property->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Both" {{ $property->gender == 'Both' ? 'selected' : '' }}>Both</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="race">Race preferred</label>
                                                <select class="form-control" id="race" name="race">
                                                    <option value="" disabled>Select race</option>
                                                    <option value="Malay" {{ $property->race == 'Malay' ? 'selected' : '' }}>Malay</option>
                                                    <option value="Chinese" {{ $property->race == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                                    <option value="Indian" {{ $property->race == 'Indian' ? 'selected' : '' }}>Indian</option>
                                                    <option value="All" {{ $property->race == 'All' ? 'selected' : '' }}>All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="propertyRentPrice">Property Rent Price (monthly)</label>
                                                <input type="text" class="form-control" id="propertyRentPrice" name="propertyRentPrice" value="{{ $property->propertyRentPrice }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Property Furnish</label><br>
                                                <div class="row">
                                                    @php
                                                        $furnishes = ['Internet', 'Bed', 'Dining table', 'Water heater', 'Refrigerator', 'Washing machine'];
                                                    @endphp
                                                    @foreach($furnishes as $furnish)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ strtolower(str_replace(' ', '', $furnish)) }}" name="propertyFurnish[]" value="{{ $furnish }}" {{ in_array($furnish, explode(',', $property->propertyFurnish)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="{{ strtolower(str_replace(' ', '', $furnish)) }}">{{ $furnish }}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>   
                                        </div>                             
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ownerPhoneNo">Owner's Phone Number</label>
                                                <input type="text" class="form-control" id="ownerPhoneNo" name="ownerPhoneNo" value="{{ $property->ownerPhoneNo }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="noPeople">Number max of People</label>
                                                <input type="number" class="form-control" id="noPeople" name="noPeople" value="{{ $property->noPeople }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="propertyDesc">Description</label>
                                                <textarea class="form-control" id="propertyDesc" name="propertyDesc" rows="3">{{ $property->propertyDesc }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>                    
                                <div class="form-step step-2" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="propertyImages">Upload Images</label>
                                                <input type="file" class="form-control" id="propertyImage" name="propertyImage">
                                            </div>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-prev" style="display: none;">Previous</button>
                                <button type="button" class="btn btn-primary btn-next">Next</button>
                                <button type="submit" class="btn btn-primary btn-submit" style="display: none;" name="updateProperty">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach           
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addApp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="step-form" method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body m-3">
                    <div class="form-step step-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="propertyName">Property Name</label>
                                    <input type="text" class="form-control" id="propertyName" name="propertyName" required>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="propertyAddress">Property Address</label>
                                    <input type="text" class="form-control" id="propertyAddress" name="propertyAddress" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="propertyType">Property Type</label>
                                    <select class="form-control" id="propertyType" name="propertyType">
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option value="Landed">Landed</option>
                                        <option value="Bungalow">Bungalow</option>
                                        <option value="Flat">Flat</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Condo">Condo</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="poscode">Poscode</label>
                                    <input type="text" class="form-control" id="poscode" name="poscode">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bedroom">Bedroom</label>
                                    <input type="number" class="form-control" id="bedroom" name="bedroom" required>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="bathroom">Bathroom</label>
                                    <input type="number" class="form-control" id="bathroom" name="bathroom" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender preferred</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="" disabled selected>Select gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Both">Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="race">Race preferred</label>
                                    <select class="form-control" id="race" name="race">
                                        <option value="" disabled selected>Select race</option>
                                        <option value="Malay">Malay</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Indian">Indian</option>
                                        <option value="All">All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="propertyRentPrice">Property Rent Price (monthly)</label>
                                    <input type="text" class="form-control" id="propertyRentPrice" name="propertyRentPrice">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Property Furnish</label><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="internet" name="propertyFurnish[]" value="Internet">
                                                <label class="form-check-label" for="internet">Internet</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="bed" name="propertyFurnish[]" value="Bed">
                                                <label class="form-check-label" for="bed">Bed</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="diningTable" name="propertyFurnish[]" value="Dining table">
                                                <label class="form-check-label" for="diningTable">Dining Table</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="waterHeater" name="propertyFurnish[]" value="Water heater">
                                                <label class="form-check-label" for="waterHeater">Water Heater</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="refrigerator" name="propertyFurnish[]" value="Refrigerator">
                                                <label class="form-check-label" for="refrigerator">Refrigerator</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="washingMachine" name="propertyFurnish[]" value="Washing machine">
                                                <label class="form-check-label" for="washingMachine">Washing Machine</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>                             
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ownerPhoneNo">Owner's Phone Number</label>
                                    <input type="text" class="form-control" id="ownerPhoneNo" name="ownerPhoneNo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="noPeople">Number max of People</label>
                                    <input type="number" class="form-control" id="noPeople" name="noPeople">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="propertyDesc">Description</label>
                                    <textarea class="form-control" id="propertyDesc" name="propertyDesc" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-step step-2" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="propertyImages">Upload Images</label>
                                    <input type="file" class="form-control" id="propertyImage" name="propertyImage">
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-prev" style="display: none;">Previous</button>
                    <button type="button" class="btn btn-primary btn-next">Next</button>
                    <button type="submit" class="btn btn-primary btn-submit" style="display: none;" name="addApp">APPLY</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var currentStep = 1;
        $('.btn-next').click(function () {
            $('.step-' + currentStep).hide();
            currentStep++;
            $('.step-' + currentStep).show();
            if (currentStep === 2) {
                $('.btn-prev').show();
                $('.btn-next').hide();
                $('.btn-submit').show();
            }
        });

        $('.btn-prev').click(function () {
            $('.step-' + currentStep).hide();
            currentStep--;
            $('.step-' + currentStep).show();
            if (currentStep === 1) {
                $('.btn-prev').hide();
                $('.btn-next').show();
                $('.btn-submit').hide();
            }
        });
    });
</script>


    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});

	</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteLinks = document.querySelectorAll('.delete-link');

        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                var confirmation = confirm('Are you sure you want to delete this property?');
                
                if (!confirmation) {
                    event.preventDefault(); // Cancel the default behavior if not confirmed
                }
            });
        });
    });
</script>





@stop


