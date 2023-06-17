<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Thêm thành viên</div>
            <div class="row content">
                <form action="index.php?act=addtk" enctype="multipart/form-data" method="post">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="" ?>
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
                    <input type="text" name="username" ?>
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
                    <input type="password" name="password" id="" ?>
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
                    <input type="file" name="hinh" id="">
                    <br>
                    <label for="">Vai trò :</label>
                    <select name="vaitro" id="">
                        <option value="0">Khách hàng</option>
                        <option value="1">Admin</option>
                    </select>
                    <br>
                    <label for="">Kích hoạt</label>
                    <input type="text" name="kichhoat">
                    <input type="submit" value="Thêm tài khoản" name="addtk">
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
</div>