<?php

class Categoria{
    private $id;
    private $nombre;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;

    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $categoria->fetch_object();

    }

    public function save(){
        
        $sql="INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }
        return $result;
        
    }

    public function edit(){
        // var_dump( $this->getId());
        // var_dump( $this->getNombre());
        // die();
        $sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE categorias.id ='{$this->getId()}';";
        $edit = $this->db->query($sql);
        var_dump(mysqli_error($this->db));
        // die();
        $result = false;

        if($edit){
            $result=true;
        }
        return $result;
    }

    public function delete(){
        // var_dump( $this->getId());
        // var_dump( $this->getNombre());
        // die();
        $sql = "DELETE FROM categorias WHERE categorias.id ='{$this->getId()}';";
        $delete = $this->db->query($sql);
        //var_dump(mysqli_error($this->db));
        // die();
        $result = false;

        if($delete){
            $result=true;
        }
        return $result;
    }

}