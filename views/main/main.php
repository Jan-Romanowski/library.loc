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
    <body id='main__main-container' class="main_body">
    <h1 class="main-template-body-center-text" style="padding-top: 55vh; min-height: 100vh;">
        Chór Katedralny im. Ks. Alfreda Hoffmana <br>w Siedlcach
    </h1>
    </body>
<?php

include(ROOT . '/views/fragments/footer.php');
