<?php
    require 'db.php';
    $sql = 'SELECT * FROM payments';
    $statement = $connect->prepare($sql);
    $statement->execute();
    $payments = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php 
  $title = 'Payment';
  include "./components/header.php"; 
?>
<div class="container-fluid">
    <div class="row">
        <?php include "./components/sidebar.php"; ?>

        <div class="col-lg-10 col-md-9 col-sm-10 col-9">
            <?php 
                include "./components/navbar.php"; 
            ?>
           
            <div class="row mt-5 flex-row">    
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Payements details</h2>   
                    <div class="fs-5">
                        <i class="fas fa-sort text-info"></i>
                    </div>
                </div>
                <hr>
            </div>
            
            <div class="row mt-3 px-3 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Payment Shedule</th>
                        <th scope="col">Bill Number</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Balance Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($payments as $key =>$payment):?>
                            <tr>
                            <th scope='row' ><?php  echo $payment['Name']?></th>
                            <td><?php  echo $payment['payment']?></td>
                            <td><?php  echo $payment['bill']?></td>
                            <td>DHS <?php  echo $payment['amount']?></td>
                            <td>DHS <?php  echo $payment['balance']?></td>
                            <td><?php  echo $payment['date']?></td>
                            <td><a href="../E-learning-Platform/Crud/Payment/view.php?id=<?= $payment['id'] ?>">
                            <i class='fal fa-eye text-info'></a></i></td>
                            </tr>
                        
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "./components/footer.php"; ?>