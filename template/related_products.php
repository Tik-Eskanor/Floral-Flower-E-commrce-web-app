<!-- releted products-------- -->
<section class="product" id="product">
    <div class="container">
      <div class="products-subtitle mb-5 pb-3">
        <h3>View Other</h3>
        <h1>Related Products</h1>
      </div>
      <div class="owl-carousel owl-theme">
        <?php
          foreach ($products as $related_product) 
          {
            $category_item = $category_obj->get_category($related_product['category_id']);
            if($category_row['id'] == $category_item['id'])
            {
          ?>
              <div class="item px-2 mb-5">
                <div class="content-container">
                  <div class="content">
                    <div class="front">
                      <div class="img"><img src="images/<?= $related_product['image']?>" width="100%"></div>
                      <div class="box">
                        <div class="texts">
                          <h5><?= $related_product['name']?></h5>
                          <div class="d-flex justify-content-between align-items-center">
                          <h4 class="m-0 fs-3 d-flex align-items-center"><img src="images/naira-d.png" class="naira"> <span class="ms-1"><?= $related_product['price'] ?></span></h4>
                          </div>
                        </div>
                      </div>
                    </div>   
                    <div class="back">
                      <h3>Fox Rose</h3>
                      <p><?= strlen($related_product['description']) > 20  ? substr($related_product['description'],0,60) : $related_product['description']  ?>....<a href="product.php?id=<?= $related_product['id'] ?>">Read more</a></p>
                      <p class="m-0"><span><b>Stock:</b> In Stock</span></p>
                      <p class="m-0 mt-2 mb-3 d-flex align-items-center"><span class="me-1"><b>Price:</b></span> <img src="images/naira-w.png" class="naira" > <span class="ms-1"><?= $related_product['price'] ?></span></p>
                      <div class="max-width:200px">
                      <div class="mb-3"><a href="product.php?id=<?= $related_product['id'] ?>" class="cart-btn">View Product</a></div>
                        <div>
                          <?php
                          if(isset($_SESSION['user']))
                          {
                            $product_ids = $cart_obj->get_product_id($_SESSION['user']['id']);
                            if(in_array($related_product['id'],$product_ids))
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
                                  <input type="hidden" name="product_id" value="<?= $related_product['id'] ?>">
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
          }
        ?>

      </div>
    </div>
  </section>
<!-- -------------------- -->