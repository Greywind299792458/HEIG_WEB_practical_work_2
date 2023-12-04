<!DOCTYPE html>
<html>
    <head>
        <?php include 'fragments/head_content.php';?>
        <link rel="stylesheet" href="/views/styles/statistics.css">
    </head>
    <body>
        <?php include 'fragments/header.php';?>
        <main>
            <h2 class="container center">Etat actuel de l'affrontement 
                entre escaliers avec un nombre de marches pair et impair</h2>
            <section id="fight-section" class="center">
                <div>
                    <h2>Nombre impair de marches : <?php echo $oddStepsCount; ?></h2>
                </div>
                <div>
                    <h2>Nombre pair de marches : <?php echo $evenStepsCount; ?></h2>
                </div>
            </section>
            <p class="center">Complétez votre collection d'escaliers 
                pour inverser la tendance!</p>
            <p class="center">Fun fact : Presque tous les escaliers de la HEIG 
                ont un nombre de marches qui est un nombre premier!</p>
            <section id="other-section" class="center">
                <h3>Autres informations intéressantes</h3>
                <?php if (isset($mostFrequentSteps)) : ?>
                    <div>
                        <p>Nombre de marches le plus fréquent : 
                            <?php echo $mostFrequentSteps; ?></p>
                    </div>
                <?php endif; ?>
                <?php if (isset($leastFrequentSteps)) : ?>
                    <div>
                        <p>Nombre de marches le moins fréquent : 
                            <?php echo $leastFrequentSteps; ?></p>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </body>
    <?php include 'fragments/footer.php';?>
</html>