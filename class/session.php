<?php

class SessionManager
{
    // Méthode pour démarrer la session
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Méthode pour vérifier si la session est en cours
    public static function isSessionActive()
    {
        self::startSession();
        return isset($_SESSION['customer_username']); // Remplacez 'user_id' par le nom de votre variable de session appropriée
    }

    // Méthode pour stocker des informations dans la session
    public static function setSessionInfo($key, $value)
    {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    // Méthode pour obtenir des informations depuis la session
    public static function getSessionInfo($key)
    {
        self::startSession();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    // Méthode pour déconnecter l'utilisateur (effacer la session)
    public static function logout()
    {
        self::startSession();
        session_destroy();
    }
}

?>
