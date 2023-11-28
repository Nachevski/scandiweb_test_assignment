<?php

use App\Products\ProductFactory;

require_once('autoload.php');


$factory = new ProductFactory();
$data = $factory->getProducts();
$products = [];
foreach ($data as $product) {
    $className = 'App\\Products\\' . $product['product_type'];
    $newProduct = new $className;
    $newProduct->setId($product['id']);
    $newProduct->setSKU($product['sku']);
    $newProduct->setName($product['name']);
    $newProduct->setPrice($product['price']);
    $newProduct->setType($product['product_type']);
    $newProduct->setProductDescription($product['product_description']);
    $products[] = $newProduct;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Styles/main.css">
    <title>Product list</title>
</head>
<body>
<?php if (isset($_SESSION['ErrorException'])) : ?>
    <div id="errorException">
        <p><?= $_SESSION['ErrorException'] ?></p>
    </div>
    <?php $_SESSION['ErrorException'] = null; endif; ?>
<header>
    <h1>Product List</h1>
    <div class="buttons-container">
        <a href="./add-product.php" class="btn">ADD</a>
        <a href="" id="delete-product-btn" class="btn">MASS DELETE</a>
    </div>
</header>

<main id="products">
    <?php foreach ($products as $product) : ?>
        <div class="product">
            <div class="product-container">
                <input type="checkbox" class="delete-checkbox" data-id="<?= $product->getId() ?>">
                <div class="product-description">
                    <p><?= $product->getSKU() ?></p>
                    <p><?= $product->getName() ?></p>
                    <p><?= $product->getPrice() ?> $</p>
                    <p><?= $product->getProductDescription() ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</main>

<footer>
    <span>Scandiweb Test assigment</span>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Scripts/main.js"></script>
</body>
</html>