<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #333;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Advanced Calculator</h1>
    <form method="post" action="">
        <input type="number" name="num1" required placeholder="Enter first number">
        <select name="operation" required>
            <option value="">Select operation</option>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
            <option value="exponent">^</option>
            <option value="sqrt">√</option>
            <option value="sin">sin</option>
            <option value="cos">cos</option>
            <option value="tan">tan</option>
        </select>
        <input type="number" name="num2" placeholder="Enter second number (if needed)">
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error: Division by zero!";
                }
                break;
            case 'exponent':
                $result = pow($num1, $num2);
                break;
            case 'sqrt':
                if ($num1 >= 0) {
                    $result = sqrt($num1);
                } else {
                    $result = "Error: Cannot take square root of a negative number!";
                }
                break;
            case 'sin':
                $result = sin(deg2rad($num1)); // Convert degrees to radians
                break;
            case 'cos':
                $result = cos(deg2rad($num1)); // Convert degrees to radians
                break;
            case 'tan':
                $result = tan(deg2rad($num1)); // Convert degrees to radians
                break;
            default:
                $result = "Invalid operation!";
        }

        echo "<h2>Result: $result</h2>";
    }
    ?>
</body>
</html>