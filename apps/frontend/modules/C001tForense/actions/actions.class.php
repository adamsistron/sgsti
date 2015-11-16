<?php

/**
 * autoC001tForense actions.
 * NombreClaseModel(C001tForense)
 * NombreTabla(c001t_forense)
 * @package    ##PROJECT_NAME##
 * @subpackage autoC001tForense
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class C001tForenseActions extends autoC001tForenseActions
{

  public function executeIndex(sfWebRequest $request)
  {
   
    $this->forward('C001tForense', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('C001tForense', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }
  
  public function executeDetalle(sfWebRequest $request)
  {
      $c = new Criteria();
      $c->clearSelectColumns();
      $c->addSelectColumn(J813tRegionPeer::TX_REGION);
      $c->addSelectColumn(J814tNegocioPeer::TX_NEGOCIO);
      $c->addSelectColumn(J815tDivisionPeer::TX_DIVISION);
      $c->addSelectColumn(C001tForensePeer::CO_FORENSE);
      $c->addSelectColumn(J802tClasificacionPeer::TX_CLASIFICACION);
      $c->addSelectColumn(C001tForensePeer::TX_TITULO);
      $c->addSelectColumn(C001tForensePeer::TX_CASO_AAII);
      $c->addSelectColumn(C001tForensePeer::TX_DESCRIPCION_SOLICITUD);
      $c->addSelectColumn(C001tForensePeer::TX_OBSERVACIONES);
      $c->addSelectColumn(J001tAlcanceForensePeer::TX_DESCRIPCION);
      $c->addSelectColumn(C001tForensePeer::FE_APERTURA);
      $c->addJoin(J813tRegionPeer::CO_REGION,  C001tForensePeer::CO_REGION);
      $c->addJoin(J814tNegocioPeer::CO_NEGOCIO, C001tForensePeer::CO_NEGOCIO);
      $c->addJoin(J815tDivisionPeer::CO_DIVISION, C001tForensePeer::CO_DIVISION);      
      $c->addJoin(J802tClasificacionPeer::CO_CLASIFICACION, C001tForensePeer::CO_CLASIFICACION);
      $c->addJoin(J001tAlcanceForensePeer::CO_ALCANCE_FORENSE, C001tForensePeer::CO_ALCANCE_FORENSE);
      $c->add(C001tForensePeer::CO_FORENSE, $this->getRequestParameter("co_forense"));
      
      $stmt = C001tForensePeer::doSelectStmt($c);
      
      $campos = $stmt->fetch(PDO::FETCH_ASSOC);
      
      $this->data = json_encode(array(
           "co_forense"    => $campos['co_forense'],
           "tx_region"  => $campos['tx_region'],
           "tx_division" => $campos['tx_division'],
           "tx_negocio" => $campos['tx_negocio'],     
           "tx_clasificacion" => $campos['tx_clasificacion'],     
           "tx_titulo" => $campos['tx_titulo'],     
           "tx_caso_aaii" => $campos['tx_caso_aaii'],
           "tx_descripcion_solicitud" => $campos['tx_descripcion_solicitud'],
           "tx_observaciones" => $campos['tx_observaciones'],
           "tx_descripcion" => $campos['tx_descripcion'],
           "fe_apertura" => $campos['fe_apertura']
      ));
      
  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(C001tForensePeer::CO_FORENSE,$codigo);
        
        $stmt = C001tForensePeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_forense"     => $campos["co_forense"],
                            "fe_apertura"     => $campos["fe_apertura"],
                            "fe_cierre"     => $campos["fe_cierre"],
                            "co_usuario_apertura"     => $campos["co_usuario_apertura"],
                            "co_usuario_cierre"     => $campos["co_usuario_cierre"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                            "co_division"     => $campos["co_division"],
                            "tx_serial"     => $campos["tx_serial"],
                            "tx_titulo"     => $campos["tx_titulo"],
                            "tx_descripcion_solicitud"     => $campos["tx_descripcion_solicitud"],
                            "tx_caso_aaii"     => $campos["tx_caso_aaii"],
                            "co_alcance_forense"     => $campos["co_alcance_forense"],
                            "tx_metologia_herramientas"     => $campos["tx_metologia_herramientas"],
                            "tx_observaciones"     => $campos["tx_observaciones"],
                            "co_transaccion"     => $campos["co_transaccion"],
                            "co_clasificacion"     => $campos["co_clasificacion"],
                            "in_abierto"     => $campos["in_abierto"],
                            "created_at"     => $campos["created_at"],
                            "update_at"     => $campos["update_at"],
                            "co_estado_forense"     => $campos["co_estado_forense"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_forense"     => "",
                            "fe_apertura"     => "",
                            "fe_cierre"     => "",
                            "co_usuario_apertura"     => "",
                            "co_usuario_cierre"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                            "co_division"     => "",
                            "tx_serial"     => "",
                            "tx_titulo"     => "",
                            "tx_descripcion_solicitud"     => "",
                            "tx_caso_aaii"     => "",
                            "co_alcance_forense"     => "",
                            "tx_metologia_herramientas"     => "",
                            "tx_observaciones"     => "",
                            "co_transaccion"     => "",
                            "co_clasificacion"     => "",
                            "in_abierto"     => "",
                            "created_at"     => "",
                            "update_at"     => "",
                            "co_estado_forense"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_forense");
        
     $con = Propel::getConnection();
    
     try
      { 
        $con->beginTransaction();
        
         if($codigo!=''||$codigo!=null){
             $c001t_forense = C001tForensePeer::retrieveByPk($codigo);
         }else{
             $c001t_forense = new C001tForense(); 
             
             $transaccion = new C801tTransaccion();
             $transaccion->setCoProducto(49)
                         ->save($con);                         
             
         }
       
        $c001t_forenseForm = $this->getRequestParameter('c001t_forense');
                                               
        /*Campo tipo DATE */
        list($dia, $mes, $anio) = explode("/",$c001t_forenseForm["fe_apertura"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c001t_forense->setFeApertura($fecha);
    
        /*Campo tipo BIGINT */
        $c001t_forense->setCoRegion($c001t_forenseForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $c001t_forense->setCoNegocio($c001t_forenseForm["co_negocio"]);
                                                        
        /*Campo tipo BIGINT */
        $c001t_forense->setCoDivision($c001t_forenseForm["co_division"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxSerial($c001t_forenseForm["tx_serial"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxTitulo($c001t_forenseForm["tx_titulo"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxDescripcionSolicitud($c001t_forenseForm["tx_descripcion_solicitud"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxCasoAaii($c001t_forenseForm["tx_caso_aaii"]);
                                                        
        /*Campo tipo BIGINT */
        $c001t_forense->setCoAlcanceForense($c001t_forenseForm["co_alcance_forense"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxMetologiaHerramientas($c001t_forenseForm["tx_metologia_herramientas"]);
                                                        
        /*Campo tipo VARCHAR */
        $c001t_forense->setTxObservaciones($c001t_forenseForm["tx_observaciones"]);
                                                        
        /*Campo tipo BIGINT */
        $c001t_forense->setCoTransaccion($c001t_forenseForm["co_transaccion"]);
                                                        
        /*Campo tipo BIGINT */
        $c001t_forense->setCoClasificacion($c001t_forenseForm["co_clasificacion"]);
        
         $c001t_forense->setCoTransaccion($transaccion->getCoTransaccion());
        
                                                        
        /*Campo tipo BOOLEAN */
        if (array_key_exists("in_abierto", $c001t_forenseForm)){
            $c001t_forense->setInAbierto(false);
        }else{
            $c001t_forense->setInAbierto(true);
        }
                                                          
        /*Campo tipo BIGINT */
        $c001t_forense->setCoEstadoForense(1);
                                
        /*CAMPOS*/
        $c001t_forense->save($con);
        
        
        
        $this->data = json_encode(array(
                    "success" => true,
                    "msg" => 'Modificación realizada exitosamente'
                ));
        $con->commit();
      }catch (PropelException $e)
      {
        $con->rollback();
        $this->data = json_encode(array(
            "success" => false,
            "msg" =>  $e->getMessage()
        ));
      }
    }
  

  public function executeEliminar(sfWebRequest $request)
  {
	$codigo = $this->getRequestParameter("co_forense");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$c001t_forense = C001tForensePeer::retrieveByPk($codigo);			
	$c001t_forense->delete($con);
		$this->data = json_encode(array(
			    "success" => true,
			    "msg" => 'Registro Borrado con exito!'
		));
	$con->commit();
	}catch (PropelException $e)
	{
	$con->rollback();
		$this->data = json_encode(array(
		    "success" => false,
//		    "msg" =>  $e->getMessage()
		    "msg" => 'Este registro no se puede borrar porque <br>se encuentra asociado a otros registros'
		));
	}
  }

  public function executeLista(sfWebRequest $request)
  {
      
  }

  public function executeStorelista(sfWebRequest $request)
  {
    $paginar    =   $this->getRequestParameter("paginar");
    $limit      =   $this->getRequestParameter("limit",20);
    $start      =   $this->getRequestParameter("start",0);
    
    $fe_apertura      =   $this->getRequestParameter("fe_apertura");
    $fe_cierre      =   $this->getRequestParameter("fe_cierre");
    $co_usuario_apertura      =   $this->getRequestParameter("co_usuario_apertura");
    $co_usuario_cierre      =   $this->getRequestParameter("co_usuario_cierre");
    $co_region      =   $this->getRequestParameter("co_region");
    $co_negocio      =   $this->getRequestParameter("co_negocio");
    $co_division      =   $this->getRequestParameter("co_division");
    $tx_serial      =   $this->getRequestParameter("tx_serial");
    $tx_titulo      =   $this->getRequestParameter("tx_titulo");
    $tx_descripcion_solicitud      =   $this->getRequestParameter("tx_descripcion_solicitud");
    $tx_caso_aaii      =   $this->getRequestParameter("tx_caso_aaii");
    $co_alcance_forense      =   $this->getRequestParameter("co_alcance_forense");
    $tx_metologia_herramientas      =   $this->getRequestParameter("tx_metologia_herramientas");
    $tx_observaciones      =   $this->getRequestParameter("tx_observaciones");
    $co_transaccion      =   $this->getRequestParameter("co_transaccion");
    $co_clasificacion      =   $this->getRequestParameter("co_clasificacion");
    $in_abierto      =   $this->getRequestParameter("in_abierto");
    $created_at      =   $this->getRequestParameter("created_at");
    $update_at      =   $this->getRequestParameter("update_at");
    $co_estado_forense      =   $this->getRequestParameter("co_estado_forense");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(C001tForensePeer::CO_FORENSE);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                            
        if($fe_apertura!=""){
    list($dia, $mes,$anio) = explode("/",$fe_apertura);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C001tForensePeer::FE_APERTURA,$fecha);
    }
                                    
        if($fe_cierre!=""){
    list($dia, $mes,$anio) = explode("/",$fe_cierre);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C001tForensePeer::FE_CIERRE,$fecha);
    }
        if($co_usuario_apertura!=""){$c->add(C001tForensePeer::CO_USUARIO_APERTURA,$co_usuario_apertura);}

        if($co_usuario_cierre!=""){$c->add(C001tForensePeer::CO_USUARIO_CIERRE,$co_usuario_cierre);}

        if($co_region!=""){$c->add(C001tForensePeer::CO_REGION,$co_region);}

        if($co_negocio!=""){$c->add(C001tForensePeer::CO_NEGOCIO,$co_negocio);}

        if($co_division!=""){$c->add(C001tForensePeer::CO_DIVISION,$co_division);}

        if($tx_serial!=""){$c->add(C001tForensePeer::TX_SERIAL,'%'.$tx_serial.'%',Criteria::LIKE);}

        if($tx_titulo!=""){$c->add(C001tForensePeer::TX_TITULO,'%'.$tx_titulo.'%',Criteria::LIKE);}

        if($tx_descripcion_solicitud!=""){$c->add(C001tForensePeer::TX_DESCRIPCION_SOLICITUD,'%'.$tx_descripcion_solicitud.'%',Criteria::LIKE);}

        if($tx_caso_aaii!=""){$c->add(C001tForensePeer::TX_CASO_AAII,'%'.$tx_caso_aaii.'%',Criteria::LIKE);}

        if($co_alcance_forense!=""){$c->add(C001tForensePeer::CO_ALCANCE_FORENSE,$co_alcance_forense);}

        if($tx_metologia_herramientas!=""){$c->add(C001tForensePeer::TX_METOLOGIA_HERRAMIENTAS,'%'.$tx_metologia_herramientas.'%',Criteria::LIKE);}

        if($tx_observaciones!=""){$c->add(C001tForensePeer::TX_OBSERVACIONES,'%'.$tx_observaciones.'%',Criteria::LIKE);}

        if($co_transaccion!=""){$c->add(C001tForensePeer::CO_TRANSACCION,$co_transaccion);}

        if($co_clasificacion!=""){$c->add(C001tForensePeer::CO_CLASIFICACION,$co_clasificacion);}
    
                                    
                                    
    if($created_at!=""){
        list($dia, $mes,$anio) = explode("/",$created_at);
        $fecha = $anio."-".$mes."-".$dia;
        $c->add(C001tForensePeer::CREATED_AT,$fecha);
    }
                                    
    if($update_at!=""){
        list($dia, $mes,$anio) = explode("/",$update_at);
        $fecha = $anio."-".$mes."-".$dia;
        $c->add(C001tForensePeer::UPDATE_AT,$fecha);
    }
    if($co_estado_forense!=""){
        $c->add(C001tForensePeer::CO_ESTADO_FORENSE,$co_estado_forense);
        
    }
    
    }
    $c->setIgnoreCase(true);
    $cantidadTotal = C001tForensePeer::doCount($c);
    
    $stmt = C001tForensePeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_forense"     => trim($res["co_forense"]),
            "fe_apertura"     => trim($res["fe_apertura"]),
            "fe_cierre"     => trim($res["fe_cierre"]),
            "co_usuario_apertura"     => trim($res["co_usuario_apertura"]),
            "co_usuario_cierre"     => trim($res["co_usuario_cierre"]),
            "co_region"     => trim(J813tRegionPeer::getTxRegion($res["co_region"])),
            "co_negocio"     => trim($res["co_negocio"]),
            "co_division"     => trim($res["co_division"]),
            "tx_serial"     => trim($res["tx_serial"]),
            "tx_titulo"     => trim($res["tx_titulo"]),
            "tx_descripcion_solicitud"     => trim($res["tx_descripcion_solicitud"]),
            "tx_caso_aaii"     => trim($res["tx_caso_aaii"]),
            "co_alcance_forense"     => trim($res["co_alcance_forense"]),
            "tx_metologia_herramientas"     => trim($res["tx_metologia_herramientas"]),
            "tx_observaciones"     => trim($res["tx_observaciones"]),
            "co_transaccion"     => trim($res["co_transaccion"]),
            "co_clasificacion"     => trim($res["co_clasificacion"]),
            "in_abierto"     => trim($res["in_abierto"]),
            "created_at"     => trim($res["created_at"]),
            "update_at"     => trim($res["update_at"]),
            "co_estado_forense"     => trim(J004tEstadoForensePeer::getTxEstado($res["co_estado_forense"])),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
    }

                                            //modelo fk j811t_usuario.CO_USUARIO
    public function executeStorefkcousuarioapertura(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J811tUsuarioPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                    //modelo fk j811t_usuario.CO_USUARIO
    public function executeStorefkcousuariocierre(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J811tUsuarioPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                    //modelo fk j813t_region.CO_REGION
    public function executeStorefkcoregion(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J813tRegionPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                    //modelo fk j814t_negocio.CO_NEGOCIO
    public function executeStorefkconegocio(sfWebRequest $request){
        $c = new Criteria();
        
        $stmt = J814tNegocioPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                    //modelo fk j815t_division.CO_DIVISION
    public function executeStorefkcodivision(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J815tDivisionPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                                                                    //modelo fk j001t_alcance_forense.CO_ALCANCE_FORENSE
    public function executeStorefkcoalcanceforense(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J001tAlcanceForensePeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                                            //modelo fk c801t_transaccion.CO_TRANSACCION
    public function executeStorefkcotransaccion(sfWebRequest $request){
        $c = new Criteria();
        $stmt = C801tTransaccionPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                    //modelo fk j802t_clasificacion.CO_CLASIFICACION
    public function executeStorefkcoclasificacion(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J802tClasificacionPeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
                                                        //modelo fk j004t_estado_forense.CO_ESTADO_FORENSE
    public function executeStorefkcoestadoforense(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J004tEstadoForensePeer::doSelectStmt($c);
        $registros = array();
        while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){
            $registros[] = $reg;
        }

        $this->data = json_encode(array(
            "success"   =>  true,
            "total"     =>  count($registros),
            "data"      =>  $registros
            ));
        $this->setTemplate('store');
    }
        


}
