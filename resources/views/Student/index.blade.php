@extends('Student.base')
@section('contents')

<br>

<div class="container">
    <div id="dashboardImg" class="carousel slide" data-bs-ride="carousel">
     <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="\img\faculty.png" class="d-block w-100" style="height: 300px;">
        </div>
        <div class="carousel-item">
            <img src="\img\jhepa.jpg" class="d-block w-100" style="height: 300px;">
        </div>
        <div class="carousel-item">
            <img src="\img\umpsa.jpg" class="d-block w-100" style="height: 300px;">
        </div>
     </div>
    </div>
</div>

<br>

<div class="row">
    <!-- Status of student details -->
    <div class="col-6 col-md-7 col-xxl-6 d-flex order-1 order-xxl-1 ms-md-3"> 
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">User Status</h5>
            </div>
            <div class="card-body px-4 text-center" >
                <table id="datatables-dashboard-projects" class="table table-striped my-0">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Profile</td>
                            <td> <span class="badge {{ $profileStatus == 'Done' ? 'bg-success' : 'bg-warning' }}">
                                {{ $profileStatus }}
                            </span></td>
                        </tr>     
                        <tr>
                            <td>Accommodation</td>
                            <td> <span class="badge {{ $accommodationStatus == 'Done' ? 'bg-success' : 'bg-warning' }}">
                                {{ $accommodationStatus }}
                            </span></td>
                        </tr>                                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <!-- Calendar section -->
    <div class="col-6 col-md-4 col-xxl-4 d-flex order-1 order-xxl-2 ms-md-4"> <!-- Adjusted column widths and order -->
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Calendar</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <div id="datetimepicker-dashboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsvectormap/2.0.5/js/jsvectormap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsvectormap/2.0.5/css/jsvectormap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsvectormap/2.0.5/css/jsvectormap-jqvmap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/en-gb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script>
    $(function() {
        $('#datetimepicker-dashboard').datetimepicker({
            inline: true,
            sideBySide: false,
            format: 'L'
        });
    });
</script>

<style>
    /* Custom CSS to change date picker color */
    .bootstrap-datetimepicker-widget .datepicker-days table td.active,
    .bootstrap-datetimepicker-widget .datepicker-days table td.active:hover,
    .bootstrap-datetimepicker-widget .datepicker-days table td.active.disabled,
    .bootstrap-datetimepicker-widget .datepicker-days table td.active.disabled:hover {
        background-color: #09888f;
        border-color: #09888f;
    }
</style>

<script>
    $(function() {
        $('#datatables-dashboard-projects').DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false
        });
    });
</script>

@stop
