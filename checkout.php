<?php

    include 'components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
        header('location:home.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">



</head>
<body>
    
    <!-- header section starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->

    <!-- checkout section starts -->

    <section class="checkout">

        <form action="" method="POST">

            <h3>cart items</h3>

            <?php
                $grand_total = 0;
                $cart_items[] = '';
                $select_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
                $select_cart->execute([$user_id]);
                if($select_cart->rowCount() > 0) {
                    while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                        $cart_items[] = ($fetch_cart['name'] .' (' . $fetch_cart['price'] . ' x' . $fetch_cart['quantity'] . ') - ');
                        $total_products = implode($cart_items);
                        $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
            ?>
            <p>
                <span class="name"><?= $fetch_cart['name']; ?></span>
                <span class="price">$<?= $fetch_cart['price']; ?></span>
            </p>
            <?php
                    }
                } else {
                    echo '<p class="empty">your cart is empty</p>';
                }
            
            ?>

        </form>


    </section>

    <!-- checkout section ends -->

















    <!-- footer section start -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</body>
</html>