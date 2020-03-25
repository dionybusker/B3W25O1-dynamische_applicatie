<?php
    include("includes/dbcon.php");

    $stmt = $conn->prepare("SELECT * FROM characters WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $result = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>B3W25O1-dynamische_applicatie</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/8eccf2802e.js" crossorigin="anonymous"></script> <!-- font awesome -->    </head>
    <body>
        <?php include("includes/header.php"); ?>

        <main id="container">
        
                <div class="card border solid" style="background-color:<?php echo $result['color']; ?>">
                    <img class="avatar border solid" src="img/<?php echo $result['avatar'] ?>" alt="avatar">   
                    <div class="info">
                        <h2><?php echo $result['name']; ?></h2>
                        <p>
                            <i class="fas fa-heart"></i> <?php echo $result['health']; ?> <br>
                            <i class="fas fa-fist-raised"></i> <?php echo $result['attack']; ?> <br>
                            <i class="fas fa-shield-alt"></i> <?php echo $result['defense']; ?>
                        </p>
                    </div>
                </div>

        </main>
    
        <?php include("includes/footer.php"); ?>
        
    </body>
</html>