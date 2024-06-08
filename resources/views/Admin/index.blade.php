@extends('Admin.base')
@section('contents')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                Dashboard
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 col-xl">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Student</h5>
                            </div>
                            <div class="col-auto">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="display-5 mt-1 mb-3">
                            {{ $totalUsers }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Property</h5>
                            </div>
                            <div class="col-auto">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                        <i class="align-middle" data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="display-5 mt-1 mb-3">
                            {{ $totalProperties }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Complaint</h5>
                            </div>
                            <div class="col-auto">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                        <i class="align-middle" data-feather="file"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="display-5 mt-1 mb-3">
                            {{ $totalComplaint }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xxl-4 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <div class="card-actions float-end"></div>
                        <h5 class="card-title mb-0">Student by Faculty</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <tbody>
                                    @foreach ($facultyCounts as $faculty => $count)
                                        <tr>
                                            @if ($faculty === 'Faculty of Electrical and Electronics Engineering Technology')
                                                <td><i class="fas fa-circle text-primary fa-fw"></i> {{ $faculty }}
                                                </td>
                                            @elseif($faculty === 'Faculty of Mechanical and Automotive Engineering Technology')
                                                <td><i class="fas fa-circle text-warning fa-fw"></i> {{ $faculty }}
                                                </td>
                                                
                                            @elseif($faculty === 'Faculty of Computing')
                                                <td><i class="fas fa-circle text-success fa-fw"></i> {{ $faculty }}
                                                </td>
                                            @elseif($faculty === 'Faculty of Manufacturing and Mechatronic Engineering Technology')
                                                <td><i class="fas fa-circle text-danger fa-fw"></i> {{ $faculty }}</td>
                                            @endif
                                            <td class="text-end">{{ $count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-8 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Total Complaints by Month</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-md">
                            <canvas id="chartjs-dashboard-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const facultyLabels = @json(array_keys($facultyCounts));
            const facultyCounts = @json(array_values($facultyCounts));

            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: 'pie',
                data: {
                    labels: facultyLabels,
                    datasets: [{
                        data: facultyCounts,
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger,
                            window.theme.success,
                            "#E8EAED" // For any other categories not specifically listed
                        ],
                        borderColor: "transparent"
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });

            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ];
            const complaintMonths = @json(array_keys($complaintsByMonth)).map(month => months[month - 1]);
            const complaintCounts = @json(array_values($complaintsByMonth));

            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: 'bar',
                data: {
                    labels: complaintMonths,
                    datasets: [{
                        label: 'Complaints',
                        data: complaintCounts,
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true, // Start y-axis from 0
                            grid: {
                                color: 'rgba(0,0,0,.05)',
                            },
                            ticks: {
                                callback: function(value, index, values) {
                                    return value;
                                },
                                precision: 0 // Display integer numbers
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
