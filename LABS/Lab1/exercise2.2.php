<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Future Value Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 420px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            font-weight: 600;
            margin: 10px 0 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 15px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4a90e2;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #357abd;
        }
        .result {
            margin-top: 25px;
            padding: 20px;
            border-radius: 10px;
            background: #f6f9fc;
            border: 1px solid #ddd;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        .result h3 {
            text-align: center;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Future Value Calculator</h1>

        <?php
        $investment = "";
        $interest_rate = "";
        $years = "";
        $future_value = 0;
        $error = "";
        $show_result = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $investment = filter_input(INPUT_POST, "investment", FILTER_VALIDATE_FLOAT);
            $interest_rate = filter_input(INPUT_POST, "interest_rate", FILTER_VALIDATE_FLOAT);
            $years = filter_input(INPUT_POST, "years", FILTER_VALIDATE_INT);

            if ($investment === false || $investment <= 0) {
                $error = "Investment amount must be a valid number greater than 0.";
            } elseif ($interest_rate === false || $interest_rate <= 0 || $interest_rate > 15) {
                $error = "Interest rate must be a valid number between 0 and 15.";
            } elseif ($years === false || $years <= 0) {
                $error = "Number of years must be a valid integer greater than 0.";
            } else {
                $future_value = $investment * pow(1 + $interest_rate / 100, $years);
                $show_result = true;
            }
        }
        ?>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label>Investment Amount:</label>
            <input type="number" step="0.01" name="investment" 
                   value="<?php echo htmlspecialchars($investment); ?>" required>

            <label>Yearly Interest Rate (%):</label>
            <input type="number" step="0.01" name="interest_rate" 
                   value="<?php echo htmlspecialchars($interest_rate); ?>" required>

            <label>Number of Years:</label>
            <input type="number" name="years" 
                   value="<?php echo htmlspecialchars($years); ?>" required>

            <input type="submit" value="Calculate Future Value">
        </form>

        <?php if ($show_result): ?>
            <div class="result">
                <h3>Calculation Result</h3>
                <p><strong>Investment Amount:</strong> 
                   <?php echo "$" . number_format($investment, 2); ?></p>
                <p><strong>Yearly Interest Rate:</strong> 
                   <?php echo number_format($interest_rate, 2) . "%"; ?></p>
                <p><strong>Number of Years:</strong> 
                   <?php echo $years; ?></p>
                <p><strong>Future Value:</strong> 
                   <?php echo "$" . number_format($future_value, 2); ?></p>
                <hr>
                <p style="text-align:center; font-style: italic; color:#666;">
                    This calculation was done on <?php echo date("m/d/Y"); ?>.
                </p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
