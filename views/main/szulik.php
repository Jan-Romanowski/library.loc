<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>
<header>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Estonia&family=Indie+Flower&family=M+PLUS+Code+Latin:wght@100&family=Montagu+Slab:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
        #szulik-container__image{
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
        }

        #szulik-container__image:hover{
            transform: scale(1.1);
            transition: all 0.8s;
        }

    </style>
</header>
<body class="main_body">
<div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); margin-top: 20px; width: 100%;">
<div class="container-fluid text-center pt-5" >
        <h2 class="mb-5">Dyrygent Ks. Michał Roman Szulik</h2>
    </div>

    <div class="container-fluid text-start gx-5">
        <img id='szulik-container__image' src="/img/szulik.jpeg" width="300px" style="margin: 0 0 2% 2%; float: right;">

        <p align="justify">
            Ukończył PSM II stopnia w Lublinie w klasie śpiewu solowego prof. Aliny Naumowicz.
            Swoje umiejętności śpiewacze doskonalił także u Prof. Jadwigi Gałeskiej-Trit (Poznań), Alicji Molędy-Borkowskiej
            (Drezno) oraz prof. Gerlinde Schmid - Nafz
            (Überlingen). Po studiach w Wyższym Seminarium Duchownym w Siedlcach (1994)
            studiował muzykologię na KUL, którą ukończył w roku 2001. W zakresie dyrygentury
            chóralnej jest uczniem ad. Kazimierza Bukata, dyrygenta Chóru Filharmonii Narodowej
            w Warszawie. Swoje zainteresowanie dyrygenckie rozwijał już w czasie studiów
            prowadząc między innymi Chór WSD O.O. Kapucynów w Lublinie, będąc korepetytorem
            Chóru Archikatedry Lubelskiej oraz współpracując z Chórem i Orkiestrą Młodzieżową
            Cantate Deo w Lublinie. Z Chórem Katedralnym w Siedlcach pracuje od jesieni 1999
            r. W ciągu pięciu lat pracy w Siedlcach przygotował z zespołem oprawę muzyczną do
            wszystkich uroczystości w katedrze a także większych uroczystości o zasięgu
            diecezjalnym. W ciągu 6 pracy przygotował z Chórem ok. 30 koncertów w rożnych
            miastach Polski i za granicą.
        </p><hr>

        <p align="justify">
            Zajmuje się pracą kompozytorską. Jest także odpowiedzialny za całokształt muzyki
            kościelnej w Diecezji Siedleckiej a także prowadzi Diecezjalne Studium Muzyki Od
            2003 roku pracuje w Zakładzie Muzyki Wydziału Humanistycznego Akademii Podlaskiej.
            W roku 2005 uzyskał w Akademii Muzycznej w Poznaniu tytuł doktora sztuki muzycznej
            w dyscyplinie artystycznej dyrygentura na podstawie przedstawionej rozprawy
            doktorskiej pt."Rola słowa i tekstu w religijnej muzyce chóralnej na przykładzie
            wybranych utworów od renesansu do współczesności. Próby wskazówek interpretacyjnych.
        </p><hr>
        <p>
            Większe utwory napisane przez ks. Michała Szulika:
        <ul>
            <li>
                <span class='szulik__change-font'>"Te Deum laudamus"</span> - na sopran solo, chór mieszany, zespół instrumentów dętych i organy
                (prawykonanie - styczeń 2001, 6 koncertów w diecezji siedleckiej)
            </li>
            <li>
                <span class='szulik__change-font'>Mottet "Evangelio oboedientia. Eucharistia."</span> - na 3 chóry mieszane, kwartet dęty i organy
                (prawykonanie - czerwiec 2002)
            </li>
            <li>
                <span class='szulik__change-font'> "Requiem f-moll"</span> - na sopran i tenor solo, chór mieszany i organy (prawykonanie - lipiec 2004,
                koncert w Überlingen 2005)
            </li>
            <li>
                <span class='szulik__change-font'> Psalm 150</span> - na chór mieszany i organy (prawykonanie - listopad 2004)
            </li>
        </ul>
        </p>
    </div>
</div>
</body>

    <script>
        $('#menu__chor').addClass('active');
    </script>

<?php include(ROOT . '/views/fragments/footer.php');