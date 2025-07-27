<?php
    class Pedido {
        public $descripcion;
        public $tipo;
        public $producto;
        public $unidades;
        public $observaciones;

        public function __construct($descripcion, $tipo, $producto, $unidades, $observaciones) {
            $this->descripcion = $descripcion;
            $this->tipo = $tipo;
            $this->producto = $producto;
            $this->unidades = $unidades;
            $this->observaciones = $observaciones;
        }

        public function mostrarResumen() {
            return "Pedido de {$this->unidades} unidad(es) de '{$this->producto}' - 
            {$this->descripcion}. Observaciones: {$this->observaciones}";
        }
    }

    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $producto_pedido = $_POST['producto_pedido'];
    $unidades = $_POST['unidades'];
    $observaciones = $_POST['observaciones'];
    
    function crear_pedido($descripcion,$tipo,$producto_pedido,$unidades,$observaciones){
        echo "<br>";
        echo "<h1>Pedido creado con exito!</h1>";
        echo "descripcion: <b>" . $descripcion . "</b></br>";
        echo "tipo: <b>" . $tipo . "</b></br>";
        echo "producto: <b>" . $producto_pedido . "</b></br>";
        echo "unidades: <b>" . $unidades . "</b></br>";
        echo "observaciones: <b>" . $observaciones . "</b></br>";
        echo "</br></br>";
        $pedido = new Pedido($descripcion,$tipo,$producto_pedido,$unidades,$observaciones);
        echo $pedido->mostrarResumen();
        //En el futuro se deberian almacenar en una base de datos.
    }
    crear_pedido($descripcion,$tipo,$producto_pedido,$unidades,$observaciones);
?>