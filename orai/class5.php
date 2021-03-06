<?php
    class Kutya {
        // osztályon belüli tulajdonságok
        private $nev;
        protected $kor;
        public $szin;
        
        
       /* //konstruktor fix értékes konstruktor
        public function __construct(){
            $this->nev = "Buksi";
            $this->kor = 1;
            $this->szín = "Barna";
        }*/
        
        
        //változós konstruktor
        public function __construct($nev,$kor,$szin){
            $this->nev = $nev;
            $this->kor = $kor;
            $this->szin = $szin;
         }
           
        
        //getter
         public function getNev (){
            return $this->nev;
           }
         public function getKor (){
           return $this->kor;
           }
           
         //setter
           public function setNev($ujNev){
           $this->nev = $ujNev;    
            } 
            
          // set kor  korlátozott setter, ezért nem így nevezzük, hanem pl szülinapnak
            public function szuletesnap(){
            $this->kor ++;
            }

          //további függvények megvalósítása
            public function ugat(){
            print "vau vau";
            }
    }
    
    //Példányosítás
    
    $kutya = new Kutya("Totó", 6, "Barna");
    print_r($kutya);
    print "<br>" . $kutya->getNev();
    $kutya->setNev("Buksi12");
    print "<br>" . $kutya->getNev();
    print "<br>" . $kutya->getKor();
    $kutya->szuletesnap();
    $kutya->szuletesnap();
    $kutya->szuletesnap();
    print "<br>" . $kutya->getKor();
?>