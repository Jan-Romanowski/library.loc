<!DOCTYPE html>
<header>
    <link rel="shortcut icon" href="/images/Logo/logo_ico.png" type="image/png">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/js/javascript.js" type="text/javascript"></script>
    <script src="/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chór Katedralny im. Ks. Alfreda Hoffmana w Siedlcach</title>
</header>

<nav class="navbar navbar-expand-lg row navbar-dark bg-dark m-0 sticky-top">
    <div class="container-fluid col-sm-12 col-md-10 col-lg-8">
        <object class="m-0 p-0"
                type="image/svg+xml"
                height="55px;"
                data="/img/logo.svg">
            <img class="m-0 p-0" src="/img/logo.svg"/>
        </object>
        <a class="navbar-brand d-inline-block text-truncate" href="#">Biblioteka Chóru Katedralnego</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
							<?php if (User::checkRoot("admin") || User::checkRoot("moder")): ?><!-- FOR ADMIN AND MODERATOR -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/cabinet/">Ustawienia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/songs/">Utwory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/folders/">Teczki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/">Zarządzanie <span
                                class="badge bg-danger"><?php if (Queries::getCountQueries()) echo Queries::getCountQueries(); ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/logout/">Wyloguj</a>
                </li>
							<?php else: ?> <!-- FOR USER -->
                  <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/cabinet/">Ustawienia</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/songs/">Utwory</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/folders/">Teczki</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/users/logout/">Wyloguj</a>
                  </li>
							<?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="row mt-5">
	<?php if (isset($_SESSION["msg"]) && $_SESSION["msg"]): ?>
      <div class="container-fluid col-sm-12 col-md-10 col-lg-8">
          <div class="alert <?php echo $_SESSION["stat"]; ?> alert-dismissible fade show" role="alert">
						<?php echo $_SESSION["msg"]; ?>
						<?php $_SESSION["msg"] = null; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      </div>
	<?php endif; ?>
</div>
