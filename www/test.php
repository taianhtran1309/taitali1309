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
<?php
	require_once "xulydangky.php";
?>
	<div>
		<header class="header">
			<div class="grid">
				<nav class="header__navbar">
					<ul class="header__navbar-list">
						<li class="header__navbar-item">Trang chủ</li>
						<li>
							<?php if(isset($error["err_sdt"])) echo $error["err_sdt"]; ?>
							<?php if(isset($error["err_email"])) echo $error["err_email"]; ?>
							<?php if(isset($error["err_ho-ten"])) echo $error["err_ho-ten"]; ?>
                            <?php if(isset($error["err_ngay-sinh"])) echo $error["err_ngay-sinh"]; ?>
							<?php if(isset($error["err_dia-chi"])) echo $error["err_dia-chi"]; ?>
							<?php if(isset($error["err_mattruoc"])) echo $error["err_mattruoc"]; ?>
							<?php if(isset($error["err_matsau"])) echo $error["err_matsau"]; ?>
							<?php if(isset($error["err_ketqua"])) echo $error["err_ketqua"]; ?>
							<?php if(isset($error["err_username"])) echo $error["err_username"]; ?>
							<?php if(isset($error["err_pwd"])) echo $error["err_pwd"]; ?>
							<?php if(isset($error["err_first"])) echo $error["err_first"]; ?>

							<?php if(isset($error["err_pwdold"])) echo $error["err_pwdold"]; ?>
							<?php if(isset($error["err_pwdnew"])) echo $error["err_pwdnew"]; ?>
							<?php if(isset($error["err_pwdnew2"])) echo $error["err_pwdnew2"]; ?>
							<?php if(isset($error["err_passkhongkhop"])) echo $error["err_passkhongkhop"]; ?>
							<?php if(isset($error["err_changepass"])) echo $error["err_changepass"]; ?>
							<?php if(isset($error["err_login"])) echo $error["err_login"]; ?>


						</li>
					</ul>
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-circle-user"></i>
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal_dn">
									Đăng nhập
								</button>
							</div>
						</li>
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-right-to-bracket"></i>
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal_dk">
									Đăng ký
								</button>
							</div>
						</li>
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-key"></i>
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal_dmk">
									Đổi mật khẩu
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
	<div class="modal" id="myModal_dk">
		<div class="modal-dialog">
			<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Thông tin đăng ký</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="xulydangky.php" method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sdt">Số Điện Thoại</label>
                            <input  type="text" class="form-control" id="sdt" placeholder="Nhập số điện thoại" name="sdt">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="email">Email</label>
                            <input  type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="ho-ten">Họ Tên</label>
                            <input  type="text" class="form-control" id="ho-ten" placeholder="Nhập họ và tên" name="ho-ten">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="ngay-sinh">Ngày/Tháng/Năm sinh</label>
                            <input   type="text" class="form-control" id="ngay-sinh" placeholder="" name="ngay-sinh">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dia-chi">Địa chỉ</label>
                        <input  type="text" class="form-control" id="dia-chi" placeholder="Nhập địa chỉ" name="dia-chi">
                    </div>
					
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mattruoc">Mặt trước CMND</label>
                            <input type="file" class="form-control" id="file" name="mattruoc"  />
                        </div>
                        <div class="form-group">
                            <label for="matsau">Mặt sau CMND</label>
                            <input type="file" class="form-control" id="file" name="matsau"  />
                        </div>
                    </div>
					
                    <div class="form-group">
                        <button class="btn btn-danger mr-2" type="submit" class="submit" id="submit" name="dangky">Đăng ký</button>
                    </div>
                </form>
			</div>

			
			</div>
		</div>
	</div>
	<div class="modal" id="myModal_dn">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Đăng nhập</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="xulydangky.php" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="username">Tài khoản</label>
								<input  type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username">
							</div>
							<div class="form-group col-md-5">
								<label for="pwd">Mật khẩu</label>
								<input  type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pwd">
							</div>
						</div>
						
						<div class="form-group">
							<button class="btn btn-danger mr-2" type="submit" class="submit" id="submit" name="dangnhap">Đăng nhập</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="myModal_dmk">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Đổi mật khẩu</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
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
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="/main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>