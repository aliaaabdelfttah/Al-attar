<?php
session_start();

// إذا كانت السلة فارغة
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "سلة التسوق فارغة!";
    exit;
}

// تعريف المنتجات
$products = [
    1 => ["name" => "عطر الورد", "price" => 100, "image" => "rose.jpg"],
    2 => ["name" => "عطر اللافندر", "price" => 120, "image" => "lavender.jpg"],
    3 => ["name" => "عشبة البابونج", "price" => 30, "image" => "chamomile.jpg"]
];

$cart_items = $_SESSION['cart'];
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>سلة التسوق</h1>
    </header>

    <div class="cart-items">
        <?php foreach ($cart_items as $item_id): ?>
        <div class="cart-item">
            <img src="images/<?php echo $products[$item_id]['image']; ?>" alt="<?php echo $products[$item_id]['name']; ?>">
            <h3><?php echo $products[$item_id]['name']; ?></h3>
            <p>السعر: <?php echo $products[$item_id]['price']; ?> ريال</p>
            <?php $total_price += $products[$item_id]['price']; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="total">
        <p>المجموع الكلي: <?php echo $total_price; ?> ريال</p>
    </div>

    <div class="checkout">
        <button>إتمام الشراء</button>
    </div>

</body>
</html>
