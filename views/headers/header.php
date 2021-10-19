<!DOCTYPE html>

<header>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/template/js/javascript.js" type="text/javascript"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biblioteka Chóru Katedralnego</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container" style="float: right;">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/cabinet/">Konto</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="/songs/">Utwory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/folders/">Teczki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/view/">Użytkowniki</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/queries/">Wnioski <span class="badge bg-secondary"><?php echo Queries::getCountQueries(); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout/">Wyloguj</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>