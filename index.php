<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require 'vendor/autoload.php';

include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "view/header.php";
include "view/pagination.php";

 

$sp_trangchu = loadall_sanpham_home($page_first_result,$result_per_page);
$danhmuc_trangchu = loadall_danhmuc();
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "chitietsp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spct = loadone_sanpham($id);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }

            break;
        case "listsp":
            if (isset($_POST['timkiem']) && $_POST['timkiem']) {
                $kyw = $_POST['kyw'];
                $sp_cungloai = filter_sanpham(0, $kyw);
                include "view/listsp.php";
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sp_cungloai = loadall_sanpham_cungloai($id);
                $danhmuc = loadone_danhmuc($id);
                include "view/listsp.php";
            } else {
                include "view/home.php";
            }
            break;
        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) >= 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                include("view/taikhoan/upload.php");
                if ($username != "" && $password != "" && $email != "" && $checked==true) {
                    insert_taikhoan($username, $password, $email, $file_name, $vaitro, "");
                    $thongbao = "Đăng ký thành công";
                } else {
                    $thongbao = "Đăng ký thất bại";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $get_account = loadone_taikhoan($_POST['email'], $_POST['pass']);
                if (isset($get_account) && $get_account != "") {
                    $_SESSION['userID'] = $get_account['ma_kh'];
                    $_SESSION['username'] = $get_account['ho_ten'];
                    $_SESSION['vaitro'] = $get_account['vai_tro'];
                    $_SESSION['email'] = $get_account['email'];
                    $_SESSION['pass'] = $get_account['mat_khau'];
                    $_SESSION['avatar'] = $get_account['hinh'];
                } else {
                    $userID = "";
                    $username = "";
                    $pass = "";
                    $vaitro = "";
                    $email = "";
                    $hinh ="";
                }
            }
            include "view/home.php";
            break;

        case "logout":
            if (isset($_SESSION['email'])) {
                session_destroy();
            }
            header("location:index.php");
            break;
        case "edit_tk":
            if (isset($_SESSION)) {
                $email = $_SESSION['email'];
                $pass = $_SESSION['pass'];
                $taikhoan_edit = loadone_taikhoan($email, $pass);
            }
            include "view/taikhoan/edit_tk.php";
            break;
        case "update_tk":
            if (isset($_POST['update']) && $_POST['update']) {
                $id_kh = $_GET['id'];
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) >= 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                include("view/taikhoan/upload.php");
                if ($username != "" && $password != "" && $email != "" && $checked==true) {
                    update_taikhoan($id_kh, $username, $password, $email, $file_name, $kichhoat, $vaitro);
                    $thongbao = "Cập nhập thành công";
                    $taikhoan_edit = loadone_taikhoan($email, $password);
                    $_SESSION['id_kh'] = $id_kh;
                    $_SESSION['username'] = $username;
                    $_SESSION['vaitro'] = $vaitro;
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $password;
                } else {
                    $thongbao = "Cập nhập thất bại";
                    $email = $_SESSION['email'];
                    $pass = $_SESSION['pass'];
                    $taikhoan_edit = loadone_taikhoan($email, $pass);
                }

            }
            include("view/taikhoan/edit_tk.php");
            break;
        case "quenmk":
            if (isset($_POST['quenmk']) && $_POST['quenmk']) {
                $email = $_POST['email'];
                $password = "";
                $taikhoan = loadone_taikhoan($email, $password);
                if (isset($taikhoan)) {
                    
                    // $mail = new PHPMailer();
 
                    // $mail->CharSet =  "utf-8";
                    // $mail->IsSMTP();
                    // // enable SMTP authentication
                    // $mail->SMTPAuth = true;                  
                    // // GMAIL username
                    // $mail->Username = "thangtmph29942@fpt.edu.vn";
                    // // GMAIL password
                    // $mail->Password = "kamenrider123";
                    // $mail->SMTPSecure = "tls";  
                    // // sets GMAIL as the SMTP server
                    // $mail->Host = "smtp.gmail.com";
                    // // set the SMTP port for the GMAIL server
                    // $mail->Port = "587";
                    // $mail->From='thangtmph29942@fpt.edu.vn';
                    // $mail->FromName='TMT';
                    // $mail->AddAddress($email, $email);
                    // $mail->Subject  =  'Reset Password';
                    // $mail->IsHTML(true);
                    // $mail->Body    = 'Your password is '.$taikhoan['mat_khau'];
                    // if($mail->Send())
                    // {
                    //   echo "Check Your Email and Click on the link sent to your email";
                    // }
                    // else
                    // {
                    //   echo "Mail Error - >".$mail->ErrorInfo;
                    // }
                    
                    $thongbao = "Mật khẩu của bạn là: " . $taikhoan['mat_khau'];

                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case "hdlcomment":
            if (isset($_POST['binhluan']) && $_POST['binhluan']) {
                $noidung = $_POST['binhluan'];
                function check_String($string){
                    $ignoreKey = ["dm","đm","cứt","xấu","lừa đảo","cl"];
                    $sliced_string = explode(' ', $string);
                    $sliced_string2 = end($sliced_string);
                    $sliced_string3 = strtolower($sliced_string2);
                    if (in_array($sliced_string3,$ignoreKey)){    
                        return true;
                    } else {
                        return false;
                    }
                }
                
                $idkh = $_POST['idkh'];
                $idsp = $_POST['idsp'];
                $ngaydang = date("y/m/d");
                if(check_String(strtolower($noidung))===false){
                    insert_binhluan($noidung, $idsp, $idkh, $ngaydang);
                    $thongbaobinhluantieucuc="";
                }else{
                    $thongbaobinhluantieucuc = "Bạn đã có bình luận khiếm nhã bị từ chối";
                }      
            }
            $spct = loadone_sanpham($idsp);
            include "view/chitietsp.php";
            break;

        case "gioithieu":
            include "view/gioithieu.php";
            break;
        case "lienhe":
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }

} else {
    include "view/home.php";
}

include "view/footer.php";

?>