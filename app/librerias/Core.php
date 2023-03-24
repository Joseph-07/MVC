<?php
	
	/* Esto lo que hará es mapear la url ingresada en el navegador.
	1-controlador
	2-método
	3-Parámetro
	Ejemplo: /articulos/actualizar/4 */

	class Core {
		protected $controladorActual = 'paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];

		// Constructor
		public function __construct(){
			//print_r($this->getUrl());
			$url = $this->getUrl();
			//var_dump($url);
			//buscar en controladores si el controlador existe
			if (file_exists('../app/controladores/'.ucwords($url[0]).'.php')) {
				//si existe se configura como controlador por defecto
				$this->controladorActual = ucwords($url[0]);


				//unset indice
				unset($url[0]);
			}

			// requerir el controlador
			require_once '../app/controladores/'.$this->controladorActual.'.php';
			$this->controladorActual = new $this->controladorActual;


			//chequear la segunda parte de la url que sería el método
			if(method_exists($this->controladorActual, $url[1])){
				//Chequeamos el método
				$this->metodoActual = $url[1];
			}

		}

		public function getUrl(){
			//echo $_GET['url']; // Esto fue mapeado por el htaccess de public

			if(isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
			else{
				return ' ';
			}
		}
	}