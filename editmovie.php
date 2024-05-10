<?php

    require_once "templates/header.php"; 

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

    //Checar se imagem vazia

    if($movie->image == "" ) {

        $movie->image = "movie_cover.jpg";
    }
?>

<div class="container-fluid" id="main-container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 offset-md-1">
                <h1 id="color-title"><?= $movie->title ?></h1>
                <p class="page-description">Altere os dados do filme cadastrado</p>
                <form action="<?= $BASE_URL ?>/movie_process.php" id="edit-movie-form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $movie->id ?>">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Digite o titulo" value="<?= $movie->title ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                    </div>

                    <div class="form-group">
                        <label for="length">Duração</label>
                        <input type="text" name="length" id="length" class="form-control" placeholder="Digite a duração do filme" value="<?= $movie->length ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Selecione</option>
                            <option value="Ação" <?= $movie->category === "Ação" ? "selected" : "" ?> >Ação</option>
                            <option value="Animação" <?= $movie->category === "Animação" ? "selected" : "" ?> >Animação</option>
                            <option value="Aventura" <?= $movie->category === "Aventura" ? "selected" : "" ?>>Aventura</option>
                            <option value="Biografia" <?= $movie->category === "Biografia" ? "selected" : "" ?>>Biografia</option>
                            <option value="Comédia" <?= $movie->category === "Comédia" ? "selected" : "" ?>>Comédia</option>
                            <option value="Comédia Romântica" <?= $movie->category === "Comédia Romântica" ? "selected" : "" ?>>Comédia Romântica</option>
                            <option value="Crime" <?= $movie->category === "Crime" ? "selected" : "" ?>>Crime</option>
                            <option value="Cult" <?= $movie->category === "Cult" ? "selected" : "" ?>>Cult</option>
                            <option value="Documentário" <?= $movie->category === "Documentário" ? "selected" : "" ?>>Documentário</option>
                            <option value="Drama" <?= $movie->category === "Drama" ? "selected" : "" ?>>Drama</option>
                            <option value="Espionagem" <?= $movie->category === "Espionagem" ? "selected" : "" ?>>Espionagem</option>
                            <option value="Família" <?= $movie->category === "Família" ? "selected" : "" ?>>Família</option>
                            <option value="Fantasia" <?= $movie->category === "Fantasia" ? "selected" : "" ?>>Fantasia</option>
                            <option value="Faroeste" <?= $movie->category === "Faroeste" ? "selected" : "" ?>>Faroeste</option>
                            <option value="Ficção Científica" <?= $movie->category === "Ficção Ciêntífica" ? "selected" : "" ?>>Ficção Científica</option>
                            <option value="Guerra" <?= $movie->category === "Guerra" ? "selected" : "" ?>>Guerra</option>
                            <option value="História" <?= $movie->category === "História" ? "selected" : "" ?>>História</option>
                            <option value="Horror" <?= $movie->category === "Horror" ? "selected" : "" ?>>Horror</option>
                            <option value="Musical" <?= $movie->category === "Musical" ? "selected" : "" ?>>Musical</option>
                            <option value="Mistério" <?= $movie->category === "Mistério" ? "selected" : "" ?>>Mistério</option>
                            <option value="Religioso" <?= $movie->category === "Religioso" ? "selected" : "" ?>>Religioso</option>
                            <option value="Suspense" <?= $movie->category === "Suspense" ? "selected" : "" ?>>Suspense</option>
                            <option value="Terror" <?= $movie->category === "Terror" ? "selected" : "" ?>>Terror</option>
                            <option value="Thriller" <?= $movie->category === "Thriller" ? "selected" : "" ?>>Thriller</option>
                            <option value="Western" <?= $movie->category === "Western" ? "selected" : "" ?>>Western</option>
                    
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="Trailer">Trailer</label>
                        <input type="text" name="trailer" id="Trailer" class="form-control" placeholder="Insira o link do trailer" value="<?= $movie->trailer ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Descreva o filme...."><?= $movie->description ?></textarea>
                    </div>

                    <input type="submit" value="Editar filme" class="btn card-btn">
                </form>
            </div>
            <div class="col-md-3 offset-large">
                <div class="movie-image-container" style="background-image: url('<?= $BASE_URL ?>/img/movies/<?= $movie->image ?>')">

                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once "templates/footer.php"; ?>