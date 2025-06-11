<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link rel="stylesheet" href="style.css">
    <link id="tema-estilo" rel="stylesheet" href="tema-branco.css">
    <style>
        /* Botões de acessibilidade */
        .botoes-acessibilidade {
            position: fixed;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }
        .botoes-acessibilidade button {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }
        .botoes-acessibilidade button:hover {
            opacity: 0.8;
        }
    </style>
    <meta charset="UTF-8">
    <h1 class="titulo-galeria">Relatorio de Contato</h1>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .contato {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 15px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .contato p {
            margin: 5px 0;
            color: #444;
        }
        .contato strong {
            color: #000;
        }
    </style>
</head>
<body>
<div class="botoes-acessibilidade">
        <button onclick="mudarTema('tema-branco.css')" style="background: #fff; color: #000;">Modo Claro</button>
        <button onclick="mudarTema('tema-escuro.css')" style="background: #222; color: #fff;">Modo Escuro</button>
        <button onclick="mudarTema('tema-leitura.css')" style="background: #ffeb3b; color: #000;">Modo Leitura</button>
    </div>

    <nav class="menu">
        <ul>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="contato.html">Contato</a></li>
                <li><a href="relatorio.php">Relatório</a></li>
            </ul>
        </ul>
    </nav>
<?php
include "conexao.php";

$resultado = mysqli_query($conexao, "SELECT * FROM informacoes");
$linhas = mysqli_num_rows($resultado);
?>
<?php
for ($i = 0; $i < $linhas; $i++) {
    $reg = mysqli_fetch_row($resultado);
    echo "<div class='contato'>";
    echo "<p><strong>Nome:</strong> $reg[0]</p>";
    echo "<p><strong>Email:</strong> $reg[1]</p>";
    echo "<p><strong>Telefone:</strong> $reg[2]</p>";
    echo "<p><strong>Cidade:</strong> $reg[3]</p>";
    echo "<p><strong>Estado:</strong> $reg[4]</p>";
    echo "<p><strong>Data de Nascimento:</strong> $reg[5]</p>";
    echo "<p><strong>Escolaridade:</strong> $reg[6]</p>";
    echo "<p><strong>Comentários:</strong> $reg[7]</p>";
    echo "</div>";
}
?>
    <script>
        function mudarTema(tema) {
            document.getElementById("tema-estilo").href = tema;
            localStorage.setItem("tema-selecionado", tema);
        }

        // Manter o tema escolhido após recarregar a página
        window.onload = function() {
            const temaSalvo = localStorage.getItem("tema-selecionado");
            if (temaSalvo) {
                document.getElementById("tema-estilo").href = temaSalvo;
            }
        };
</script>

<script src="https://unpkg.com/imask"></script>
<script>
    // Aplicar máscara no campo de telefone
    const telefoneInput = document.getElementById('telefone');
    const telefoneMask = IMask(telefoneInput, {
        mask: '(00) 0 0000-0000'
    });
</script>

<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>
</html>
