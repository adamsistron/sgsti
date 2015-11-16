<?php

/**
 * autoC002tInformeForense actions.
 * NombreClaseModel(C002tInformeForense)
 * NombreTabla(c002t_informe_forense)
 * @package    ##PROJECT_NAME##
 * @subpackage autoC002tInformeForense
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class C002tInformeForenseActions extends autoC002tInformeForenseActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('C002tInformeForense', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('C002tInformeForense', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    $this->co_forense = $this->getRequestParameter("co_forense");
   
      
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(C002tInformeForensePeer::CO_INFORME_FORENSE,$codigo);
        
        $stmt = C002tInformeForensePeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_informe_forense"     => $campos["co_informe_forense"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                            "co_division"     => $campos["co_division"],
                            "co_estado_informe"     => $campos["co_estado_informe"],
                            "tx_serial"     => $campos["tx_serial"],
                            "tx_titulo"     => $campos["tx_titulo"],
                            "tx_descripcion_entorno"     => $campos["tx_descripcion_entorno"],
                            "tx_resultados"     => $campos["tx_resultados"],
                            "tx_conclusiones"     => $campos["tx_conclusiones"],
                            "tx_observaciones"     => $campos["tx_observaciones"],
                            "tx_ruta"     => $campos["tx_ruta"],
                            "nb_archivo"     => $campos["nb_archivo"],
                            "co_transaccion"     => $campos["co_transaccion"],
                            "co_clasificacion"     => $campos["co_clasificacion"],
                            "in_abierto"     => $campos["in_abierto"],
                            "created_at"     => $campos["created_at"],
                            "update_at"     => $campos["update_at"],
                            "co_forense"     => $campos["co_forense"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_informe_forense"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                            "co_division"     => "",
                            "co_estado_informe"     => "",
                            "tx_serial"     => "",
                            "tx_titulo"     => "",
                            "tx_descripcion_entorno"     => "",
                            "tx_resultados"     => "",
                            "tx_conclusiones"     => "",
                            "tx_observaciones"     => "",
                            "tx_ruta"     => "",
                            "nb_archivo"     => "",
                            "co_transaccion"     => "",
                            "co_clasificacion"     => "",
                            "in_abierto"     => "",
                            "created_at"     => "",
                            "update_at"     => "",
                            "co_forense"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_informe_forense");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $c002t_informe_forense = C002tInformeForensePeer::retrieveByPk($codigo);
     }else{
         $c002t_informe_forense = new C002tInformeForense();
     }
     try
      { 
        $con->beginTransaction();
       
        $c002t_informe_forenseForm = $this->getRequestParameter('c002t_informe_forense');
/*CAMPOS*/
                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoRegion($c002t_informe_forenseForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoNegocio($c002t_informe_forenseForm["co_negocio"]);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoDivision($c002t_informe_forenseForm["co_division"]);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoEstadoInforme($c002t_informe_forenseForm["co_estado_informe"]);
                                                        
        /*Campo tipo VARCHAR */
        $c002t_informe_forense->setTxSerial($c002t_informe_forenseForm["tx_serial"]);
                                                        
        /*Campo tipo VARCHAR */
        $c002t_informe_forense->setTxTitulo($c002t_informe_forenseForm["tx_titulo"]);
                                                        
        /*Campo tipo LONGVARCHAR */
        $c002t_informe_forense->setTxDescripcionEntorno($c002t_informe_forenseForm["tx_descripcion_entorno"]);
                                                        
        /*Campo tipo LONGVARCHAR */
        $c002t_informe_forense->setTxResultados($c002t_informe_forenseForm["tx_resultados"]);
                                                        
        /*Campo tipo LONGVARCHAR */
        $c002t_informe_forense->setTxConclusiones($c002t_informe_forenseForm["tx_conclusiones"]);
                                                        
        /*Campo tipo VARCHAR */
        $c002t_informe_forense->setTxObservaciones($c002t_informe_forenseForm["tx_observaciones"]);
                                                        
        /*Campo tipo VARCHAR */
        $c002t_informe_forense->setTxRuta($c002t_informe_forenseForm["tx_ruta"]);
                                                        
        /*Campo tipo VARCHAR */
        $c002t_informe_forense->setNbArchivo($c002t_informe_forenseForm["nb_archivo"]);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoTransaccion($c002t_informe_forenseForm["co_transaccion"]);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoClasificacion($c002t_informe_forenseForm["co_clasificacion"]);
                                                        
        /*Campo tipo BOOLEAN */
        if (array_key_exists("in_abierto", $c002t_informe_forenseForm)){
            $c002t_informe_forense->setInAbierto(false);
        }else{
            $c002t_informe_forense->setInAbierto(true);
        }
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$c002t_informe_forenseForm["created_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c002t_informe_forense->setCreatedAt($fecha);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$c002t_informe_forenseForm["update_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c002t_informe_forense->setUpdateAt($fecha);
                                                        
        /*Campo tipo BIGINT */
        $c002t_informe_forense->setCoForense($c002t_informe_forenseForm["co_forense"]);
                                
        /*CAMPOS*/
        $c002t_informe_forense->save($con);
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
	$codigo = $this->getRequestParameter("co_informe_forense");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$c002t_informe_forense = C002tInformeForensePeer::retrieveByPk($codigo);			
	$c002t_informe_forense->delete($con);
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
      $co_forense = $this->getRequestParameter("co_forense");
      $this->data = json_encode(array(		   
		    "co_forense" => $co_forense
		));
  }

  public function executeStorelista(sfWebRequest $request)
  {
    $paginar    =   $this->getRequestParameter("paginar");
    $limit      =   $this->getRequestParameter("limit",20);
    $start      =   $this->getRequestParameter("start",0);
                $co_region      =   $this->getRequestParameter("co_region");
            $co_negocio      =   $this->getRequestParameter("co_negocio");
            $co_division      =   $this->getRequestParameter("co_division");
            $co_estado_informe      =   $this->getRequestParameter("co_estado_informe");
            $tx_serial      =   $this->getRequestParameter("tx_serial");
            $tx_titulo      =   $this->getRequestParameter("tx_titulo");
            $tx_descripcion_entorno      =   $this->getRequestParameter("tx_descripcion_entorno");
            $tx_resultados      =   $this->getRequestParameter("tx_resultados");
            $tx_conclusiones      =   $this->getRequestParameter("tx_conclusiones");
            $tx_observaciones      =   $this->getRequestParameter("tx_observaciones");
            $tx_ruta      =   $this->getRequestParameter("tx_ruta");
            $nb_archivo      =   $this->getRequestParameter("nb_archivo");
            $co_transaccion      =   $this->getRequestParameter("co_transaccion");
            $co_clasificacion      =   $this->getRequestParameter("co_clasificacion");
            $in_abierto      =   $this->getRequestParameter("in_abierto");
            $created_at      =   $this->getRequestParameter("created_at");
            $update_at      =   $this->getRequestParameter("update_at");
            $co_forense      =   $this->getRequestParameter("co_forense");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(C002tInformeForensePeer::CO_INFORME_FORENSE);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                    if($co_region!=""){$c->add(C002tInformeForensePeer::CO_REGION,$co_region);}
    
                                            if($co_negocio!=""){$c->add(C002tInformeForensePeer::CO_NEGOCIO,$co_negocio);}
    
                                            if($co_division!=""){$c->add(C002tInformeForensePeer::CO_DIVISION,$co_division);}
    
                                            if($co_estado_informe!=""){$c->add(C002tInformeForensePeer::CO_ESTADO_INFORME,$co_estado_informe);}
    
                                        if($tx_serial!=""){$c->add(C002tInformeForensePeer::TX_SERIAL,'%'.$tx_serial.'%',Criteria::LIKE);}
        
                                        if($tx_titulo!=""){$c->add(C002tInformeForensePeer::TX_TITULO,'%'.$tx_titulo.'%',Criteria::LIKE);}
        
                                        if($tx_descripcion_entorno!=""){$c->add(C002tInformeForensePeer::TX_DESCRIPCION_ENTORNO,'%'.$tx_descripcion_entorno.'%',Criteria::LIKE);}
        
                                        if($tx_resultados!=""){$c->add(C002tInformeForensePeer::TX_RESULTADOS,'%'.$tx_resultados.'%',Criteria::LIKE);}
        
                                        if($tx_conclusiones!=""){$c->add(C002tInformeForensePeer::TX_CONCLUSIONES,'%'.$tx_conclusiones.'%',Criteria::LIKE);}
        
                                        if($tx_observaciones!=""){$c->add(C002tInformeForensePeer::TX_OBSERVACIONES,'%'.$tx_observaciones.'%',Criteria::LIKE);}
        
                                        if($tx_ruta!=""){$c->add(C002tInformeForensePeer::TX_RUTA,'%'.$tx_ruta.'%',Criteria::LIKE);}
        
                                        if($nb_archivo!=""){$c->add(C002tInformeForensePeer::NB_ARCHIVO,'%'.$nb_archivo.'%',Criteria::LIKE);}
        
                                            if($co_transaccion!=""){$c->add(C002tInformeForensePeer::CO_TRANSACCION,$co_transaccion);}
    
                                            if($co_clasificacion!=""){$c->add(C002tInformeForensePeer::CO_CLASIFICACION,$co_clasificacion);}
    
                                    
                                    
        if($created_at!=""){
    list($dia, $mes,$anio) = explode("/",$created_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C002tInformeForensePeer::CREATED_AT,$fecha);
    }
                                    
        if($update_at!=""){
    list($dia, $mes,$anio) = explode("/",$update_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C002tInformeForensePeer::UPDATE_AT,$fecha);
    }
                                            if($co_forense!=""){$c->add(C002tInformeForensePeer::CO_FORENSE,$co_forense);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = C002tInformeForensePeer::doCount($c);
    
    $stmt = C002tInformeForensePeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_informe_forense"     => trim($res["co_informe_forense"]),
            "co_region"     => trim($res["co_region"]),
            "co_negocio"     => trim($res["co_negocio"]),
            "co_division"     => trim($res["co_division"]),
            "co_estado_informe"     => trim($res["co_estado_informe"]),
            "tx_serial"     => trim($res["tx_serial"]),
            "tx_titulo"     => trim($res["tx_titulo"]),
            "tx_descripcion_entorno"     => trim($res["tx_descripcion_entorno"]),
            "tx_resultados"     => trim($res["tx_resultados"]),
            "tx_conclusiones"     => trim($res["tx_conclusiones"]),
            "tx_observaciones"     => trim($res["tx_observaciones"]),
            "tx_ruta"     => trim($res["tx_ruta"]),
            "nb_archivo"     => trim($res["nb_archivo"]),
            "co_transaccion"     => trim($res["co_transaccion"]),
            "co_clasificacion"     => trim($res["co_clasificacion"]),
            "in_abierto"     => trim($res["in_abierto"]),
            "created_at"     => trim($res["created_at"]),
            "update_at"     => trim($res["update_at"]),
            "co_forense"     => trim($res["co_forense"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
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
                    //modelo fk j803t_estado_informe.CO_ESTADO_INFORME
    public function executeStorefkcoestadoinforme(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J803tEstadoInformePeer::doSelectStmt($c);
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
                                                        //modelo fk c001t_forense.CO_FORENSE
    public function executeStorefkcoforense(sfWebRequest $request){
        $c = new Criteria();
        $stmt = C001tForensePeer::doSelectStmt($c);
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