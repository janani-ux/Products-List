<?php
session_start();

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

// Retrieve offers from session
$offers = $_SESSION['offers'] ?? [];

// Function to check if an offer is active
function is_offer_active($offer) {
    $current_datetime = new DateTime();
    $start_datetime = new DateTime($offer['start_date'] . ' ' . $offer['start_time']);
    $end_datetime = new DateTime($offer['end_date'] . ' ' . $offer['end_time']);
    return ($current_datetime >= $start_datetime && $current_datetime <= $end_datetime);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	</style>
</head>
<body>
    <div class="container mt-4">
        <h1>Product Offers</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <?php
                    $offer = $offers[$product['id']] ?? null;
                    $discounted_price = $product['price'];
                    $offer_active = false;

                    if ($offer && is_offer_active($offer)) {
                        $discounted_price = $product['price'] * (1 - $offer['discount_percentage'] / 100);
                        $offer_active = true;
                    }
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                         <div class="card-img-actions">
                                            
                           <img src="<?php echo $product['image']; ?>" class="card-img img-fluid" width="96" height="350" alt="">
                                              
                                           
                                        </div>
										<div class="card-body text-center">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text">
                                <?php if ($offer_active): ?>
                                    <del>₹<?php echo number_format($product['price'], 2); ?></del><br>
                                    <span class="text-danger">Discounted Price: ₹<?php echo number_format($discounted_price, 2); ?> (<?php echo $offer['discount_percentage']; ?>% off)</span>
                                <?php else: ?>
                                    ₹<?php echo number_format($product['price'], 2); ?>
                                <?php endif; ?>
                            </p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
