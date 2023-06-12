<?php
function loadall_thongke(){
    $sql="select `loai`.`ten_loai` as `tenloai`,`loai`.`ma_loai` as `maloai`,count(`hang_hoa`.`ma_loai`) as `sl`,min(`hang_hoa`.`don_gia`) as `min`,max(`hang_hoa`.`don_gia`) as `max`,avg(`hang_hoa`.`don_gia`) as `trungbinh`";
$sql.=" from `hang_hoa` join `loai` on `loai`.`ma_loai`=`hang_hoa`.`ma_loai`";
$sql.=" group by `loai`.`ma_loai` order by `loai`.`ma_loai` desc";
$list_thongke = pdo_query($sql);
return $list_thongke;
}

?>