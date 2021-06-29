
<?php
    class User {

        // Properties
        public $firstName;
        public $lastName;
        public $gender;
        public $birthday;
        public $religion;
        public $email;
        public $userName;
        public $password;

        // Methods
        function setFirstName($firstName){
            $this->firstName = $firstName;
        }

        function setLastName($lastName){
            $this->lastName = $lastName;
        }

        function setGender($gender){
            $this->gender = $gender;
        }

        function setBirthDay($birthday){
            $this->birthday = $birthday;
        }
        
        function setReligion($religion){
            $this->religion = $religion;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function setUserName($userName) {
            $this->userName = $userName;
        }
        function getUserName() {
            return $this->userName;
        }

        function setPassword($password) {
            $this->password = $password;
        }
        function getPassword() {
            return $this->password;
        }

        public function turnObjectPropertiesToObjProperties($data) {
            foreach ($data AS $key => $value) {
                $this->{$key} = $value;
            }
        }


        public static function getUserArrayFromJsonArray($jsonArray){
            $decodedArray = json_decode($jsonArray, true);

            $returnable = array();

            foreach ($decodedArray AS $key => $value) {
                if (is_array($value)) {
                    $sub = new User;
                    $sub->turnObjectPropertiesToObjProperties($value);
                    $value = $sub;
                }
                array_push($returnable, $value);
            }

            return $returnable;
        }

        

    }
?>