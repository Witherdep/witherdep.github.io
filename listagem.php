<?php require_once("conexao.php"); ?>

<?php

    setlocale(LC_ALL, 'pt_BR');
    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produtos .= "FROM produtos ";
    if (isset($_GET["produto"])) {
        $nome_produto =$_GET["produto"];
        $produtos .= "WHERE nomeproduto LIKE '%$nome_produto%'";
    }
    $resultado = mysqli_query($conecta, $produtos);
    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Integração com MySQL</title>
        
        <link href="CSS/estilo.css" rel="stylesheet">
        <link href="CSS/produtos.css" rel="stylesheet">
        <link href="CSS/produto_pesquisa2.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("recursos/topo.php"); ?>
        <?php include_once("recursos/funcoes.php"); ?>  
              
        <main>  
            <div id="janela_pesquisa">
                <form action="listagem.php" method="get">
                    <input type="text" name="produto" placeholder="Nome do protudo">
                    <input type="image" name="pesquisa" src="images/botaobusca.png" height="35px" style="padding-left: 5px;">
                </form>
            </div>
            
           <div id="listagem_produtos"> 
            <?php
                while($linha = mysqli_fetch_assoc($resultado)) {
            ?>
                <ul>
                    <a style="text-decoration: none; color:#13ffad" href="detalhe.php?codigo=<?php echo $linha["produtoID"] ?> ">
                    <li class="imagem">
                        <img src="<?php echo  $linha["imagempequena"] ?>"></li>
                        
                    <li><h3><?php echo $linha["nomeproduto"] ?></h3></li>
                    </a>
                    <li>Código: <?php echo $linha["produtoID"] ?><bold></li>
                    <li>Tempo de Entrega : <?php echo $linha["tempoentrega"] ?></li>
                    <li>Preço unitário : <?php echo real_format($linha["precounitario"]) ?></li>
                </ul>
             <?php
                }
            ?>           
            </div>
            
        </main>

        <?php include_once("recursos/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>