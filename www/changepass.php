<?php
    session_start();
	$error ='';
    #$_SESSION['username'] = '';
    if(isset($_POST['username']) && isset($_POST['pwd'])) {
        
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        if($_POST['username'] == '' || $_POST['pwd'] == ''){
            $error = "Vui lòng nhập đầy đủ tài khoản mật khẩu";
        }else{

       
            include 'admin/db.php'  ;
            $sql = "SELECT *FROM account where username= '$username' AND pass = '$pwd'"; 
            $rs = mysqli_query($conn, $sql);
            $row = $rs->fetch_assoc();
            
            if (mysqli_num_rows($rs)> 0){
                $_SESSION['username'] = $username;
                $_SESSION['statuss'] = $row["statuss"];
				$sql = "SELECT *FROM user where sdt= '$username' "; 
				$rs = mysqli_query($conn, $sql);
				if($row = $rs->fetch_assoc()){
					$_SESSION['hoten'] = $row["hoten"];
				}
				#echo $_SESSION['statuss'];
				if ($_SESSION['statuss'] == 0){
					header('location: trangchufirst.php');
				}
				else{
                	header('location: trangchu.php');
				}
            }
            else{
                $error = "Tài khoản hoặc mật khẩu chưa đúng.";
            }   
        }
        
    }
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
	<title>Login</title>
</head>

<body>
	<div>
		<header class="header">
			<div class="grid">
				<nav class="header__navbar">
					<ul class="header__navbar-list">
						<li class="header__navbar-item">
                            <button type="button" class="btn btn-light"> 
                                <a href="index.php" style="color:black" >Trang chủ</a>
                            </button>
                        </li>
					</ul>
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item--bold">
							<div class="form-group">
								<i class="fa-solid fa-right-to-bracket"></i>
								<button type="button" class="btn btn-light" >
									<a href="signup.php" style="color:black">Đăng ký</a>
								</button>
							</div>
						</li>
					</ul>
				</nav>
			</div>

		</header>

		<div class="container">
        <form action="changepass.php" method="POST" >
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
			
		<footer class="footer">

		</footer>
		<p style="color:red"><?= $error ?></p>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="/main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>