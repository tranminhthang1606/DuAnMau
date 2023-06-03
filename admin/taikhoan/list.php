<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH Sản phẩm</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="keyword">
                <select name="iddm" id="">
                    <option value="0">Tất cả</option>
                    <?php
                    $loai = loadall_danhmuc();

                    foreach ($loai as $item) {
                        ?>
                        <option value="<?php echo $item['ma_loai'] ?>"><?php echo $item['ma_loai'] ?>.<?php echo $item['ten_loai'] ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                </select>
                <input type="submit" name="filter" value="Search">
            </form>
            <table>
                <tr>
                    <th></th>
                    <th>Mã tài khoản</th>
                    <th>Email</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Ảnh tài khoản</th>
                    <th>Vai trò</th>
                </tr>
                <?php
                foreach ($taikhoan as $item) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name=""></td>
                        <td>
                            <?php echo $item['ma_kh'] ?>
                        </td>
                        <td>
                            <?php echo $item['email'] ?>
                        </td>
                        <td>
                            <?php echo $item['ho_ten'] ?>
                        </td>
                        <td>
                            <?php echo $item['mat_khau'] ?>
                        </td>
                        <td>
                            <img src="../upload/<?php echo $item['hinh'] ?>" alt="" width="100px">
                        </td>
                        <td>
                            <?php if ($item['vai_tro'] == 0) {
                                ?>
                                <p>Khách hàng</p>
                                <?php

                            } else {
                                ?>
                                <p>Admin</p>
                                <?php
                            } ?>
                        </td>
                        <td><a href="index.php?act=suasp&id=<?php echo $item['ma_kh'] ?>"><input type="button" name=""
                                    value="SỬA"></a><a href="index.php?act=xoasp&id=<?php echo $item['ma_kh'] ?>"><input
                                    type="button" name="" value="XÓA"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
        <div class="row mb10">
            <input type="submit" value="CHỌN TẤT CẢ">
            <input type="reset" value="BỎ CHỌN TẤT CẢ">
            <input type="reset" value="XÓA CÁC MỤC ĐÃ CHỌN">
            <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a>
        </div>
    </div>

</div>
</div>