<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Chi tiết sản phẩm</div>
            <div class="row content">
                <img src="upload/<?php echo $spct['hinh'] ?>" alt="">
                <h2>
                    Mã Sản Phẩm :
                    <?php echo $spct['ma_hh'] ?>
                </h2>

                <h2>
                    Tên sản phẩm :
                    <?php echo $spct['ten_hh'] ?>
                </h2>
                <p>Đơn giá :
                    $
                    <?php echo $spct['don_gia'] ?>
                </p>
                <p>Giảm giá :
                    <?php echo $spct['giam_gia'] ?>
                </p>
                <p>Mô tả : </p>
                <p>
                    <?php echo $spct['mo_ta'] ?>
                </p>

            </div>
        </div>
        <div class="row mb">
            <div class="title">Bình luận</div>
            <div class="row content">
                <table style="width:100%">
                    <tr>
                        <th>Người đăng</th>
                        <th colspan="3">Bình luận</th>
                        <th>Ngày đăng</th>
                    </tr>
                    <?php
                    $binhluan = loadall_binhluan($spct['ma_hh']);
                    if (isset($binhluan) && $binhluan != "") {
                        foreach ($binhluan as $item) {
                            $khachhang = loadone_taikhoan_byID($item['ma_kh']);
                            ?>
                            <tr>
                                <td><?php echo $khachhang['ho_ten']?></td>
                                <td style="text-align:center">
                                    <?php echo $item['noi_dung'] ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td style="text-align:center">
                                    <?php echo $item['ngay_bl'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        <?php
                    }

                    ?>
                </table>
            </div>
            <?php
            if (isset($_SESSION['email'])) {
                ?>
                <form action="index.php?act=hdlcomment" method="post">
                    <input type="hidden" name="idsp" value="<?php echo $spct['ma_hh'] ?>">
                    <input type="hidden" name="idkh" value="<?php echo $_SESSION['userID'] ?>">
                    <input type="text" name="binhluan">
                    <input type="submit" value="Gửi bình luận">
                </form>

                <?php
            }
            ?>
        </div>

        <div class="row mb">
            <div class="title">Sản phẩm cùng loại</div>
            <div class="row content">
                <?php
                $sp_cungloai = loadall_sanpham_cungloai($spct['ma_loai']);

                foreach ($sp_cungloai as $item) {
                    ?>
                    <li><a href="index.php?act=chitietsp&id=<?php echo $item['ma_hh'] ?>">
                            <?php echo $item['ten_hh'] ?>
                        </a></li>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "boxright.php" ?>
    </div>
</div>