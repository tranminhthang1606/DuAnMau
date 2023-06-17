<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <?php if (isset($danhmuc['ten_loai'])) {
                ?>
                <div class="title">Sản Phẩm :
                    <?php echo $danhmuc['ten_loai'] ?>
                </div>
                <?php
            }
            ?>
            <?php if (isset($_POST['kyw'])) {
                ?>
                <div class="title">Sản Phẩm có chứa từ khóa :
                    <?php echo $_POST['kyw'] ?>
                </div>
                <?php
            }
            ?>
            <div class="row mt">
                <?php
                foreach ($sp_cungloai as $item) {
                    ?>

                    <div class="box-sp mr mb">
                    <a href="index.php?act=chitietsp&id=<?php echo $item['ma_hh'] ?>">
                    <img src="upload/<?php echo $item['hinh'] ?>" alt="" class="pt">
                    </a>
                        <h2>
                            <?php echo $item['ten_hh'] ?>
                        </h2>
                        <p>
                            $
                            <?php echo $item['don_gia'] ?>
                        </p>


                        <a href="index.php?act=chitietsp&id=<?php echo $item['ma_hh'] ?>"><input type="button"
                                value="Xem ngay"></a>
                    </div>


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