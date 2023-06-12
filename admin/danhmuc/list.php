<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>
                <form action="index.php?act=delAllDm" method="post">
                <?php
                foreach ($danhmuc as $item) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name="delItem[]" value="<?php echo $item['ma_loai'] ?>"></td>
                        <td>
                            <?php echo $item['ma_loai'] ?>
                        </td>
                        <td>
                            <?php echo $item['ten_loai'] ?>
                        </td>
                        <td><a href="index.php?act=suadm&id=<?php echo $item['ma_loai'] ?>"><input type="button" name=""
                                    value="SỬA"></a><a href="index.php?act=xoadm&id=<?php echo $item['ma_loai'] ?>"><input
                                    type="button" name="" value="XÓA"></a></td>
                    </tr>
                    <?php
                    # code...
                }
                ?>
                

            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ" id="selectAll">
            <input type="button" value="BỎ CHỌN TẤT CẢ" id="unselectAll">
            <input type="submit" value="XÓA CÁC MỤC ĐÃ CHỌN" name="delAll" id="delAll">
            <a href="index.php?act=adddm"><input type="button" value="NHẬP THÊM"></a>
        </div>
        </form>
    </div>

</div>
</div>