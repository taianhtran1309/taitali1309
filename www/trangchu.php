<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="/style.css"> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="./fontawesome/css/all.min.css">
	<title>Trang chủ</title>
</head>

<body>
	<div>
		<header class="header">
			<div class="grid">
				<nav class="header__navbar">
					<ul class="header__navbar-list">
						<li class="header__navbar-item">Cung cấp dịch vụ</li>
						<li class="header__navbar-item">|</li>
						<li class="header__navbar-item">
							<?php 
								echo "Xin chào " ." ".$_SESSION['hoten'] ;
								#if $_SESSION['statuss']
								#if(isset($_SESSION['username'])) echo  $_SESSION['username'] . " ". $_SESSION['statuss'] ; 
							
							?>
						</li>
					</ul>
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<button type="button" class="btn btn-light" >
									dịch vụ 1
								</button>
							</div>
						</li>
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<button type="button" class="btn btn-light" >
									dịch vụ 2
								</button>
							</div>
						</li>
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<button type="button" class="btn btn-light" >
									dịch vụ 3
								</button>
							</div>
						</li>
					</ul>
				</nav>
			</div>

		</header>

		<div class="container-fluid">
			<img src="images/TP.png" alt="" width="100%">
		</div>
		
		<footer class="footer">

		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="/main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>