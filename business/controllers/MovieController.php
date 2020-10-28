<?php namespace business\controllers;

use DAO\MovieDAO;
use DAO\GenreDAO;
use DAO\Database;

class MovieController {

    private $movieDAO;
    private $genres;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
    }

    public function Index($filterGenre = null) {
        $custom_css = 'movie-list.css';
        Database::connect();
        if(Database::execute('get_genres'))
            echo 'Si';
        else {
            echo 'no';
        }
        print_r(Database::execute('get_genres'));

        if($filterGenre == 'default')
            $filterGenre = null;
        $data = $this->movieDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require('./presentation/listMovies.php');
    }

    public function showAddMovie($filterGenre = null, $filterName = null, $filterDateFrom = null, $filterDateTo = null)
    {
        $custom_css = "movie-list.css";

        if($filterGenre == 'default')
            $filterGenre = null;
        if($filterDateFrom == null)
            $filterDateFrom = null;
        if($filterDateTo == null)
            $filterDateTo = date("Y-m-d");
        $data = $this->movieDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require_once("./presentation/addShow.php");
    }

}