@extends('Admin.base')
@section('contents')


<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Manage Complaint
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
                            <th>Date</th>
                            <th>Owner Phone No</th>
                            <th>Description</th>
                            <th>Evidence</th>
                            <th>No of Report</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($complaint as $complaint)
                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs">{{$complaint->created_at}}</td>
                        <td class="text-xs">{{$complaint->landlordPhoneNo}}</td>
                        <td class="text-xs">{{$complaint->complaintDesc}}</td>
                        <td class="text-xs">{{$complaint->complaintImage}}</td>
                        <td class="text-xs">2</td>
                        <td class="table-action">
                            <a href="/viewProfile" data-bs-target="#modalDetails-{{ $complaint->id }}"><i
                                class="align-middle fas fa-fw fa-eye"></i></i></a>
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


