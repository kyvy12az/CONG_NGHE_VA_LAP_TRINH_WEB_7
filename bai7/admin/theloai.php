<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách Thể Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px #0002;
            padding: 32px 24px;
        }

        h2 {
            text-align: center;
            color: #0077cc;
            margin-bottom: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 12px 8px;
            text-align: center;
        }

        th {
            background: #0077cc;
            color: #fff;
            font-size: 17px;
        }

        tr:nth-child(even) {
            background: #f3f7fa;
        }

        tr:hover {
            background: #e6f2ff;
        }

        td img {
            border-radius: 6px;
            border: 1px solid #eee;
        }

        .btn {
            padding: 6px 18px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 2px;
        }

        .btn-edit {
            background: #28a745;
        }

        .btn-delete {
            background: #dc3545;
        }

        .btn-add {
            background: #0077cc;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Danh sách Thể Loại</h2>
        <?php include_once('../connect.php'); ?>
        <table>
            <tr>
                <th>Tên Thể Loại</th>
                <th>Thứ Tự</th>
                <th>Ẩn/Hiện</th>
                <th>Biểu tượng</th>
                <th colspan="2"><a href="theloai_them.php" class="btn btn-add">+ Thêm</a></th>
            </tr>
            <?php
            $sql = "select * from theloai";
            $results = mysqli_query($connect, $sql);
            while (($rows = mysqli_fetch_assoc($results)) != NULL) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($rows['TenTL']); ?></td>
                    <td><?php echo htmlspecialchars($rows['ThuTu']); ?></td>
                    <td><?php echo $rows['AnHien'] == 1 ? "Hiện" : "Ẩn"; ?></td>
                    <td><img src="../image/<?php echo htmlspecialchars($rows['icon']); ?>" width="40" height="40" /></td>
                    <td>
                        <a href="theloai_sua.php?idTL=<?php echo $rows['idTL']; ?>" class="btn btn-edit">Sửa</a>
                    </td>
                    <td>
                        <a href="theloai_xoa.php?idTL=<?php echo $rows['idTL']; ?>" class="btn btn-delete"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php }
            mysqli_close($connect);
            ?>
        </table>
    </div>
</body>

</html>