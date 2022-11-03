  <?php
    require '../../db.php';
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['enroll_number']) && isset($_POST['date_of_admission'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $enroll_number = $_POST['enroll_number'];
        $date_of_admission = $_POST['date_of_admission'];
        $sql = 'INSERT INTO students(name, email, phone, enroll_number, date_of_admission)
        VALUES(:name, :email, :phone, :enroll_number, :date_of_admission)';
        $statement = $connect->prepare($sql);
        if($statement->execute([':name'=> $name, ':email'=> $email, ':phone'=> $phone, ':enroll_number'=> $enroll_number, ':date_of_admission'=> $date_of_admission])){
            header("Location: http://localhost/E-learning-Platform/student.php");
        }
    }

?>

<?php 
$title = 'Add New Student';
require '../../components/header.php';
?>
<div class="bg-info vh-100">
    <div class="container-fluid">
        <div class="d-flex justify-content-center pt-5">
            <div class="col-sm-12 col-md-8 col-lg-5 shadow rounded-3 p-4 bg-white">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Student</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="enroll_number">Enroll Number:</label>
                                    <input type="text" name="enroll_number" id="enroll_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="date_of_admission">Date of Admission:</label>
                                    <input type="text" name="date_of_admission" id="date_of_admission" class="form-control" required>
                                </div>
                                <div class="group-form">
                                <button type="submit" class="btn btn-info mt-2 w-100 text-white">Add student</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../../components/footer.php'; ?>