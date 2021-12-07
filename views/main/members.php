<?php include_once(ROOT . '/views/headers/main_header.php'); ?>
<style>
    #member__szulik,
    #member__iza,
    #member__portret1,
    #member__portret2{
        display: flex;
        margin: 0 0 3% 0;
    }

    #flex-img-szulik,
    #flex-img-iza,
    #flex-img-portret1,
    #flex-img-portret2{
        flex-basis: 20%;
    }

    #flex-img-szulik > img,
    #flex-img-iza > img,
    #flex-img-portret1 > img,
    #flex-img-portret2 > img{
        border-radius: 10px;
    }

    #flex-p-szulik,
    #flex-p-iza,
    #flex-p-portret1,
    #flex-p-portret1{
        flex-basis: 80%;
    }

    #member__szulik > p,
    #member__iza > p,
    #member__portret1 > p,
    #member__portret2 > p{
        border: 1px solid red;
    }
</style>
<body class="main_body">
<div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
    <div class="container-fluid p-5">
        <div id="member__szulik">
            <div id="flex-img-szulik">
                <img alt='Szulik' title='Szulik' src="/img/portret3.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-szulik">
                <p>Text text text text</p>
            </div>
        </div>

        <div id="member__iza">
            <div id="flex-img-iza">
                <img alt='Iza' title='Iza' src="/img/iza.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-iza">
                <p>Text text text text</p>
            </div>
        </div>

        <div id="member__portret1">
            <div id="flex-img-portret1">
                <img alt='' title='Szulik' src="/img/portret1.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-portret1">
                <p>Text text text text</p>
            </div>
        </div>

        <div id="member__portret2">
            <div id="flex-img-portret2">
                <img alt='' title='Szulik' src="/img/portret2.jpg" width="180px" class = "img" style="margin-right: 20px;">
            </div>
            <div id="flex-p-portret2">
                <p>Text text text text</p>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('#menu__zarzad').addClass('active');
</script>
<?php include(ROOT . '/views/headers/footer.php');
