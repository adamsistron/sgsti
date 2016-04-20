<?php

/**
 * autoJ817tProcesoSti actions.
 * NombreClaseModel(J817tProcesoSti)
 * NombreTabla(j817t_proceso_sti)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ817tProcesoSti
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ817tProcesoStiActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J817tProcesoSti', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J817tProcesoSti', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J817tProcesoStiPeer::CO_PROCESO_STI,$codigo);
        
        $stmt = J817tProcesoStiPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_proceso_sti"     => $campos["co_proceso_sti"],
                            "tx_descripcion"     => $campos["tx_descripcion"],
                            "tx_sigla"     => $campos["tx_sigla"],
                            "created_at"     => $campos["created_at"],
                            "updated_at"     => $campos["updated_at"],
                            "co_transaccion"     => $campos["co_transaccion"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_proceso_sti"     => "",
                            "tx_descripcion"     => "",
                            "tx_sigla"     => "",
                            "created_at"     => "",
                            "updated_at"     => "",
                            "co_transaccion"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_proceso_sti");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j817t_proceso_sti = J817tProcesoStiPeer::retrieveByPk($codigo);
     }else{
         $j817t_proceso_sti = new J817tProcesoSti();
     }
     try
      { 
        $con->beginTransaction();
       
        $j817t_proceso_stiForm = $this->getRequestParameter('j817t_proceso_sti');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j817t_proceso_sti->setTxDescripcion($j817t_proceso_stiForm["tx_descripcion"]);
                                                        
        /*Campo tipo VARCHAR */
        $j817t_proceso_sti->setTxSigla($j817t_proceso_stiForm["tx_sigla"]);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$j817t_proceso_stiForm["created_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $j817t_proceso_sti->setCreatedAt($fecha);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$j817t_proceso_stiForm["updated_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $j817t_proceso_sti->setUpdatedAt($fecha);
                                                        
        /*Campo tipo BIGINT */
        $j817t_proceso_sti->setCoTransaccion($j817t_proceso_stiForm["co_transaccion"]);
                                
        /*CAMPOS*/
        $j817t_proceso_sti->save($con);
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
	$codigo = $this->getRequestParameter("co_proceso_sti");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j817t_proceso_sti = J817tProcesoStiPeer::retrieveByPk($codigo);			
	$j817t_proceso_sti->delete($con);
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
                $tx_descripcion      =   $this->getRequestParameter("tx_descripcion");
            $tx_sigla      =   $this->getRequestParameter("tx_sigla");
            $created_at      =   $this->getRequestParameter("created_at");
            $updated_at      =   $this->getRequestParameter("updated_at");
            $co_transaccion      =   $this->getRequestParameter("co_transaccion");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J817tProcesoStiPeer::CO_PROCESO_STI);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_descripcion!=""){$c->add(J817tProcesoStiPeer::TX_DESCRIPCION,'%'.$tx_descripcion.'%',Criteria::LIKE);}
        
                                        if($tx_sigla!=""){$c->add(J817tProcesoStiPeer::TX_SIGLA,'%'.$tx_sigla.'%',Criteria::LIKE);}
        
                                    
        if($created_at!=""){
    list($dia, $mes,$anio) = explode("/",$created_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(J817tProcesoStiPeer::CREATED_AT,$fecha);
    }
                                    
        if($updated_at!=""){
    list($dia, $mes,$anio) = explode("/",$updated_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(J817tProcesoStiPeer::UPDATED_AT,$fecha);
    }
                                            if($co_transaccion!=""){$c->add(J817tProcesoStiPeer::CO_TRANSACCION,$co_transaccion);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J817tProcesoStiPeer::doCount($c);
    
    $stmt = J817tProcesoStiPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_proceso_sti"     => trim($res["co_proceso_sti"]),
            "tx_descripcion"     => trim($res["tx_descripcion"]),
            "tx_sigla"     => trim($res["tx_sigla"]),
            "created_at"     => trim($res["created_at"]),
            "updated_at"     => trim($res["updated_at"]),
            "co_transaccion"     => trim($res["co_transaccion"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
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
        


}