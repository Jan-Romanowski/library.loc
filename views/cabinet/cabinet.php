<?php include(ROOT . '/views/fragments/header.php'); ?>

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 mx-auto row justify-content-center">
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-7">
                <h2>Konto</h2>
                <p class="fs-6 mb-2"><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></p>
                <p class="fs-6 mb-2"><?php echo $_SESSION['email']; ?></p>
                <p class="fs-6 mb-2"
                   style="color: <?php echo ComFun::rootColor($_SESSION['ac_type']); ?>"><?php echo ComFun::translateRights($_SESSION['ac_type']); ?></p>
            </div>
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-7">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                Zmiana danych osobowych
                            </button>
                        </h2>
                        <div id="flush-collapseOne"
                             class="p-3 accordion-collapse collapse <?php if (isset($errors_data)) echo 'show'; ?>"
                             aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <form action="#" method="post">
                                <h3 class="text-center">Zmiana danych osobowych</h3><br>
															<?php if (isset($errors_data) && is_array($errors_data)): ?>
                                  <ul style="color: red">
																		<?php foreach ($errors_data as $error): ?>
                                        <li> - <?php echo $error; ?></li>
																		<?php endforeach; ?>
                                  </ul>
															<?php endif; ?>
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Poczta</label>
                                    <input type="email" class="form-control disabled" name="mail"
                                           value="<?php echo $_SESSION['email']; ?>">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Twój e-mail powinien być w formie example@gmail.com
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Imię</label>
                                    <input type="text" class="form-control" name="name"
                                           value="<?php echo $_SESSION['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Nazwisko</label>
                                    <input type="text" class="form-control" name="surname"
                                           value="<?php echo $_SESSION['surname']; ?>">
                                </div>
                                <div class="mb-4">
                                    <div class="container-fluid" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-dark" name="submit_data"
                                               value="Zmień dane">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                Zmiana hasła
                            </button>
                        </h2>
                        <div id="flush-collapseTwo"
                             class="p-3 accordion-collapse collapse <?php if (isset($errors_pass)) echo 'show'; ?>"
                             aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <form action="#" method="post">
                                <h3 class="text-center">Zmiana hasła</h3><br>
															<?php if (isset($errors_pass) && is_array($errors_pass)): ?>
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
                                        Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może
                                        zawierać spacji, znaków specjalnych ani emotikonów.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label">Powtórz hasło</label>
                                    <input type="text" class="form-control" name="new_pass2" value="">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Twoje hasło musi mieć 8-20 znaków, zawierać litery i cyfry oraz nie może
                                        zawierać spacji, znaków specjalnych ani emotikonów.
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="container-fluid" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-dark" name="submit_pass"
                                               value="Zmień hasło">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/fragments/footer.php');
