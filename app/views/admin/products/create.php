<body>
    <div class="container mt-3">
        <h2>CREATE PRODUCT</h2>
        <hr>
        <form action="" method="POST">
            <div class="mb-3 mt-3 ">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="<?=BASE_URL ?>" type="submit" class="btn btn-success">Back</a>
        </form>
    </div>
</body>