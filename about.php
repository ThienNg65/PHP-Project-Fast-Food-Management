<?php

    include 'components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">



</head>
<body>
    
    <!-- header section starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->

    <div class="heading">
        <h3>about us</h3>
        <p>about / <a href="home.php">home</a></p>
    </div>


    <!-- about section starts -->

    <section class="about">

        <div class="row">

            <div class="image">
                <img src="images/about-img.svg" alt="">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>because i'm so yummy hihi 😊</p>
                <a href="menu.php" class="btn">our menu</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->


    <!-- steps section starts -->

    <section class="steps">

        <h1 class="title">3 simple steps</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/step-1.png" alt="">
                <h3>select foods</h3>
            </div>

            <div class="box">
                <img src="images/step-2.png" alt="">
                <h3>fast delivery</h3>
            </div>

            <div class="box">
                <img src="images/step-3.png" alt="">
                <h3>enjoy food</h3>
            </div>

        </div>

    </section>

    <!-- steps section ends -->






    <!-- footer section start -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</body>
</html>