<?php

    include 'components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
    }

    if (isset($_POST['submit'])) {
        # code...
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);

        $msg = $_POST['message'];
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);

        $select_message = $conn->prepare("SELECT * FROM messages WHERE name = ? and email = ? and number = ? and message = ?");
        $select_message->execute([$name, $email, $number, $msg]);

        if ($select_message->rowCount() > 0) {
            $message[] = 'message sent already!';
        } else {
            $insert_message = $conn->prepare("INSERT INTO messages(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
            $insert_message->execute([$user_id, $name, $email, $number, $msg]);
            $message[] = 'message sent successfully!';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

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
        <h3>contact us</h3>
        <p>contact / <a href="home.php">home</a></p>
    </div>

    <!-- contact section starts -->

    <section class="contact">
        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            <form action="" method="POST">
                <h3>tell us something!</h3>
                <input type="text" name="name" required placeholder="enter your name" maxlength="50" class="box">
                <input type="text" name="email" required placeholder="enter your email" maxlength="50" class="box">
                <input type="number" name="number" required placeholder="enter your number" min="0" max="999999999" maxlength="9" class="box">
                <textarea name="message" class="box" required maxlength="500" cols="30" rows="10" placeholder="enter your message"></textarea>
                <input type="submit" value="send message" class="btn" name="submit">
            </form>

        </div>
        
    </section>

    <!-- contact section ends -->
















    <!-- footer section start -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</body>
</html>