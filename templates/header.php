<?php

    require_once "globals.php";
    require_once "conexao.php";
    require_once "models/message.php";
    require_once "dao/userDAO.php";
    
    
    $message = new Message($BASE_URL);
    $flassMessage = $message->getMessage();

    if(!empty($flassMessage["msg"])) {
        //Limpar a mensagem
        $message->clearMessage();
    }

    $userDao = new UserDAO($conn, $BASE_URL);
    
    $userData = $userDao->verifyToken(false);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieLovers</title>
    <link rel="short icon" href="<?= $BASE_URL ?>/img/svg.svg" id="logo-svg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/style.css">
</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>" class="navbar-brand">
            <img src="<?= $BASE_URL?>/img/logo10.png" alt="MovieLovers" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <form action="<?= $BASE_URL?>/search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar filmes..." aria-label="search">
                <button class="btn my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <?php if($userData): ?>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>/newmovie.php" class="nav-link">
                            <i class="far fa-plus-square"></i> Incluir filme
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>/dashboard.php" class="nav-link">Meus filmes</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>/editprofile.php" class="nav-link">
                            <?= $userData->name ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>/logout.php" class="nav-link">Sair</a>
                    </li>
                    <?php else: ?> 

                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>/auth.php" class="nav-link">Entrar / Cadastrar</a>
                    </li>
                    
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <?php if(!empty($flassMessage["msg"])): ?>

        <div class="msg-container">
        <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
        </div>

    <?php endif; ?>
