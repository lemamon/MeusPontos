<?php
require_once '../bootstrap.php';

$usuario = $entityManager->find('Usuario', 'adenilton.barroso@yahoo.com.br');

if ($usuario) {
	echo "Localizado\n<br><br>";
    $output = "Nome: " . $usuario->getNome() . "\n<br>";
    $output .= "Email: " . $usuario->getEmail() . "\n<br>";
    $output .= "Hash da senha: " . $usuario->getSenha() . "\n<br>";
    $output .= "Data de Nasc: " . $usuario->getDatanasc()->format('d/m/Y') . "\n<br>";
    
    //ajuste de fuso horário
    date_default_timezone_set('America/Manaus');
    
    //calculo da idade
    $agora = date('Y-m-d');
    $hoje = DateTime::createFromFormat('Y-m-d', $agora);
    $birthday = $usuario->getDatanasc();
    $idade = date_diff($hoje, $birthday)->y;
    
    $output .= "Idade: " . $idade . "\n<br>";
    $output .= "Sexo: " . $usuario->getSexo() . "\n<br>";
    $output .= "Peso: " . $usuario->getPeso() . "\n<br>";
    $output .= "Altura: " . $usuario->getAltura() . "\n<br>";
    $output .= "IMC: " . number_format($usuario->getImc(),2)  . "\n<br>";
    echo $output;
} else {
	echo "Não encontrado\n<br>";
}
