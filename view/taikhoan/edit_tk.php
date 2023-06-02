<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Đăng ký thành viên</div>
            <div class="row content">
                <form action="index.php?act=update_tk&id=<?php echo $taikhoan_edit['ma_kh']?>" enctype="multipart/form-data" method="post">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="" value="<?php echo $taikhoan_edit['email'] ?>">
                    <br>
                    <label for="">Username :</label>
                    <input type="text" name="username" value="<?php echo $taikhoan_edit['ho_ten'] ?>">
                    <br>
                    <label for="">Password :</label>
                    <input type="password" name="password" id="" value="<?php echo $taikhoan_edit['mat_khau'] ?>">
                    <br>
                    <label for="">Ảnh đại diện :</label>
                    <img src="./upload/<?php echo $taikhoan_edit['hinh'] ?>" alt="<?php echo $taikhoan_edit['hinh'] ?>">
                    <input type="file" name="hinh" id="">
                    <br>
                    <label for="">Vai trò :</label>
                    <select name="vaitro" id="">
                        <option value="<?php echo $taikhoan_edit['vai_tro'] ?>" selected>
                    <?php
                    if($taikhoan_edit['vai_tro']==0){
                        echo "Khách hàng (Đã chọn)";
                    }else{
                        echo "Admin (Đã chọn)";
                    }
                    ?>
                    
                    </option>
                        <option value="0">Khách hàng</option>
                        <option value="1">Admin</option>
                    </select>
                    <br>
                    <label for="">Kích hoạt</label>
                    <input type="text" name="kichhoat" value="<?php echo $taikhoan_edit['kich_hoat'] ?>">
                    <input type="submit" value="Cập nhập tài khoản" name="update">
                    <input type="reset" value="Nhập lại">
                </form>
               <?php
               if(isset($thongbao)){
                ?>
                <h2><?php echo $thongbao ?></h2>
                <?php
               }        
               ?>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "view/boxright.php" ?>
    </div>
</div>