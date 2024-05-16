@extends('Admin.base')
@section('contents')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Report
        </h1>    
    </div>
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <h5>Student by Faculty</h5>
                    <canvas id="facultyChart"></canvas>
                    <div id="facultyTable" style="display: none;"> <!-- Table for Faculty Data, initially hidden -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody id="facultyTableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Student by Year</h5>
                    <canvas id="yearChart"></canvas>
                    <div id="yearTable" style="display: none;"> <!-- Table for Year Data, initially hidden -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody id="yearTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <button id="printButton" class="btn btn-primary">Print</button>
    </div>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data for Faculty Chart
    var facultyLabels = @json($facultyLabels);
    var facultyData = @json($facultyData);

    var ctxFaculty = document.getElementById('facultyChart').getContext('2d');
    var facultyChart = new Chart(ctxFaculty, {
        type: 'bar',
        data: {
            labels: facultyLabels,
            datasets: [{
                label: 'Student off-campus by faculty',
                data: facultyData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1 // Ensure increments of 1
                }
            }
        }
    });

    // Data for Year Chart
    var yearLabels = @json($yearLabels);
    var yearData = @json($yearData);

    var ctxYear = document.getElementById('yearChart').getContext('2d');
    var yearChart = new Chart(ctxYear, {
        type: 'bar',
        data: {
            labels: yearLabels,
            datasets: [{
                label: 'Student off-campus by year',
                data: yearData,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1 // Ensure increments of 1
                }
            }
        }
    });

    // Convert chart data to table format
    function convertToTable(labels, data, containerId) {
        var tableBody = '';
        for (var i = 0; i < labels.length; i++) {
            tableBody += '<tr><td>' + labels[i] + '</td><td>' + data[i] + '</td></tr>';
        }
        document.getElementById(containerId).innerHTML = tableBody;
    }

    // Print functionality
    document.getElementById('printButton').addEventListener('click', function() {
        // Hide charts
        document.getElementById('facultyChart').style.display = 'none';
        document.getElementById('yearChart').style.display = 'none';
        
        // Show tables
        document.getElementById('facultyTable').style.display = 'block';
        document.getElementById('yearTable').style.display = 'block';
        
        // Print
        window.print();
        
        // Revert to initial state after printing (show charts, hide tables)
        document.getElementById('facultyChart').style.display = 'block';
        document.getElementById('yearChart').style.display = 'block';
        document.getElementById('facultyTable').style.display = 'none';
        document.getElementById('yearTable').style.display = 'none';
    });

    // Convert chart data to tables
    convertToTable(facultyLabels, facultyData, 'facultyTableBody');
    convertToTable(yearLabels, yearData, 'yearTableBody');
});
</script>

@stop
