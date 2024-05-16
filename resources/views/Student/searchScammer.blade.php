@extends('Student.base')
@section('contents')

<br>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Seach Scammer by Phone Number
        </h1>    
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <form method="GET" action="{{ route('student.search') }}">
                    <div class="input-group mb-12">
                        <input type="text" class="form-control" name="phoneNo" placeholder="Enter Phone Number" required>
                        <button class="btn btn-info" style="background-color: white; color: #09888f;" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for displaying search results -->
    <div class="modal fade" id="searchResultModal" tabindex="-1" aria-labelledby="searchResultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchResultModalLabel">Search Results</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($totalCount))
                        <p>Phone Number: {{ $searchedPhoneNo }}</p>
                        <p>Total Complaints: {{ $totalCount }}</p>
                    @else
                        <p>No results found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($showModal ?? false)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('searchResultModal'));
                myModal.show();
            });
        </script>
    @endif
</div>

@stop
