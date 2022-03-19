<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>
    <style>
        .main_body{
            height: 100vh;
            width: 100%;
            background:

                    linear-gradient(
                            rgba(0, 0, 0, 0.55),
                            rgba(0, 0, 0, 0.55)
                    ),
                    url("/images/Chor/6.jpg");
            background-repeat: no-repeat, repeat !important;
            background-attachment: fixed !important;
            background-size: cover !important;
        }

    </style>
    <body class="main_body">
        <div class="container-fluid mb-3 row justify-content-center">
            <h1 class="main-template-body-center-text" style="margin-top: 55vh; min-height: 45vh;">
                Chór Katedralny im. Ks. Alfreda Hoffmana <br>w Siedlcach
            </h1>
        </div>
        <div class="container-fluid p-5" style="background-color: rgba(0,0,0, 0.5);">
            <div class="container text-white row justify-content-center col-12 fs-4">
                <h1 class="text-center mb-5">O nas</h1>
                <p class="col-10">
                    Chór Katedralny im ks. Alfreda Hoffmana jest zespołem, który wyrasta
                    z niemalże stuletniej tradycji chóralnej kościoła pod wezwaniem Niepokalanego Poczęcia
                    Najświętszej Maryi Panny w Siedlcach.
                </p>
                <p class="col-10">
                    Głównym zadaniem Chóru Katedralnego im ks. Alfreda Hoffmana
                    w Siedlcach jest służba liturgii podczas celebracji w kościele biskupim
                    a także podczas większych uroczystości na terenie diecezji siedleckiej.
                </p>
                <p class="col-10">
                    W repertuarze zespołu, oprócz utworów liturgicznych znajdują się także utwory koncertowe,
                    z którymi chór występował na terenie kraju a także
                    w Niemczech, Włoszech, na Węgrzech, Ukrainie i Białorusi.
                </p>
                <p class="col-10">
                   Chór ma w swoim repertuarze wiele kompozycji dyrygenta, ks. Michała Szulika.
                   Istotnym aspektem działalności chóru katedralnego jest praca wychowawcza
                   i wspieranie rozwoju uzdolnionej muzycznie młodzieży.
               </p>
                <p class="col-10">
                   Od 1999 r. chór prowadzi ks. Michał Szulik, którego asystentką od 2014 r. jest Izabela Kiryluk.
               </p>
            </div>
        </div>

    </body>
<?php

include(ROOT . '/views/fragments/footer.php');
