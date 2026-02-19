<?php

use app\CSVConverter;

require __DIR__ .'/Converter.php';

$comercios = [];

$fileContent = file('comercio.csv');

if (count($fileContent) == 0) {
    exit('Arquivo vazio');
}

foreach($fileContent as $content) {
    $linha = explode(';', $content);
    $comercios[] = new CSVConverter(
        nome:$linha[0],
        categoria:$linha[4], 
        telefone:$linha[1], 
        endereco:$linha[2], 
        link:$linha[3], 
        horario:$linha[5]
    );
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
            <p>Comércos da Cidade</p>
        </div>
    </div>

    <div class="centroTela">

        <div class="elementoSuperior">
            
            <div class="pesquisa">
                <input type="text" placeholder="Pesquisar">
                <h2>Categorias</h2>
                <div class="categorias">
                    <a href="?filtro=all">Todos</a>
                    <a>Restaurantes</a>
                    <a>Farmácias</a>
                    <a>Lojas</a>
                    <a>Serviços</a>
                    <a>Supermercados</a>
                </div><!--Categorias-->
            </div><!--Pesquisa-->
        
        </div><!--Elemento Superior-->

        <div class="comercios-single">

            <div class="comercio restaurante">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                <div class="comercio restaurante">
                <img src="../images/Restaurante.png">
                <h1>O Pastelão</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                <div class="comercio farmacia">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
            <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
                        <div class="comercio">
                <img src="../images/Restaurante.png">
                <h1>Restaurante Sabor Mineiro</h1>
                <hr>
                <a>Restaurante</a>
                <p>Rua principal, 123 - Centro</p>
                <p>(33) 3341-1234</p>
                <p>Seg-Sáb: 11h-15h</p>
            </div><!--comercio-->
            

        </div>

        </div><!--centroTela-->
    </div><!--topo-->

    <div class="footer">

		<p>@2026 Guia Local - Novo Cruzeiro. Todos os direitos reservados</p>

	</div><!--footer-->

<script src="app.js"></script>

</body>
</html>