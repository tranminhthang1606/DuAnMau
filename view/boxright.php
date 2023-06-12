<div class="row mb">
    <div class="title">TÀI KHOẢN</div>
    <div class="content formtk">
        <form action="index.php?act=dangnhap" method="POST">
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                ?>
                <h3>Xin chao :
                    <?php echo $_SESSION['username'] ?>
                </h3>
                Vai trò :
                    <?php if ($_SESSION['vaitro'] == 0) {
                        echo "Khách hàng";
                    } else {
                        echo "Admin";
                        ?>
                        <br>
                        <a href="../admin/index.php">Quản lý bán hàng</a>
                        <?php
                    } ?>
                <br>
                <a href="index.php?act=edit_tk">Cập nhập tài khoản</a>
                <br>
                <a href="index.php?act=logout">Đăng xuất</a>
                <?php
            } else {
                ?>
                <div class="row mb10">
                    <label for="">Email</label><br>
                    <input type="text" name="email" id=""><br>
                </div>
                <div class="row mb10">
                    <label for="">Mật khẩu</label><br>
                    <input type="password" name="pass" id=""><br>
                </div>
                <div class="row mb10">
                    <input type="checkbox"> Ghi nhớ tài khoản ?<br>
                </div>
                <div class="row mb10">
                    <input type="submit" name="dangnhap" id="" value="Đăng nhập"><br>
                </div>
                <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
                <?php
            }
            ?>
        </form>

    </div>
</div>
<div class="row mb">
    <div class="title">DANH MỤC</div>
    <div class="content2 menudoc">
        <ul>
            <?php
            foreach ($danhmuc_trangchu as $dm) {
                ?>
                <li><a href="index.php?act=listsp&id=<?php echo $dm['ma_loai'] ?>">
                        <?php echo $dm['ten_loai'] ?>
                    </a></li>
                <?php
            }

            ?>
        </ul>
    </div>
    <div class="boxfooter searchbox">
        <form action="index.php?act=listsp" method="POST">
            <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>
</div>
<div class="row">
    <div class="title">TOP 10 YÊU THÍCH</div>
    <div class="row content">
        <?php
        $sp_top10 = loadall_sanpham_top10();
        foreach ($sp_top10 as $item) {
            ?>
            <div class="row mb10 top10">
                <img src="upload/<?php echo $item['hinh'] ?>" alt="">
                <a href="index.php?act=chitietsp&id=<?php echo $item['ma_hh'] ?>">
                    <?php echo $item['ten_hh'] ?>
                </a>
            </div>
            <?php
        }

        ?>

    </div>
</div>