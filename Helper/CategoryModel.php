<?php
    class Category {
        public $categoryName;
        public $id;

        function __construct($name,$id)
        {
            $this->categoryName = $name;
            $this->id = $id;
        }
    }
?>