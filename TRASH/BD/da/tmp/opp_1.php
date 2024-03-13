<?php 
session_start();
    
    class Ftf{
        public $tg, $ctg, $sec, $cosec, $x;
        function __construct($_x) {
            $this->x = $_x;
        }
        private function factorial($n){
            return $n==0 ? 1 : $n*$this->factorial($n - 1);
        }
        public function mySin() {
            $mySin = 0;
            for($i = 0; $i < 10; $i++){
                @$mySin += (pow(-1,$i) * pow($this->x,2*$i+1))/($this->factorial(2*$i+1));
            }
            return $mySin;
        }
        public function myCos() {
            $myCos = 0;
            for($i = 0; $i < 10; $i++){
                @$myCos += (pow(-1,$i) * pow($this->x,2*$i))/($this->factorial(2*$i));
            }
            return $myCos;
        }
        
    }

    class Stf extends Ftf{
        public function tg() {
            $this->tg = $this->mySin()/$this->myCos();
        }
        public function ctg() {
            $this->ctg = $this->myCos()/$this->mySin();
        }
        public function sec() {
            $this->sec = 1/$this->myCos();
        }
        public function cosec() {
            $this->cosec = 1/$this->mySin();
        } 
    }

    @$znath=$_POST['znath'];
    if (is_numeric($znath))
    {
        
        $tf = new Stf($znath);

        @$_SESSION['mySin'] = $tf->mySin();
        @$_SESSION['myCos'] = $tf->myCos();
        @$tf->tg(); $_SESSION['tg'] = $tf->tg;
        @$tf->ctg(); $_SESSION['ctg'] = $tf->ctg;
        @$tf->sec(); $_SESSION['sec'] = $tf->sec;
        @$tf->cosec(); $_SESSION['cosec'] = $tf->cosec;
    }
else $_SESSION['znath'] = "введено не число";
    
    //$tf = new Stf();

    // @$mySin=$_POST['mySin']; $tf = new Stf($mySin); $_SESSION['mySin'] = $tf->mySin();
    // @$myCos=$_POST['myCos']; $tf = new Stf($myCos); $_SESSION['myCos'] = $tf->myCos();
    // @$tg=$_POST['tg']; $tf = new Stf($tg); $_SESSION['tg'] = $tf->$tg;
    // @$ctg=$_POST['ctg']; $tf = new Stf($ctg); $_SESSION['ctg'] = $tf->$ctg;
    // @$sec=$_POST['sec']; $tf = new Stf($sec); $_SESSION['sec'] = $tf->$sec;
    // @$cosec=$_POST['cosec']; $tf = new Stf($cosec); $_SESSION['cosec'] = $tf->$cosec;
    header("Location: oop.php");

/*   class tf{
        private static function factorial($n){
            return $n==0 ? 1 : $n*tf::factorial($n - 1);
        }
        public static function mySin($x) {
            $mySin = 0;
            for($i = 0; $i < 10; $i++){
                @$mySin += (pow(-1,$i) * pow($x,2*$i+1))/(tf::factorial(2*$i+1));
            }
            return $mySin;
        }
        public static function myCos($x) {
            $myCos = 0;
            for($i = 0; $i < 10; $i++){
                @$myCos += (pow(-1,$i) * pow($x,2*$i))/(tf::factorial(2*$i));
            }
            return $myCos;
        }
        public static function tg($x) {
            return tf::mySin($x)/tf::myCos($x);
        }
        public static function ctg($x) {
            return tf::myCos($x)/tf::mySin($x);
        }
        public static function sec($x) {
            return 1/tf::myCos($x);
        }
        public static function myCosec($x) {
            return 1/tf::mySin($x);
        } 
    }
*/
?>