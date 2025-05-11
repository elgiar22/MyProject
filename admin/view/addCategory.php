<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../dbConnection.php";
?>

<?php
include "../../dbConnection.php";

if (isset($_POST['addCategory'])) {
    $title = trim($_POST['title']);

    if (empty($title)) {
        echo "<div style='color:red; text-align:center;'>Please enter a title.</div>";
    } else {
        $query = "INSERT INTO categories (title) VALUES ('$title')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<div style='color:green; text-align:center;'>Category added successfully.</div>";
        } else {
            echo "<div style='color:red; text-align:center;'>Error adding category.</div>";
        }
    }
}
?>


<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Add Category</h3>
                    <form method="POST" action="addCategory.php">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control p_input text-light">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="addCategory"
                                class="btn btn-primary btn-block enter-btn">Add</button>
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