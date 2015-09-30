<?php
require_once '../bootstrap.php';
require_once '../srcloader.php';

use Util;

date_default_timezone_set('America/Manaus');

$usuario = new Usuario;

$usuario->setEmail('adenilton.barroso@yahoo.com.br');
$usuario->setSenha('C4p031r4L0k4');
$usuario->setNome('Adenilton Barroso');

$birthday = DateTime::createFromFormat('Y-m-d', '1980-01-03');
$usuario->setDatanasc($birthday);
$usuario->setSexo('MASCULINO');
$usuario->setAltura(1.75);
$usuario->setPeso(131);
$peso = $usuario->getPeso();
$altura = $usuario->getAltura();
$imc = $peso / ($altura * $altura);
$usuario->setImc($imc);
$agora = date('Y-m-d');
$hoje = DateTime::createFromFormat('Y-m-d', $agora);
$sexo = $usuario->getSexo();
$idade = date_diff($hoje, $birthday)->y;
switch ($sexo) {
    case 'MASCULINO':
        if($idade <= 50){
            if ($peso <= 70) {
                $usuario->setLimpontos(400);
            } elseif ($peso > 70 and $peso <= 80) {
                $usuario->setLimpontos(425);
            } elseif ($peso > 80 and $peso <= 90) {
                $usuario->setLimpontos(450);
            } elseif ($peso > 90 and $peso <= 100) {
                $usuario->setLimpontos(475);
            } elseif ($peso > 100 and $peso <= 110) {
                $usuario->setLimpontos(500);
            } elseif ($peso > 110 and $peso <= 120) {
                $usuario->setLimpontos(525);
            } else {
                $usuario->setLimpontos(550);
            }
        } else {
            if ($peso <= 70) {
                $usuario->setLimpontos(380);
            } elseif ($peso > 70 and $peso <= 80) {
                $usuario->setLimpontos(405);
            } elseif ($peso > 80 and $peso <= 90) {
                $usuario->setLimpontos(430);
            } elseif ($peso > 90 and $peso <= 100) {
                $usuario->setLimpontos(455);
            } elseif ($peso > 100 and $peso <= 110) {
                $usuario->setLimpontos(480);
            } elseif ($peso > 110 and $peso <= 120) {
                $usuario->setLimpontos(505);
            } else {
                $usuario->setLimpontos(530);
            }
        }
        break;
    
    case 'FEMININO':
        if($idade <= 50){
            if ($peso <= 60) {
                $usuario->setLimpontos(300);
            } elseif ($peso > 60 and $peso <= 70) {
                $usuario->setLimpontos(325);
            } elseif ($peso > 70 and $peso <= 80) {
                $usuario->setLimpontos(350);
            } elseif ($peso > 80 and $peso <= 90) {
                $usuario->setLimpontos(375);
            } elseif ($peso > 100 and $peso <= 110) {
                $usuario->setLimpontos(400);
            } elseif ($peso > 110 and $peso <= 120) {
                $usuario->setLimpontos(425);
            } else {
                $usuario->setLimpontos(450);
            }
        } else {
            if ($peso <= 60) {
                $usuario->setLimpontos(280);
            } elseif ($peso > 60 and $peso <= 70) {
                $usuario->setLimpontos(305);
            } elseif ($peso > 70 and $peso <= 80) {
                $usuario->setLimpontos(330);
            } elseif ($peso > 80 and $peso <= 90) {
                $usuario->setLimpontos(355);
            } elseif ($peso > 100 and $peso <= 110) {
                $usuario->setLimpontos(380);
            } elseif ($peso > 110 and $peso <= 120) {
                $usuario->setLimpontos(405);
            } else {
                $usuario->setLimpontos(430);
            }
        }
        break;
}

print_r($usuario);

$entityManager->persist($usuario);
$entityManager->flush();