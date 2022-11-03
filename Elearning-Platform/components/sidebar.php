<?php   
    session_start();  
    if(isset($_SESSION["name"]))  
    {
?>
<aside class="d-flex flex-column bg-yellow col-lg-2 col-md-3 col-sm-2 col-3 min-vh-100">
    <div class="position-fixed ">
        <div class="pt-3">
            <h1 class="line h4">E-class</h1>
        </div>
        <div class="flex-column align-items-center d-none d-md-flex mt-4">
            <img class="rounded-circle w-50" src="images/admin-user.png" alt="admin image">
            <p class="mt-1 fw-bold">
              <?php
                    echo '<span class="adm text-dark">'.$_SESSION["name"].'</span>';  
                ?>
            </p>
            <p class="text-info">
                Admin
            </p>
        </div>
        <div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="dashboard.php">
                        <i class="fal fa-home-lg-alt me-2 fa-lg "></i>
                        <span class="d-none d-md-inline-block">
                            Home
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="#">
                        <i class="far fa-bookmark me-2 fa-lg "></i>
                        <span class="d-none d-md-inline-block">
                            Course
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="student.php">
                        <i class="fal fa-graduation-cap me-2 fa-lg "></i></i>
                        <span class="d-none d-md-inline-block">
                            Students
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="payment.php">
                        <i class="far fa-usd-square me-2 fa-lg "></i>
                        <span class="d-none d-md-inline-block">
                            Payment
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="#">
                        <i class="fal fa-file-chart-line me-2 fa-lg "></i>
                        <span class="d-none d-md-inline-block">
                            Report
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-start text-dark" href="#">
                        <i class="fal fa-sliders-v-square me-2 fa-lg "></i>
                        <span class="d-none d-md-inline-block">
                            Settings
                        </span>
                    </a>
                </li>
            </ul>
            <div>
                <a href="logout.php" class="btn nav-link text-start text-dark mt-3">
                    <span class="d-none d-md-inline-block me-2">
                        Logout
                    </span> 
                    <i class="fal fa-sign-out-alt fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</aside>

<?php
    }  
    else  
    {  
        header("location: index.php");  
    }  
?>