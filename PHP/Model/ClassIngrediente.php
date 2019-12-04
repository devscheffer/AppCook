<?php

class Ingrediente {
    private $id;
    private $nome;
    private $unit;
    private $reserva;
    
    public function __construct(
            $id = 0
            ,$nome = 0
            ,$unit = 0
            ,$reserva= 0
        ){
        $this->id = $id;
        $this->nome = $nome;
        $this->unit = $unit;
        $this->reserva = $reserva;
    }
    
    /* GET
    */
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getUnit(){
        return $this->unit;
    }
    
    public function getReserva(){
        return $this->reserva;
    }

    /* SET
    */
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setUnit($unit){
        $this->unit = $unit;
    }

    public function setReserva($reserva){
        $this->reserva = $reserva;
    }

    /* METHOD
    */

    public function CreateIngrediente($ingrediente){
        $ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
        mysqli_query(
			$ok,
			"insert into ingrediente (
					NOME 
					,UNIT
					,RESERVA
				) 
				values (
					'".$ingrediente->getNome()."'
					,'".$ingrediente->getUnit()."'
					,".$ingrediente->getReserva()."
                    )"
        ) or die("Não é possível inserir o ingrediente!");
    }

}
