<?php
        require_once "templates/header.php"; 

    //VErifica se usuário está autenticado
    require_once "dao/userDAO.php";
    require_once "dao/movieDAO.php";
    require_once "models/user.php";

    $user = new User();
    
    new UserDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);

    $movieDao = new MovieDAO($conn, $BASE_URL);

    $id = filter_input(INPUT_GET, "id");
    
    if(empty($id)) {

        $message->setMessage("O filme não foi encontrado", "error","/index.php");
        
    }else {

        $movie = $movieDao->findById($id);

        //verifica se o filme existe
        
        if(!$movie) {
            
            $message->setMessage("O filme não foi encontrado", "error","/index.php");
            
        }
    }
?>

<div class="container-fluir" id="main-container">

</div>

<?php require_once "templates/footer.php"; ?>