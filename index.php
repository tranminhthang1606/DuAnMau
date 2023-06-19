<?php
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
                    // $mail = new PHPMailer(true);
                    // try {
                    //     //Server settings
                    //     $mail->SMTPDebug = 2;
                    //     $mail->isSMTP(); // Sử dụng SMTP để gửi mail
                    //     $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
                    //     $mail->SMTPAuth = true; // Bật xác thực SMTP
                    //     $mail->Username = 'minhthangtran1606@gmail.com'; // Tài khoản email
                    //     $mail->Password = ''; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
                    //     $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
                    //     $mail->Port = 465; // Cổng kết nối SMTP là 465

                    //     //Recipients
                    //     $mail->setFrom('minhthangtran1606@gmail.com', 'Wintee'); // Địa chỉ email và tên người gửi
                    //     $mail->addAddress($email, 'Khách hàng'); // Địa chỉ mail và tên người nhận

                    //     //Content
                    //     $mail->isHTML(true); // Set email format to HTML
                    //     $mail->Subject = 'Reset Password'; // Tiêu đề
                    //     $mail->Body = 'Mật khẩu mới ở đây'; // Nội dung

                    //     $mail->send();
                    //     echo 'Message has been sent';
                    // } catch (Exception $e) {
                    //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
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