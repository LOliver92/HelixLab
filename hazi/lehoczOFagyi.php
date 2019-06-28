<?php
    class fagyi {
        private $gomboc1;
        private $gomboc2;
        private $gomboc3;
        
        public function __construct($gomboc1,$gomboc2,$gomboc3) {
            $this->gomboc1 = $gomboc1;
            $this->gomboc1 = $gomboc2;
            $this->gomboc1 = $gomboc3;
        }
        
        public function getGomboc1 (){
            return $this->gomboc1;
        }
        public function getGomboc2 (){
            return $this->gomboc2;
        }
        public function getGomboc3 (){
            return $this->gomboc3;
        }
        
        public function setGomboc1 ($iz1) {
            $this->gomboc1 = $iz1;
        }
        public function setGomboc2 ($iz2) {
            $this->gomboc1 = $iz2;
        }
        public function setGomboc3 ($iz3) {
            $this->gomboc1 = $iz3;
        }
    }

?>

