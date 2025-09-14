<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Discount Calculator</title>
        <style>
            body {
                font-family: 'Segoe UI', Arial, sans-serif;
                background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
                margin: 0;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            h1 {
                color: #2d6cdf;
                margin-top: 50px;
                margin-bottom: 30px;
                letter-spacing: 1px;
            }
            form {
                background: #fff;
                padding: 30px 35px 20px 35px;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(44, 62, 80, 0.08);
                width: 420px;
            }
            label {
                display: block;
                font-weight: 500;
                margin-bottom: 6px;
                color: #34495e;
            }
            input[type="text"], input[type="number"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 18px;
                border: 1px solid #bfc9d1;
                border-radius: 8px;
                font-size: 16px;
                transition: border-color 0.2s;
            }
            input[type="text"]:focus, input[type="number"]:focus {
                border-color: #2d6cdf;
                outline: none;
            }
            input[type="submit"] {
                background: linear-gradient(90deg, #2d6cdf 60%, #5fa8e7 100%);
                color: #fff;
                border: none;
                padding: 12px 0;
                width: 100%;
                border-radius: 8px;
                font-size: 17px;
                font-weight: 600;
                cursor: pointer;
                box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
                transition: background 0.2s, transform 0.2s;
            }
            input[type="submit"]:hover {
                background: linear-gradient(90deg, #1e4fa3 60%, #2d6cdf 100%);
                transform: translateY(-2px) scale(1.02);
            }
            .result {
                margin-top: 30px;
                padding: 24px 30px;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(44, 62, 80, 0.10);
                width: 420px;
                background: #f4f8fb;
                border: none;
                color: #34495e;
            }
            .result h3 {
                color: #2d6cdf;
                margin-top: 0;
                margin-bottom: 18px;
            }
            .result p {
                margin: 8px 0;
                font-size: 16px;
            }
            @media (max-width: 500px) {
                form, .result {
                    width: 95vw;
                    padding: 16px;
                }
                h1 {
                    font-size: 1.3em;
                }
            }
        </style>
</head>
<body>
    <h1>Product Discount Calculator</h1>

    <?php
    $product_description = "";
    $list_price = "";
    $discount_percent = "";
    $discount = 0;
    $discount_price = 0;
    $show_result = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $product_description = filter_input(INPUT_POST, 'product_description');
        $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
        $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);

        if ($product_description && $list_price > 0 && $discount_percent > 0) {
            $discount = $list_price * $discount_percent / 100;
            $discount_price = $list_price - $discount;
            $show_result = true;
        }
    }
    ?>

    <form method="post" action="">
        <label>Product Description:</label>
        <input type="text" name="product_description" 
               value="<?php echo htmlspecialchars($product_description); ?>" required><br>

        <label>List Price:</label>
        <input type="number" step="0.01" name="list_price" 
               value="<?php echo htmlspecialchars($list_price); ?>" required><br>

        <label>Discount Percent:</label>
        <input type="number" step="0.01" name="discount_percent" 
               value="<?php echo htmlspecialchars($discount_percent); ?>" required> %<br><br>

        <input type="submit" value="Calculate Discount">
    </form>

    <?php if ($show_result): ?>
        <div class="result">
            <h3>Discount Details</h3>
            <p><strong>Product Description:</strong> 
               <?php echo htmlspecialchars($product_description); ?></p>
            <p><strong>List Price:</strong> 
               <?php echo "$" . number_format($list_price, 2); ?></p>
            <p><strong>Standard Discount:</strong> 
               <?php echo number_format($discount_percent, 1) . "%"; ?></p>
            <p><strong>Discount Amount:</strong> 
               <?php echo "$" . number_format($discount, 2); ?></p>
            <p><strong>Discount Price:</strong> 
               <?php echo "$" . number_format($discount_price, 2); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
