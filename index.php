<?php
    include("includes/dbcon.php");

    $stmt = $conn->prepare("SELECT * FROM characters ORDER BY name");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>B3W25O1-dynamische_applicatie</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/8eccf2802e.js" crossorigin="anonymous"></script> <!-- font awesome -->

    </head>
    <body>
        <?php include("includes/header.php"); ?>

        <main id="container">
        
            <h1>Alle karakters op een rij</h1>
            <?php foreach ($result as $row) { ?>
                <div class="card border solid" style="background-color:<?php echo $row['color']; ?>">
                    <a href="character.php?id=<?php echo $row['id']; ?>">
                        <img class="avatar border solid" src="img/<?php echo $row['avatar'] ?>" alt="avatar">
                    </a>    
                    <div class="info">
                        <h2><?php echo $row['name']; ?></h2>
                        <p>
                            <i class="fas fa-heart"></i> <?php echo $row['health']; ?> <br>
                            <i class="fas fa-fist-raised"></i> <?php echo $row['attack']; ?> <br>
                            <i class="fas fa-shield-alt"></i> <?php echo $row['defense']; ?>
                        </p>
                    </div>


                </div>
            <?php } ?>

        </main>
    
        <?php include("includes/footer.php"); ?>
        
    </body>
</html>