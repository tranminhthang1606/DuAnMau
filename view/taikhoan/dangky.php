<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Đăng ký thành viên</div>
            <div class="row content">
                <form action="index.php?act=dangky" enctype="multipart/form-data" method="post">
                    <label for="">Email:</label>
                    <br>
                    <input type="email" name="email" id="">
                    <?php
                    if (isset($thongbaoemail)) {
                        ?>
                        <h2>
                            <?php echo $thongbaoemail ?>
                        </h2>
                        <?php
                    }

                    ?>
                    <br>
                    <label for="">Username :</label>
                    <br>
                    <input type="text" name="username">
                    <?php
                    if (isset($thongbaoname)) {
                        ?>
                        <h2>
                            <?php echo $thongbaoname ?>
                        </h2>
                        <?php
                    }

                    ?>
                    <br>
                    <label for="">Password :</label>
                    <br>
                    <input type="password" name="password" id="">
                    <?php
                    if (isset($thongbaopassword)) {
                        ?>
                        <h2>
                            <?php echo $thongbaopassword ?>
                        </h2>
                        <?php
                    }

                    ?>
                    <br>
                    <label for="">Ảnh đại diện :</label>
                    <br>
                    <input type="file" name="hinh" id="">
                    <br>
                    <label for="">Vai trò :</label>
                    <br>
                    <select name="vaitro" id="">
                        <option value="0">Khách hàng</option>
                    </select>
                    <br>
                    <label for="">Kích hoạt</label>
                    <br>
                    <input type="text" disabled value="Không được nhập" name="kich_hoat">
                    <br>

                    <input type="submit" value="Đăng ký" name="dangky">

                    <input type="reset" value="Nhập lại">

                </form>
                <?php
                if (isset($thongbao)) {
                    ?>
                    <h2>
                        <?php echo $thongbao ?>
                    </h2>
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