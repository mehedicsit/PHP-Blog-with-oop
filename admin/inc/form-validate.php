<?php

class AuthCheck{

       public function validateInput($input) {
                $input = trim($input);
                $input = stripslashes($input);
                //$input = htmlspecialchars($input);
                return $input;
        }
        // public function checkEmpty($arg){
        //     $check=empty($arg);
        //     if($check){
        //        return "<span style=".'color:red'.">Filed Cant be empty</span>" ;
        //     }


        // }
}