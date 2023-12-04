<!DOCTYPE html>
<html>
    <head>
        <?php include 'fragments/head_content.php';?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/views/styles/form.css">
    </head>
    <body>
        <?php include 'fragments/header.php';?>
        <main>
            <section id="form-section">
                <h1>
                    <?php echo isset($data['id']) ? 'Modifier' : 'Ajouter'; ?> un avis
                </h1>
                <form action="/rating/form" method="post">
                    <?php if (isset($data['id'])) : ?>
                        <input type="hidden" name="ratingId" 
                            value="<?php echo $data['id']; ?>">
                    <?php endif; ?>
                    <?php if (isset($stairs['id'])) : ?>
                        <input type="hidden" name="stairsId" 
                            value="<?php echo $stairs['id']; ?>">
                    <?php endif; ?>
                    <div>
                        <span for="stairs">Escalier: <?php echo $stairs; ?></span>
                    </div>
                    <div>
                        <label for="rating">
                            <i class="bi bi-award-fill"></i></i>Avis
                        </label>
                        <select name="rating" id="rating" required>
                            <option value="1" 
                                <?php echo (isset($data['rating']) && 
                                    $data['rating'] === '1') ? 'selected' : ''; ?>>1
                            </option>
                            <option value="2"
                                <?php echo (isset($data['rating']) &&
                                $data['rating'] === '2') ? 'selected' : ''; ?>>2
                            </option>
                            <option value="3"
                                <?php echo (isset($data['rating']) &&
                                $data['rating'] === '3') ? 'selected' : ''; ?>>3
                            </option>
                            <option value="4"
                                <?php echo (isset($data['rating']) &&
                                $data['rating'] === '4') ? 'selected' : ''; ?>>4
                            </option>
                            <option value="5"
                                <?php echo (isset($data['rating']) &&
                                $data['rating'] === '5') ? 'selected' : ''; ?>>5
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="review">
                            <i class="bi bi-chat-left-text"></i>Avis
                        </label>
                        <textarea id="review" name="review" rows="8">
                            <?php echo isset($data['review']) ? trim($data['review']) : ''; ?>
                        </textarea>
                    </div>
                    <div>
                        <label for="is-favorite">
                            <i class="bi bi-bookmark-star"></i>Favori
                        </label>
                        <input type="checkbox" id="is-favorite" name="isFavorite"
                            <?php echo isset($data['is_favorite']) && 
                            $data['is_favorite'] ? 'checked' : ''; ?>>
                    </div>
                    <input class="btn" id="btn-send" type="submit" value="Submit">
                </form>
                <div id="results">
                    <?php
                    if (isset($success) && $success === "true") {
                        echo '<p style="color: green;">
                            Le formulaire a été soumis avec succès!</p>';
                    }
                    if (isset($error) && $error !== "") {
                        echo '<p style="color: red;">' . $error . '</p>';
                    }
                    ?>
                </div>
            </section>
        </main>
    </body>
    <?php include 'fragments/footer.php';?>
</html>