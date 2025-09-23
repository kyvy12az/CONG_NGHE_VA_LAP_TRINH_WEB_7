<?php
include_once('../connect.php');

$theloai = $_POST['TenTL'] ?? '';
$thutu = $_POST['ThuTu'] ?? '';
$an = $_POST['AnHien'] ?? '';
$icon = $_FILES['image']['name'] ?? '';
$anhminhhoa_tmp = $_FILES['image']['tmp_name'] ?? '';

// Kiểm tra trùng tên ảnh
$sql_check = "SELECT COUNT(*) FROM theloai WHERE icon='$icon'";
$result_check = mysqli_query($connect, $sql_check);
$row_check = mysqli_fetch_array($result_check);
if ($row_check[0] > 0) {
    echo "<script>alert('Ảnh bị trùng tên!');window.location.href='theloai_them.php';</script>";
    exit();
}

// Kiểm tra upload ảnh
if ($icon == '' || $anhminhhoa_tmp == '' || !is_uploaded_file($anhminhhoa_tmp)) {
    echo "<script>alert('Vui lòng chọn ảnh hợp lệ!');window.location.href='theloai_them.php';</script>";
    exit();
}

if (!move_uploaded_file($anhminhhoa_tmp, "../image/" . $icon)) {
    echo "<script>alert('Lỗi upload ảnh!');window.location.href='theloai_them.php';</script>";
    exit();
}

$sl = "INSERT INTO theloai (TenTL,ThuTu,AnHien,icon) VALUES ('$theloai','$thutu','$an','$icon')";
if (mysqli_query($connect, $sl)) {
    echo "<script>alert('Thêm thành công!');window.location.href='theloai.php';</script>";
} else {
    echo "<script>alert('Lỗi khi thêm thể loại: " . mysqli_error($connect) . "');window.location.href='theloai_them.php';</script>";
}
?>