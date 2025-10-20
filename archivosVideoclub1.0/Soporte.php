<?php

class Soporte
{
	public const IVA = 0.16;
	public $titulo;
	protected $numero;
	private $precio;

	public function __construct($titulo, $numero, $precio,)
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
		return $this->precio;
	}

	public function muestraResumen()
	{
		echo "<br>" . "<em>" . $this->titulo . "</em>";
		echo "<br>" . $this->getPrecio() . " €" . " (IVA no incluido)";
	}
}
