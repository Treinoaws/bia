<?php
// Coleta IP e navegador
$ip = $_SERVER['REMOTE_ADDR'];
$agente = $_SERVER['HTTP_USER_AGENT'];
$dataHora = date("Y-m-d H:i:s");

// Coleta nome e email da URL (enviados pelo GoPhish)
$nome = $_GET['nome'] ?? 'N/A';
$email = $_GET['email'] ?? 'N/A';

// Arquivo CSV
$arquivo = 'registros.csv';
$existe = file_exists($arquivo);

// Abre o CSV
$fp = fopen($arquivo, 'a');

// Cabeçalho, se ainda não existir
if (!$existe) {
    fputcsv($fp, ['Data/Hora', 'IP', 'Navegador', 'Nome', 'Email']);
}

// Grava os dados
fputcsv($fp, [$dataHora, $ip, $agente, $nome, $email]);

fclose($fp);

// Redireciona para a página final (a de aviso)
header("Location: https://mng.record.com.br/aviso.html"); // ajuste o endereço final aqui
exit;
?>
