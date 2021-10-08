<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;bdname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
            <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
            <table class="table">
                <tr>
                    <td>Id</th>
                    <td>Nome</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach($generos as $g): ?>
                    <tr>
                        <td><?= $g['id'] ?></td>
                        <td><?= $g['nome'] ?></td>
                        <td>
                            <a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
                    </tr>
                <?php endforeach ?>
            </table>
        </main>
    </body>
</html>