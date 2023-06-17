<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="title">Quên mật khẩu</div>
            <div class="row content">
                <form action="index.php?act=quenmk" enctype="multipart/form-data" method="post">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="">
                    <br>
                    <input type="submit" value="Gửi lại mật khẩu" name="quenmk">
                    <input type="reset" value="Nhập lại">
                </form>
               <?php
               if(isset($thongbao)){
                ?>
                <h2><?php echo $thongbao ?></h2>
                <?php
               }
               
               ?>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "view/boxright.php" ?>
    </div>
</div>