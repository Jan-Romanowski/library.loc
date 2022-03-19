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
			Wyjazdy
		</h1>
		<?php
		$i=1;
		foreach ($files as $filesItem):
			?>
			<div class="container col-sm-12 col-md-12 col-lg-6 mb-4">
				<?php ComFun::crutch_for_all($filesItem['file'], $i, $filesItem['filename'], 'trips'); ?>
			</div>
			<?php
			$i++;
		endforeach;
		?>
	</div>
</div>

<script>
    $('#menu__chor').addClass('active');
</script>

<?php include(ROOT . '/views/fragments/footer.php');