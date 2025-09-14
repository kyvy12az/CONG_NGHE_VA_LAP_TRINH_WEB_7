<!DOCTYPE html>
<html>
    <head>
        <title>Nhập và tính toán trên dãy số</title>
        <meta charset="utf-8">
        <style>
            * {
                font-family: Tahoma;
            }
            table   {
                width: 400px;
                margin: 100px auto;
                border-collapse: collapse;
            }
            table th {
                background: #66CCFF;
                padding: 10px;
                font-size: 18px;
            }
            table td {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            $ket_qua = 0;
            $mang_so = [];
            $nhap_mang = "";

            if (isset($_POST['btn_goi'])) {
                $nhap_mang = $_POST['nhap_mang'];
                $mang_so = explode(",", $nhap_mang);
                foreach ($mang_so as $so) {
                    $ket_qua += (int)trim($so); 
                }
            }
        ?>
        <form method="POST" action="">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nhập dãy số:</td>
                        <td>
                            <input type="text" name="nhap_mang"
                            value="<?php echo htmlspecialchars($nhap_mang); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btn_goi" value="Tổng dãy số"></td>
                    </tr>
                    <tr>
                        <td>Tổng dãy số:</td>
                        <td>
                            <input type="text" name="ket_qua" disabled="disabled"
                            value="<?php echo $ket_qua; ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
