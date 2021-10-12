<?php include(ROOT . '/views/headers/header.php');

?>

    <div class='container w-50 gx-5' style='min-height: 100vh';>
        <div class="p-5 mt-4 border bg-light">
            <h2>Konto</h2>
            <p class="fs-5 mb-2"><?php echo $_SESSION['name'].' '.$_SESSION['surname']; ?></p>
            <p class="fs-5 mb-2"><?php echo $_SESSION['email']; ?></p>
            <p class="fs-5 mb-2"><?php echo $_SESSION['ac_type']; ?></p>

            <p class="fs-5 mb-5" style="color: green"><?php if(isset($message_data)) echo $message_data; ?></p>
            <p class="fs-5 mb-5" style="color: green"><?php if(isset($message_pass)) echo $message_pass; ?></p>
            <p>
                <a class="btn btn-outline-dark px-3 dropdown-toggle" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Zmiana hasła użytkownika</a>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse <?php if(isset($errors_pass)) echo 'show'; ?> mb-3" id="multiCollapseExample1">
                        <div class="card card-body">
                            <form action="#" method="post">
                                <h3 class="text-center">Zmiana hasła</h3><br>
                                <?php if(isset($errors_pass) && is_array($errors_pass)): ?>
                                    <ul style="color: red">
                                        <?php foreach ($errors_pass as $error_pass): ?>
                                            <li> - <?php echo $error_pass; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Stare hasło</label>
                                    <input type="password" class="form-control" name="old_pass" value="">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Wpisz aktualne hasło.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Nowe hasło</label>
                                    <input type="text" class="form-control" name="new_pass1" value="">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może zawierać spacji, znaków specjalnych ani emotikonów.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Powtórz hasło</label>
                                    <input type="text" class="form-control" name="new_pass2" value="">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może zawierać spacji, znaków specjalnych ani emotikonów.
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="container-fluid" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-dark" name="submit_pass"  value="Zmień hasło">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <p>
                <a class="btn btn-outline-dark px-3 dropdown-toggle" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Zmiana danych osobowych</a>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse <?php if(isset($errors_data)) echo 'show'; ?>" id="multiCollapseExample2">
                        <div class="card card-body">
                            <form action="#" method="post">
                                <h3 class="text-center">Zmiana danych osobowych</h3><br>
                                <?php if(isset($errors_data) && is_array($errors_data)): ?>
                                    <ul style="color: red">
                                        <?php foreach ($errors_data as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Poczta</label>
                                    <input type="email" class="form-control disabled" name="mail" value="<?php echo $_SESSION['email']; ?>">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Twój e-mail powinien być w formie example@gmail.com
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Imię</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Nazwisko</label>
                                    <input type="text" class="form-control" name="surname" value="<?php echo $_SESSION['surname']; ?>">
                                </div>
                                <div class="mb-4">
                                    <div class="container-fluid" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-dark" name="submit_data"  value="Zmień dane">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

<?php

/*
$_SESSION['user']
$_SESSION['name']
$_SESSION['surname']
$_SESSION['email']
$_SESSION['ac_type']
*/