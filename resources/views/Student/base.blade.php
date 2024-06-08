
<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="/img/logo.png">
	<link href="\css\classic.css" rel="stylesheet">

	<title>UMPSA Off Campus</title>

	<style>
		body {
			opacity: 0;
		}

		.wrapper:before
		{
			background:#09888f;
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


	</style>
	<script src="js/settings.js"></script>
	<script src="js/app.js"></script>
	<!-- END SETTINGS -->
</head>

<body>

    <div class="wrapper" >
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="dashboard" style="background: #09888f;">
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
						<a class="sidebar-link" href="/Student">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                              </svg> <span class="align-middle">Home</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/property">
							<i class="align-middle me-2" data-feather="user"></i> <span class="align-middle">Property Listing</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#user" data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">User</span>
						</a>
						<ul id="user" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li class="sidebar-item active"><a class="sidebar-link" href="/profile">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/accommodation">Accomodation</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/complaint">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                              </svg> <span class="align-middle">Complaint</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/searchScammer">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
							  </svg> <span class="align-middle">Scammer Alert</span>
						</a>
					</li>
					<li class="sidebar-item">
						<form id="logout-form" action="{{ route('logout') }}" method="POST">
							@csrf
							<button type="submit" class="sidebar-link" style="border: none; background: none;">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
									<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
								  </svg> <span class="align-middle">Logout</span>
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