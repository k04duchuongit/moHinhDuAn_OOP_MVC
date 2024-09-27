<body>
    <?php
    ?>
    <div class="container mt-3">
        <h2>LIST PRODUCT</h2>
        <hr>
        <a href="<?= BASE_URL . '?act=create' ?>" class="btn btn-outline-success mb-3">Create new product</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    extract($product); ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><?= $price ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= $status == 1 ? 'Con hang' : 'Het hang' ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="" class="btn btn-outline-info" onclick="openDetail(event)">Info</a>
                            <a href="<?= BASE_URL . '?act=update&id=' . $id ?>" class="btn btn-outline-success">Update</a>
                            <a href="<?= BASE_URL . '?act=delete&id=' . $id ?>"
                                class="btn btn-outline-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php  }
                ?>

            </tbody>
        </table>

        <div class="overlay">
            <div class="overlay-content">
                <div class="d-flex justify-content-between">
                    <h4>Product detail</h4>
                    <span class="close-detail" onclick="closeDetail()"><i class="bi bi-x-lg"></i></span>
                </div>
                <hr>
                <table class="table table-hover">
                    <tr>
                        <th class="pe-5">Product ID</th>
                        <td class="ps-5"><?= $product['id'] ?></td>
                    </tr>
                    <tr>
                        <th class="pe-5">Product Name</th>
                        <td class="ps-5"><?= $product['name'] ?></td>
                    </tr>
                    <tr>
                        <th class="pe-5">Product Price</th>
                        <td class="ps-5"><?= $product['price'] ?></td>
                    </tr>
                    <tr>
                        <th class="pe-5">Product Quantity</th>
                        <td class="ps-5"><?= $product['quantity'] ?></td>

                    </tr>
                    <tr>
                        <th class="pe-5">Status</th>
                        <td class="ps-5"><?= $product['status'] ?></td>
                    </tr>
                </table>
                <a href="" class="btn btn-success">Update</a>
                <a href="" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>

</body>