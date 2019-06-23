<?php
    class Book {
        public $id;
        public $title;
        public $author;
        public $category;
        public $price;
        public $photo;

        function __construct($title,$author,$category,$price,$photo)
        {
            $this->title = $title;
            $this->author = $author;
            $this->category = $category;
            $this->price = $price;
            $this->photo = $photo;
        }
        function setID ($id){
            $this->id = $id;
        }
        function setPhoto($photo){
            $this->photo = $photo;
        }
    }
?>