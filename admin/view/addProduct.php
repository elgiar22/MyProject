<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";
include "../../dbConnection.php";
?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">



                <?php


        if (isset($_POST['addProduct'])) {
          $category = $_POST['category'];
          $cat_id = $_POST['category'];
          $title = trim($_POST['title']);
          $desc = trim($_POST['desc']);
          $price = $_POST['price'];
          $quantity = $_POST['quantity'];
          $image = $_FILES['img']['name'];

          $image_temp = $_FILES['img']['tmp_name'];



          if (empty($category) || empty($title) || empty($desc) || empty($price) || empty($quantity) || empty($image)) {
            echo "<div style='color:red; text-align:center;'>Please fill in all fields.</div>";
          } else {
            $query = "INSERT INTO products(title,`desc`,price,quantity,`image`,category_id) VALUES ('$title','$desc','$price','$quantity','$image','$cat_id')";
            $result = mysqli_query($conn, $query);
            move_uploaded_file($image_temp,"../upload/$image");
            if ($result) {
              echo "<div style='color:green; text-align:center;'>Product added successfully.</div>";
            } else {
              echo "<div style='color:red; text-align:center;'>Error adding product.</div>";
            }
          }

        }



        ?>

         
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="addProduct.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control p_input">
                      <?php
                      $sql = "SELECT * FROM categories";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['title']}</option>";
                      }


                      ?>

                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php 
include "../view/footer.php";
 ?>