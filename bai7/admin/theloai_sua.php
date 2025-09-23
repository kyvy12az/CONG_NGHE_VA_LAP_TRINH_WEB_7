<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa Thể Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .container {
            background: #fff;
            max-width: 440px;
            margin: 60px auto;
            padding: 32px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
        }

        h2 {
            color: #0077cc;
            text-align: center;
            margin-bottom: 24px;
        }

        .form-row {
            margin-bottom: 18px;
            display: flex;
            align-items: center;
        }

        .form-row label {
            flex: 0 0 120px;
            text-align: right;
            margin-right: 12px;
            font-weight: bold;
        }

        .form-row input[type="text"],
        .form-row select {
            flex: 1;
            padding: 7px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-row img {
            vertical-align: middle;
            border: 1px solid #eee;
            border-radius: 4px;
        }

        .form-row input[type="file"] {
            flex: 1;
        }

        .actions {
            text-align: center;
            margin-top: 28px;
        }

        button,
        input[type="submit"],
        input[type="reset"] {
            padding: 8px 22px;
            border: none;
            border-radius: 4px;
            background: #0077cc;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 0 8px;
        }

        input[type="reset"] {
            background: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sửa Thể Loại</h2>
        <?php
        include("../connect.php");
        if (isset($_GET['idTL'])) {
            $sl = "select * from theloai where idTL=" . intval($_GET['idTL']);
        }
        $results = mysqli_query($connect, $sl);
        $d = mysqli_fetch_array($results);
        ?>
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <div class="form-row">
                <label for="TenTL">Tên Thể Loại</label>
                <input type="text" name="TenTL" id="TenTL" value="<?php echo htmlspecialchars($d['TenTL']); ?>"
                    required />
            </div>
            <div class="form-row">
                <label for="ThuTu">Thứ Tự</label>
                <input type="text" name="ThuTu" id="ThuTu" value="<?php echo htmlspecialchars($d['ThuTu']); ?>"
                    required />
            </div>
            <div class="form-row">
                <label for="AnHien">Ẩn/Hiện</label>
                <select name="AnHien" id="AnHien">
                    <option value="0" <?php if ($d['AnHien'] == 0)
                        echo "selected"; ?>>Ẩn</option>
                    <option value="1" <?php if ($d['AnHien'] == 1)
                        echo "selected"; ?>>Hiện</option>
                </select>
            </div>
            <div class="form-row">
                <label>Biểu tượng</label>
                <img id="preview-img" src="../image/<?php echo htmlspecialchars($d['icon']); ?>" width="40"
                    height="40" />
            </div>
            <div class="form-row">
                <label for="image">Đổi ảnh</label>
                <input type="file" name="image" id="image" accept="image/*" />
                <input type="hidden" name="ten_anh" value="<?php echo htmlspecialchars($d['icon']); ?>">
            </div>
            <input type="hidden" name="idTL" value="<?php echo intval($_GET['idTL']); ?>" />
            <div class="actions">
                <input type="submit" name="Sua" value="Sửa" />
                <input type="reset" name="Huy" value="Hủy" id="btn-cancel" />
            </div>
        </form>
        <?php
        // Xử lý cập nhật
        if (isset($_POST["TenTL"]))
            if (isset($_POST["ThuTu"]))
                if (isset($_POST["AnHien"]))
                    $ten_file_tai_len = "";
        $theloai = $_POST['TenTL'] ?? '';
        $thutu = $_POST['ThuTu'] ?? '';
        $an = $_POST['AnHien'] ?? '';
        if (isset($_FILES["image"]["name"]))
            $ten_file_tai_len = $_FILES["image"]["name"];
        if (!empty($ten_file_tai_len)) {
            $icon = $ten_file_tai_len;
        } else {
            if (isset($_POST['ten_anh']))
                $icon = $_POST['ten_anh'];
        }

        if (isset($_GET["idTL"]))
            $key = intval($_GET["idTL"]);
        if (isset($_POST['Sua'])) {
            $sl = "select count(*) from theloai where icon='$icon' ";
            $results = mysqli_query($connect, $sl);
            $d = mysqli_fetch_array($results);
            if ($d[0] == 0 || empty($ten_file_tai_len)) {
                $sl = "update theloai set TenTL='$theloai',ThuTu='$thutu',AnHien='$an',icon='$icon' where idTL ='$key'";
                if (!empty($ten_file_tai_len)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], "../image/" . $ten_file_tai_len);
                    $duong_dan_anh_cu = "../image/" . filter_input(INPUT_POST, "ten_anh");
                    if (file_exists($duong_dan_anh_cu))
                        unlink($duong_dan_anh_cu);
                }
                if (mysqli_query($connect, $sl)) {
                    echo "<script language='javascript'>alert('Sửa thành công');location.href='theloai.php';</script>";
                }
            } else {
                echo "<script language='javascript'>alert('Ảnh bị trùng tên');location.href='theloai_sua.php?idTL=$key';</script>";
            }
        }
        ?>
        <script>
            // Preview ảnh khi chọn file mới
            document.getElementById('image').addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (ev) {
                        document.getElementById('preview-img').src = ev.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            // Nút Hủy quay lại danh sách
            document.getElementById('btn-cancel').addEventListener('click', function (e) {
                e.preventDefault();
                window.location.href = 'theloai.php';
            });
        </script>
    </div>
</body>

</html>