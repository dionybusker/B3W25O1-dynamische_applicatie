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
    </head>
    <body>
        <?php include("includes/header.php"); ?>

        <main id="container">
        
            <?php foreach ($result as $row) { ?>
                <div class="card border solid" style="background-color:<?php echo $row['color']; ?>">
                    <img class="avatar border solid" src="img/<?php echo $row['avatar'] ?>" alt="avatar">
                    <div class="info">
                        <h2><?php echo $row['name']; ?></h2>
                        <p>
                            Health: <?php echo $row['health']; ?> <br>
                            Attack: <?php echo $row['attack']; ?> <br>
                            Defense: <?php echo $row['defense']; ?>
                        </p>
                    </div>


                </div>
            <?php } ?>

        </main>
    
        <?php include("includes/footer.php"); ?>
        
    </body>
</html>