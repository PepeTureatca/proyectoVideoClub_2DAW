<?php
class CintaVideo extends Soporte
{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);

        $this->duracion = $duracion;
    }
    public function __muestraResumen()
		{
            parent::__muestraResumen();
		}
	}

