<?php
    class User{
        var $id;
        var $name;
        var $password;
        var $type;
        var $mobile;
        var $email;
        var $salt;
        function __construct($id,$name,$password,$salt,$type,$mobile,$email)
        {
            $this->id =$id;
            $this->name =$name;
            $this->password =$password;
            $this->salt =$salt;
            $this->type=$type;
            $this->mobile =$mobile;
            $this->email =$email;
        }
    }
?>