<?php include(ROOT . '/views/layouts/header.php');

?>

    <div class='container gx-5' style='min-height: 100vh';>
        <div class="p-5 mt-4 border bg-light">
            <h2>Cabinet</h2>
            <p class="fs-5"><?php echo $_SESSION['name'].' '.$_SESSION['surname']; ?></p>
                <?php if(isset($message)) echo $message; ?>
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Zmiana hasła</a>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Zmiana danych</button>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            <form action="#" method="post">
                                <?php if(isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Stare hasło</label>
                                    <input type="password" class="form-control" name="old_pass" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Nowe hasło</label>
                                    <input type="text" class="form-control" name="new_pass1" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Powtórz hasło</label>
                                    <input type="text" class="form-control" name="new_pass2" value="">
                                </div>
                                <div class="mb-4">
                                    <div class="container-fluid" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-secondary" name="submit_pass"  value="Zmień hasło">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            Некоторое содержимое заполнителя для второго компонента сворачивания в этом примере множественного сворачивания. Эта панель по умолчанию скрыта, но открывается, когда пользователь активирует соответствующий триггер.
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