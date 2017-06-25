<?php

// Aufgabe:
// Gehen Sie sicher, dass diese Datei nicht direkt aufgerufen
// werden kann!
//Datei darf nicht direkt aufgerufen werden
if(!defined("STUDENTNAME"))
{
    die("Forbidden access");
}
class Controller{

	// Aktuelle Aktion eines Benutzers
	private $action;

	// Datenmodel mit Feldern, Ressourcen und der Karte
	private $model;

	// Ansicht der Dateien - Anzeige
	private $view;
		
	// Konstruktor
	public function __construct(){
	    // 1) Verarbeite alles von POST
		$this->checkPOST();
		// 2) Verarbeite alles von GET
		$this->checkGET();
		// 3) Verarbeite alles von SESSION
		$this->checkSession();
		// Setze das Datenmodel
		$this->model = new Model();
		// Setze die Anzeige und übergib ihr das Datenmodel (falls sie direkt drauf zugreifen soll)
		$this->view = new View($this->model);	
	}
	
	///////////////////////////
	// Anzeige von Webseiten //
	///////////////////////////
	public function display(){
	    // Auf Aktionen reagieren
        switch($this->action)
        {
            case "movies": $this->view->showMovies();
                            break;
            case "info": $this->view->showInfo();
                            break;
            case "killname": $this->killSession();
                             $this->view->showWelcome();
                             break;
            // Fügen Sie hier weitere Inhalte ein!
            default:
                    $this->view->showWelcome();
        }
	}

    ///////////////////////////
    // Bearbeitung von AJAX  //
    ///////////////////////////
    private function handleAjax(){
        $ret = array('success'=>false);
        // Check for "method" parameter ...
        if(isset($_GET['method'])) {
            switch ($_GET['method']){
                // Ihre Methode(n) können hier eingebaut werden!
                default:
                    array('success'=>true);
            }
        }
        header('Content-Type: application/json');
        echo json_encode($ret);
        return;
    }

    /////////////////////////////
    /// Funktionen vom Anfang ///
    /////////////////////////////

	// 1) POST Parameter auslesen -> Formulardaten
	private function checkPOST()
    {
        if(isset($_POST["name"]))
        {
            if($this->checkSession())
                $_SESSION["name"] = $_POST["name"];
        }
	}
	
	// 2) GET Parameter auslesen -> Aktionen & Methoden (z.B. Aktion "ajax" mit der Methode "getOptions")
	private function checkGET()
    {
        if(isset($_GET["action"]))
        {
            $this->action = $_GET["action"];
        }
	}
	
	// 3) SESSION Daten überprüfen -> Ob schon angemeldet
	private function checkSession()
    {
        //Prüfe ob Session Variable gesetzt ist
        if(isset($_SESSION))
        {
            return true;
        }
	}

	
	// Session löschen
	private function killSession()
    {
		// Achtung: Damit wird die Session gelöscht, nicht nur die Session-Daten!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $params["path"],
					$params["domain"], $params["secure"], $params["httponly"]
					);
		}
		// Zum Schluß, löschen der Session.
		session_destroy();
	}
}

?>