<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Thêm Thể Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .container {
            background: #fff;
            max-width: 420px;
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
            flex: 0 0 110px;
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
        <h2>Thêm Thể Loại</h2>
        <form action="theloai_them_xl.php" method="post" enctype="multipart/form-data" name="form1">
            <div class="form-row">
                <label for="TenTL">Tên Thể Loại</label>
                <input type="text" name="TenTL" id="TenTL" required />
            </div>
            <div class="form-row">
                <label for="ThuTu">Thứ Tự</label>
                <input type="text" name="ThuTu" id="ThuTu" required />
            </div>
            <div class="form-row">
                <label for="AnHien">Ẩn/Hiện</label>
                <select name="AnHien" id="AnHien">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                </select>
            </div>
            <div class="form-row">
                <label for="anh">Biểu tượng</label>
                <input type="file" name="image" id="anh" required />
            </div>
            <div class="actions">
                <input type="submit" name="Them" value="Thêm" />
                <input type="reset" name="Huy" value="Hủy" />
            </div>
        </form>
    </div>
</body>

</html>