<?php include_once(ROOT . '/views/headers/main_header.php'); ?>
<header>
    <style>
        #history__image-first{
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
        }

        #history__image-first:hover{
            transform: scale(1.1);
            transition: all 0.8s;
        }

        #history__image-second{
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
            margin: 2% 0;
        }

        #history__image-second:hover{
            transform: scale(1.1);
            transition: all 0.8s;
        }

        #history-container_image-second,
        #history-container__content-main-1,
        #history-container__content-main-2,
        #history-container__content-part-1,
        #history-container__content-part-2,
        #history-container__content-part-3,
        #history-container__content-part-4{
            display: none;
        }

        .animation{
            animation: animationText 1s;
        }

        @keyframes slidein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes animationText {
            0% {
                opacity: 0;
                transform: translateY(+100%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
    </style>
</header>
<body class="main_body">
<div class="container-fluid-sm text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); margin-top: 20px; width: 100%;">
    <div class="container-fluid p-5">
        <div style="text-align: center;">
            <h2 class="pt-2 mb-5">Chór w latach 1955 - 1994</h2>
        </div>
        <div id="history-container__content-main-1">
            <img id='history__image-first' src="/img/chor1962.gif" width="500px" class="img" style="float: left; margin: 2% 3% 2% 0" alt='Chór' title='Chór'>

            <p align="justify" class="textilla">
                Interesująca i niezwykle bogata historia chóru działającego przy
                kościele p. w. Niepokalanego Poczęcia NMP w Siedlcach sięga lat dwudziestych
                ubiegłego stulecia, w których działał Aleksander Gromek pierwszy organista
                tegoż kościoła oraz pracujący do roku 1955 Walenty Hakowski. Oni to położyli
                wielkie zasługi dla powstania i rozwoju zespołu. Niemniej jednak od przybycia
                do katedry ks. Alfreda Hoffmana, w marcu 1955 roku, chór zaczął w pełni funkcjonować
                jako zespół liturgiczny i koncertowy i ten rok uważa się umownie jako rok powstania
                działającego w takim kształcie chóru.</p><hr>
            <p align="justify">
                Już nazajutrz po przybyciu do katedry odbyło się pierwsze spotkanie liczącego
                kilkanaście osób chóru z nowym dyrygentem, którego kronikarz opisał w następujący
                sposób: "Pierwsze wrażenie wśród chórzystów przy poznaniu nowego dyrygenta różne
                - wygląd zewnętrzny i podejście do chórzystów ujmujące, a jednocześnie wątpliwości:
                czy Ksiądz da sobie radę w prowadzeniu takiego zespołu, czy będzie umiał utrzymać
                go w karności, czy będzie miał tyle zapału i siły, by tę pracę utrzymać i rozwijać?
                Wśród chórzystów niepewność i zaciekawienie." Wątpliwości te po krótkim czasie zostały
                całkowicie rozwiane. Ks. Hoffman nie tylko bowiem podtrzymał pracę zespołu, ale nadał
                jej intensywny rozwój, tak, że w krótkim czasie zmieniło się całkowicie oblicze chóru.
                Pierwszy występ z nowym dyrygentem odbył się w Wielkanoc 1955 r. "Chór śpiewał Terra
                tremuit Grubera, Surrexit Pastor bonus Chlondowskiego, Zmartwychwstał Pan Maklakiewicza
                i inne pieśni wielkanocne".
            </p><hr>
        </div>
        <div id="history-container__content-main-2">
            <p align="justify">
                Nowy dyrygent wprowadził szybko nowy styl pracy. Pierwszym tego przejawem były zeszyty
                głosowe prowadzone w porządku tematycznym, następnym, wprowadzenie prób osobnych dla
                każdego głosu. W takim systemie praca posuwała się szybko i można było przygotować
                wiele utworów w krótkim czasie. Występy w każdą niedzielę podczas mszy w katedrze
                wymagały bowiem szybkiego przygotowania dużego repertuaru pieśni. Każda Katedra jest
                Matką wszystkich kościołów diecezji, w niej odbywają się wszystkie większe
                uroczystości z udziałem Biskupa, Seminarium Duchownego i licznych rzesz wiernych.
                Stąd liturgia sprawowana w katedrze zawsze stawiała wszystkim posługującym jej, a
                szczególnie chórowi wielkie wymagania związane nie tylko z częstością występów, ale
                także z poziomem wykonywanych utworów. Tym wymaganiom starał się zawsze sprostać
                prowadzony przez ks. Hoffmana zespół. Świadectwem tego jest list Biskupa Ignacego
                Świrskiego napisany po uroczystości konsekracji Biskupa Wacława Skomoruchy: "Byłem
                głęboko wzruszony stwierdzając bardzo wysoki poziom muzyki i śpiewu, tak pod względem
                kompozycji jak i wykonania, dla wyrażenia siły, ogromu i majestatu tych wielkich
                tajemnic, jakie w danej chwili dokonywały się przy ołtarzu, za pośrednictwem
                Ks. Prymasa. Wiemy dobrze, że przy ołtarzu dokonywały się wielkie sprawy, odbywały
                się działania Ducha Świętego - tylko nikt tego wyrazić nie potrafił tak mocno, jak
                to uczynił Chór. I chór wyraził to po mistrzowsku, napełniając dusze modlących jakimś
                tajemniczym urokiem, wdziękiem, harmonią i odczuciem czegoś wielkiego, silnego, wprost
                druzgocącego, wobec czego człowiek się czuł małym, słabym, przerażonym, a jednocześnie
                na duchu podniesionym. Z prawdziwą radością i dumą zdawałem sobie sprawę, ze ks. Alfred
                i Chór Katedralny są chlubą nie tylko Katedry, lecz całej Diecezji Podlaskiej, i że inna
                diecezja takiego chóru nie posiada..."
            </p><hr>
        </div>
        <div id='history-container__content-part-1'>
            <p align="justify">
                W ciągu 40 lat działalności pod batutą ks. Hoffmana Chór wziął udział w kilkudziesięciu
                uroczystościach o zasięgu diecezjalnym, w katedrze i poza Siedlcami.
                Dyrygent jednak nie poprzestał tylko na występach podczas liturgii. Jego ambicją było,
                aby zarazić miłością do muzyki religijnej jak największą liczbę słuchaczy.
            </p><hr>
        </div>

        <div id='history-container__content-part-2'>
            <p align="justify">
                W tym celu rozpoczął organizowanie w Katedrze Siedleckiej koncertów muzyki religijnej.
                Pierwszy taki koncert odbył się 20 listopada 1955 i był to koncert ku czci św. Cecylii,
                patronki muzyki kościelnej. W pierwszej części koncertu wystąpił poprzednik ks.
                Hoffmana, Walenty Hakowski z recitalem organowym, w drugiej Chór Katedralny z
                repertuarem pieśni religijnych. Jak podaje kronika: "koncert ten wypadł lepiej niż
                dobrze". Od tego czasu Chór katedralny dawał corocznie kilka koncertów. Do tradycji
                wpisały się coroczny koncert kolęd oraz adoracja przy Grobie Pańskim, która była w
                istocie koncertem utworów pasyjnych. Chór przygotowywał także koncerty pieśni maryjnych
                w maju oraz koncert ku czci św. Cecylii w listopadzie. Przez okres prawie 40 lat pracy
                chóru odbyło się około stu takich koncertów.
            </p><hr>
        </div>

        <div id='history-container__content-part-3'>
            <p align="justify">
                Lata 60 - te i 70 - te XX wieku były okresem największego rozwoju zespołu. W tym czasie
                liczył on około 80 śpiewaków. Chór Katedralny miał swoich własnych solistów i
                akompaniatorów. Wiele osób rozpoczynających w tym czasie swoją przygodę muzyczną
                w chórze wybrało studia muzyczne, otwierające drogę do profesjonalizmu. Wśród nich
                są między innymi Alicja Borkowska - Molęda, śpiewaczka, solistka Opery w Dreźnie i
                Pradze, Barbara Jasińska - Sroka śpiewaczka Chóru Opery Narodowej i dyrygentka Chóru
                LO im A. Mickiewicza w Warszawie oraz nauczycielki przedmiotów muzycznych: Bernadeta
                Adamczyk, Alicja Kobacińska i Barbara Obroślak. Nic więc dziwnego, że zespół,
                składający się przede wszystkim z amatorów mógł sięgać w tym czasie po arcydzieła
                najwyższej klasy kompozytorów muzyki sakralnej.
            </p>
        </div>

        <div id='history-container_image-second' class="rounded mx-auto d-block" style="text-align: center;">
            <img id='history__image-second' src="/img/hoffman3.jpeg">
        </div>

        <div id='history-container__content-part-4'>
            <p align="justify">
                Przeżywającego swój rozkwit chóru nie omijały jednak trudności wynikające przede
                wszystkim z ciężkiej sytuacji politycznej kraju. Ciągła inwigilacja dyrygenta i
                chórzystów prowadzona przez służby specjalne komunistycznego państwa, utrudnianie
                uczestnictwa w uroczystościach kościelnych, a także represje ze strony władz
                komunistycznych były ceną, jaką ponosił zespół za swoją wierną służbę Kościołowi.
                Dopiero zmiana sytuacji politycznej pod koniec lat 80 - tych XX wieku przyniosła
                pełną wolność, także w działalności zespołu. Niestety, niedługo mógł się nacieszyć
                chór i dyrygent tą właśnie wolnością. 2 lipca 1994 r. ks. Alfred Hoffman został
                odwołany do wiecznej ojczyzny. Osierocony zespół nie poddał się jednak zwątpieniu.
                Dzięki wytrwałej pracy chórzystów prowadzonych przez uczennice ks. Hoffmana: Bernadetę
                Adamczyk, Bożenę Adamczyk i Barbarę Obroślak chór dalej śpiewał w katedrze, a dzieło
                ks. Hoffmana nie tylko nie umarło, ale przeprowadzone przez okres próby trwa i rozwija
                się nadal.
            </p>
        </div>
    </div>
</div>
</div>
</body>
<script>
    $(document).ready(function() {

        $('#history-container__content-main-1').addClass('animation');
        $('#history-container__content-main-1').css('display', 'inline-block');

        $('#history-container__content-main-2').addClass('animation');
        $('#history-container__content-main-2').css('display', 'inline-block');

        $(document).on('scroll', function(){
            var screenTop = $(document).scrollTop();

            if(screenTop > 200){
                $('#history-container__content-part-1').addClass('animation');
                $('#history-container__content-part-1').css('display', 'inline-block');
            }

            if(screenTop > 340){
                $('#history-container__content-part-2').addClass('animation');
                $('#history-container__content-part-2').css('display', 'inline-block');
            }

            if(screenTop > 390){
                $('#history-container__content-part-3').addClass('animation');
                $('#history-container__content-part-3').css('display', 'inline-block');
            }

            if(screenTop > 450){
                $('#history-container_image-second').addClass('animation');
                $('#history-container_image-second').css('display', 'inline-block');
            }

            if(screenTop > 490){
                $('#history-container__content-part-4').addClass('animation');
                $('#history-container__content-part-4').css('display', 'inline-block');
            }
        })

        $('#menu__chor').addClass('active');
        $('#menu__chor__history').addClass('active');
    });
</script>

<?php include(ROOT . '/views/headers/footer.php');
