<?php 
    if(isset($_POST['submit']))
    {
       $price = $_POST['price'];
    }
 ?>
<!-- payment form------------------------------------ -->
<section id="payment-form">
    <div class="container my-5">
      <h3 class="text-center mb-4"><b>Proceed With Payment <i class="fas fa-credit-card"></i></b></h3>
        <div class="row">
      <div class="col-md-6 m-auto">
        <form action="payment/payment_ini.php" method="post" class="row g-3 fs-5">
            <div class="col-md-6">
              <label  class="form-label">First Name</label>
              <input type="text" name="fname" class="form-control p-3" required>
            </div>
            <div class="col-md-6">
              <label  class="form-label">Last Name</label>
              <input type="text"  name="lname"  class="form-control p-3" required>
            </div>
            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="email"  name="email" class="form-control p-3" required>
            </div>
            <div class="col-12">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control p-3" required>
            </div>
            <div class="col-12">
              <label class="form-label fw-bold">Amount to be paid in Naira</label>
              <input type="text"  name="price"  class="form-control p-3" value="<?= $price ?>" readonly required>
            </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-md m-bg text-light fw-bold fs-5">Proceed</button>
              </div>
          </form>
        </div>
        </div>
    </div>
</section>
<!-- ------------------------------------------------ -->