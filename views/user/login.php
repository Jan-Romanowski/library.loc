<?php include(ROOT . '/views/headers/main_header.php'); ?>

<div class="container-fluid pt-5 w-50" style="margin: auto; min-height: 100vh;">
    <form method="post" action="#">
        <h2 class="mb-5 mt-4 text-center">Zaloguj</h2>
        <?php if(isset($errors) && is_array($errors)): ?>
            <ul style="color: red">
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="container-md w-75">
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php if(isset($email)) echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="pass" value="<?php if(isset($pass)) echo $pass; ?>">
            </div>
            <div class="mb-3">
                <div class="container-fluid" style="text-align: center">
                    <a href="/users/register/">Załóż konto</a>
                </div>
            </div>
            <div class="mb-3">
                <div class="container-fluid" style="text-align: center">
                    <input type="submit" class="btn btn-outline-dark px-3" name="submit"  value="Zaloguj">
                </div>
            </div>
        </div>

    </form>
</div>

<?php include(ROOT . '/views/headers/footer.php');
