<?php
    if(isset($_POST['search']))
    {
        $term = $_POST['term'];
    }
?>
<!-- releted products-------- -->
<section class="product" id="product">
    <div class="container">
      <div class="products-subtitle mb-5 pb-3">
        <h3>Products on</h3>
        <h1><?= $term ?></h1>
      </div>
      <div class="row">
        <?php
          $products = $product_obj->search($term);
          foreach ($products as $product) 
          {
            $category_row = $category_obj->get_category($product['category_id']);
          ?>
              <div class="col-md-3 col-sm-6 col-6 px-2 mb-5">
                <div class="content-container">
                  <div class="content">
                    <div class="front">
                      <div class="img"><img src="images/<?= $product['image']?>" width="100%"></div>
                      <div class="box">
                        <div class="texts">
                          <h5><?= $product['name']?></h5>
                          <div class="d-flex justify-content-between align-items-center">
                            <h4 class="m-0 fs-3">$<?= $product['price']?></h4>
                          </div>
                        </div>
                      </div>
                    </div>   
                    <div class="back">
                      <h3>Fox Rose</h3>
                      <p><?= strlen($product['description']) > 20  ? substr($product['description'],0,60) : $product['description']  ?>....<a href="">Read more</a></p>
                      <p class="m-0"><span><b>Stock:</b> In Stock</span></p>
                      <p class="m-0 mt-2 mb-3"><span><b>Price: </b><?= $product['price']?></span></p>
                      <div class="max-width:200px">
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
<!-- -------------------- -->