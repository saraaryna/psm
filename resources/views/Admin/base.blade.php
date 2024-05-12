
<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="/img/logo.png">
	<link href="\css\classic.css" rel="stylesheet">

	<!-- Add Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Add Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    

	<title>UMPSA Off Campus</title>

	<style>
		body {
			opacity: 0;
		}

		.wrapper:before
		{
			background:#7AB3D2;
			content:" ";
			height:264px;
			left:0;
			position:absolute;
			top:0;width:100%
		}

		.wrapper 
		{
			position: relative;
		}

		.logout-container {
			position: absolute;
			top: 10px;
			right: 10px;
		}


	</style>
	<script src="js/settings.js"></script>
	<script src="js/app.js"></script>
	<!-- END SETTINGS -->
</head>

<body>

    <div class="wrapper" >
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="dashboard" style="background: #7AB3D2;">
				<img src="/img/logo.png" style="height: 30px;">
				UMPSA Off Campus
			</a>
			
			<div class="sidebar-content">
				<div class="sidebar-user">
					<span class="d-sm-inline d-none">{{$user->name}}</span><br>
					<span class="d-sm-inline d-none">{{$user->role}}</span>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                              </svg> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/property-Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
								<path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
							  </svg><span class="align-middle">Manage Property</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/manageUser-Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
								<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
							  </svg> <span class="align-middle">Manage User</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/complaint-Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                              </svg> <span class="align-middle">Manage Complaint</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/report-Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph-fill" viewBox="0 0 16 16">
								<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5m-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5z"/>
							  </svg> <span class="align-middle">Report</span>
						</a>
					</li>
					<li class="sidebar-item logout-container">
						<form id="logout-form" action="{{ route('logout') }}" method="POST">
							@csrf
							<button type="submit" class="sidebar-link" style="border: none; background: none;">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
									<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
								</svg><span class="align-middle">Logout</span>
							</button>
						</form>
					</li>
					
				</ul>
			</div>
		</nav>
		
		
		<div class="main">
			<br>
			
					@yield('contents')
		

			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-8 text-start">
						</div>
						<div class="col-4 text-end">
							<p class="mb-0">
								&copy; 2024 UMPSA Off Campus</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</div>
	

</body>

</html>