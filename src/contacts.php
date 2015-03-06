<?php
        class Contact

        {

            private $name;
            private $information;
            private $number;

            function __construct( $new_name, $new_information, $new_number)
            {
                $this->name = $new_name;
                $this->information = $new_information;
                $this->number = $new_number;
            }

            //setters and getters
            function setName($new_name)
            {
                $this->name = (string) $new_name;
            }

            function setInformation($new_information)
            {
                $this->information = (string) $new_information;

            }

            function setNumber($new_number)

            {
                $this->number = (string) $new_number;
            }

            function getName()
            {
                return $this->name;
            }

            function getInformation()
            {
                return $this->information;
            }

            function getNumber()
            {
                return $this->number;
            }

            //save our input
            function save()
            {
                array_push($_SESSION['list_of_contacts'], $this);
            }
            //static function to "get our information"
            static function getAll()
            {
                return $_SESSION['list_of_contacts'];
            }
            //static function to clear our address book.
            static function deleteAll()
            {
                $_SESSION['list_of_contacts'] = array();
            }
        }
?>
