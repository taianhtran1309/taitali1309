<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
	$error ='';    
    $statuss ='0';
    
    if(isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['hoten']) && isset($_POST['ngaysinh']) && isset($_POST['diachi']) && isset($_FILES['mattruoc']) && isset($_FILES['matsau'])){
        include 'library.php';
        include 'sendmail/autoload.php';

        if(empty($_FILES['mattruoc'])) {
            $error= "Không được để trống Mặt Trước CMND";
        }
        else{
            $file_name = $_FILES['mattruoc']['name'];
            $file_size = $_FILES['mattruoc']['size'];
            $file_tmp = $_FILES['mattruoc']['tmp_name'];

            $explodename = explode('.',$file_name);
            $text = end($explodename);
            $file_ext = strtolower($text);
            
            $extensions = array("jpeg", "jpg", "png", "gif");

            if(in_array($file_ext, $extensions) === false){
                $error= "Ảnh không đúng định dạng";
            }

            if($file_size >2000000){
            $error= "Ảnh cần có kích cỡ nhỏ hơn 2MB";
            }

            if(empty($error)){
                $mattruoc = $file_name;
                move_uploaded_file($file_tmp,"images/".$mattruoc);    
            }
        }
            
        if(empty($_FILES['matsau'])) {
            $error= "Không được để trống Mặt Sau CMND";
        }
        else{
            $file_name = $_FILES['matsau']['name'];
            $file_size = $_FILES['matsau']['size'];
            $file_tmp = $_FILES['matsau']['tmp_name'];

            $explodename = explode('.',$file_name);
            $text = end($explodename);
            $file_ext = strtolower($text);

            $extensions = array("jpeg", "jpg", "png", "gif");
            
            if(in_array($file_ext, $extensions) === false){
                $error= "Ảnh không đúng định dạng";
            }
            

            if($file_size >2000000){
                $error= "Ảnh cần có kích cỡ nhỏ hơn 2MB";
            }
            if(empty($error)){
                $matsau = $file_name;
                move_uploaded_file($file_tmp,"images/".$matsau);
            }
        }
            
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        if($_POST['sdt'] == '' || $email == '' ||  $hoten == '' || $ngaysinh == '' || $diachi == ''|| $mattruoc == ''|| $matsau == ''){
            $error = "Thông tin chưa đầy đủ hoặc ảnh cmnd chưa đúng định dạng.";
        }
        else{
            
            $pattern = "/^([0-9]){10}$/";
            if(!preg_match($pattern, $_POST['sdt'])){
                $error= "Số điện thoại phải có 10 chữ số";
            }
            else{
                //Kiểm tra sđt
                include 'admin/db.php';
                $sql = "SELECT *FROM account WHERE username = '" .$_POST['sdt']."'";
                $run = mysqli_query($conn, $sql);
                if (mysqli_num_rows($run)> 0) {
                    $error = "Số điện thoại đã được sử dụng";
                }
            }
            
            $pattern = "/^([A-Za-z0-9])+@([a-z])+(.[a-z])+$/";
            if(!preg_match($pattern, $_POST['email'])){
                $error = "Email không đúng định dạng. (xxxxxxx@gmail.com : x thuộc bảng chữ cái alpha hoặc số)";
            }
            else{ 
                //Kiểm tra email
                $sql = "SELECT *FROM user WHERE email = '" .$_POST['email']."'";
                $run = mysqli_query($conn, $sql);
                if (mysqli_num_rows($run)> 0) {
                    $error= "Email này đã được sử dụng";
                    
                }
            }

            #Tạo mật khẩu ngẫu nhiên từ kí tự alpha và số 
            function randomPass(){
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array(); 
                $alphaLength = strlen($alphabet) - 1; 
                for ($i = 0; $i < 6; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                $pass = implode($pass);
                return $pass;
            }
            $pass_rd = randomPass();
            
                #Kiểm tra password
            $sql = "SELECT *FROM account WHERE pass='" .$pass_rd."'";
            $run = mysqli_query($conn, $sql);
        
            while (mysqli_num_rows($run)> 0){
                
                $pass_rd = randomPass();
                //Kiểm tra password
                $sql = "SELECT *FROM account WHERE pass='" .$pass_rd."'";
                $run = mysqli_query($conn, $sql);
            }
            
            //Thêm dữ liệu vào database
            if (!empty($sdt) && !empty($email) && !empty($hoten) && !empty($ngaysinh) && !empty($diachi) && !empty($mattruoc) && !empty($matsau)) {
                
                
                
                $sql ="INSERT INTO user(sdt,email,hoten,ngaysinh,diachi,cmndtruoc,cmndsau) VALUES('$sdt', '$email', '$hoten', '$ngaysinh', '$diachi', '$mattruoc', '$matsau')";
                $run = mysqli_query($conn, $sql);

                $sql ="INSERT INTO  account(username,pass,statuss) VALUES('$sdt', '$pass_rd','$statuss')";  
                $run = mysqli_query($conn, $sql);
                
                $mail = new PHPMailer(true);
                try {
                    //Server settings   
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = SMTP_UNAME;                 // SMTP username
                    $mail->Password = SMTP_PWORD;                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = SMTP_PORT;                                    // TCP port to connect to
                    //Recipients
                    $mail->setFrom(SMTP_UNAME, "Công ty TP");
                    $mail->addAddress($_POST['email'], 'Tên người nhận');     // Add a recipient | name is option
                    $mail->addReplyTo(SMTP_UNAME, 'Công ty TP');

                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Ví điện tử TP';   // Chủ đề
                    $mail->Body = "Tài khoản của bạn là:  $sdt \nMật khẩu của bạn là: $pass_rd" ;// Body
                    $mail->AltBody = $_POST['']; //None HTML
                    $result = $mail->send();
                    if (!$result) {
                        $error = "Có lỗi xảy ra trong quá trình gửi mail";
                    }
                } catch (Exception $e) {
                    $error= "Lỗi gửi mail" ." ". $mail->ErrorInfo;
                }
                $error = "Đăng ký tài khoản thành công. Vui lòng vào mail để biết tài khoản và mật khẩu.";
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
									<a href="login.php" style="color:black">Đăng nhập</a>
								</button>
							</div>
						</li>
					</ul>
				</nav>
			</div>

		</header>

		<div class="container">
            <form action="signup.php" method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
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
								<label for="hoten">Họ Tên</label>
								<input  type="text" class="form-control" id="hoten" placeholder="Nhập họ và tên" name="hoten">
							</div>
							<div class="form-group col-md-5">
								<label for="ngaysinh">Ngày/Tháng/Năm sinh</label>
								<input   type="text" class="form-control" id="ngaysinh" placeholder="" name="ngaysinh">
							</div>
						</div>
						<div class="form-group">
							<label for="diachi">Địa chỉ</label>
							<input  type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="diachi">
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
							<button class="btn btn-danger mr-2" type="submit" class="submit" id="submit" name="Đăng ký">Đăng ký</button>
                        </div>
                    </div>
			    </div>
		    </form>
		</div>
			
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