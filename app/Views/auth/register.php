<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <?= validation_list_errors() ?>
    <form action="" method="post">
        <?= csrf_field(); ?>
        <input type="text" name="namauser" id="namauser" placeholder="Nama">
        <span><?= isset($validation) ? display_error($validation, "namauser") : '' ?></span>

        <input type="email" name="emailuser" id="emailuser" placeholder="email">
        <span><?= isset($validation) ? display_error($validation, "emailuser") : '' ?></span>

        <input type="password" name="passworduser" id="passworduser" placeholder="password">
        <?= isset($validation) ? display_error($validation, "passworduser") : '' ?>

        <input type="password" name="passwordusercon" id="passwordusercon" placeholder="confirm password">
        <?= isset($validation) ? display_error($validation, "passwordusercon") : '' ?>

        <input type="submit" value="Register">
        <a href="login">Sudah Punya Akun</a>
    </form>

</body>

</html>