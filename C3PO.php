<?php
class C3PO extends Robot{

protected $numeroDeSerie;
private $nom;
private $type;

function __construct($numeroDeSerie, $nom, $type="droide de protocole"){
$this->numeroDeSerie = $numeroDeSerie;
$this->nom = $nom;
$this->type =$type;
echo"Je suis le droïde de protocole numéro" . " " . "$this->numeroDeSerie," . " " . "enchanté de vous rencontrer !" . PHP_EOL;
}

public function getnom(){
     return $this->nom;
}

public function setnom($nom){
     $this->nom = $nom;
}

public function gettype(){
     return $this->type;
}
     
public function settype($type){
     $this->type = $type;
}

public function dire($str){
     echo "C3PO no " . "$this->numeroDeSerie" . ": " . "$str" . PHP_EOL;
}

public function marcher(){
     echo "Je me mets en route, inutile d’insister." . PHP_EOL;
     parent::marcher();
}

public function initierProtocole(){
     echo "En attente d’interaction utilisateur :" . PHP_EOL;
     $input = fgets(STDIN); //On récupère les données rentrées dans le terminal.
     $var = $input; //

     $var1 = explode(' ', $var, 2); //Ici, on récupère le premier segment et le deuxième segment de la string du Construct.
     $first = array_shift($var1); //
     $last = array_pop($var1);//
     $str = str_replace('"','',$last);//

    // Les conditions des diffférentes actions que l'utilisateur peut demander à C3PO.
     do {
          
     if ($first == 'marcher') {
          echo $this->marcher();
          $this->initierProtocole();
     }

     elseif ($first == 'dire') {
          echo $this->dire($str);
          $this->initierProtocole();
     }

     elseif ($first == '') {
          echo "Veuillez m'indiquer une action !" . PHP_EOL;
          $this->initierProtocole();
     }

     elseif($first == 'repos') {
          echo "Fin du protocole" . PHP_EOL;
          exit;
     }

     else {
          echo"Au revoir !";
          exit;
     }
     } while ($first != 'repos');
}
}