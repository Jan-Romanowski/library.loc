<?php include(ROOT . '/views/headers/main_header.php'); ?>

<p class="fs-5 mt-5 text-center" style="color: green">
    <?php
        if(isset($message)):
            echo 'Wniosek o rejestrację został złożony. Poczekaj na zaakceptowanie danych przez administratora.<br><br>';
        echo "<a href='/user/login/'>Zaloguj</a>";
        else:
    ?>
</p>
<div class="container-md w-50">
    <form method="post" action="#">
        <h2 class="mb-5 mt-4 text-center">Załórz Konto</h2>
        <div class="container-md w-75">
            <div class="mb-3">
            <?php if(isset($errors) && is_array($errors)): ?>
                <ul style="color: red">
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                <div id="passwordHelpBlock" class="form-text">
                    Twój e-mail powinien być w formie example@gmail.com
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Imię</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Hasło</label>
                <input type="text" class="form-control" name="pass1" value="<?php echo $pass1; ?>">
                <div id="passwordHelpBlock" class="form-text">
                    Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może zawierać spacji, znaków specjalnych ani emotikonów.
                </div>
            </div>
            <div class="mb-4">
                <label for="exampleInputText2" class="form-label">Powtórz hasło</label>
                <input type="text" class="form-control" name="pass2" value="<?php echo $pass2; ?>">
                <div id="passwordHelpBlock" class="form-text">
                    Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może zawierać spacji, znaków specjalnych ani emotikonów.
                </div>
            </div>
            <div class="mb-4">
                <div class="container-fluid" style="text-align: center">
                    <input type="submit" class="btn btn-outline-dark" name="submit" w-25" value="Zarejestruj"></input>
                </div>
            </div>
        </div>

    </form>
</div>

<?php
endif;