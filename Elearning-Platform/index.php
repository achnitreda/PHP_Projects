<?php
     session_start();
        if(isset($_SESSION['name'])) {
            header("location: dashboard.php");
            die();
        }


     require_once ('db.php');  
        $remember=$_POST['remember'] ?? '';
        $name=$_COOKIE['name'] ?? '';
        $pass=$_COOKIE['password'] ?? '';
        
        if($remember =='true'){
            setcookie ("name",$_POST["name"],time()+ 86400);
            setcookie ("password",$_POST["password"],time()+ 86400);
        } else {
            setcookie("name","");
            setcookie("password","");
        }
     if(isset($_POST["login"]))  
     {  
          if(empty($_POST["name"]) || empty($_POST["password"]))  
          {  
               $message = '<label>All fields are required</label>';  
          }  
          else  
          {  
               $query = "SELECT * FROM users WHERE name = :name AND password = :password";  
               $statement = $connect->prepare($query);  
               $statement->execute(  
                    array(  
                         'name'=> $_POST["name"],  
                         'password'=> hash('ripemd160', $_POST['password'])  
                    )  
               );  
               $count = $statement->rowCount();  
               if($count > 0)  
               {  
                    $_SESSION["name"] = $_POST["name"];  
                    header("location: dashboard.php");
               }  
               else  
               {  
                    $message = '<label>Wrong Data</label>';  
               }  
          }  
     }  
?>
<?php
  $title = 'SIGN IN';
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
            <h2 class="text-uppercase h3 mt-4">Sign In</h2>
            <p class="text-muted small">
                Enter your credentials to access your account 
            </p>
            <div>
            <?php  
                if(isset($message))  
                {  
                    echo '<label class="text-danger">'.$message.'</label>';  
                }  
            ?>
            </div>
        </div>

        <form method="POST">
            <div class="p-4">
                <div class="mb-3">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name" placeholder="name" value="<?php if(isset($_COOKIE["name"])) { echo $_COOKIE["name"]; } ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" placeholder="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"  class="form-control">
                </div>
                <div class="form-check">
                    <input name="remember" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="true">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember me</label>
                </div>
                <button class="btn btn-info border-0 text-center mt-2 w-100 bg-info" type="submit" name="login">
                    <a class="text-white text-decoration-none">Sign in</a>
                </button>
                <p class="text-center mt-2 text-muted">
                    Forgot your password?
                    <a class="text-info" href="#">Reset password</a>
                </p>
                <p class="text-center text-muted">
                    Not registered?
                    <a class="text-info" href="signUp.php">Create an account</a>
                </p>
            </div>
        </form>
      </div>
    </div>
</main>

<?php include "./components/footer.php"; ?>
      

