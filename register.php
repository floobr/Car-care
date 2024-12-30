<?php
// Include database connection
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Car Care</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body.dark-mode {
            background-color: #121212; /* Dark background */
            color: #ffffff; /* Light text for body */
        }
        .navbar-default.dark-mode {
            background-color: #1a1a1a; /* Dark navbar background */
            border-color: #444; /* Darker border */
        }
        .form-control.dark-mode {
            background-color: #333; /* Dark background for input fields */
            color: #ffffff; /* Light text for input fields */
        }
        .content.dark-mode {
            background-color: #1e1e1e; /* Dark background for content section */
            padding: 20px; /* Add some padding */
            border-radius: 5px; /* Optional: rounded corners */
        }
        .btn.btn-color {
            background-color: #333; /* Dark button background */
            color: #ffffff; /* Light button text */
        }
    </style>
</head>
<body>
<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><button id="dark-mode-toggle" aria-label="Toggle Dark Mode">
                            <i class="fas fa-moon-o"></i> <!-- Moon icon for dark mode -->
                        </button></li>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li class="active"><a href="register.php">Register</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header><!-- end header -->

    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Register</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="content" class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="submit_registration.php" method="POST" id="register-form" role="form" novalidate="novalidate">
                        <div class="form-group has-feedback">
                            <label for="name">Name*</label>
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email*</label>
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" id=" password" name="password" placeholder="" required>
                            <i class="fa fa-lock form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="plan">Choose a Plan*</label>
                            <select class="form-control" id="plan" name="plan_id" required>
                                <option value="" disabled selected>Select your plan</option>
                                <?php
                                // Fetch plans from the database
                                include 'db.php';
                                $sql = "SELECT id, plan_name FROM plans";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['plan_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-color btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 2023 Car Care. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    // Dark mode toggle functionality
    document.getElementById('dark-mode-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        const navbar = document.querySelector('.navbar-default');
        navbar.classList.toggle('dark-mode');
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => control.classList.toggle('dark-mode'));
        const content = document.querySelector('.content');
        content.classList.toggle('dark-mode');
    });
</script>
</body>
</html>