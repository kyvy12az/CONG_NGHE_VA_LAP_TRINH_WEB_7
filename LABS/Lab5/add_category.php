<?php
require_once('database.php');

// Lấy dữ liệu từ form
$name = filter_input(INPUT_POST, 'name');

// Kiểm tra hợp lệ
if ($name == null) {
    $error = "Invalid category name. Please try again.";
    include('error.php');   // hoặc bạn có thể echo lỗi trực tiếp
} else {
    // Thêm vào database
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Quay lại danh sách category
    include('category_list.php');
}
?>
