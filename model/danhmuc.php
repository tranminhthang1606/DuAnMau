<?php
function loadall_danhmuc()
{
    $sql = "SELECT * FROM `loai` order by `ma_loai` ";
    $danhmuc = pdo_query($sql);
    return $danhmuc;
}
function insert_danhmuc($tenloai)
{
    $sql = "INSERT INTO `loai` (`ten_loai`) VALUES ('$tenloai')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "DELETE FROM loai WHERE `loai`.`ma_loai` = '$id'";
    pdo_execute($sql);
}

function update_danhmuc($id, $tenloai)
{
    $sql = "UPDATE `loai` SET `ten_loai` = '$tenloai' WHERE `loai`.`ma_loai` = '$id'";
    pdo_execute($sql);
}

function loadone_danhmuc($id){
    $sql = "SELECT * FROM `loai`where `ma_loai`='$id'";
    $dm = pdo_query_one($sql);
    return $dm;
}
?>