<header>
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <script src="/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>

    <link href="/textillate/animate.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="/textillate/jquery.lettering.js"></script>
    <script src="/textillate/jquery.textillate.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chór Katedralny im. Ks. Alfreda Hoffmana w Siedlcach</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Estonia&family=Indie+Flower&family=M+PLUS+Code+Latin:wght@100&family=Montagu+Slab:wght@200&display=swap');

        body {
            font-family: 'Montagu Slab', serif;
            font-size: 120%;
        }

        .active {
            font-weight: bolder;
        }

        .footer__links {
            text-decoration: none;
            margin: 0 3% 0 3%;
        }
    </style>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-0 sticky-top">
    <div class="container-fluid">
        <object class="m-0 p-0"
                type="image/svg+xml"
                height="80px;"
                data="/img/logo.svg">
            <img class="m-0 p-0" src="/img/logo.svg"/>
        </object>

        <a class="navbar-brand text-truncate w-auto" href="/main/">Chór Katedralny</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id='menu__aktualnosci' class="nav-link" href="/main/news/">Aktualności</a>
                </li>
                <li>
                    <a id='menu__zarzad' class="nav-link" href="/main/members/">Zarząd Chóru</a>
                </li>
                <li class="nav-item">
                    <a id='menu__biblioteka' class="nav-link" href="/songs">Biblioteka</a>
                </li>
                <li class="nav-item dropdown">
                    <a id='menu__chor' class="nav-link dropdown-toggle" href="?section=info" id="navbarDropdownMenuLink"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        O chórze
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a id='menu__chor__szulik' class="dropdown-item" href="/main/szulik/">Dyrygent</a></li>
                        <li><a id='menu__chor__iza' class="dropdown-item" href="/main/iza/">II Dyrygent</a></li>
                        <li><a id='menu__chor__hoffman' class="dropdown-item" href="/main/hoffman/">Ks. A. Hoffman</a>
                        </li>
                        <li><a id='menu__chor__history' class="dropdown-item" href="/main/history/">Historia chóru</a>
                        </li>
                        <li><a id='menu__chor__history' class="dropdown-item disabled" href="/main/achivments/">Osiągnięcia</a>
                        </li>
                        <li><a id='menu__chor__history' class="dropdown-item disabled" href="/main/gallery/">Galeria</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id='menu__contact' class="nav-link" href="/main/contact/">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>