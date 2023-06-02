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

            </div>
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