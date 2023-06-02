<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Đăng ký thành viên</div>
            <div class="row content">
                <form action="index.php?act=dangky" enctype="multipart/form-data" method="post">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="">
                    <br>
                    <label for="">Username :</label>
                    <input type="text" name="username">
                    <br>
                    <label for="">Password :</label>
                    <input type="password" name="password" id="">
                    <br>
                    <label for="">Ảnh đại diện :</label>
                    <input type="file" name="hinh" id="">
                    <br>
                    <label for="">Vai trò :</label>
                    <select name="vaitro" id="">
                        <option value="0">Khách hàng</option>
                        <option value="1">Admin</option>
                    </select>
                    <br>
                    <input type="submit" value="Đăng ký" name="dangky">
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