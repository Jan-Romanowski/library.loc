<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>
    <style>
        .main_body {
            height: 100vh;
            width: 100%;
            background: linear-gradient(
                    rgba(0, 0, 0, 0.55),
                    rgba(0, 0, 0, 0.55)
            ),
            url("/img/6.jpg");
            background-repeat: no-repeat, repeat !important;
            background-attachment: fixed !important;
            background-size: cover !important;
        }

    </style>
    <body class="main_body">
    <div class="container-fluid mb-sm-0 mb-md-1 mb-3 row g-1 justify-content-center" >
        <h1 class="main-template-body-center-text mt-5" style="margin-top: 45vh!important; margin-bottom: 20vh !important;">
            Chór Katedralny im. ks. Alfreda Hoffmana <br>w Siedlcach
        </h1>
    </div>

    <div class="container-fluid p-sm-1 p-md-3 p-lg-5" style="background-color: rgba(0,0,0, 0.5); min-height: 100vh;">
        <div class="container-fluid text-white row g-1 justify-content-center text-center">

            <h1 class="text-center mb-5">O nas</h1>
            <p class="col-sm-12 col-md-11 col-lg-10 col-xl-7" align="justify">
                Chór Katedralny im ks. Alfreda Hoffmana jest zespołem, który wyrasta
                z niemalże stuletniej tradycji chóralnej kościoła pod wezwaniem Niepokalanego Poczęcia
                Najświętszej Maryi Panny w Siedlcach.
            </p>
            <p class="col-sm-12 col-md-11 col-lg-10 col-xl-7" align="justify">
                Głównym zadaniem Chóru Katedralnego im ks. Alfreda Hoffmana
                w Siedlcach jest służba liturgii podczas celebracji w kościele biskupim
                a także podczas większych uroczystości na terenie diecezji siedleckiej.
            </p>
            <p class="col-sm-12 col-md-11 col-lg-10 col-xl-7" align="justify">
                W repertuarze zespołu, oprócz utworów liturgicznych znajdują się także utwory koncertowe,
                z którymi chór występował na terenie kraju a także
                w Niemczech, Włoszech, na Węgrzech, Ukrainie i Białorusi.
            </p>
            <p class="col-sm-12 col-md-11 col-lg-10 col-xl-7" align="justify">
                Chór ma w swoim repertuarze wiele kompozycji dyrygenta, ks. Michała Szulika.
                Istotnym aspektem działalności chóru katedralnego jest praca wychowawcza
                i wspieranie rozwoju uzdolnionej muzycznie młodzieży.
            </p>
            <p class="col-sm-12 col-md-11 col-lg-10 col-xl-7" align="justify">
                Od 1999 r. chór prowadzi ks. Michał Szulik, którego asystentką od 2014 r. jest Izabela Kiryluk.
            </p>
        </div>
    </div>

    </body>
<?php

include(ROOT . '/views/fragments/footer.php');
