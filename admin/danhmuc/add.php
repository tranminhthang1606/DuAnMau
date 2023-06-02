<div class="row">
    <div class="row formtitle">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=adddm" method="POST">
            <div class="row mb10">
                <label for="">Mã loại</label><br>
                <input type="text" name="maloai" disabled><br>
            </div>
            <div class="row mb10">
                <label for="">Tên loại</label><br>
                <input type="text" name="tenloai"><br>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php if(isset($thongbao)){
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>
</div>