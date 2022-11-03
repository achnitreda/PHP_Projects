<?php
    require '../../db.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM payments WHERE id=:id';
    $statement = $connect->prepare($sql);
    $statement->execute([':id'=> $id]);
    $payment = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php 
$title = 'view payment details';
require '../../components/header.php';
?>
    <div class="bg-info vh-100">
    <div class="d-flex justify-content-center pt-5">
            <div class="col-sm-12 col-md-8 col-lg-5 shadow rounded-3 p-4 bg-white"> 
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Payment details</h2>
                    <div class="form-group">
                        <a href="../../payment.php"><i class="fa-lg far fa-arrow-alt-circle-left text-muted"></i></a>
                    </div>
                </div>
                <div class="card-body">
                        <form method="POST">
                            <div>
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control"  name="Name" value="<?php echo $payment[0]['Name']; ?>" >
                            </div> 
                            <div class="form-group">
                                <label for="nom">Payment Schedule</label>
                                <input type="text" class="form-control"  name="payment" value="<?php echo $payment[0]['payment']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="nom">Bill Number</label>
                                <input type="text" class="form-control"  name="bill" value="<?php echo $payment[0]['bill']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="nom">Amount Paid</label>
                                <input type="text" class="form-control"  name="amount" value="<?php echo $payment[0]['amount']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="nom">Balance amount</label>
                                <input type="text" class="form-control"  name="balance" value="<?php echo $payment[0]['balance']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="nom">Date</label>
                                <input type="text" class="form-control"  name="balance" value="<?php echo $payment[0]['date']; ?>" >
                            </div>
                        </form>
                </div>
                </div>
             
           </div>
       </div>
    </div>
<?php 
require '../../components/footer.php';
?>