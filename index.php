<?php
session_start();

// تعريف قائمة المنتجات (يمكنك إضافة المزيد هنا)
$products = [
    ["id" => 1, "name" => "عطر الورد", "price" => 100, "image" => "rose.jpg"],
    ["id" => 2, "name" => "عطر اللافندر", "price" => 120, "image" => "lavender.jpg"],
    ["id" => 3, "name" => "عشبة البابونج", "price" => 30, "image" => "chamomile.jpg"]
];

// إضافة منتج إلى سلة التسوق
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
}

// عرض سلة التسوق
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر العطارة</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>مرحبا بك في متجر العطارة</h1>
        <div class="cart">
            <a href="cart.php">سلة التسوق (<?php echo count($cart_items); ?>)</a>
        </div>
    </header>

    <div class="products">
        <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p>السعر: <?php echo $product['price']; ?> ريال</p>
            <form method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit" name="add_to_cart">أضف إلى السلة</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
