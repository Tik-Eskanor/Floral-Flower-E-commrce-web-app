<?php 
    if(isset($_POST['submit']))
    {
       $price = $_POST['price'];
    }
 ?>
<!-- payment form------------------------------------ -->
<section id="payment-form">
    <div class="container my-5">
      <h3 class="text-center mb-4"><b>Update Profile</b></h3>
        <div class="row">
      <div class="col-md-6 m-auto">
          <div class="">
              <i class="fas fa-user-circle text-secondary fa-5x"></i>
          </div>
          <div>
              <?php
              if(isset($_SESSION['message']))
              {
                 echo $_SESSION['message'] ;
                 unset($_SESSION['message']);
              }?>
          </div>
        <form action="exe/user.php" method="post" class="row g-3 fs-5 mt-3">
            <div class="col-md-12">
              <label  class="form-label">User Name</label>
              <input type="text" name="username" class="form-control p-3" value="<?= $_SESSION['user']['username']?>" required>
            </div>
            <div class="col-md-6 mt-5">
                <h2>Change Password</h2>
            </div>
            <div class="col-12">
              <label class="form-label">Current Password</label>
              <input type="password"  name="cp" class="form-control p-3">
            </div>
            <div class="col-12">
              <label class="form-label">New Password</label>
              <input type="password" name="np" class="form-control p-3">
            </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-md m-bg text-light fw-bold fs-5">Update</button>
              </div>
          </form>
        </div>
        </div>
    </div>
</section>
<!-- ------------------------------------------------ -->