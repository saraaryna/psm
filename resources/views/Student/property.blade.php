@extends('Student.base')
@section('contents')


<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Property Listing
        </h1>    
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Property Name</th>
                            <th>Property Type</th>
                            <th>Owner Phone No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($property as $property)
                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs"><a href="{{ route('showPropertyStud', ['id' => $property->propertyID]) }}">{{$property->propertyName}}</a></td>
                        <td class="text-xs">{{$property->propertyType}}</td>
                        <td class="text-xs">{{$property->ownerPhoneNo}}</td>
                         </td>
                        <td class="table-action">
                            <a href="{{ route('showPropertyStud', ['id' => $property->propertyID]) }}"><i class="align-middle fas fa-fw fa-eye"></i></a>
                        </td>
                    </tr>      
                    @endforeach  
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>



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


