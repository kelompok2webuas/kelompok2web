<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Responsive Admin Dashboard</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="logo">
			<span class=""><i class=''></i></span>
			<span class="text">KELOMPOK 2</span>
		</a>
		<ul class="side-menu">
			<li class="active">
				<a href="cont.php">
					<span class=""><i class='' ></i></span>
					<span class="text">Dashboard</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="asuransi.php">
					<span class=""><i class='' ></i></span>
					<span class="text">Asuransi</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="anggotamasuk.php">
					<span class=""><i class='' ></i></span>
					<span class="text">Anggota Masuk</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="anggotakeluar.php">
					<span class=""><i class='' ></i></span>
					<span class="text">Anggota Keluar</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
		</ul>

		<ul class="side-menu bottom">
			<li>
				
			</li>
			<li>
				<a href="logout.php">
					<span class=""><i class='' ></i></span>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<nav>
			
			
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-icon"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="#" 
			</a>
			<a href="#" class="profile">
				
				
			</a>
			<span class="curve"></span>
		</nav>

		<main>
			<div class="top">
				<div class="left">
					<h1 class="title">Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
						<li>
							<a href="#" class="active">Home</a>
						</li>
					</ul>
				</div>
				
					
				</a>
			</div>
			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE-edge">
					<meta name="viewport" content="width=device-width, inisial-scale=1.0">
					<tittle>Kelompok 2</tittle>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
					</head>

					<body>
						<div class="container">
							<div class="row"></div>
							<div class="col-12">
								<h3>Member</h3>
								</div>
								</div>
								<div class="row">
									<div class="col-6">
									<div>
										<canvas id="myChart"></canvas>
										</div>

									
								</div>
							</div>

							<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
							<script>
								const ctx = document.getElementById('myChart');
							  
								new Chart(ctx, {
								  type: 'bar',
								  data: {
									labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
									datasets: [{
									  label: '# of Votes',
									  data: [12, 19, 3, 5, 2, 3],
									  borderWidth: 1
									}]
								  },
								  options: {
									scales: {
									  y: {
										beginAtZero: true
									  }
									}
								  }
								});
							  </script>
						</body>

						</html>

						
			<div class="table-data">
				<div class="order">
					<div class="head">
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>Id Anggota</th>
								<th>Nama Anggota</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									
									<span class="name">1</span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
							<tr>
								<td>
									
									<span class="name">2</span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
							<tr>
								<td>
									
									<span class=></span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
							<tr>
								<td>
									
									<span class="name">3</span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
							<tr>
								<td>
									
									<span class="name">4</span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
							<tr>
								<td>
									
									<span class="name">5</span>
								</td>
								<td></td>
								<td><span class=></span></td>
							</tr>
						</tbody>
					</table>
				
			</div>
		</main>
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>
</html>