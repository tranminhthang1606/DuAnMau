<?php


?>

<div class="row">
    <div class="row formtitle">
        <h1>Cập nhập LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatedm" method="POST">
            <div class="row mb10">
                <label for="">Mã loại</label><br>
                <input type="text" name="maloai" disabled><br>
            </div>
            <div class="row mb10">
                <label for="">Tên loại</label><br>
                <input type="text" name="tenloai" value="<?php echo $dm['ten_loai']  ?>"><br>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php echo $dm['ma_loai']?>">
                <input type="submit" name="capnhap" value="Cập nhập loại hàng">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php if (isset($thongbao)) {
                ?>
                <h2>
               <?php echo $thongbao?>
                </h2>
                <?php
            }
            ?>
        </form>
    </div>
</div>
</div>