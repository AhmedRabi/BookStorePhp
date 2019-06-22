<?php
    class Book {
        public $id;
        public $title;
        public $author;
        public $category;
        public $price;
        public $photo;

        function __construct($id,$title,$author,$category,$price,$photo)
        {
            $this->id = $id;
            $this->title = $title;
            $this->author = $author;
            $this->category = $category;
            $this->price = $price;
            $this->photo = $photo;
        }
    }
?>