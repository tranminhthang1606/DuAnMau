<div class="row">
    <div class="row formtitle">
        <h1>CHI TIẾT BÌNH LUẬN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formds">
            <h2></h2>
            <table>
                <tr>
                    <th></th>
                    <th>NỘI DUNG</th>
                    <th>NGƯỜI BÌNH LUẬN</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th></th>
                </tr>
                <form action="index.php?act=delAllBl" method="post">
                    <?php
                    foreach ($binhluan as $item) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="delItem[]" value="<?php echo $item['ma_bl'] ?>"></td>
                            <td>
                                <?php echo $item['noi_dung'] ?>
                            </td>
                            <td>
                                <?php echo $item['ma_kh'] ?>
                            </td>
                            <td>
                                <?php echo $item['ngay_bl'] ?>
                            </td>
                            <td><a href="index.php?act=xoabl&id=<?php echo $item['ma_bl']?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                    <input type="button" name="" value="Xóa"></a></td>
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
    </form>
</div>
</div>