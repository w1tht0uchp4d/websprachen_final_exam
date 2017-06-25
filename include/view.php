<?php

// Aufgabe:
// Gehen Sie sicher, dass diese Datei nicht direkt aufgerufen
// werden kann!

//Datei darf nicht direkt aufgerufen werden
if(!defined("STUDENTNAME"))
{
    die("Forbidden access");
}

class View{

    // Das Datenmodel
	private $model;

	// Konstruktor
	public function __construct($model){
		$this->model = $model;
	}

	public function showWelcome(){
	    include("html/header.php");
        $this->showNavigation("welcome");
        include("html/pages/welcome.php");
        include("html/footer.php");
    }

    public function showMovies(){
        include("html/header.php");
        $this->showNavigation("movies");
        include("html/pages/movies.php");
        include("html/footer.php");
    }

    public function showInfo(){
        include("html/header.php");
        $this->showNavigation("info");
        include("html/pages/info.php");
        include("html/footer.php");
    }

    // Shows navigation
    private function showNavigation($page){
        ?>
            <a href="index.php?action=welcome" target="_self">
                <button type="button" class="btn <?php echo (($page=='welcome')?'btn-success':'btn-default'); ?>">
                    Welcome
                </button>
            </a>
            <a href="index.php?action=movies" target="_self">
                <button type="button" class="btn <?php echo (($page=='movies')?'btn-success':'btn-default'); ?>">
                    Movies
                </button>
            </a>
            <a href="index.php?action=info" target="_self">
                <button type="button" class="btn <?php echo (($page=='info')?'btn-success':'btn-default'); ?>">
                     Info
                </button>
            </a>
        <?php
    }

}
?>