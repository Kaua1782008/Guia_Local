<?php

use app\CSVConverter;

require __DIR__ .'/Converter.php';

$comercios = [];

$fileContent = file('comercio.csv');

if (count($fileContent) == 0) {
    exit('Arquivo vazio');
}


if (empty(trim($fileContent[0]))) {
    exit('Primeira Linha Vazia');
}

foreach($fileContent as $content) {
    $linha = explode(';', $content);
    $comercios[] = new CSVConverter(
        telefone:$linha[1], 
        nome:$linha[0],
        categoria:$linha[4], 
        endereco:$linha[2], 
        link:$linha[3], 
        horario:$linha[5]
    );
}

?>
        <?php
        function slug($txt){
        $txt = trim((string)$txt);
        $txt = mb_strtolower($txt, 'UTF-8');

        $map = [
            'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
            'é'=>'e','ê'=>'e','è'=>'e','ë'=>'e',
            'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
            'ó'=>'o','ò'=>'o','õ'=>'o','ô'=>'o','ö'=>'o',
            'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
            'ç'=>'c'
        ];
        $txt = strtr($txt, $map);

        $txt = preg_replace('/[^a-z0-9]+/', '-', $txt);

        return trim($txt, '-');
        }

        ?>

        

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guia Local - Novo Cruzeiro</title>
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8" />
</head>


<body>

    <div class="topo">
        <div class="Titulo">
            <h1>Guia Local - Novo Cruzeiro</h1>
        </div>
        <div class="subTitulo">
            <p>Comércios da Cidade</p>
        </div>
    </div>

    <div class="centroTela">

        <div class="elementoSuperior">
            
            <div class="pesquisa">
                <input type="text" placeholder="Pesquisar">
                <h2>Categorias</h2>
                <div class="categorias">
                    <a href="#" data-filtro="todos">Todos</a>
                    <a href="#" data-filtro="restaurante">Restaurante</a>
                    <a href="#" data-filtro="farmacia">Farmácia</a>
                    <a href="#" data-filtro="loja">Loja</a>
                    <a href="#" data-filtro="servico">Serviço</a>
                    <a href="#" data-filtro="supermercado">Supermercado</a>
                    <a>...</a>
                </div><!--Categorias-->
            </div><!--Pesquisa-->
        
        
        </div><!--Elemento Superior-->

        <div class="comercios-single">

        <?php

        foreach ($comercios as $key => $data) {
            
            if($key != 0) {
                ?>
                <div class="comercio <?= slug($data->categoria) ?>">
                    <h1>
                        <?php echo $data->nome; ?>
                    </h1>
                    <hr>
                    <a>
                        <?php echo ucfirst($data->categoria); ?>
                    </a>
                    <p>
                        <?php echo $data->endereco; ?>
                    </p>
                    <p>
                        <?php echo $data->telefone; ?>
                    </p>
                    <a href="<?php echo $data->link; ?>" target="_blank" class="botao-comercio">Acesse</a>
                    <p>
                        <?php echo $data->horario; ?>
                    </p>
                </div><!--comercio-->

            <?php
            }            
        }
    ?>

         
                    
            </div>

        </div><!--centroTela-->
    </div><!--topo-->

    <div class="footer">

		<p>@2026 Guia Local - Novo Cruzeiro. Todos os direitos reservados</p>

	</div><!--footer-->

<script src="app.js"></script>

</body>
</html>