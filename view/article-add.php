<body>
    <div class="container">
        <h2>Ajouter un nouvel article</h2>

        <form action="/ctrl/article-add.php" method="post">

            <div class="form-group">
                <label for="title">Titre de l'article :</label>
                <input type="text" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="content">Contenu de l'article :</label>
                <textarea id="content" name="content"></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Catégorie :</label>
                <select id="category_id" name="category_id">
                    <option value="">Sélectionner une catégorie</option>
                    <?php foreach ($args['listCategory'] as $cat) { ?>

                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                    <?php } ?>

                </select>
            </div>


            <div class="form-group">
                <button type="submit">Enregistrer l'article</button>
            </div>

        </form>
    </div>
</body>