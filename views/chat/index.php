<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

    <style>

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 500px;
            min-height: 400px;
            overflow-y: scroll;
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }
        .py-3 {
            padding-top: 1rem!important;
            padding-bottom: 1rem!important;
        }
        .px-4 {
            padding-right: 1.5rem!important;
            padding-left: 1.5rem!important;
        }
        .flex-grow-0 {
            flex-grow: 0!important;
        }
        .border-top {
            border-top: 1px solid #dee2e6!important;
        }

    </style>

	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">

                <main class="content">
                    <div class="container p-0">
                        <h1 class="text-center mb-5"><strong>Czat chóru</strong></h1>

                        <div class="card">
                            <div class="col-12">
                                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                        <div class="d-flex align-items-center py-1">
                                            <div class="flex-grow-1 pl-3">
                                                <strong>Czat chóru (beta version)</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="position-relative">
                                        <div id="chat" class="chat-messages p-4 align-bottom">

                                            <?php
                                                $lastId = 0;
                                            foreach ($messages as $message): ?>

                                                <?php

                                                    if($message['id_account'] == $_SESSION['user']){
                                                        $position = 'chat-message-right';
                                                        $author = $message['name'] . " " . $message['surname']. " (Ty)";
                                                    }

                                                    else{
                                                        $position = 'chat-message-left';
                                                        $author = $message['name'] . " " . $message['surname'];
                                                    }

                                                    $lastId = $message['id'];

                                                    $color = ComFun::rootColor($message['ac_type']);

                                                ?>

                                                <div class="<?php echo $position; ?> pb-3">
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                        <div class="font-weight-bold mb-1" style="color: <?php echo $color; ?>"><?php echo $author ?></div>
                                                        <?php echo $message['message']; ?>
                                                        <div class="text-muted small text-nowrap mt-2"><?php echo $message['datetime']; ?></div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>

                                        </div>
                                    </div>

                                    <div class="flex-grow-0 py-3 px-4 border-top">


<!--                                        <form action="#" method="post">-->
<!--                                            <div class="input-group">-->
<!--                                                <input type="number" id="id_ac" hidden name="id_account" value="--><?php //echo $_SESSION['user']; ?><!--">-->
<!--                                                <input type="text" class="form-control" id="mess" name="message" value="" placeholder="Napisz wiadomość">-->
<!--                                                <input type="text" id="lastId" hidden value="--><?php //echo $lastId; ?><!--">-->
<!--                                                <input type="submit" class="btn btn-outline-dark" name="submit" value="Wyślij">-->
<!--                                            </div>-->
<!--                                        </form>-->

                                        <button id="ok">Click</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
		</div>
	</div>
    <script>

            window.onload = () => {

                document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight;

                $( "#ok" ).click(function() {

                    let lastId = document.querySelector('#lastId');

                    $.ajax({
                        method: "POST",
                        url: "chat/getNewMessages",
                        data: {lastId: lastId}
                    })
                        .done(function (data) {
                                alert(data);
                            }
                        )

                });

            }



    </script>


<?php include(ROOT . '/views/fragments/footer.php');
