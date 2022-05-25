<?php
include '../dangnhaplandau.php';
session_start();
$_SESSION['username'];
$error = array();
$username='';
$pwd ='';
$error["err_username"] = '';
$error["err_pwdold"] = '';
$error["err_pwdnew"] = '';
$error["err_changepass"] = '';

if(isset($_POST['doimatkhau1'])){
   
    if(empty($_POST['pwdnew'])) {
        $error["err_pwdnew"]= "<p style='color:red'>Không được để trống nhập mật khẩu mới</p>";
    }
    else{
        $pattern = "/^[A-Za-z0-9]{6,32}$/";
        
        if(!preg_match($pattern, $_POST['pwdnew'])){
            $error["err_changepass"] = "<p style='color:red'>Mật khẩu mới phải từ 6 -> 32 ký tự.</p>";
        }
        else{ 
            $pwdn= $_POST['pwdnew'];
            if ($pwdn != $_POST['pwdnew2']){
                $error["err_changepass"] = "<p style='color:red'>Mật khẩu mới chưa khớp.</p>";
            }
            else if($pwdo == $pwdn){
                $error["err_changepass"] = "<p style='color:red'>Không được trùng mật khẩu cũ.</p>";
            }
        } 
    }
    if(!empty(implode($error))){
        header("Refresh: 2; URL=../index.php");
        echo $error["err_username"];
        echo $error["err_pwdold"];
        echo $error["err_pwdnew"];
        echo $error["err_changepass"];
        echo "Chờ giây lát để quay lại trang chủ";
    }
    else{
        include '../admin/db.php';
        $sql = "UPDATE account SET username ='".$username."', pass = '".$pwdn."', statuss = '1' WHERE username = '".$username."' AND pass = '".$pwdo."'";
        $run = mysqli_query($conn,$sql);
        if($run> 0){
            $error["err_changepass"] = "<p style='color:red'>Đổi mật khẩu thành công.</p>";
        }
        else{
            $error["err_changepass"] = "<p style='color:red'>Đổi mật khẩu không thành công.</p>";
            
        }
        if(!empty(implode($error))){
            header("Refresh: 2; URL=../index.php");
            echo $error["err_changepass"];
            echo "Chờ giây lát để quay lại trang chủ";
        }
    }
    
    
         #if(empty($_POST['pwdnew2'])) {
      
   
        /*
        echo $sql = "UPDATE account SET username ='$username', pass = '$pwdn', statuss = '1' WHERE username = $username AND pass = $pwdo";
        $run = mysqli_query($conn,$sql);
        echo $run;
        if (mysqli_num_rows($run)> 0) {
            echo "12335453";
        }
        else{
            echo "tisweqwwq";
        }
        */



}
?>