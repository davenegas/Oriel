<?php
class cls_puntosBCR{
    public $id;
    public $id2;
    public $obj_data_provider;
    public $arreglo;
    private $condicion;
    public $nombre;
    public $direccion;
    public $codigo;
    public $cuentasis;
    public $diaslaborales;
    public $horaslaborales;
    public $observaciones;
    public $estado;
    
    function getId() {
        return $this->id;
    }

    function getId2() {
        return $this->id2;
    }

    function getObj_data_provider() {
        return $this->obj_data_provider;
    }

    function getArreglo() {
        return $this->arreglo;
    }

    function getCondicion() {
        return $this->condicion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCuentasis() {
        return $this->cuentasis;
    }

    function getDiaslaborales() {
        return $this->diaslaborales;
    }

    function getHoraslaborales() {
        return $this->horaslaborales;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId2($id2) {
        $this->id2 = $id2;
    }

    function setObj_data_provider($obj_data_provider) {
        $this->obj_data_provider = $obj_data_provider;
    }

    function setArreglo($arreglo) {
        $this->arreglo = $arreglo;
    }

    function setCondicion($condicion) {
        $this->condicion = $condicion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCuentasis($cuentasis) {
        $this->cuentasis = $cuentasis;
    }

    function setDiaslaborales($diaslaborales) {
        $this->diaslaborales = $diaslaborales;
    }

    function setHoraslaborales($horaslaborales) {
        $this->horaslaborales = $horaslaborales;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function __construct() {
        $this->id="";
        $this->id2="";
        $this->obj_data_provider=new Data_Provider();
        $this->condicion="";
        $this->arreglo;
        $this->nombre="";
        $this->direccion="";
        $this->codigo="";
        $this->cuentasis="";
        $this->diaslaborales="";
        $this->horaslaborales="";
        $this->observaciones="";
        $this->estado="";
    }
    
    public function obtiene_todos_los_puntos_bcr(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                    "T_PuntoBCR
			LEFT OUTER JOIN T_Horario ON T_PuntoBCR.ID_Horario= T_Horario.ID_Horario
			LEFT OUTER JOIN T_TipoPuntoBCR ON T_PuntoBCR.ID_Tipo_Punto = T_TipoPuntoBCR.ID_Tipo_Punto
			LEFT OUTER JOIN T_Empresa ON T_PuntoBCR.ID_Empresa = T_Empresa.ID_Empresa
			LEFT OUTER JOIN T_Distrito ON T_PuntoBCR.ID_Distrito = T_Distrito.ID_Distrito", 
                    "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion, T_PuntoBCR.Codigo, 
			T_PuntoBCR.Cuenta_SIS, T_PuntoBCR.Observaciones, T_PuntoBCR.Estado,
			T_Horario.ID_Horario, T_Horario.Dia_Laboral, T_Horario.Hora_Laboral,
			T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
			T_Empresa.ID_Empresa, T_Empresa.Empresa,
			T_Distrito.ID_Distrito, T_Distrito.Nombre_Distrito",
                    "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                    "T_PuntoBCR
			LEFT OUTER JOIN T_Horario ON T_PuntoBCR.ID_Horario= T_Horario.ID_Horario
			LEFT OUTER JOIN T_TipoPuntoBCR ON T_PuntoBCR.ID_Tipo_Punto = T_TipoPuntoBCR.ID_Tipo_Punto
			LEFT OUTER JOIN T_Empresa ON T_PuntoBCR.ID_Empresa = T_Empresa.ID_Empresa
			LEFT OUTER JOIN T_Distrito ON T_PuntoBCR.ID_Distrito = T_Distrito.ID_Distrito", 
                    "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion, T_PuntoBCR.Codigo, 
			T_PuntoBCR.Cuenta_SIS, T_PuntoBCR.Observaciones, T_PuntoBCR.Estado,
			T_Horario.ID_Horario, T_Horario.Dia_Laboral, T_Horario.Hora_Laboral,
			T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
			T_Empresa.ID_Empresa, T_Empresa.Empresa,
			T_Distrito.ID_Distrito, T_Distrito.Nombre_Distrito",
                    $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
    }
    
    public function obtiene_los_tipo_puntos(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                    "T_TipoPuntoBCR", 
                    "*",
                    "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                    "T_TipoPuntoBCR", 
                    "*",
                    $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        } 
    }
    
    public function obtiene_telefonos_puntoBCR(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->trae_datos(
            "T_Telefono
		LEFT OUTER JOIN T_TipoTelefono ON T_Telefono.ID_Tipo_Telefono = T_TipoTelefono.ID_Tipo_Telefono", 
            "*",
            $this->condicion. "AND (T_TipoTelefono.ID_Tipo_Telefono = '1' OR 
		T_TipoTelefono.ID_Tipo_Telefono = '5' OR 
		T_TipoTelefono.ID_Tipo_Telefono = '6' OR
		T_TipoTelefono.ID_Tipo_Telefono = '7' OR 
		T_TipoTelefono.ID_Tipo_Telefono = '8' OR 
		T_TipoTelefono.ID_Tipo_Telefono = '9')");
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;  
    }
    
    public function obtiene_unidades_ejecutoras(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->trae_datos(
            "T_UnidadEjecutora
			LEFT OUTER JOIN T_UE_PuntoBCR ON T_UE_PuntoBCR.ID_Unidad_Ejecutora = T_UnidadEjecutora.ID_Unidad_Ejecutora", 
            "*",
            $this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;  
    }
}?>