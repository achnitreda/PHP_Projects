<?php
 require_once 'db.php';
$sum_students=$connect->query("SELECT COUNT(*) FROM students");
$sum_students->execute();
$sum_payments=$connect->query("SELECT SUM(amount) FROM payments");
$sum_payments->execute();
?>
<?php 
  $title = 'Dashboard';
  include "./components/header.php"; 
?>
<div class="container-fluid">
    <div class="row">
      <?php include "./components/sidebar.php"; ?>
        <div class="col-lg-10 col-md-9 col-sm-10 col-9">
         <?php include "./components/navbar.php"; ?> 
         <div class="row mt-5">
              <div class="col-lg-3 col-md-6">
                <div class="card mb-3" style="font-size: 1.5rem; background-color: #F0F9FF; color: #74C1ED;\">
                    <i class="fas fa-graduation-cap fs-1 px-3 py-3" ></i>
                    <span class="px-3 py-3" >Students</span>
                    <div class="card-body">
                      <p class="card-text text-end"><?php print_r($sum_students->fetchColumn()); ?></p>
                    </div>
                </div>
              </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card mb-3" style="font-size: 1.5rem; background-color: #FEF6FB; color: #EE95C5;">
                        <i class="fal fa-bookmark fs-1 px-3 py-3"></i>
                        <span class="px-3 py-3">Course</span>
                        <div class="card-body">
                          <p class="card-text text-end">13</p>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-3" style="font-size: 1.5rem; background-color: #FEFBEC; color: #00C1FE;">
                            <i class="fal fa-usd-square fs-1 px-3 py-3" ></i>
                            <span class="px-3 py-3" >Payments</a></span>
                            <div class="card-body">
                              <p class="card-text text-end">DHS <?php print_r($sum_payments->fetchColumn()); ?></p>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card mb-3" style="font-size: 1.5rem; background-color: #00C1FE; color: #fff;">
                                <i class="fal fa-user fs-1 px-3 py-3" ></i>
                                <span class="px-3 py-3">Users</span>
                                <div class="card-body">
                                  <p class="card-text text-end">3</p>
                                </div>
                            </div>
                            </div>
                </div> 
                </div>
        </div>
    </div>
</div>
<?php include "./components/header.php"; ?> 