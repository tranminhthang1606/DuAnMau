<?php
if (isset($_FILES['hinh'])) {
    $dir = "upload/";
    $file_name = time() . "-" . basename($_FILES['hinh']['name']);
    $path = pathinfo($_FILES['hinh']['name'], PATHINFO_EXTENSION);
    $accept_path = ['png', 'jpg'];
    $size = $_FILES['hinh']['size'];
    if (!in_array(strtolower($path), $accept_path) || $size > 5000000) {
        $checked = false;
        echo "<h2>Upload ảnh không thành công !</h2>";
        return;
    } else {
        move_uploaded_file($_FILES['hinh']["tmp_name"], $dir . $file_name);
        $checked = true;
    }

}

?>