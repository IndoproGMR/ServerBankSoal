<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="auth/login" method="post">
        <?= csrf_field(); ?>
        <input type="email" name="emailuser" id="emailuser" placeholder="Email">
        <input type="password" name="passworduser" id="passworduser" placeholder="password">
        <input type="submit" value="login">
        <a href="register">Belum Punya akun</a>
    </form>
</body>

</html>