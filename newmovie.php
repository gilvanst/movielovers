<?php
        require_once "templates/header.php"; 

    //VErifica se usuário está autenticado
    require_once "dao/userDAO.php";
    require_once "models/user.php";

    $user = new User();
    new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken();
?>

<?php require_once "templates/header.php"; ?>

    <div id="main-container" class="container-fluid">
        <div class="offset-md-4 col-md-4 new-movie-container">
            <h1 class="page-title">Adicionar Filme</h1>
            <p class="page-description">Adicione sua critíca e compartilhe</p>
            <form action="<?= $BASE_URL ?>/movie_process.php" id="add-movie-form" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="type" value="create">
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Digite o titulo">
                </div>
                
                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="length">Duração</label>
                    <input type="text" name="length" id="length" class="form-control" placeholder="Digite a duração do filme">
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Selecione</option>
                        <option value="Ação">Ação</option>
                        <option value="Animação">Animação</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Biografia">Biografia</option>
                        <option value="Comédia">Comédia</option>
                        <option value="Comédia Romântica">Comédia Romântica</option>
                        <option value="Crime">Crime</option>
                        <option value="Cult">Cult</option>
                        <option value="Documentário">Documentária</option>
                        <option value="Drama">Drama</option>
                        <option value="Espionagem">Espionagem</option>
                        <option value="Família">Família</option>
                        <option value="Fantasia">Fantasia</option>
                        <option value="Faroeste">Faroeste</option>
                        <option value="Ficção Científica">Ficção Científica</option>
                        <option value="Guerra">Guerra</option>
                        <option value="História">História</option>
                        <option value="Horror">Horror</option>
                        <option value="Musical">Musical</option>
                        <option value="Mistério">Mistério</option>
                        <option value="Religioso">Religioso</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Terror">Terror</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Western">Western</option>
                
                    </select>
                    
                </div>

                <div class="form-group">
                    <label for="Trailer">Trailer</label>
                    <input type="text" name="trailer" id="Trailer" class="form-control" placeholder="Insira o link do trailer">
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Descreva o filme...."></textarea>
                </div>

                <input type="submit" value="Adicionar filme" class="btn card-btn">
            </form>
        </div>
    </div>

<?php require_once "templates/footer.php"; ?>