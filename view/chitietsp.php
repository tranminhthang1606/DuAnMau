<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Chi tiết sản phẩm</div>
            <div class="row content">
                <div class="content_img">
                    <img src="upload/<?php echo $spct['hinh'] ?>" alt="">
                </div>

                <li>
                    Mã Sản Phẩm :
                    <span>
                        <?php echo $spct['ma_hh'] ?>
                    </span>
                </li>

                <li>
                    Tên sản phẩm :
                    <span>
                        <?php echo $spct['ten_hh'] ?>
                    </span>
                </li>
                <li>Đơn giá :

                    <span>$
                        <?php echo $spct['don_gia'] ?>
                    </span>
                </li>
                <li>Giảm giá :
                    <span>
                        <?php echo $spct['giam_gia'] ?>
                    </span>
                </li>
                <p>Mô tả : </p>
                <p>
                    <?php echo $spct['mo_ta'] ?>
                </p>
                <small>
                    Lượt xem :
                    <?php echo $spct['so_luot_xem'] ?>
                </small>

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
                                <td>
                                    <?php echo $khachhang['ho_ten'] ?>
                                </td>
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
                    <br>
                </form>
                <h2>
                    <?php if ($thongbaobinhluantieucuc) {
                        echo $thongbaobinhluantieucuc;
                    }
                    ?>
                </h2>

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
                    if ($item['ma_hh'] != $spct['ma_hh']) {
                        ?>
                        <li class="spcl-item"><a href="index.php?act=chitietsp&id=<?php echo $item['ma_hh'] ?>">
                                <img src="upload/<?php echo $item['hinh'] ?>" alt="">
                                <div>
                                    <span style="font-size: 16px;">
                                        <?php echo $item['ten_hh'] ?>
                                    </span>
                                    <p style="font-size: 12px;">Lượt xem :
                                        <?php echo $item['so_luot_xem'] ?>
                                    </p>
                                </div>
                            </a></li>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "boxright.php" ?>
    </div>
</div>