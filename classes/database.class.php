<?php
    class database {
        /* Variables and default configurations */
        private $language = "MySQL";
        private $host ='127.0.0.1';
        private $user ='root';
        private $password = '2lexivore';
        private $databaseName ='English_girona';


        public function connect($language,$host,$user,$password,$databaseName) {
            switch ($language) {
                case 'MySQL':
                    $link = new mysqli($host, $user,$password,$databaseName);
                    break;
                case 'default':
                    die('Database language '.$language.' not defined');
                    break;
            }
        }

        public function query($query) {
            if ($stmt = $mysqli->prepare($query)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($name, $code);

                /* fetch values */
                $i=0;
                while ($stmt->fetch()) {
                    $ret[$name]=$code;
                }

                /* close statement */
                $stmt->close();
                return $ret;
            }
            else {
                return "ERROR";
            }

        }
    }
