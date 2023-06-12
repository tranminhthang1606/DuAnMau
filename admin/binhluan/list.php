<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th>HÀNG HÓA</th>
                    <th>SỐ LƯỢNG</th>
                    <th>MỚI NHÁT</th>
                    <th>CŨ NHẤT</th>
                    <th></th>
                </tr>
                <?php
                foreach ($binhluan as $item) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $item['ten_hh'] ?>
                        </td>
                        <td>
                            <?php echo $item['so_luong'] ?>
                        </td>
                        <td>
                            <?php echo $item['moi_nhat'] ?>
                        </td>
                        <td>
                            <?php echo $item['cu_nhat'] ?>
                        </td>
                        <td><a href="index.php?act=detail-bl&id=<?php echo $item['ma_hh'] ?>">
                                <input type="button" name="" value="Chi tiết"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ" id="selectAll">
            <input type="button" value="BỎ CHỌN TẤT CẢ" id="unselectAll">
            <input type="submit" value="XÓA CÁC MỤC ĐÃ CHỌN" onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                name="delAll" id="delAll">
        </div>
    </div>
</div>
</div>