<?php

	class Paginas extends Controlador{
		public function __construct(){
			// echo "Controlador pagina cargada";
		}
		//Los diferentes métodos
		public function index(){
			//Datos que se pueden enviar a las vistas
			$datos = [
				'titulo' => 'Bienvenido a MVC'
			];
			//Cargando la vista
			$this->vista('paginas/inicio', $datos);
		}

		public function articulo(){
			$this->vista('paginas/articulo');
		}

		public function actualizar($num_registro){
			echo $num_registro;

		}
	}