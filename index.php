<?php
    include("includes/dbcon.php");

    $stmt = $conn->prepare("SELECT * FROM characters ORDER BY name");
    $stmt->execute();
    $result = $stmt->fetchAll();

    // includen van de header
    include("includes/header.php");
    
?>

    <body>

        <main id="container">
        
            <h1>Alle karakters op een rij</h1>
            <?php foreach ($result as $row) { ?>
                <div class="cards border solid" style="background-color:<?php echo $row['color']; ?>">
                    <a href="character.php?id=<?php echo $row['id']; ?>">
                        <img class="avatar border solid" src="img/<?php echo $row['avatar'] ?>" alt="<?php echo $row['name']; ?> avatar" title="Bekijk meer over <?php echo $row['name']; ?>!">
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