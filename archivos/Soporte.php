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

		public function __getPrecio($numero)
		{
			return $this->precio;
		}
	}
?>
