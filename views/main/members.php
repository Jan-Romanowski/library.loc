<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>

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

<body class="main_body">
<div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
    <div class="container-fluid row justify-content-center p-5">
        <h2 class="mb-5 text-center">Zarząd Chóru</h2>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">

            <div id="flex-img-szulik">
                <img class="float-start" alt='Jerzy Myszkowski' title='Jerzy Myszkowski' id="jm" src="/img/portret1.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-szulik" class="m-2">
                <p>Jerzy Myszkowski - Prezes zarządu</p>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">
            <div id="flex-img-iza">
                <img class="float-start" alt='Martyna Jurzyk' title='Martyna Jurzyk' src="/img/2.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-iza" class="m-2">
                <p>Martyna Jurzyk - Zastępca Prezesa Zarządu</p>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">
            <div id="flex-img-portret1">
                <img class="float-start" alt='Michał Kiryluk' title='Michał Kiryluk' src="/img/portret2.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-portret1" class="m-2">
                <p>Michał Kiryluk - Sekretarz Zarządu</p>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">
            <div id="flex-img-portret2">
                <img class="float-start" alt='' title='Szulik' src="/img/maryla.jpg" width="180px" height="240px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-portret2" class="m-2">
                <p>Maryla Stańczyk - Skarbnik Zarządu</p>
            </div>
        </div>
    </div>
</div>
</body>

<?php include(ROOT . '/views/fragments/footer.php');
