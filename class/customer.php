<?php
class customer
{
    public $id_customer;
    public $customer_lastname;
    public $customer_firstname;
    public $customer_username;
    public $customer_password;

    // Constructeur pour initialiser les propriétés de l'utilisateur
    public function __construct($customer_lastname, $customer_firstname, $customer_username, $customer_password)
    {
        $this->id_customer = null; // L'id_client sera auto-incrémenté dans la base de données
        $this->customer_lastname = $customer_lastname;
        $this->customer_firstname = $customer_firstname;
        $this->customer_username = $customer_username;
        // Hashage du mot de passe avant d ele stocker dans la bdd
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

    // Méthode pour vérifier si l'username existe déjà dans la base de données
    public static function checkUsernameExists($pdo, $username) {
        $query = 'SELECT COUNT(*) FROM customer WHERE customer_username = :username';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return ($count > 0);
    }

    public static function getNumberOfCustomers($pdo) {
        $query = 'SELECT COUNT(*) FROM customer';
        $stmt = $pdo->query($query);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public static function getAllCustomers($pdo) {
        $query = 'SELECT * FROM customer';
        $stmt = $pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'customer');
    }

    
    public function getCustomerUsername() {
        return $this->customer_username;
    }
    public function getCustomerPassword() {
        return $this->customer_password;
    }
}
