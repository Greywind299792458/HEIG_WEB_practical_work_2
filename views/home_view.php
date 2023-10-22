<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Starway Extravaganza</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
        <link rel="stylesheet" href="views/styles/index.css">
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
            <section class="center">
                <img height="200" src="views/assets/app_logo.png">
                <h1>Vous comptez les marches quand vous empruntez un escalier ?</h1>
                <h2>Vous détestez les escaliers avec un nombre de marches impaires ?</h2>
                <h3>Alors vous êtes au bon endroit</h3>
    
                <h4>Cette application unique a pour but d'établir un recensement des escaliers afin d'étudier
                    la répartition du nombre de marches, leur emplacement et le nombre d'accidents associés
                </h4>
                <h4>Vous avez trouvé un escalier ? Ou encore mieux, vous vous êtes vautrés dans un escalier car vous avez la coordination d'un bébé gnoux ? Dites le nous !</h4>
            </section>
            <section id="actions">
                <div class="btn-action">
                    <img height="60" src="views/assets/stairs_icon.png">
                    <a href="index.php?page=form-stairs">Ajouter un escalier</a>
                </div>
                <div class="btn-action">
                    <img height="60" src="views/assets/accident_icon.png">
                    <a>Reporter un accident</a>
                </div>
            </section>
            <section id="other">
                
            </section>
        </main>
    </body>
    <footer class="center">
        Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers. 
        Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
    </footer>
</html>