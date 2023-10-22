<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Starway Extravaganza</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
        <link rel="stylesheet" href="views/styles/stairsForm.css">
        <link rel="stylesheet" href="views/styles/style.css">
    </head>
    <body>
        <header>
        <nav>
            <a href="index.php?page=home">Stairway Extravaganza</p>
            <a href="index.php?page=form-stairs">Ajouter un escalier</a>
            <a href="index.php?page=form-accidents">Report d'incident</a>
            <a href="index.php?page=map">Carte</a>
            <a href="index.php?page=statistics">Statistiques</a>
            <a href="index.php?page=list-stairs">Liste</a>
        </nav>
        </header>
        <main>
            <section id="form-section">
                <h1>Ajouter un escalier</h1>
                <form action="/action_page.php">
                    <input placeholder="Nom" type="text" id="stairs-name" name="stairsName"><br><br>
                    <input placeholder="Nombre de marches" type="number" min="0" id="num_steps" name="numSteps"><br><br>
                    <input class="btn" id="btn-send" type="submit" value="Submit">
                </form>
            </section>
        </main>
    </body>
    <footer class="center">
        Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers. 
        Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
    </footer>
</html>