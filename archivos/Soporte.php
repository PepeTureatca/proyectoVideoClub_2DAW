<?php
	class Soporte
	{
		public const IVA = 0.21;
		
		public $titulo;
		protected $numero;
		private $precio;

		public function __construct($titulo, $numero, $precio)
		{
			$this->titulo = $titulo;
			$this->numero = $numero;
			$this->precio = $precio;
		}

		public function getPrecio()
		{
			return $this->precio;
		}

		public function getPrecioConIva()
		{
			return $this->precio * (1 + self::IVA);
		}

		public function getNumero()
		{
			return $this->numero;
		}

		public function muestraResumen()
		{
			return $this->precio.$this->numero.$this->titulo;
		}
		
	}
