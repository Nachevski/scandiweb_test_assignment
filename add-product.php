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
<header>
    <h1>Product List</h1>
    <div class="buttons-container">
        <a href="" class="btn" id="save-new-product">Save</a>
        <a href="/" class="btn">Cancel</a>
    </div>
</header>

<main>
    <form action="App/Processing/saveNewProduct.php" method="POST" id="product_form">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="productType">Type switcher</label>
            <select name="productType" id="productType">
                <option value="" selected>Type switcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
        </div>
    </form>

</main>

<footer>
    <span>Scandiweb Test assigment</span>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Scripts/product-form.js"></script>
</body>
</html>