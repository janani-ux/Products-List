<?php
// Hardcoded products for demonstration
$products = [
	["id" => 1, "name" => "Toshiba Notebook with 500GB HDD & 8GB RAM", "price" => 40000,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],
    ["id" => 2, "name" => "Dell Inspiron with 1TB HDD & 16GB RAM", "price" => 35000,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],
    ["id" => 3, "name" => "Toshiba Notebook with 500GB HDD & 16GB RAM", "price" => 43999,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],
    ["id" => 4, "name" => "Dell Inspiron with 1TB HDD & 8GB RAM", "price" => 36000,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],
	["id" => 5, "name" => "HP Laptop with 12th gen Intel Core i5", "price" => 49200,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],
    ["id" => 6, "name" => "HP Laptop with 12th gen Intel Core i3", "price" => 45200,"image"=>"https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"],


    // Add more products as needed
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $discount_percentage = $_POST['discount_percentage'];

    // For demonstration, save offer data in a session
    session_start();
    $_SESSION['offers'][$product_id] = [
        "start_date" => $start_date,
        "end_date" => $end_date,
        "start_time" => $start_time,
        "end_time" => $end_time,
        "discount_percentage" => $discount_percentage
    ];

    echo "<p class='alert alert-success'>Offer added successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Set Product Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Set Product Offers</h1>
        <form method="post">
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <select id="product_id" name="product_id" class="form-control" required>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="discount_percentage">Discount Percentage:</label>
                <input type="number" id="discount_percentage" name="discount_percentage" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Set Offer</button>
        </form>
    </div>
</body>
</html>
