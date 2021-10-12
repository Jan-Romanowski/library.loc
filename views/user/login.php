<!DOCTYPE html>

<header>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biblioteka Chóru Katedralnego</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Strona chóru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-md w-50">
    <form method="post" action="#">
        <h2 class="mb-5 mt-4 text-center">Witamy w wirtualnej bibliotece Chóru Katedralnego w Siedlcach im. ks. A. Hoffmana</h2>
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
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="pass" value="<?php echo $pass; ?>">
            </div>
            <div class="mb-4">
                <div class="container-fluid" style="text-align: center">
                    <input type="submit" class="btn btn-outline-secondary" name="submit"  value="Zaloguj">
                </div>
            </div>
        </div>

    </form>
</div>

<?php
