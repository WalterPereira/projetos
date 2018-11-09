<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro</title>
        <meta charset="utf-8">
    </head>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <body>
    <?php
        $cpf = validaCPF($_POST["cpf"]);
        function validaCPF($cpf) {

            if(empty($cpf)) {
                return false;
            }

            // Elimina possivel mascara
            $cpf = preg_replace("/[^0-9]/", "", $cpf);
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

            // Verifica se o numero de digitos informados é igual a 11
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se nenhuma das sequências invalidas abaixo
            // foi digitada. Caso afirmativo, retorna falso
            else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
                return false;
             // Calcula os digitos verificadores para verificar se o
             // CPF é válido
             } else {

                for ($t = 9; $t < 11; $t++) {

                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                        return false;
                    }
                }

                return true;
            }
        }
    ?>
    <?php
        $email = validaEmail($_POST["email"]);

        function validaEmail($email) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
                return true;
            else
                return false;
        }
    ?>
        <div class="form">
            <form width="300px" method="post" action="../php/form.php">
                <fieldset>
                    <legend>Informaçoes Pessoais:</legend>
                    <div class="test">
                        <div class="labels">
                            <label> Nome Completo:</label>
                            <label> E-mail:</label>
                            <label> CPF: </label>
                            <label> Data de Nascimento:</label>
                            <label> Login:</label>
                            <label> Senha:</label>
                            <label> Estado:</label>
                        </div>
                        <div class="inputs">
                            <input type="text" value="<?=$_POST["nome"]?>" disabled>

                            <input type="text" value="<?=$_POST["email"]?>" <?=!$email ? "class='error'" : '' ?> disabled>
                            <?php
                                if(!$email)
                                    echo "<p class='cpfInvalido'>Email Invalido </p>";
                            ?>
                            <input type="text" value="<?=$_POST["cpf"]?> " <?=!$cpf ? "class='error'" : '' ?> disabled>
                            <?php
                                if(!$cpf)
                                    echo "<p class='cpfInvalido'>CPF Invalido </p>";
                            ?>
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
                    <input type="radio" name="faixaEtaria" <?= $_POST["faixaEtaria"] == "menorIgual" ? "checked": ""; ?> disabled>
                    <label>menor ou igual a 18 anos</label>
                    <br>
                    <input type="radio" name="faixaEtaria" <?= $_POST["faixaEtaria"] == "maiorDeIdade" ? "checked": ""; ?> disabled>
                    <label>maior de 18 anos</label>
                </fieldset>
            </form>
        </div>
    </body>
</html>
