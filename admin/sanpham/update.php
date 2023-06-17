<?php

?>

<div class="row">
    <div class="row formtitle">
        <h1>Cập nhập Sản phẩm</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatesp" enctype="multipart/form-data" method="POST">
            <div class="row mb10">
                <label for="">Mã Sản Phẩm</label><br>
                <input type="text" disabled value="<?php echo $sp['ma_hh'] ?>"><br>
                <input type="hidden" name="masp" value="<?php echo $sp['ma_hh'] ?>">
            </div>
            <div class="row mb10">
                <label for="">Tên sản phẩm</label><br>
                <input type="text" name="tensp" value="<?php echo $sp['ten_hh'] ?>"><br>
                <?php if (isset($thongbaoTensp)) {
                    ?>
                    <h2>
                        <?php echo $thongbaoTensp ?>
                    </h2>
                    <?php
                }
                ?>
            </div>
            <div class="row mb10">
                <label for="">Đơn giá</label><br>
                <input type="text" name="dongia" value="<?php echo $sp['don_gia'] ?>"><br>
                <?php if (isset($thongbaoDongia)) {
                    ?>
                    <h2>
                        <?php echo $thongbaoDongia ?>
                    </h2>
                    <?php
                }
                ?>
            </div>
            <div class="row mb10">
                <label for="">Giảm giá</label><br>
                <input type="text" name="giamgia" value="<?php echo $sp['giam_gia'] ?>"><br>
                <?php if (isset($thongbaogiamgia)) {
                    ?>
                    <h2>
                        <?php echo $thongbaogiamgia ?>
                    </h2>
                    <?php
                }
                ?>
            </div>
            <div class="row mb10">
                <label for="">Hình</label><br>
                <input type="file" name="hinh" value="<?php echo $sp['hinh'] ?>"><br>
                <img src="../upload/<?php echo $sp['hinh'] ?>" alt="">
            </div>
            <div class="row mb10">
                <label for="">Ngày nhập</label><br>
                <input type="date" name="ngaynhap" value="<?php echo $sp['ngay_nhap'] ?>"><br>
            </div>
            <div class="row mb10">
                <label for="">Loại</label><br>
                <select name="loai" id="">

                    <?php
                    $loai = loadall_danhmuc();
                    foreach ($loai as $item) {
                        if ($item['ma_loai'] == $sp['ma_loai']) {
                            ?>
                            <option value="<?php echo $item['ma_loai'] ?>" selected><?php echo $item['ten_loai'] ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $item['ma_loai'] ?>"><?php echo $item['ten_loai'] ?></option>
                            <?php
                        }
                        ?>


                        <?php
                    }
                    ?>
                </select><br>
            </div>
            <div class="row mb10">
                <label for="">Đặc biệt</label><br>
                <input type="text" name="dacbiet" value="<?php echo $sp['dac_biet'] ?>"><br>
            </div>
            <div class="row mb10">
                <label for="">Số lượt xem</label><br>
                <input type="text" name="slx" value="<?php echo $sp['so_luot_xem'] ?>"><br>
            </div>
            <div class="row mb10">
                <label for="">Mô tả</label><br>
                <input type="text" name="mota" value="<?php echo $sp['mo_ta'] ?>"><br>
            </div>
            <div class="row mb10">
                <input type="submit" name="capnhapsp" value="Cập nhập">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php if (isset($thongbao)) {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>
</div>