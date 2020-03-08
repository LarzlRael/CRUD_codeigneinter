<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_crud extends CI_Model {

	
	///cargar modelo
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function listar_persona(){
		return $this->db->query("select * from persona")->result();
	}

	public function guardar_nueva_persona($nombre,$apellido,$telefono,$fecha_nac){
		$obj=array(
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'telefono'=>$telefono,
			'fecha_nac'=>$fecha_nac
		);
		$this->db->insert("persona",$obj);
	}

	public function eliminar_persona($idpersona){
		$this->db->where("idpersona",$idpersona);
		$this->db->delete("persona");
	}

	public function editar_persona($idpersona){
		return $this->db->query("select * from persona where idpersona='$idpersona' ")->row();
	}

	public function guardar_editar_persona($nombre,$apellido,$telefono,$fecha_nac,$idpersona){

		$obj=array(
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'telefono'=>$telefono,
			'fecha_nac'=>$fecha_nac
		);
		$this->db->where("idpersona",$idpersona);
		$this->db->update("persona",$obj);
	}
}