<?php

    include 'components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
    }

    include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">



</head>
<body>
    
    <!-- header section starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->


    <!-- home section starts -->
    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>delicious pizza</h3>
                        <a href="menu.php" class="btn">see menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-1.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>chessy burger</h3>
                        <a href="menu.php" class="btn">see menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-2.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>roasted chicken</h3>
                        <a href="menu.php" class="btn">see menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-3.png" alt="">
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- home section ends -->


    <!-- home category section starts -->
    <section class="home-category">

        <h1 class="title">food category</h1>

        <div class="box-container">

            <a href="category.php?category=fast food" class="box">
                <img src="images/cat-1.png" alt="">
                <h3>fast food</h3>
            </a>

            <a href="category.php?category=main dish" class="box">
                <img src="images/cat-2.png" alt="">
                <h3>main dish</h3>
            </a>

            <a href="category.php?category=drinks" class="box">
                <img src="images/cat-3.png" alt="">
                <h3>drinks</h3>
            </a>

            <a href="category.php?category=desserts" class="box">
                <img src="images/cat-4.png" alt="">
                <h3>desserts</h3>
            </a>

        </div>

    </section>
    <!-- home catgory section ends -->


    <!-- home products section starts -->
    <section class="products">

        <h1 class="title">lastest food</h1>

        <div class="box-container">

            <?php 
                $select_products = $conn->prepare("SELECT * FROM products LIMIT 6");
                $select_products->execute();
                if ($select_products->rowCount() > 0) {
                    # code...
                    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) 
                    {
            ?>

            <form action="" method="POST" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">

                <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>

                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                
                <img class="image" src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                
                <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                
                <div class="name"><?= $fetch_products['name']; ?></div>
                
                <div class="flex">
                    <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                    <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                </div>
            </form>

            <?php
                    }
                } else {
                    echo '<div class="empty"> no product added yet!</div>';
                }
            ?>


        </div>

    </section>
    <!-- home products section ends -->













    <!-- footer section start -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper(".home-slider", {
            effect: "cards",
            grabCursor: true,
            loop:true,
        });
    </script>


</body>
</html>