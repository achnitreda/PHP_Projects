<?php 
  require 'db.php';
  $sql ='SELECT * FROM students';
  $statement = $connect->prepare($sql);
  $statement->execute();
  $students = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php 
  $title = 'Student list and informations';
  include "./components/header.php"; 
?>

<div class="container-fluid">
    <div class="row">
      <?php include "./components/sidebar.php"; ?>
       
        <div class="col-lg-10 col-md-9 col-sm-10 col-9"> 
            <?php include "./components/navbar.php"; ?>
            
            <div class="row mt-5 flex-row">
                <h2>Students List</h2>
              <div class="d-flex gap-2 align-items-center justify-content-end">
                <div class="fs-5 d-none d-md-inline-block">
                  <i class="fas fa-sort text-info"></i>
                </div>
                <a href="../E-learning-Platform/Crud/Student/create.php" class="btn btn-info text-uppercase">
                    <i class="fas fa-plus fa-sm text-white"></i>
                    <span class="text-white d-none d-sm-inline-block">
                      add new student
                    </span>
                </a>
              </div>
              <hr class="mt-2">
            </div>
            
            <div class="row px-3 table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Enroll number</th>
                    <th scope="col">Date of admission</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($students as $student): ?>
                     <tr>
                        <td><?= $student->name; ?></td>
                        <td><?= $student->email; ?></td>
                        <td><?= $student->phone; ?></td>
                        <td><?= $student->enroll_number; ?></td>
                        <td><?= $student->date_of_admission; ?></td>
                        <td>
                          <a href="../E-learning-Platform/Crud/Student/edit.php?id=<?= $student->id?>"><i class="fal fa-pen text-info"></i></a>
                          &nbsp;&nbsp;
                          <a onclick="return confirm('Are you sure you want to delete this entry?')" href="../E-learning-Platform/Crud/Student/delete.php?id=<?= $student->id?>"><i class="fal fa-trash text-info"></i></a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
              </table>
            </div>
        </div>
    </div>
</div>

<?php include "./components/footer.php"; ?>