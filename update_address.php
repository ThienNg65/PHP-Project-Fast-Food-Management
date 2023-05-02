<?php

    include 'components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
        header('location:home.php');
    }

    if (isset($_POST['submit'])) {
        
        $address = $_POST['building'] . ', ' . $_POST['street'] . ', ' . 
            $_POST['district'] . ', ' . $_POST['city'] . ', ' . $_POST['country'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        $update_address = $conn->prepare("UPDATE users SET address = ? WHERE id = ?");
        $update_address->execute([$address, $user_id]);

        $message[] = 'address updated!';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update address</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">



</head>
<body>
    
    <!-- header section starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->


    <!-- update address section starts -->

    <section class="form-container">

        <form action="" method="POST">
            <h3>your address</h3>
            <input type="text" name="building" maxlength="50" required placeholder="building no." class="box">
            <input type="text" name="street" maxlength="50" required placeholder="street no." class="box">
            <input type="text" name="district" maxlength="50" required placeholder="district no." class="box">
            <input type="text" name="city" maxlength="50" required placeholder="city no." class="box">
            <input type="text" name="country" maxlength="50" required placeholder="country no." class="box">
            <input type="submit" value="save address" name="submit" class="btn">
        </form>

    </section>

    <!-- update address section ends -->

















    <!-- footer section start -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</body>
</html>