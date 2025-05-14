
<main>
    <h2>Enregistrez-vous</h2>
    <form action="/ctrl/register.php" method="post">
        <div>
            <label for="username">Nom d'utilisateur</label>
            <input id="username" type="text" name="username" autofocus>
        </div>
        <div>
            <label for="mail">Email</label>
            <input id="mail" type="email" name="email" >
        </div>
        <div>
            <label for="pwd">Mot de passe</label>
            <input id="pwd" type="password" name="password" >
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>
    </form>
</main>