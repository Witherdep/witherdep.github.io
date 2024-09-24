<?php require_once("conexao.php");?>

<?php
    if(isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = "SELECT * ";
        $login .= " FROM clientes ";
        $login .= " WHERE usuario = '{$usuario}' and senha ='{$senha}' ";
        $acesso = mysqli_query($conecta,$login);

        if(!$acesso){
            die("Falha na consulta ao banco de dados");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        if( empty($informacao) ){
            $mensagem = "Login sem sucesso";
        }else{
            header("Location:listagem.php");
        }
    }
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/login3.css">
    </head>
    <body>
        <?php include_once("recursos/topo.php");?>
        <?php include_once("recursos/funcoes.php");?>
        <main>
            <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>TELA DE LOGIN</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="login">

                    <?php
                    if(isset($mensagem)){
                    ?>
                    <p><?php echo $mensagem ?></p>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </main>
        <?php include_once("recursos/rodape.php");?>
    </body>
</html>
<?php mysqli_close($conecta);?>