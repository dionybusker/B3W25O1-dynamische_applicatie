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
                <div class="card">
                    <div class="character" style="background-color: <?php echo $result['color']; ?>;">
                        <img class="avatar border solid" src="img/<?php echo $result['avatar'] ?>" alt="<?php echo $result['name']; ?> avatar">
                        <div class="chosen">
                            <h2>U hebt gekozen voor <?php echo $result['name'] ?>!</h2>
                            <p>Bent u niet tevreden met uw keuze? Klik <a class="bold" href="index.php">hier</a> om terug te gaan.</p>
                        </div>

                        <p class="info">
                            <i class="fas fa-heart"></i> <?php echo $result['health']; ?> <br>
                            <i class="fas fa-fist-raised"></i> <?php echo $result['attack']; ?> <br>
                            <i class="fas fa-shield-alt"></i> <?php echo $result['defense']; ?> <br>

                            <?php if ($result['weapon'] != NULL) { ?>
                                <span class="bold">Weapon:</span> <?php echo $result['weapon']; ?> <br>
                            <?php } ?>
                            <?php if ($result['armor'] != NULL) { ?>
                                <span class="bold">Armor:</span> <?php echo $result['armor']; ?>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="bio">
                        <p><?php echo $result['bio']; ?></p>
                    </div>
                </div>
                <?php include("includes/footer.php"); ?>
        </main>
    </body>
</html>