<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>

    <style>

        img {
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
        }

        img:hover {
            transform: scale(1.1);
            transition: all 0.8s;
        }

    </style>

    <body class="main_body">
    <div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5"
         style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
        <div class="container-fluid row justify-content-center p-5">
            <h2 class="mb-5 text-center">Zarząd Chóru</h2>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">
                <table>
                    <tr>
                        <td class="text-center">
                            <img class="float-start" alt='Jerzy Myszkowski' title='Jerzy Myszkowski' id="jm"
                                 src="/img/portret1.jpg" width="180px" class="img" style="margin-right: 20px;">
                        </td>
                        <td class="text-center w-100">
                            <p class="text-white px-4 fs-4">Prezes Zarządu<br></p>
                            <p class="text-white px-4 fs-3">Jerzy Myszkowski</p>
                            <p class="text-white px-4 fs-6">Bas</p>

                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">

                <table>
                    <tr>
                        <td class="text-center">
                            <img class="float-start" alt='Martyna Jurzyk' title='Martyna Jurzyk' id="jm"
                                 src="/img/2.jpg" width="180px" class="img" style="margin-right: 20px;">
                        </td>
                        <td class="text-center w-100">
                            <p class="text-white px-4 fs-4">Zastępca Prezesa Zarządu<br></p>
                            <p class="text-white px-4 fs-3">Martyna Jurzyk</p>
                            <p class="text-white px-4 fs-6">Alt</p>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">

                <table>
                    <tr>
                        <td class="text-center">
                            <img class="float-start" alt='Michał Kiryluk' title='Michał Kiryluk' id="jm"
                                 src="/img/portret2.jpg" width="180px" class="img" style="margin-right: 20px;">
                        </td>
                        <td class="text-center w-100">
                            <p class="text-white px-4 fs-4">Sekretarz Zarządu<br></p>
                            <p class="text-white px-4 fs-3">Michał Kiryluk</p>
                            <p class="text-white px-4 fs-6">Tenor</p>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">

                <table>
                    <tr>
                        <td class="text-center">
                            <img class="float-start" alt='Maria Stańczuk' title='Maria Stańczuk' height="240px" id="jm"
                                 src="/img/maryla.jpg" width="180px" class="img"
                                 style="object-fit: cover; margin-right: 20px;">
                        </td>
                        <td class="text-center w-100">
                            <p class="text-white px-4 fs-4">Skarbnik Zarządu<br></p>
                            <p class="text-white px-4 fs-3">Maria Stańczuk</p>
                            <p class="text-white px-4 fs-6">Alt</p>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    </body>

    <script>
        $('#menu__zarzad').addClass('active');
    </script>

<?php include(ROOT . '/views/fragments/footer.php');
