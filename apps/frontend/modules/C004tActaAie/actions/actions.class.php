<?php

/**
 * autoC004tActaAie actions.
 * NombreClaseModel(C004tActaAie)
 * NombreTabla(c004t_acta_aie)
 * @package    ##PROJECT_NAME##
 * @subpackage autoC004tActaAie
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class C004tActaAieActions extends autoC004tActaAieActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('C004tActaAie', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('C004tActaAie', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(C004tActaAiePeer::CO_AIE,$codigo);
        
        $stmt = C004tActaAiePeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_aie"     => $campos["co_aie"],
                            "fe_emision"     => $campos["fe_emision"],
                            "co_forense"     => $campos["co_forense"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                            "co_division"     => $campos["co_division"],
                            "tx_serial"     => $campos["tx_serial"],
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
                            "co_recurso"     => $campos["co_recurso"],
                            "co_ciudad_acta"     => $campos["co_ciudad_acta"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_aie"     => "",
                            "fe_emision"     => "",
                            "co_forense"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                            "co_division"     => "",
                            "tx_serial"     => "",
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
                            "co_recurso"     => "",
                            "co_ciudad_acta"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_aie");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $c004t_acta_aie = C004tActaAiePeer::retrieveByPk($codigo);
     }else{
         $c004t_acta_aie = new C004tActaAie();
     }
     try
      { 
        $con->beginTransaction();
       
        $c004t_acta_aieForm = $this->getRequestParameter('c004t_acta_aie');
/*CAMPOS*/
                                                
        /*Campo tipo DATE */
        list($dia, $mes, $anio) = explode("/",$c004t_acta_aieForm["fe_emision"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c004t_acta_aie->setFeEmision($fecha);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoForense($c004t_acta_aieForm["co_forense"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoRegion($c004t_acta_aieForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoNegocio($c004t_acta_aieForm["co_negocio"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoDivision($c004t_acta_aieForm["co_division"]);
                                                        
        /*Campo tipo VARCHAR */
        $c004t_acta_aie->setTxSerial($c004t_acta_aieForm["tx_serial"]);
                                                        
        /*Campo tipo VARCHAR */
        $c004t_acta_aie->setTxObservaciones($c004t_acta_aieForm["tx_observaciones"]);
                                                        
        /*Campo tipo VARCHAR */
        $c004t_acta_aie->setTxRuta($c004t_acta_aieForm["tx_ruta"]);
                                                        
        /*Campo tipo VARCHAR */
        $c004t_acta_aie->setNbArchivo($c004t_acta_aieForm["nb_archivo"]);
                                                        
        /*Campo tipo BOOLEAN */
        if (array_key_exists("in_abierta", $c004t_acta_aieForm)){
            $c004t_acta_aie->setInAbierta(false);
        }else{
            $c004t_acta_aie->setInAbierta(true);
        }
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoClasificacion($c004t_acta_aieForm["co_clasificacion"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoTransaccion($c004t_acta_aieForm["co_transaccion"]);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$c004t_acta_aieForm["created_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $c004t_acta_aie->setCreatedAt($fecha);
                                                        
        /*Campo tipo TIME */
        $c004t_acta_aie->setUpdatedAt($c004t_acta_aieForm["updated_at"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoElabora($c004t_acta_aieForm["co_elabora"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoCustodio($c004t_acta_aieForm["co_custodio"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoRecurso($c004t_acta_aieForm["co_recurso"]);
                                                        
        /*Campo tipo BIGINT */
        $c004t_acta_aie->setCoCiudadActa($c004t_acta_aieForm["co_ciudad_acta"]);
                                
        /*CAMPOS*/
        $c004t_acta_aie->save($con);
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
	$codigo = $this->getRequestParameter("co_aie");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$c004t_acta_aie = C004tActaAiePeer::retrieveByPk($codigo);			
	$c004t_acta_aie->delete($con);
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
                $fe_emision      =   $this->getRequestParameter("fe_emision");
            $co_forense      =   $this->getRequestParameter("co_forense");
            $co_region      =   $this->getRequestParameter("co_region");
            $co_negocio      =   $this->getRequestParameter("co_negocio");
            $co_division      =   $this->getRequestParameter("co_division");
            $tx_serial      =   $this->getRequestParameter("tx_serial");
            $tx_observaciones      =   $this->getRequestParameter("tx_observaciones");
            $tx_ruta      =   $this->getRequestParameter("tx_ruta");
            $nb_archivo      =   $this->getRequestParameter("nb_archivo");
            $in_abierta      =   $this->getRequestParameter("in_abierta");
            $co_clasificacion      =   $this->getRequestParameter("co_clasificacion");
            $co_transaccion      =   $this->getRequestParameter("co_transaccion");
            $created_at      =   $this->getRequestParameter("created_at");
            $updated_at      =   $this->getRequestParameter("updated_at");
            $co_elabora      =   $this->getRequestParameter("co_elabora");
            $co_custodio      =   $this->getRequestParameter("co_custodio");
            $co_recurso      =   $this->getRequestParameter("co_recurso");
            $co_ciudad_acta      =   $this->getRequestParameter("co_ciudad_acta");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(C004tActaAiePeer::CO_AIE);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                            
        if($fe_emision!=""){
    list($dia, $mes,$anio) = explode("/",$fe_emision);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C004tActaAiePeer::FE_EMISION,$fecha);
    }
                                            if($co_forense!=""){$c->add(C004tActaAiePeer::CO_FORENSE,$co_forense);}
    
                                            if($co_region!=""){$c->add(C004tActaAiePeer::CO_REGION,$co_region);}
    
                                            if($co_negocio!=""){$c->add(C004tActaAiePeer::CO_NEGOCIO,$co_negocio);}
    
                                            if($co_division!=""){$c->add(C004tActaAiePeer::CO_DIVISION,$co_division);}
    
                                        if($tx_serial!=""){$c->add(C004tActaAiePeer::TX_SERIAL,'%'.$tx_serial.'%',Criteria::LIKE);}
        
                                        if($tx_observaciones!=""){$c->add(C004tActaAiePeer::TX_OBSERVACIONES,'%'.$tx_observaciones.'%',Criteria::LIKE);}
        
                                        if($tx_ruta!=""){$c->add(C004tActaAiePeer::TX_RUTA,'%'.$tx_ruta.'%',Criteria::LIKE);}
        
                                        if($nb_archivo!=""){$c->add(C004tActaAiePeer::NB_ARCHIVO,'%'.$nb_archivo.'%',Criteria::LIKE);}
        
                                    
                                            if($co_clasificacion!=""){$c->add(C004tActaAiePeer::CO_CLASIFICACION,$co_clasificacion);}
    
                                            if($co_transaccion!=""){$c->add(C004tActaAiePeer::CO_TRANSACCION,$co_transaccion);}
    
                                    
        if($created_at!=""){
    list($dia, $mes,$anio) = explode("/",$created_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C004tActaAiePeer::CREATED_AT,$fecha);
    }
                                    
        if($updated_at!=""){
    list($dia, $mes,$anio) = explode("/",$updated_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(C004tActaAiePeer::UPDATED_AT,$fecha);
    }
                                            if($co_elabora!=""){$c->add(C004tActaAiePeer::CO_ELABORA,$co_elabora);}
    
                                            if($co_custodio!=""){$c->add(C004tActaAiePeer::CO_CUSTODIO,$co_custodio);}
    
                                            if($co_recurso!=""){$c->add(C004tActaAiePeer::CO_RECURSO,$co_recurso);}
    
                                            if($co_ciudad_acta!=""){$c->add(C004tActaAiePeer::CO_CIUDAD_ACTA,$co_ciudad_acta);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = C004tActaAiePeer::doCount($c);
    
    $stmt = C004tActaAiePeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_aie"     => trim($res["co_aie"]),
            "fe_emision"     => trim($res["fe_emision"]),
            "co_forense"     => trim($res["co_forense"]),
            "co_region"     => trim($res["co_region"]),
            "co_negocio"     => trim($res["co_negocio"]),
            "co_division"     => trim($res["co_division"]),
            "tx_serial"     => trim($res["tx_serial"]),
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
            "co_recurso"     => trim($res["co_recurso"]),
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
    public function executeStorefkcorecurso(sfWebRequest $request){
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