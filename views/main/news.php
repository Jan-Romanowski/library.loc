<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>
    <body class="main_body">
    <style>

        img{
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
        }
        img:hover{
            transform: scale(1.1);
            transition: all 0.8s;
        }

    </style>
    <div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
        <div class="container-fluid row justify-content-center p-5">
            <h1 class="text-center mb-5">
                Aktualności
            </h1>

            <!--        First-->
            <div class="container row justify-content-center">
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <img src="/img/chkk.jpeg" class="card-img-top m-2" alt="...">
                </div>
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <p class="text-center fs-4" style="vertical-align: middle;">
                        Charytatywny Koncert Kolędowy
                    </p>
                    <p class="text-center" style="vertical-align: middle;">
                        12 stycznia 2020, Katedra siedlecka
                    </p>
                    <p>
                        Wykonawcy
                    <ul class="fs-6">
                        <li>
                            Izabela Kiryluk - Sopran
                        </li>
                        <li>
                            Adam Szczepański - Organy
                        </li>
                        <li>
                            Chór Katedralny im. ks. A.Hoffmana w Siedlcach
                        </li>
                        <li>
                            ks. Michał Szulik - Dyrygent
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
            <hr class="m-5">
            <!--        Second-->
            <div class="container row justify-content-center">
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <img src="/img/ktp.jpeg" class="card-img-top m-2" alt="...">
                </div>
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <p class="text-center fs-4" style="vertical-align: middle;">Koncert Tota pulchra est Maria</p>
                    <p class="text-center text-light" style="vertical-align: middle;">7 grudnia 2019, Katedra siedlecka</p>
                    <p >
                        Wykonawcy
                    <ul class="fs-6">
                        <li>
                            Izabela Kiryluk - Sopran
                        </li>
                        <li>
                            Anna Januszewska - Alt
                        </li>
                        <li>
                            Bartosz Gorzkowski - Tenor
                        </li>
                        <li>
                            Damian Suchożebrski - Bas
                        </li>
                        <li>
                            Piotr Wilczyński – organy Dominika Biernackiego
                        </li>
                        <li>
                            Adam Szczepański - Organy w prezbiterium
                        </li>
                        <li>
                            Szymon Telecki – skrzypce I
                        </li>
                        <li>
                            Małgorzata Rąbalska – skrzypce II
                        </li>
                        <li>
                            Piotr Grabowicz – altówka
                        </li>
                        <li>
                            Izabela Skaruz – wiolonczela
                        </li>
                        <li>
                            Adam Chomiuk – kontrabas
                        </li>
                        <li>
                            Agnieszka Bemowska – harfa
                        </li>

                        <li>
                            Chór Katedralny im. ks. A.Hoffmana w Siedlcach
                        </li>
                        <li>
                            Chór i Orkiestra Państwowej Szkoły Muzycznej II Stopnia w Siedlcach
                        </li>
                        <li>
                            Izabela Kiryluk - Dyrygent
                        </li>
                        <li>
                            ks. Michał Szulik - Dyrygent
                        </li>
                    </ul>

                    </p>
                    <p>
                        W Programie:</p>
                    <p class="fs-6">
                        H.M. Górecki, J. Surzyński, J. Arcadelt, F. List, A. Guilmant, F. Peeters,<br> A. Bruckner, C. Franck
                    </p>
                </div>
            </div>
            <hr class="m-5">
            <!--        Third-->
            <div class="container row justify-content-center">
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <img src="/img/galery1.jpeg" class="card-img-top m-2" alt="...">
                </div>
                <div class="container col-sm-12 col-md-12 col-lg-6">
                    <p class="text-center fs-4" style="vertical-align: middle;">Uroczysty Koncert
                        na zakończenie obchodów<br>
                        200-lecia diecezji siedleckiej. </p>
                    <p>
                        8 grudnia 2018, Katedra siedlecka
                    </p>
                    <p>
                        Wykonawcy
                    <ul class="fs-6">
                        <li>
                            Barbara Tritt - Sopran
                        </li>
                        <li>
                            Izabela Kiryluk - Sopran
                        </li>
                        <li>
                            Anna Januszewska - Alt
                        </li>
                        <li>
                            Bartosz Gorzkowski - Tenor
                        </li>
                        <li>
                            Damian Suchożebrski - Bas
                        </li>
                        <li>
                            Adam Szczepański - Organy
                        </li>
                        <li>
                            Chór Katedralny im. ks. A.Hoffmana w Siedlcach
                        </li>
                        <li>
                            Chór i Orkiestra Państwowej Szkoły Muzycznej II Stopnia w Siedlcach
                        </li>
                        <li>
                            ks. Michał Szulik - Dyrygent
                        </li>
                    </ul>
                    </p>
                    <p>
                        W Programie:</p>
                    <p class="fs-6">
                        C. Franck, ks. A.Hoffman, ks. M.R.Szulik
                    </p>
                </div>
            </div>

        </div>
    </div>
    </body>
    <script>
        $('#menu__contact').addClass('active');
    </script>
<?php include(ROOT . '/views/fragments/footer.php');