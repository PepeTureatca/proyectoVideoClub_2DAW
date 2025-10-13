<?php
	class Soporte
	{
		public $titulo;
		protected $numero;
		private $precio;

		public function __construct($titulo, $numero, $precio)
		{
			$this->titulo = $titulo;
			$this->numero = $numero;
			$this->precio = $precio;
		}

		public function __getPrecio($precio)
		{
			return $this->precio;
		}

		public function __getPrecioConIva($precio)
		{
			return $this->precio * 1.21;
		}

		public function __getNumero($numero)
		{
			return $this->precio;
		}

		public function __muestraResumen()
		{
			return  ;
		}
	}
?>
