<?php 

$db = new PDO('sqlite:' . __DIR__ . '/estabelecimentos.db');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Filtro por tipo
$tipoFiltro = $_GET['tipo'] ?? '';

// var_dump(new PDO('sqlite:' . __DIR__ . '/estabelecimentos.db'));

$tipos = ['Farmácia', 'Supermercado','Postos','Alimentação',
'Saúde','Serviços','Compras', 'Educação','Beleza e Bem-estar','Casa e Construção','Lazer e Turismo'];

if ($tipoFiltro && in_array($tipoFiltro, $tipos)) {
    $stmt = $db->prepare("SELECT * FROM estabelecimentos WHERE tipo = :tipo ORDER BY nome");
    $stmt->execute([':tipo' => $tipoFiltro]);
    $estabelecimentos = $stmt->fetchAll();
} else {
    $estabelecimentos = $db->query("SELECT * FROM estabelecimentos ORDER BY tipo, nome")->fetchAll();
}

?>

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

        
<!--<?php var_dump($estabelecimentos); ?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guia Local - Novo Cruzeiro</title>
		<link href="css/style.css?v=<?php echo rand();?>" type="text/css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8" />
</head>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("pesquisa");
    const cards = document.querySelectorAll(".card");

    input.addEventListener("input", function () {
        const termo = input.value.toLowerCase();

        cards.forEach(card => {
            const textoCard = card.innerText.toLowerCase();

            if (textoCard.includes(termo)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
});
</script>

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
                <input type="text" id="pesquisa" placeholder="Pesquisar">
                <h2>Categorias</h2>             
                <nav class="filtros categorias">
                        <a href="?" <?php echo !$tipoFiltro ? 'class="ativo"' : '' ?>>Todos</a>
                        <?php foreach ($tipos as $tipo): ?>
                            <a href="?tipo=<?php echo urlencode($tipo); ?>" <?php echo $tipoFiltro === $tipo ? 'class="ativo"' : ''; ?>>
                                <?php echo $tipo; ?>
                            </a>
                    <?php endforeach ?>
                </nav>
            </div><!--Pesquisa-->
        
        
        </div><!--Elemento Superior-->

        <div class="comercios-single">

        <?php if (empty($estabelecimentos)): ?>
        <p class="vazio">Nenhum estabelecimento encontrado.</p>
            <?php else: ?>
                <?php foreach ($estabelecimentos as $estabelecimento): ?>
                    
                    <div class="card">
                        
                    <div class="card-header">
                            <h2><?php echo $estabelecimento['nome']; ?></h2>
                        </div>
                        <hr>
                        
                        <span class="badge"><?php echo $estabelecimento['tipo']; ?></span>
                        
                        <p class="info"><?php echo $estabelecimento['endereco']; ?></p>
                        
                        <?php if ($estabelecimento['telefone']): ?>
                            <p class="info"><?php echo $estabelecimento['telefone']; ?></p>
                        <?php endif ?>
                        
                        <?php if ($estabelecimento['horario']): ?>
                            <p class="info"><?php echo $estabelecimento['horario']; ?></p>
                        <?php endif ?>
                        
                        <?php if ($estabelecimento['link']): ?>
                            <a href="<?php echo $estabelecimento['link']; ?>" target="_blank" class="botao-comercio">Acesse</a>
                        <?php endif ?>
                   
                    </div>
                <?php endforeach ?>
            <?php endif ?>

         
                    
            </div>

        </div><!--centroTela-->
    </div><!--topo-->

<!--<script src="app.js"></script>-->

</body>
        <footer class="footer">
		<p>@2026 Guia Local - Novo Cruzeiro. Todos os direitos reservados</p>
        </footer>
</html>