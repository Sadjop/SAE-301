<?php
class customer
{
    private $id_customer;
    private $customer_lastname;
    private $customer_firstname;
    private $customer_username;
    private $customer_password;

    // Constructeur pour initialiser les propriétés de l'utilisateur
    public function __construct($customer_lastname, $customer_firstname, $customer_username, $customer_password)
    {
        $this->id_customer = null; // L'id_client sera auto-incrémenté dans la base de données
        $this->customer_lastname = $customer_lastname;
        $this->customer_firstname = $customer_firstname;
        $this->customer_username = $customer_username;
        // Tu devrais hasher le mot de passe ici avant de le stocker dans l'objet ou la base de données
        $this->customer_password = password_hash($customer_password, PASSWORD_DEFAULT);
    }

    // Méthode pour insérer l'utilisateur dans la base de données
    public function inscrire(PDO $pdo)
    {
        $stmt = $pdo->prepare('INSERT INTO customer (customer_lastname, customer_firstname, customer_username, customer_password) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->customer_lastname, $this->customer_firstname, $this->customer_username, $this->customer_password]);

        // Récupérer l'id_client auto-incrémenté
        $this->id_customer = $pdo->lastInsertId();
    }

    // Getter pour récupérer l'id_client de l'utilisateur
    public function getIdClient()
    {
        return $this->id_customer;
    }

    // Getter pour récupérer le nom de l'utilisateur
    public function getNom()
    {
        return $this->customer_lastname;
    }

    // Getter pour récupérer le prénom de l'utilisateur
    public function getPrenom()
    {
        return $this->customer_firstname;
    }

    // Getter pour récupérer le nom d'utilisateur de l'utilisateur
    public function getUsername()
    {
        return $this->customer_username;
    }

    // Getter pour récupérer le mot de passe de l'utilisateur
    public function getPassword()
    {
        return $this->customer_password;
    }

    // Setter pour modifier le nom de l'utilisateur
    public function setNom($customer_lastname)
    {
        $this->customer_lastname = $customer_lastname;
    }

    // Setter pour modifier le prénom de l'utilisateur
    public function setPrenom($customer_firstname)
    {
        $this->customer_firstname = $customer_firstname;
    }

    // Setter pour modifier le nom d'utilisateur de l'utilisateur
    public function setUsername($customer_username)
    {
        $this->customer_username = $customer_username;
    }

    // Setter pour modifier le mot de passe de l'utilisateur
    public function setPassword($customer_password)
    {
        // Tu devrais hasher le mot de passe ici avant de le stocker dans l'objet ou la base de données
        $this->customer_password = password_hash($customer_password, PASSWORD_DEFAULT);
    }
}
