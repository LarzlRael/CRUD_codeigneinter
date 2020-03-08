<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_crud extends CI_Controller {

	
	///cargar modelo
	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_crud');
	}

	public function index(){
		$dato['listar_p']=$this->Modelo_crud->listar_persona();
		$this->load->view('plantilla',$dato);
	}

	public function guardar_nueva_persona(){
		$nombre=$this->input->post('nombre');
		$apellido=$this->input->post('apellido');
		$telefono=$this->input->post('telefono');
		$fecha_nac=$this->input->post('fecha_nac');
		$this->Modelo_crud->guardar_nueva_persona($nombre,$apellido,$telefono,$fecha_nac);
	}

	public function eliminar_persona(){
		$this->Modelo_crud->eliminar_persona($this->input->post('idpersona'));
	}

	public function editar_persona(){
		$dato['obj1']=$this->Modelo_crud->editar_persona($this->input->post('idpersona'));
		$this->load->view("editar_persona",$dato);
	}

	public function guardar_editar_persona(){
		$idpersona=$this->input->post('idpersona');
		$nombre=$this->input->post('nombre');
		$apellido=$this->input->post('apellido');
		$telefono=$this->input->post('telefono');
		$fecha_nac=$this->input->post('fecha_nac');
		$this->Modelo_crud->guardar_editar_persona($nombre,$apellido,$telefono,$fecha_nac,$idpersona);
	}
}
