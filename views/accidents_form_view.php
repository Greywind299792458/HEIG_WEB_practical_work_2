<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/views/styles/form.css">
    <link rel="stylesheet" href="/views/styles/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">Stairway Extravaganza</a>
            <a href="/stairs/form">Ajouter un escalier</a>
            <a href="accidents/form">Report d'incident</a>
            <a href="/statistics">Statistiques</a>
            <a href="/stairs/list">Liste</a>
        </nav>
    </header>
    <main>
        <section id="form-section">
            <h1>Signaler un accident</h1>
            <form action="/accidents/form" method="post">
                <div>
                    <label for="event-date"><i class="bi bi-calendar-date"></i>Date de l'accident</label>
                    <input type="date" id="event-date" name="eventDate" required>
                </div>
                <div>
                    <label for="event-description"><i class="bi bi-chat-square-text"></i>Résumé des événements</label>
                    <textarea id="event-description" name="eventDescription"></textarea>
                </div>
                <div>
                    <label for="destroyed-ego"><i class="bi bi-emoji-expressionless"></i>Votre ego a pris cher</label>
                    <input type="checkbox" id="destroyed-ego" name="destroyedEgo" checked="false">
                </div>
                <div>
                    <label for="spilled-drink"><i class="bi bi-cup-hot"></i>Votre boisson s'est renversée</label>
                    <input type="checkbox" id="spilled-drink" name="spilledDrink" checked="false">
                </div>
                <div>
                    <label for="no-clip"><i class="bi bi-hurricane"></i>Vous avez 'no-clip'</label>
                    <input type="checkbox" id="no-clip" name="noClip" checked="false">
                </div>
                <div>
                    <label for="no-clip"></i>Choisissez un escalier</label>
                    <select name="stairs" id="stairs">
                        <?php foreach ($stairsList as $stairs) : ?>
                            <option value="<?php echo $stairs->id; ?>"><?php echo $stairs; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
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