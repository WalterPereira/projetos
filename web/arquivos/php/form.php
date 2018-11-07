<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro</title>
        <meta charset="utf-8">
    </head>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <body>
        <div class="form">
            <form width="300px" method="post" action="../php/form.php">
                <fieldset>
                    <legend>Informaçoes Pessoais:</legend>
                    <div class="test">
                        <div class="labels">
                            <label> Nome Completo:</label>
                            <label> E-mail:</label>
                            <label> Data de Nascimento:</label>
                            <label> Login:</label>
                            <label> Senha:</label>
                            <label> Estado:</label>
                        </div>
                        <div class="inputs">
                            <input type="text" value="<?=$_POST["nome"]?>" disabled>

                            <input type="text" value="<?=$_POST["email"]?>" disabled>

                            <input type="text" name="dataNascimento" value="<?=$_POST["dataNascimento"]?>" disabled>

                            <input type="text" class="width-input" value="<?=$_POST["login"]?>"disabled>

                            <input type="password" class="width-input" value="<?=$_POST["senha"]?>"disabled>
                            <select name="estado" disabled>
                                <option value="minas" <?= $_POST["estado"] == "minas" ? "selected": ""; ?>  >Minas Gerais</option>
                                <option value="rio" <?= $_POST["estado"] == "rio" ? "selected": ""; ?> >Rio</option>
                                <option value="saopaulo" <?= $_POST["estado"] == "saopaulo" ? "selected": ""; ?> >São Paulo</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <label> Faixa etária: </label><br>
                    <input type="radio" name="faixaEtaria" value="menorIgual" <?= $_POST["faixaEtaria"] == "menorIgual" ? "checked": ""; ?> disabled>
                    <label>menor ou igual a 18 anos</label>
                    <br>
                    <input type="radio" name="faixaEtaria" value="maiorDeIdade">
                    <label>maior de 18 anos</label>
                </fieldset>
            </form>
        </div>
    </body>
</html>
