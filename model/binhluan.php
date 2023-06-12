<?php
function thongke_binhluan(){
    $sql = "SELECT 
            `hang_hoa`.`ma_hh`, `hang_hoa`.`ten_hh`,
            count(*) so_luong,
            min(`binh_luan`.`ngay_bl`) cu_nhat,
            max(`binh_luan`.`ngay_bl`) moi_nhat
            from binh_luan
            join hang_hoa on `hang_hoa`.`ma_hh` = `binh_luan`.`ma_hh`
            group by `hang_hoa`.`ma_hh`, `hang_hoa`.`ten_hh`
            having `so_luong` > 0
            ";
    $tk_bl = pdo_query($sql);
    return $tk_bl;
}
function loadall_binhluan($idsp)
{
    $sql = "SELECT * FROM `binh_luan`";
    if($idsp!=0){
        $sql .= " where `ma_hh`='$idsp' order by `ma_bl` ";
    }
    $binhluan = pdo_query($sql);
    return $binhluan;
}
function insert_binhluan($noidung,$idsp,$idkh,$date)
{
    $sql = "INSERT INTO `binh_luan` (`noi_dung`, `ma_kh`, `ma_hh`, `ngay_bl`) VALUES ('$noidung', '$idkh', '$idsp', '$date')";
    pdo_execute($sql);
}
function delete_binhluan($id)
{
    $sql = "DELETE FROM `binh_luan` WHERE `binh_luan`.`ma_bl` = '$id'";
    pdo_execute($sql);
}
function filter_binhluan($keyword,$date)
{
    $sql = "select * from `binh_luan` where 1";
    if ($keyword != "") {
        $sql .= " and `noi_dung` like '%$keyword%'";
    }
    if($date){
        $sql.=" and `ngay_bl`='$date'";
    }
    $sql .= " order by `ma_bl` desc";
    $binhluan = pdo_query($sql);
    return $binhluan;
}
function delete_binhluan_bySP($id)
{
    $sql = "DELETE FROM `binh_luan` WHERE `binh_luan`.`ma_hh` = '$id'";
    pdo_execute($sql);
}
function delete_binhluan_byKH($id)
{
    $sql = "DELETE FROM `binh_luan` WHERE `binh_luan`.`ma_kh` = '$id'";
    pdo_execute($sql);
}