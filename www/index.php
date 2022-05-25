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
	<title>Home Page</title>
</head>

<body>

	<div>
		<header class="header">
			<div class="grid">
				<nav class="header__navbar">
					<ul class="header__navbar-list">
						<li class="header__navbar-item"><button type="button" class="btn btn-light"> <a href="index.php" style="color:black" > Trang chủ</a></button></li>
						
					</ul>
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-circle-user"></i>
								<button type="button" class="btn btn-light">
									<a href="login.php" style="color:black" >Đăng nhập</a>
								</button>
							</div>
						</li>
						
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-right-to-bracket"></i>
								<button type="button" class="btn btn-light" >
									<a href="signup.php" style="color:black" >Đăng ký</a>
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
		<!-- The Modal -->
		<!--
		
		<div class="modal" id="myModal_dmk">
			<div class="modal-dialog">
				<div class="modal-content">

					#Modal Header 
					<div class="modal-header">
						<h4 class="modal-title">Đổi mật khẩu</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

				 	#Modal body
					<div class="modal-body">
						<form action="xuly/doimatkhau.php" method="POST" >
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="username">Tài khoản</label>
									<input  type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username">
								</div>
								<div class="form-group col-md-5">
									<label for="pwdold">Mật khẩu cũ</label>
									<input  type="password" class="form-control" id="pwdold" placeholder="Nhập mật khẩu cũ" name="pwdold">
								</div>
								<div class="form-group col-md-5">
									<label for="pwdnew">Mật khẩu mới</label>
									<input  type="password" class="form-control" id="pwdnew" placeholder="Nhập mật khẩu mới" name="pwdnew">
								</div>
								<div class="form-group col-md-5">
									<label for="pwdnew2">Xác nhận mật khẩu mới</label>
									<input  type="password" class="form-control" id="pwdnew2" placeholder="Nhập lại mật khẩu mới" name="pwdnew2">
								</div>
							</div>
							
							<div class="form-group">
								<button class="btn btn-danger mr-2" type="submit" class="submit" id="submit" name="doimatkhau">Đổi mật khẩu</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		 -->
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="/main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>