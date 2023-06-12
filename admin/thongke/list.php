
<div class="row">
    <div class="row formtitle">
        <h1>Thống kê hàng hóa</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th>Số Lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
                <?php
                
                foreach ($list_thongke as $item) {
                    ?>
                    <tr>                 
                        <td><?php echo $item['maloai'] ?></td>
                        <td><?php echo $item['tenloai'] ?></td>
                        <td><?php echo $item['sl'] ?></td>
                        <td><?php echo $item['max'] ?></td>
                        <td><?php echo $item['min'] ?></td>
                        <td><?php echo $item['trungbinh'] ?></td>
                    </tr>
                    <?php
                }
                
                ?>
                

            </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=chart"><input type="button" value="Biểu đồ"></a>
        </div>
    </div>
    
   

</div>
</div>