<?php
$all_result = count(loadall_sanpham());
$result_per_page = 9;
$pages = ceil($all_result/$result_per_page);

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page=1;  
}
$page_first_result = ($page-1) * $result_per_page;  
?>
