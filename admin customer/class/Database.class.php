<?php

class Database
{

	private $pdo;

	public function __construct() {
	    //création de la propriété pdo qui appel l'objet pdo
	    $this->pdo = new PDO('mysql:host=localhost;dbname=chocolate', 'root', '');
	}
	
	//on va s'en servir pour ajouter ou modifier par exemple
	public function executeSql($sql, array $values = array())
	{
	    //on indique que notre pdo sera au format utf-8
	    $this->pdo->exec('SET NAMES UTF8');
	    //on prépare une requète
	    $query = $this->pdo->prepare($sql);
	    //on éxecute la requète
	    $query->execute($values);
	}
	
	//on va s'en servir pour récuperer des données multiples
	public function query($sql, array $criteria = array())
    {
        //on indique que notre pdo sera au format utf-8
        $this->pdo->exec('SET NAMES UTF8');
        //on prépare une requète
	    $query = $this->pdo->prepare($sql);
	    //on éxecute la requète
	    $query->execute($criteria);
	    //on retourne un tableau associatif
	    return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //on va s'en servir que pour une seule donnée(utilisateur ici)
    public function queryOne($sql, array $criteria = array())
    {
        //on indique que notre pdo sera au format utf-8
        $this->pdo->exec('SET NAMES UTF8');
        //on prépare une requète
	    $query = $this->pdo->prepare($sql);
	    //on éxecute la requète
	    $query->execute($criteria);
	    //on retourne un tableau associatif
	    return $query->fetch(PDO::FETCH_ASSOC);
    }
}