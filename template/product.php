<?php 
    if(isset($_GET['id']))
    {
       $product = $product_obj->get_product($_GET['id']);
       $category_row = $category_obj->get_category($product['category_id']);
    }
?>
<!-- product sectoin -->
<section class="show-product my-5 py-5">
 <div class="container">
     <div class="row align-items-center">
        <div class="col-md-6">
            <div class="img p-5"><img src="images/<?= $product['image'] ?>" width="100%"></div>
        </div> 
        <div class="col-md-6 p-3">
            <div class="texts ">
                <h2><?= $product['name'] ?></h2>
                <h5 class="text-decoration-underline text-uppercase"><?= $category_row['name'] ?></h5>
                <p><?= $product['description'] ?></p>
                <h3 class="d-flex align-items-center"><img src="images/naira-d.png" width="20px"> <span class="ms-1"> <?= $product['price'] ?></span></h3>
            </div>
            <div class="icons p-3 d-flex text-center">
                <div class="me-5">
                    <i class="fas fa-retweet fs-2 p-2"></i>
                    <h5>5 Days<br> Replacementy</h5>
                </div>
                <div class="me-5">
                    <i class="fas fa-truck fs-2 p-2"></i>
                    <h5>Free<br> Delivery</h5>
                </div>
                <div class="me-5">
                    <i class="fas fa-check-double fs-2 p-2"></i>
                    <h5>1 Day<br>Warrante</h5>
                </div>
            </div>
            <div class="cart">
            <div>
                <?php
                if(isset($_SESSION['user']))
                {
                    $product_ids = $cart_obj->get_product_id($_SESSION['user']['id']);
                    if(in_array($product['id'],$product_ids))
                    {
                    ?>
                    <button type="submit" name="cart_add" disabled class="btn btn-lg bg-success text-light">Add to <i class="fas fa-cart-plus"></i></button>
                    <?php
                    }
                    else
                    {
                    ?>
                    <form action="exe/cart.php" method="post" class="">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button type="submit" name="cart_add" class=" btn btn-lg bg-dark text-light">Add to <i class="fas fa-cart-plus"></i></button>
                    </form>
                    <?php    
                    } 
                    }
                    else
                    {
                ?>
                    <form action="exe/cart.php" method="post" class="">
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" name="cart_add" class="btn btn-lg bg-dark text-light">Add to <i class="fas fa-cart-plus"></i></button>
                    </form>
                <?php
                    }                                
                    ?>
            </div>
            </div>
        </div>
     </div>
 </div>
</section>
<!-- --------------- -->
