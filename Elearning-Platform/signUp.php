<?php
    require_once ('db.php'); 
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = hash('ripemd160', $_POST['password']);
        
        $sql = 'INSERT INTO users(name, email, password)
        VALUES(:name, :email, :password)';
        $statement = $connect->prepare($sql);
        if($statement->execute([':name'=> $name, ':email'=> $email, ':password'=> $password])){
            header("Location: http://localhost/E-learning-Platform/index.php");
        }
    } 
?>
<?php
  $title = 'SIGN UP';
  include "./components/header.php";
?>
<main class="bg-back vh-100">
    <div class="d-flex justify-content-center pt-5">
      <div class="col-sm-12 col-md-8 col-lg-5 shadow rounded-3 p-4 bg-white">
        <div class="text-start ms-5">
            <h1 class="line h2">
                E-class
            </h1>
        </div>

        <div class="text-center">
            <h2 class="text-uppercase h3 mt-4">Sign up</h2>
            <p class="text-muted small">
                Enter your credentials to create your account 
            </p>
            <div>
        </div>

        <form method="POST" id="form">
            <div class="p-4">
                <div class="mb-3 text-start">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name" placeholder="name" class="form-control">
                    <div class="text-danger fs-6 errorName"></div>
                </div>
                <div class="mb-3 text-start">
                    <label for="name">Email :</label>
                    <input type="text" name="email" id="email" placeholder="email" class="form-control">
                    <div class="text-danger fs-6 errorEmail"></div>
                </div>
                <div class="mb-3 text-start">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    <div class="text-danger fs-6 errorPass"></div>
                </div>
                <div class="mb-3 text-start">
                    <label for="password">Repeat your password :</label>
                    <input type="password" name="rpassword" id="rpassword" placeholder="Repeat your password" class="form-control">
                    <div class="text-danger fs-6 errorConfirmPass"></div>
                </div>
                <button class="btn btn-info border-0 text-center mt-2 w-100 bg-info text-white text-decoration-none" type="submit" name="signup">
                    Sign up
                </button>
                <p class="mt-3">
                    <a class="text-info" href="index.php">I already have account</a>
                </p>
            </div>
        </form>
      </div>
    </div>
    <script src="index.js"></script>
</main>
<?php include "./components/footer.php"; ?>

