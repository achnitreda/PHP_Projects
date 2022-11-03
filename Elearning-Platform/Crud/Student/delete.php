<?php
    require '../../db.php';
    $id = $_GET['id'];
    $sql = 'DELETE FROM students WHERE id=:id';
    $statement = $connect->prepare($sql);
    if ($statement->execute([':id' => $id])) {
        header("Location: http://localhost/E-learning-Platform/student.php");
    }
?>