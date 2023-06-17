
<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <form action="index.php?act=listkh" method="post">
                <input type="text" name="keyword">
                <select name="vaitrokh" id="">
                    <option value="">Tất cả</option>
                   <option value="1">Admin</option>
                   <option value="0">Khách hàng</option>
                </select>
                <br>
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
                <form action="index.php?act=delAllTk" method="post">
                <?php
                foreach ($taikhoan as $item) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name="delItem[]" value="<?php echo $item['ma_kh'] ?>"></td>
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
                        <td><a href="index.php?act=suakh&id=<?php echo $item['ma_kh'] ?>"><input type="button" name=""
                                    value="SỬA"></a><a href="index.php?act=xoakh&id=<?php echo $item['ma_kh'] ?>"><input
                                    type="button" name="" value="XÓA" onclick="return confirm('Bạn có chắc chắn muốn xóa')"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ" id="selectAll">
            <input type="button" value="BỎ CHỌN TẤT CẢ" id="unselectAll">
            <input type="submit" value="XÓA CÁC MỤC ĐÃ CHỌN" name="delAll" id="delAll" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
            <a href="index.php?act=addtk"><input type="button" value="NHẬP THÊM"></a>
        </div>
        </form>
    </div>

</div>
</div>