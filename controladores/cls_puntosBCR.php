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
    public $tipo_punto;
    public $distrito;
    public $empresa;
    public $gerente;
    public $supervisor;
    public $horario;
    public $tipo_panel;
    
    function getTipo_Panel() {
        return $this->tipo_panel;
    }
    
    function getHorario() {
        return $this->horario;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function getGerente() {
        return $this->gerente;
    }

    function getSupervisor() {
        return $this->supervisor;
    }

    function setTipo_Panel($tipo_panel) {
        $this->tipo_panel = $tipo_panel;
    }
    
    function setGerente($gerente) {
        $this->gerente = $gerente;
    }

    function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function getTipo_punto() {
        return $this->tipo_punto;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function setTipo_punto($tipo_punto) {
        $this->tipo_punto = $tipo_punto;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }
    
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
        $this->tipo_punto="";
        $this->distrito="";
        $this->empresa="";
        $this->gerente="";
        $this->supervisor="";
        $this->horario="";
        $this->tipo_panel="";
    }
    
    public function obtiene_todos_los_puntos_bcr(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR
                    LEFT OUTER JOIN T_Horario ON T_PuntoBCR.ID_Horario= T_Horario.ID_Horario
                    LEFT OUTER JOIN T_TipoPuntoBCR ON T_PuntoBCR.ID_Tipo_Punto = T_TipoPuntoBCR.ID_Tipo_Punto
                    LEFT OUTER JOIN T_Empresa ON T_PuntoBCR.ID_Empresa = T_Empresa.ID_Empresa
                    LEFT OUTER JOIN T_Distrito ON T_PuntoBCR.ID_Distrito = T_Distrito.ID_Distrito
                    LEFT OUTER JOIN t_canton on t_distrito.ID_canton=t_canton.ID_canton
                    LEFT OUTER JOIN t_provincia on t_canton.ID_provincia=t_provincia.ID_provincia
                    LEFT OUTER JOIN T_UE_PuntoBCR ON T_PuntoBCR.ID_PuntoBCR= T_UE_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_UnidadEjecutora ON T_UE_PuntoBCR.ID_Unidad_Ejecutora = T_UnidadEjecutora.ID_Unidad_Ejecutora
                    LEFT OUTER JOIN T_PuntoBCREnlace ON T_PuntoBCREnlace.ID_PuntoBCR = T_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_EnlaceTelecomunicaciones ON T_EnlaceTelecomunicaciones.ID_Enlace = T_PuntoBCREnlace.ID_Enlace
                    LEFT OUTER JOIN T_PuntoBCRDireccionIP ON T_PuntoBCRDireccionIP.ID_PuntoBCR = T_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_DireccionIP ON T_DireccionIP.ID_Direccion_IP = T_PuntoBCRDireccionIP.ID_Direccion_IP
                    GROUP by T_PuntoBCR.ID_PuntoBCR  order by T_TipoPuntoBCR.Tipo_Punto", 
                "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion, T_PuntoBCR.Codigo, 
                    T_PuntoBCR.Cuenta_SIS, T_PuntoBCR.Observaciones as Observaciones_Punto, 
                    T_PuntoBCR.Estado as Estado_Punto, T_PuntoBCR.ID_Gerente_Zona, T_PuntoBCR.ID_Supervisor_Zona, 
                    T_PuntoBCR.ID_Horario_Apertura, T_PuntoBCR.Geolocalizacion,
                    T_Horario.*, T_Provincia.Nombre_Provincia,T_Provincia.ID_Provincia,
                    T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
                    T_Empresa.ID_Empresa, T_Empresa.Empresa,
                    T_Distrito.ID_Distrito, T_Distrito.Nombre_Distrito,
                    T_UnidadEjecutora.ID_Unidad_Ejecutora, T_UnidadEjecutora.Departamento,
                    GROUP_CONCAT(char(10),T_EnlaceTelecomunicaciones.Numero_Linea) as Numero_Linea,
                    GROUP_CONCAT(char(10),T_DireccionIP.Direccion_IP) as Direccion_IP, T_PuntoBCR.Tipo_Panel  ",
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
                    LEFT OUTER JOIN T_Distrito ON T_PuntoBCR.ID_Distrito = T_Distrito.ID_Distrito
                    LEFT OUTER JOIN t_canton on t_distrito.ID_canton=t_canton.ID_canton
                    LEFT OUTER JOIN t_provincia on t_canton.ID_provincia=t_provincia.ID_provincia
                    LEFT OUTER JOIN T_UE_PuntoBCR ON T_PuntoBCR.ID_PuntoBCR= T_UE_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_UnidadEjecutora ON T_UE_PuntoBCR.ID_Unidad_Ejecutora = T_UnidadEjecutora.ID_Unidad_Ejecutora
                    LEFT OUTER JOIN T_PuntoBCREnlace ON T_PuntoBCREnlace.ID_PuntoBCR = T_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_EnlaceTelecomunicaciones ON T_EnlaceTelecomunicaciones.ID_Enlace = T_PuntoBCREnlace.ID_Enlace
                    LEFT OUTER JOIN T_PuntoBCRDireccionIP ON T_PuntoBCRDireccionIP.ID_PuntoBCR = T_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_DireccionIP ON T_DireccionIP.ID_Direccion_IP = T_PuntoBCRDireccionIP.ID_Direccion_IP", 
                "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion, T_PuntoBCR.Codigo, 
                    T_PuntoBCR.Cuenta_SIS, T_PuntoBCR.Observaciones as Observaciones_Punto, 
                    T_PuntoBCR.Estado as Estado_Punto, T_PuntoBCR.ID_Gerente_Zona, T_PuntoBCR.ID_Supervisor_Zona,
                    T_PuntoBCR.ID_Horario_Apertura,T_PuntoBCR.Geolocalizacion,
                    T_Horario.*, t_Provincia.Nombre_Provincia,T_Provincia.ID_Provincia,
                    T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
                    T_Empresa.ID_Empresa, T_Empresa.Empresa,
                    T_Distrito.ID_Distrito, T_Distrito.Nombre_Distrito,
                    T_UnidadEjecutora.ID_Unidad_Ejecutora, T_UnidadEjecutora.Departamento,
                    GROUP_CONCAT(char(10),T_EnlaceTelecomunicaciones.Numero_Linea) as Numero_Linea,
                    GROUP_CONCAT(char(10),T_DireccionIP.Direccion_IP) as Direccion_IP , T_PuntoBCR.Tipo_Panel  ",
                $this->condicion." GROUP by T_PuntoBCR.ID_PuntoBCR  order by T_TipoPuntoBCR.Tipo_Punto");
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
    
    public function obtiene_distritos(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->trae_datos(
            "T_Distrito", 
            "*",
            $this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true; 
        //echo "distrito x2";
    }
    
    public function obtiene_cantones(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->trae_datos(
            "T_Canton", 
            "*",
            $this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true; 
        //echo "canton x2";
    }
    
    public function obtiene_provincias(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->trae_datos(
            "T_Provincia", 
            "*",
            $this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true; 
        //echo "provincia x2";
    }
    
    public function actualizar_ubicacion_puntobcr(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->edita_datos("T_PuntoBCR", "ID_Distrito='".$this->id."', ". "Direccion='".$this->direccion."', Geolocalizacion='".$this->observaciones."'",$this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function actualizar_informacion_general_puntobcr(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->edita_datos("T_PuntoBCR", "Codigo='".$this->codigo."', ". "Cuenta_SIS='".$this->cuentasis."', "."Nombre='".$this->nombre."', "."Tipo_Panel='".$this->tipo_panel."', "."ID_Tipo_Punto='".$this->id."'",$this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function guardar_punto_bcr(){
        $this->obj_data_provider->conectar();
        $this->obj_data_provider->inserta_datos("T_PuntoBCR", "`ID_PuntoBCR`, `Nombre`, `Direccion`, `Codigo`, `Cuenta_SIS`, `ID_Horario`, `ID_Tipo_Punto`, `ID_Empresa`, `ID_Gerente_Zona`, `ID_Supervisor_Zona`, `ID_Distrito`, `Observaciones`, `Estado`", "'".$this->id."','".$this->nombre."','".$this->direccion."','".$this->codigo."','".$this->cuentasis."','".$this->horaslaborales."','".$this->tipo_punto."','".$this->empresa."','"."1"."','"."1"."','".$this->distrito."','".$this->observaciones."','".$this->estado."'");
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function actualizar_informacion_adicional_puntobcr(){
        $this->obj_data_provider->conectar();
        $this->arreglo=$this->obj_data_provider->edita_datos("T_PuntoBCR", "ID_Empresa='".$this->empresa."', Observaciones='".$this->observaciones."', ID_Gerente_Zona='".$this->gerente."', ID_Supervisor_Zona='".$this->supervisor."'",$this->condicion);
        $this->arreglo=$this->obj_data_provider->getArreglo();
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function actualizar_estado_puntobcr(){
        $this->obj_data_provider->conectar();
        $this->obj_data_provider->edita_datos("T_PuntoBCR", "Estado='".$this->estado."'",$this->condicion);
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function actualizar_supervisor_puntobcr(){
        $this->obj_data_provider->conectar();
        $this->obj_data_provider->edita_datos("T_PuntoBCR", "ID_Supervisor_Zona='".$this->supervisor."'",$this->condicion);
        $this->obj_data_provider->desconectar();
        $this->resultado_operacion=true;
    }
    
    public function obtiene_todos_los_puntos_bcr_publico(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR
                    LEFT OUTER JOIN T_Horario ON T_PuntoBCR.ID_Horario= T_Horario.ID_Horario
                    LEFT OUTER JOIN T_TipoPuntoBCR ON T_PuntoBCR.ID_Tipo_Punto = T_TipoPuntoBCR.ID_Tipo_Punto
                    LEFT OUTER JOIN T_UE_PuntoBCR ON T_PuntoBCR.ID_PuntoBCR= T_UE_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_UnidadEjecutora ON T_UE_PuntoBCR.ID_Unidad_Ejecutora = T_UnidadEjecutora.ID_Unidad_Ejecutora
                    LEFT OUTER JOIN T_Telefono on T_PuntoBCR.ID_PuntoBCR = T_Telefono.ID
                    LEFT OUTER JOIN T_TipoTelefono ON T_Telefono.ID_Tipo_Telefono = T_TipoTelefono.ID_Tipo_Telefono", 
                "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion,T_PuntoBCR.Geolocalizacion,
                    T_Horario.*,
                    T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
                    T_UnidadEjecutora.ID_Unidad_Ejecutora, T_UnidadEjecutora.Departamento,
                    GROUP_CONCAT(char(10),T_TipoTelefono.Tipo_Telefono,': ',T_Telefono.Numero) as Numero",
                "(T_TipoTelefono.ID_Tipo_Telefono = '1') AND 
                    (T_TipoPuntoBCR.ID_Tipo_Punto='1' OR T_TipoPuntoBCR.ID_Tipo_Punto='5' OR T_TipoPuntoBCR.ID_Tipo_Punto='9'
                    OR T_TipoPuntoBCR.ID_Tipo_Punto='10' OR T_TipoPuntoBCR.ID_Tipo_Punto='11') AND (T_PuntoBCR.Estado='1') 
                    group by T_PuntoBCR.ID_PuntoBCR");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
    }  
    
    public function obtiene_todos_los_puntos_bcr_telefonos(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR
                    LEFT OUTER JOIN T_TipoPuntoBCR ON T_PuntoBCR.ID_Tipo_Punto = T_TipoPuntoBCR.ID_Tipo_Punto
                    LEFT OUTER JOIN T_UE_PuntoBCR ON T_PuntoBCR.ID_PuntoBCR= T_UE_PuntoBCR.ID_PuntoBCR
                    LEFT OUTER JOIN T_UnidadEjecutora ON T_UE_PuntoBCR.ID_Unidad_Ejecutora = T_UnidadEjecutora.ID_Unidad_Ejecutora
                    LEFT OUTER JOIN T_Telefono on T_PuntoBCR.ID_PuntoBCR = T_Telefono.ID
                    LEFT OUTER JOIN T_TipoTelefono ON T_Telefono.ID_Tipo_Telefono = T_TipoTelefono.ID_Tipo_Telefono", 
                "T_PuntoBCR.ID_PuntoBCR, T_PuntoBCR.Nombre, T_PuntoBCR.Direccion, T_PuntoBCR.Codigo,
                    T_TipoPuntoBCR.ID_Tipo_Punto, T_TipoPuntoBCR.Tipo_Punto,
                    T_UnidadEjecutora.ID_Unidad_Ejecutora, T_UnidadEjecutora.Departamento,
                    GROUP_CONCAT(char(10),T_TipoTelefono.Tipo_Telefono,': ',T_Telefono.Numero) as Numero",
                "(T_TipoTelefono.ID_Tipo_Telefono = '1' OR T_TipoTelefono.ID_Tipo_Telefono = '6') 
                    AND (T_PuntoBCR.Estado='1') 
                    group by T_PuntoBCR.ID_PuntoBCR");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
    }
    
    public function obtiene_solo_los_puntos_bcr(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR", 
                "*",
                "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR", 
                "*",
                $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
    }
    public function obtiene_puntos_bcr_supervisor(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN t_supervisorzona z on p.ID_Supervisor_Zona = z.ID_Supervisor_Zona ".
                "INNER JOIN T_PersonalExterno e on e.ID_Persona_Externa = z.ID_Persona_Externa ", 
                "p.ID_PuntoBCR, p.Nombre, CONCAT(e.Apellido,' ',e.Nombre) Supervisor ",
                "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN t_supervisorzona z on p.ID_Supervisor_Zona = z.ID_Supervisor_Zona ".
                "INNER JOIN T_PersonalExterno e on e.ID_Persona_Externa = z.ID_Persona_Externa ", 
                "p.ID_PuntoBCR, p.Nombre, CONCAT(e.Apellido,' ',e.Nombre) Supervisor ",
                $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
    }
    public function obtiene_punto_cencon(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN T_TipoPuntoBCR t ON t.ID_Tipo_Punto = p.ID_Tipo_Punto", 
                "p.ID_PuntoBCR, p.Nombre,t.Tipo_Punto, p.Codigo",
                "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN T_TipoPuntoBCR t ON t.ID_Tipo_Punto = p.ID_Tipo_Punto", 
                "p.ID_PuntoBCR, p.Nombre,t.Tipo_Punto, p.Codigo",
                $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        } 
    }
        public function obtiene_punto_pruebasAlarma(){
        $this->obj_data_provider->conectar();
        if($this->condicion==""){
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN T_TipoPuntoBCR t ON t.ID_Tipo_Punto = p.ID_Tipo_Punto ".
                "LEFT JOIN T_Horario h ON p.ID_Horario= h.ID_Horario ", 
                "p.ID_PuntoBCR, p.Nombre,t.Tipo_Punto, p.Codigo, p.ID_Horario_Apertura, p.ID_Tipo_Punto, ".
                "h.Hora_Apertura_Domingo,h.Hora_Cierre_Domingo, h.Hora_Apertura_Lunes, h.Hora_Cierre_Lunes, ".
                "h.Hora_Apertura_Martes, h.Hora_Cierre_Martes, h.Hora_Apertura_Miercoles, h.Hora_Cierre_Miercoles, ".
                "h.Hora_Apertura_Jueves, h.Hora_Cierre_Jueves, h.Hora_Apertura_Viernes, h.Hora_Cierre_Viernes, ".
                "h.Hora_Apertura_Sabado, h.Hora_Cierre_Sabado ",
                "");
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        }
        else{
            $this->arreglo=$this->obj_data_provider->trae_datos(
                "T_PuntoBCR p INNER JOIN T_TipoPuntoBCR t ON t.ID_Tipo_Punto = p.ID_Tipo_Punto ".
                "LEFT JOIN T_Horario h ON p.ID_Horario= h.ID_Horario ", 
                "p.ID_PuntoBCR, p.Nombre,t.Tipo_Punto, p.Codigo, p.ID_Horario_Apertura, p.ID_Tipo_Punto, ".
                "h.Hora_Apertura_Domingo,h.Hora_Cierre_Domingo, h.Hora_Apertura_Lunes, h.Hora_Cierre_Lunes, ".
                "h.Hora_Apertura_Martes, h.Hora_Cierre_Martes, h.Hora_Apertura_Miercoles, h.Hora_Cierre_Miercoles, ".
                "h.Hora_Apertura_Jueves, h.Hora_Cierre_Jueves, h.Hora_Apertura_Viernes, h.Hora_Cierre_Viernes, ".
                "h.Hora_Apertura_Sabado, h.Hora_Cierre_Sabado ",
                $this->condicion);
            $this->arreglo=$this->obj_data_provider->getArreglo();
            $this->obj_data_provider->desconectar();
            $this->resultado_operacion=true;
        } 
    }
}?>