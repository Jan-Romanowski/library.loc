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
                Galeria
            </h1>
            <div class="row justify-content-center text-light">
                <div class="card col-4 m-4 bg-dark pt-3" style="width: 18rem;">
                    <a href="/main/concerts/">
                        <img src="/img/koncert.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title">Koncerty</h5>
                    </div>
                </div>

                <div class="card col-4 m-4 bg-dark pt-3" style="width: 18rem;">
                    <a href="/main/wyjazdy/">
                        <img src="/img/wyhazd.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title">Wyjazdy</h5>
                    </div>
                </div>

            </div>

		</div>
	</div>
	</body>
    <script>
        $('#menu__chor').addClass('active');
    </script>
<?php include(ROOT . '/views/fragments/footer.php');