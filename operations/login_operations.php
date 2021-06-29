<?php

    include 'utility_operations.php';
    include '../model/user_model.php';

    function saveLoginData($loginData){
        $previousData = getLoginData();
        $dataArray = array();

        if(count($previousData) == 0){
            array_push($dataArray, $loginData);
            writeToFile($dataArray, "../data/login.txt");
        }else{
            array_push($previousData, $loginData);
            writeToFile($previousData, "../data/login.txt");
        }
    }

    function getLoginData(){
        $json = readFromFile("../data/login.txt");
        $data = User::getUserArrayFromJsonArray($json);

        return $data;
    }

    function changePassword($username, $password){
        $previousData = getLoginData();
        $size = count($previousData);

        for ($x = 0; $x < $size; $x++) {
            if($previousData[$x]->getUserName() == $username ){
                $previousData[$x]->password = $password;
                
            } 
        }

        writeToFile($previousData, "../data/login.txt");
    }

    function updateProfile($userData){
        $previousData = getLoginData();
        $size = count($previousData);

        for ($x = 0; $x < $size; $x++) {
            if($previousData[$x]->getUserName() == $userData->username ){
                $previousData[$x] = $userData;
                
            } 
        }

        writeToFile($previousData, "../data/login.txt");
    }

    

?>