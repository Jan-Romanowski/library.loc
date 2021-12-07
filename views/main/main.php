<?php include_once(ROOT . '/views/headers/main_header.php'); ?>
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

        /* #main__main-container{
            animation: changeBg 4s linear 4s infinite alternate;
        }
        @keyframes changeBg{
        0%   {
            background: linear-gradient(rgba(0, 0, 0, 0.55),rgba(0, 0, 0, 0.55)), url('/images/Chor/6.jpg');
        }
        100% {background: linear-gradient(rgba(0, 0, 0, 0.55),rgba(0, 0, 0, 0.55)), url('/images/Chor/10.jpg');}
        } */
    </style>
    <body id='main__main-container' class="main_body">
    <h1 class="main-template-body-center-text" style="padding-top: 55vh">
        Chór Katedralny im. Ks. Alfreda Hoffmana <br>w Siedlcach
    </h1>
    </body>
    <script>
        $(document).ready(function() {
            let x;
            let image;

            function changecolors() {
                x = 1;
                setInterval(change, 4000);
            }

            function change() {
                if (x === 1) {
                    $('#main__main-container').css("background", "linear-gradient(rgba(0, 0, 0, 0.55),rgba(0, 0, 0, 0.55)), url('/images/Chor/6.jpg')");
                    x = 2;
                } else {
                    $('#main__main-container').css("background", "linear-gradient(rgba(0, 0, 0, 0.55),rgba(0, 0, 0, 0.55)), url('/images/Chor/10.jpg')");
                    x = 1;
                }
            }

            changecolors()
        });
    </script>
<?php

//include(ROOT . '/views/headers/footer.php');
