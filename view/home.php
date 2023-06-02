<div class="row mb">
    <div class="boxleft mr">
        <div class="row banner">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="image/1.jpg" style="width:100%">
                    <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="image/2.jpg" style="width:100%">
                    <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="image/3.jpg" style="width:100%">
                    <div class="text">Caption Three</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

        </div>
        <div class="row mt">
            <?php
            foreach ($sp_trangchu as $sp) {
                ?>
                <a href="index.php?act=chitietsp&id=<?php echo $sp['ma_hh'] ?>">
                    <div class="box-sp mr mb">
                        <img src="upload/<?php echo $sp['hinh'] ?>" alt="" class="pt">
                        <p>
                            $
                            <?php echo $sp['don_gia'] ?>
                        </p>
                        <a href="">
                            <?php echo $sp['ten_hh'] ?>
                        </a>
                    </div>
                </a>

                <?php
            }
            ?>


        </div>
    </div>
    <div class="boxright">
        <?php include "boxright.php" ?>
    </div>
</div>