<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xóa Thể Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto;
            padding: 32px 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
        }

        h2 {
            color: #c00;
            text-align: center;
        }

        .info {
            margin: 16px 0;
            padding: 12px;
            background: #f3f3f3;
            border-radius: 4px;
        }

        .actions {
            text-align: center;
            margin-top: 24px;
        }

        button,
        a.button {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            background: #c00;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 0 8px;
            text-decoration: none;
        }

        a.button {
            background: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("../connect.php");
        if (!isset($_GET["idTL"])) {
            echo '<div class="info">Không tìm thấy ID thể loại.</div>';
            echo '<div class="actions"><a href="theloai.php" class="button">Quay lại</a></div>';
            exit();
        }
        $key = intval($_GET["idTL"]);
        // Lấy thông tin thể loại
        $sql = "SELECT * FROM theloai WHERE idTL=$key";
        $result = mysqli_query($connect, $sql);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo '<div class="info">Thể loại không tồn tại.</div>';
            echo '<div class="actions"><a href="theloai.php" class="button">Quay lại</a></div>';
            exit();
        }
        $row = mysqli_fetch_assoc($result);

        // Nếu đã xác nhận xóa
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
            $sl = "DELETE FROM theloai WHERE idTL=$key";
            if (mysqli_query($connect, $sl)) {
                echo '<h2>Đã xóa thành công!</h2>';
                echo '<div class="actions"><a href="theloai.php" class="button">Quay lại danh sách</a></div>';
            } else {
                echo '<h2 style="color:#c00">Lỗi xóa!</h2>';
                echo '<div class="info">' . mysqli_error($connect) . '</div>';
                echo '<div class="actions"><a href="theloai.php" class="button">Quay lại</a></div>';
            }
            exit();
        }
        ?>
        <h2>Xác nhận xóa thể loại</h2>
        <div class="info">
            <b>Tên thể loại:</b> <?php echo htmlspecialchars($row['TenTL']); ?><br>
            <b>Thứ tự:</b> <?php echo htmlspecialchars($row['ThuTu']); ?><br>
            <b>Ẩn/Hiện:</b> <?php echo $row['AnHien'] == 1 ? 'Hiện' : 'Ẩn'; ?><br>
            <b>Biểu tượng:</b> <img src="../image/<?php echo htmlspecialchars($row['icon']); ?>" width="40" height="40"
                style="vertical-align:middle;" />
        </div>
        <form method="post">
            <input type="hidden" name="confirm" value="yes">
            <div class="actions">
                <button type="submit">Xác nhận xóa</button>
                <a href="theloai.php" class="button">Hủy</a>
            </div>
        </form>
    </div>
</body>

</html>