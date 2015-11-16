<?php

/**
 * autoC003tActaAcc actions.
 * NombreClaseModel(C003tActaAcc)
 * NombreTabla(c003t_acta_acc)
 * @package    ##PROJECT_NAME##
 * @subpackage autoC003tActaAcc
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class C003tActaAccActions extends autoC003tActaAccActions
{

  public function executeIndex(sfWebRequest $request)
  {
     $this->forward('C003tActaAcc', 'lista');    
     
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('C003tActaAcc', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(C003tActaAccPeer::CO_ACC,$codigo);
        
        $stmt = C003tActaAccPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_acc"     => $campos["co_acc"],
                            "fe_emision"     => $campos["fe_emision"],
                            "co_forense"     => $campos["co_forense"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                            "co_division"     => $campos["co_division"],
                            "tx_serial"     => $campos["tx_serial"],
                            "co_estado_acta"     => $campos["co_estado_acta"],
                            "fe_destruye"     => $campos["fe_destruye"],
                            "co_destruye"     => $campos["co_destruye"],
                            "tx_observaciones"     => $campos["tx_observaciones"],
                            "tx_ruta"     => $campos["tx_ruta"],
                            "nb_archivo"     => $campos["nb_archivo"],
                            "in_abierta"     => $campos["in_abierta"],
                            "co_clasificacion"     => $campos["co_clasificacion"],
                            "co_transaccion"     => $campos["co_transaccion"],
                            "created_at"     => $campos["created_at"],
                            "updated_at"     => $campos["updated_at"],
                            "co_elabora"     => $campos["co_elabora"],
                            "co_custodio"     => $campos["co_custodio"],
                            "co_tipo_recurso"     => $campos["co_tipo_recurso"],
                            "co_ciudad_acta"     => $campos["co_ciudad_acta"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_acc"     => "",
                            "fe_emision"     => "",
                            "co_forense"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                            "co_division"     => "",
                            "tx_serial"     => "",
                            "co_estado_acta"     => "",
                            "fe_destruye"     => "",
                            "co_destruye"     => "",
                            "tx_observaciones"     => "",
                            "tx_ruta"     => "",
                            "nb_archivo"     => "",
                            "in_abierta"     => "",
                            "co_clasificacion"     => "",
                            "co_transaccion"     => "",
                            "created_at"     => "",
                            "updated_at"     => "",
                            "co_elabora"     => "",
                            "co_custodio"     => "",
                            "co_tipo_recurso"     => "",
                            "co_ciudad_acta"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_acc");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $c003t_acta_acc = C003tActaAccPeer::retrieveByPk($codigo);
     }else{
         $c003t_acta_acc = new C003tActaAcc();
     }
     try
      { 
        $con->beginTransaction();
       
        $c003t_acta_accForm = $this->getRequestParameter('c003t_acta_acc');
/*CAMPOS*/
                                                
        /*Campo tipo DATE */
        list($dia, $mes, $anio) = explode("/",$c003t_acta_accForm["fe_emision"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c003t_acta_acc->setFeEmision($fecha);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoForense($c003t_acta_accForm["co_forense"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoRegion($c003t_acta_accForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoNegocio($c003t_acta_accForm["co_negocio"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoDivision($c003t_acta_accForm["co_division"]);
                                                        
        /*Campo tipo VARCHAR */
        $c003t_acta_acc->setTxSerial($c003t_acta_accForm["tx_serial"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoEstadoActa($c003t_acta_accForm["co_estado_acta"]);
                                                                
        /*Campo tipo DATE */
        list($dia, $mes, $anio) = explode("/",$c003t_acta_accForm["fe_destruye"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c003t_acta_acc->setFeDestruye($fecha);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoDestruye($c003t_acta_accForm["co_destruye"]);
                                                        
        /*Campo tipo VARCHAR */
        $c003t_acta_acc->setTxObservaciones($c003t_acta_accForm["tx_observaciones"]);
                                                        
        /*Campo tipo VARCHAR */
        $c003t_acta_acc->setTxRuta($c003t_acta_accForm["tx_ruta"]);
                                                        
        /*Campo tipo VARCHAR */
        $c003t_acta_acc->setNbArchivo($c003t_acta_accForm["nb_archivo"]);
                                                        
        /*Campo tipo BOOLEAN */
        if (array_key_exists("in_abierta", $c003t_acta_accForm)){
            $c003t_acta_acc->setInAbierta(false);
        }else{
            $c003t_acta_acc->setInAbierta(true);
        }
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoClasificacion($c003t_acta_accForm["co_clasificacion"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoTransaccion($c003t_acta_accForm["co_transaccion"]);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$c003t_acta_accForm["created_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c003t_acta_acc->setCreatedAt($fecha);
                                                        
        /*Campo tipo TIME */
        $c003t_acta_acc->setUpdatedAt($c003t_acta_accForm["updated_at"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoElabora($c003t_acta_accForm["co_elabora"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoCustodio($c003t_acta_accForm["co_custodio"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoTipoRecurso($c003t_acta_accForm["co_tipo_recurso"]);
                                                        
        /*Campo tipo BIGINT */
        $c003t_acta_acc->setCoCiudadActa($c003t_acta_accForm["co_ciudad_acta"]);
                                
        /*CAMPOS*/
        $c003t_acta_acc->save($con);
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
	$codigo = $this->getRequestParameter("co_acc");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$c003t_acta_acc = C003tActaAccPeer::retrieveByPk($codigo);			
	$c003t_acta_acc->delete($con);
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
        $this->data = json_encode(array(
                "co_forense"  => $this->getRequestParameter("co_forense")
        ));
  }

  public function executeStorelista(sfWebRequest $request)
  {
            $paginar    =   $this->getRequestParameter("paginar");
            $limit      =   $this->getRequestParameter("limit",20);
            $start      =   $this->getRequestParameter("start",0);
            
           
            $co_forense      =   $this->getRequestParameter("co_forense");
    
    
    $c = new Criteria();

    if($paginar=='si') 
        $c->setLimit($limit)->setOffset($start);
        
    $c->addAscendingOrderByColumn(C003tActaAccPeer::CO_ACC);
    if($co_forense!=""){
        $c->add(C003tActaAccPeer::CO_FORENSE,$co_forense);
    }
    
    $c->setIgnoreCase(true);
    $cantidadTotal = C003tActaAccPeer::doCount($c);    
    
    $stmt = C003tActaAccPeer::doSelectStmt($c);
    
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_acc"     => trim($res["co_acc"]),
            "fe_emision"     => trim($res["fe_emision"]),
            "co_forense"     => trim($res["co_forense"]),
            "co_region"     => trim($res["co_region"]),
            "co_negocio"     => trim($res["co_negocio"]),
            "co_division"     => trim($res["co_division"]),
            "tx_serial"     => trim($res["tx_serial"]),
            "co_estado_acta"     => trim($res["co_estado_acta"]),
            "fe_destruye"     => trim($res["fe_destruye"]),
            "co_destruye"     => trim($res["co_destruye"]),
            "tx_observaciones"     => trim($res["tx_observaciones"]),
            "tx_ruta"     => trim($res["tx_ruta"]),
            "nb_archivo"     => trim($res["nb_archivo"]),
            "in_abierta"     => trim($res["in_abierta"]),
            "co_clasificacion"     => trim($res["co_clasificacion"]),
            "co_transaccion"     => trim($res["co_transaccion"]),
            "created_at"     => trim($res["created_at"]),
            "updated_at"     => trim($res["updated_at"]),
            "co_elabora"     => trim($res["co_elabora"]),
            "co_custodio"     => trim($res["co_custodio"]),
            "co_tipo_recurso"     => trim($res["co_tipo_recurso"]),
            "co_ciudad_acta"     => trim($res["co_ciudad_acta"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
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
                                //modelo fk j005t_estado_acta.CO_ESTADO_ACTA
    public function executeStorefkcoestadoacta(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J005tEstadoActaPeer::doSelectStmt($c);
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
    public function executeStorefkcodestruye(sfWebRequest $request){
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
                                            //modelo fk j811t_usuario.CO_USUARIO
    public function executeStorefkcoelabora(sfWebRequest $request){
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
                    //modelo fk j812_persona.CO_PERSONA
    public function executeStorefkcocustodio(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J812PersonaPeer::doSelectStmt($c);
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
                    //modelo fk j805t_tipo_recurso.CO_TIPO_RECURSO
    public function executeStorefkcotiporecurso(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J805tTipoRecursoPeer::doSelectStmt($c);
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
                    //modelo fk j806t_ciudad.CO_CIUDAD
    public function executeStorefkcociudadacta(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J806tCiudadPeer::doSelectStmt($c);
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