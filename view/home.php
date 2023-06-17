<?php
$random_slide_sp = random_sanpham();

?>

<div class="row mb">
    <div class="boxleft mr">
        <div class="row banner">
            <div class="slideshow-container">
                <?php
                $i=1;
                foreach ($random_slide_sp as $item ) {
                    ?>
                    <div class="mySlides fade">
                    <div class="numbertext"><?php echo $i++ ?> / 3</div>
                    <img src="upload/<?php echo $item['hinh']?>">
                    <div class="text"><?php echo $item['ten_hh']?></div>
                </div>
                    <?php
                }
                ?>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

        </div>
        <div class="row mt">
            <?php
            foreach ($sp_trangchu as $sp) {
                ?>
                
                    <div class="box-sp mr mb">
                    <a href="index.php?act=chitietsp&id=<?php echo $sp['ma_hh'] ?>">
                    <img src="upload/<?php echo $sp['hinh'] ?>" alt="" class="pt">
                    </a>
                        <h3>
                            <?php echo $sp['ten_hh'] ?>
            </h3>
                        <p>
                            $
                            <?php echo $sp['don_gia'] ?>
                        </p>
                        
                        <a href="index.php?act=chitietsp&id=<?php echo $sp['ma_hh'] ?>"><input type="button" value="Xem ngay"></a>
                    </div>
                

                <?php
            }
            ?>


        </div>
    </div>
    <div class="boxright">
        <?php include "boxright.php" ?>
    </div>
    <?php include "view/slide.php"; ?>
</div>