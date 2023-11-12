<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/home.css">
    <link rel="stylesheet" href="/views/styles/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">Stairway Extravaganza</a>
            <a href="/stairs/list">Ajouter un escalier</a>
            <a href="accidents/form">Report d'incident</a>
            <a href="/statistics">Statistiques</a>
            <a href="/stairs/list">Liste</a>
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
            <div class="btn btn-action">
                <img height="60" src="views/assets/stairs_icon.png">
                <a href="/stairs/form">Ajouter un escalier</a>
            </div>
            <div class="btn btn-action">
                <img height="60" src="views/assets/accident_icon.png">
                <a href="/accidents/form">Reporter un accident</a>
            </div>
        </section>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>