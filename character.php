<?php
    include("includes/dbcon.php");

    $stmt = $conn->prepare("SELECT * FROM characters WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $result = $stmt->fetch();

    // includen van de header
    include("includes/header.php");
    
?>

    <body>

        <main id="container">
        



                <div class="card border solid">
                    <div class="character border solid" style="background-color: <?php echo $result['color']; ?>;">
                        <img class="avatar border solid" src="img/<?php echo $result['avatar'] ?>" alt="<?php echo $result['name']; ?> avatar">
                        <p class="info">
                            <i class="fas fa-heart"></i> <?php echo $result['health']; ?> <br>
                            <i class="fas fa-fist-raised"></i> <?php echo $result['attack']; ?> <br>
                            <i class="fas fa-shield-alt"></i> <?php echo $result['defense']; ?>
                        </p>
                    </div>
                    <div class="bio border solid">
                        <p><?php echo $result['bio']; ?></p>
                    </div>
                </div>

        </main>
    
        <?php include("includes/footer.php"); ?>
        
    </body>
</html>