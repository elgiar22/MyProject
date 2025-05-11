
<?php include 'header.php' ?>
<?php include 'navbar.php' ;?>
<?php include "dbConnection.php";?>


    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

<?php 
$selectProducts = "SELECT * FROM `products`";
$runSelectProducts = mysqli_query($conn, $selectProducts);
$resultProducts = mysqli_fetch_all($runSelectProducts, MYSQLI_ASSOC);

if (count($resultProducts) > 0) {
    foreach ($resultProducts as $product) { ?>
        <div class="pro">
<form method="POST" action="cart.php">
    <img src="admin/upload/<?php echo $product['image']; ?>" alt="p1" />
    <div class="des">
        <h2><?php echo $product['title']; ?></h2>
        <h5><?php echo $product['price']; ?>$</h5>
        <div class="star">
            <i class="fas fa-star "></i>
            <i class="fas fa-star "></i>
            <i class="fas fa-star "></i>
            <i class="fas fa-star "></i>
            <i class="fas fa-star "></i>
        </div>
        <h4><?php echo $product['desc']; ?></h4>
        Stock: <label><?= $product['quantity'] ?></label>

        <!-- hidden values -->
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <input type="hidden" name="title" value="<?= $product['title'] ?>">
        <input type="hidden" name="desc" value="<?= $product['desc'] ?>">
        <input type="hidden" name="price" value="<?= $product['price'] ?>">
        <input type="hidden" name="image" value="<?= $product['image'] ?>">

        <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity'] ?>">
        <button type="submit" name="cart" class="cart"><i class="fas fa-shopping-cart "></i></button>
    </div>
</form>

        </div>
<?php }
} ?>

                        
              
            </div>
           
        </div>
    </section>
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>