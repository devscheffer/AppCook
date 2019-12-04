<?php

class Receita {
    private $id;
    private $NameR;
    private $NameI;
    private $Requerido;
    
    public function __construct(
            $id = 0
            ,$NameR = 0
            ,$NameI = 0
            ,$Requerido = 0
        ){
        $this->id = $id;
        $this->NameR = $NameR;
        $this->NameI = $NameI;
        $this->Requerido = $Requerido;
    }
    
    /* GET
    */
    public function getId(){
        return $this->id;
    }
    
    public function getNameR(){
        return $this->NameR;
    }
    
    public function getNameI(){
        return $this->NameI;
    }
    
    public function getRequerido(){
        return $this->Requerido;
    }

    /* SET
    */
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNameR($NameR){
        $this->NameR = $NameR;
    }
    
    public function setNameI($NameI){
        $this->NameI = $NameI;
    }

    public function setRequerido($Requerido){
        $this->Requerido = $Requerido;
    }

    /* METHOD
    */

    public function CreateReceita($Receita){
        $ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
        mysqli_query(
			$ok,
			"insert into 
				receita (
					NOME 
					,ID_INGREDIENTE
					,REQUERIDO
				) 
				values (
					'".$Receita->getNameR()."'
					,".$Receita->getNameI()."
					,".$Receita->getRequerido()."
			)"
		) or die("Não é possível inserir a receita!");
    }

}
