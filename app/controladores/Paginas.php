<?php

	class Paginas extends Controlador{
		public function __construct(){
			// echo "Controlador pagina cargada";
		}

		public function index(){
			$this->vista('informacion');
		}

		public function articulo(){

		}

		public function actualizar($num_registro){
			echo $num_registro;

		}
	}