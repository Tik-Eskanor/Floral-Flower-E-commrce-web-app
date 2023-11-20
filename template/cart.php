<!-- cart------------------ -->
<section class="cart">
  <div class="container my-5">
    <div class="products-subtitle mb-5 pb-3">
        <h1>Cart</h1>
    </div>
    <div class="row">
      <?php
       $sn = 1;
       $total = 0;
       foreach ($carts as $cart) 
       {
          $product_id = $cart['product_id'];
          $item = $product_obj->get_product($product_id);

          $total += (int)$item['price']
        ?>
        <div class="col-md-12 my-5 px-3">
          <div class="row align-items-center">
              <div class="col-md-7 mx-auto">
                  <div class="row justify-content-between">
                    <div class="col-md-1">
                      <h3><?= $sn++ ?></h3>
                    </div>
                    <div class="col-md-2 mb-3">
                      <div class="img"><img src="images/<?= $item['image']?>" width="100%"></div>
                    </div>
                    <div class="col-md-9 mb-3">
                      <div class="texts">
                          <h3><?= $item['name']?></h3>
                      </div>
                      <div class="fs-3 d-flex align-items-center"><img src="images/naira-d.png" width="25px"> <span class="product-price ms-1"><?= $item['price']?></span> </div>
                      <div class="fs-3 d-none"><?= $item['price']?></div>
                      <div class="quantity d-flex mt-3" style="max-width:200px">
                        <div class="qty-up p-2 text-light m-bg rounded"><i class="fas fa-angle-up"></i></div>
                        <input type="text" readonly class="qty w-100 p-2 fs-5 fw-bold text-center" value="1">
                        <div class="qty-down p-2 text-light m-bg rounded"><i class="fas fa-angle-up"></i></div>
                      </div>
                      <div class="mt-2 d-flex justify-content-end">
                        <a href="exe/cart.php?cart_delete=<?= $cart['id'] ?>" class="btn btn-sm m-bg fw-bold text-light">Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                      <h4>Description</h4>
                      <p><?= $item['description']?></p>
                </div>
          </div>
        </div>
        <hr>
        <?php
       }
      ?>
    </div>
    <div class="row">
      <div class="col-md-5 mx-auto">
          <div class="text-light m-bg px-3 py-4 rounded text-center">
             <h3>Total Amount</h3>
             <h5>Items: <?= count($carts) ?></h5>
             <form action="payment_form.php" method="post" class="check-out">
               <div clas="d-flex align-items-center">
               <img src="images/naira-w.png" width="30px" class="me-1"><input id="total-price" name="price" type="text" value="<?= $total ?>" readonly><br>
               </div>
               <button type="submit" name="submit" class="checkout-btn">Pay</button>
             </form>
          </div>
       </div>
    </div>
  </div>
</section>
<!-- --------------------- -->
