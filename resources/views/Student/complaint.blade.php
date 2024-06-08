@extends('Student.base')
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
                <a href="#" class="btn btn-info" style="float: right; background-color: #09888f; color:white;" data-bs-toggle="modal" data-bs-target="#addComplaint">+ Add Complaint</a>
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
                        @foreach($allComplaints as $complaint)
                        <tr>
                            <td class="text-xs">{{ $loop->index + 1 }}</td>
                            <td class="text-xs">{{ $complaint->created_at }}</td>
                            <td class="text-xs">{{ $complaint->landlordPhoneNo }}</td>
                            <td class="text-xs">{{ $complaint->complaintDesc }}</td>
                            <td class="text-xs">
                                <a href="/storage/{{ $complaint->complaintImage }}" target="_blank">View</a>
                            </td>
                            <td class="text-xs">
                                @foreach($complaints as $reportCount)
                                    @if($reportCount->landlordPhoneNo === $complaint->landlordPhoneNo)
                                        {{ $reportCount->report_count }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="table-action">
                                <a href="/complaint/{{ $complaint->id }}/delete" class="delete-link">
                                    <i class="align-middle fas fa-fw fa-trash"></i>
                                </a>                                                      
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addComplaint" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="{{ route('complaint.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Landlord Phone No</label>
                        <input type="text" class="form-control" id="landlordPhoneNo" name="landlordPhoneNo" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Complaint Description</label>
                        <input type="text" class="form-control" id="complaintDesc" name="complaintDesc" required>
                    </div>
                    <div class="form-group">
                        <label>Proof (if any)</label>
                        <input type="file" name="complaintImage" class="form-control" id="inputFile">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="addComplaint">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        @if (session('success'))
            alert("{{ session('success') }}");
        @endif
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
                var confirmation = confirm('Are you sure you want to delete this complaint?');
                
                if (!confirmation) {
                    event.preventDefault(); // Cancel the default behavior if not confirmed
                }
            });
        });
    });
</script>


@stop


