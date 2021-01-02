<?php
//my connection for the phpmyadmin le db name a modif pour new projet
$pdo = new PDO('mysql:host=localhost;dbname=chocolate', 'root', '');

$pdo->exec('SET NAMES UTF8');