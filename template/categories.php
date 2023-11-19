<!-- category------------- -->
<section class="product my-4 py-5" id="product">
    <div class="container">
        <div class="products-subtitle mb-4 pb-3">
            <h3>View Our</h3>
            <h1>Categories</h1>
        </div>
        <div  class="button-group mb-5">
        <button class="btn bg-dark text-light fw-bold active me-4" id="btn1" data-filter="*">All</button>
        <?php
        foreach ($categories as $category) 
        {
            ?>
            <button class="btn bg-dark text-capitalize me-3 text-light fw-bold fs-5" data-filter=".<?= $category['name']?>"><?= $category['name']?></button>  
            <?php
        }
        ?>
        </div>
        <div class="grid row">
        <?php
        foreach ($products as $product)
         {
            $category_name = $category_obj->get_category($product['category_id'])
          ?>
            <div class="col-md-3  px-4 mb-5  element-item <?= $category_name['name'] ?>">
              <div class="content-container">
                    <div class="content">
                        <div class="front">
                            <div class="img"><img src="images/<?=$product['image']?>" width="100%"></div>
                            <div class="box">
                            <div class="texts">
                                <h5><?= $product['name'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0 fs-3 d-flex align-items-center"><img src="images/naira-d.png" width="20px"> <span class="ms-1"><?= $product['price'] ?></span></h4>
                                </div>
                            </div>
                            </div>
                        </div>   
                        <div class="back">
                            <h3><?= $product['name'] ?></h3>
                            <p style="max-width:250px"><?= strlen($product['description']) > 20  ? substr($product['description'],0,60) : $product['description']  ?>....<a href="product.php?id=<?= $product['id'] ?>">Read more</a></p>
                            <p class="m-0"><span><b>Stock:</b> In Stock</span></p>
                            <p class="m-0 mt-2 mb-3 d-flex align-items-center"><span><b>Price:</b> <img src="images/naira-w.png" width="20px"></span> <span class="ms-1"><?= $product['price'] ?></span></p>
                            <div style="max-width:200px">
                                <div class="mb-3"><a href="product.php?id=<?= $product['id'] ?>" class="cart-btn">View Product</a></div>
                                <div>
                                    <?php
                                    if(isset($_SESSION['user']))
                                    {
                                      $product_ids = $cart_obj->get_product_id($_SESSION['user']['id']);
                                      if(in_array($product['id'],$product_ids))
                                      {
                                      ?>
                                        <button type="submit" name="cart_add" disabled class="cart-btn">Add to <i class="fas fa-cart-plus"></i></button>
                                      <?php
                                      }
                                      else
                                      {
                                      ?>
                                        <form action="exe/cart.php" method="post" class="">
                                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                            <button type="submit" name="cart_add" class="cart-btn cart">Add to <i class="fas fa-cart-plus"></i></button>
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
                                            <button type="submit" name="cart_add" class="cart-btn cart">Add to <i class="fas fa-cart-plus"></i></button>
                                      </form>
                                    <?php
                                     }                                
                                      ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
           </div>
          <?php 
        }
         ?> 
        </div>
    </div>
</section>
<!-- --------------------- -->