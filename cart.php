<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart'])) {
    $product = [
        'id'       => $_POST['product_id'],
        'title'    => $_POST['title'],
        'desc'     => $_POST['desc'],
        'price'    => $_POST['price'],
        'image'    => $_POST['image'],
        'quantity' => $_POST['quantity']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product['id']) {
            $item['quantity'] += $product['quantity'];
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $product;
    }

    header("Location: cart.php");
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<section id="page-header" class="about-header"> 
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Subtotal</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
                foreach ($_SESSION['cart'] as $index => $item):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
            ?>
            <tr>
                <td><img src="admin/upload/<?= $item['image'] ?>" width="60px"></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['desc'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= $item['price'] ?>$</td>
                <td><?= $subtotal ?>$</td>
                <td>
                    <form method="POST" action="remove.php">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5"><strong>Total:</strong></td>
                <td colspan="2"><strong><?= $total ?>$</strong></td>
            </tr>
            <?php else: ?>
                <tr><td colspan="7" align="center">Cart is empty</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
