<?php

/**
 * autoJ813tRegion actions.
 * NombreClaseModel(J813tRegion)
 * NombreTabla(j813t_region)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ813tRegion
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ813tRegionActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J813tRegion', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J813tRegion', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J813tRegionPeer::CO_REGION,$codigo);
        
        $stmt = J813tRegionPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_region"     => $campos["co_region"],
                            "tx_region"     => $campos["tx_region"],
                            "tx_sigla"     => $campos["tx_sigla"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_region"     => "",
                            "tx_region"     => "",
                            "tx_sigla"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_region");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j813t_region = J813tRegionPeer::retrieveByPk($codigo);
     }else{
         $j813t_region = new J813tRegion();
     }
     try
      { 
        $con->beginTransaction();
       
        $j813t_regionForm = $this->getRequestParameter('j813t_region');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j813t_region->setTxRegion($j813t_regionForm["tx_region"]);
                                                        
        /*Campo tipo VARCHAR */
        $j813t_region->setTxSigla($j813t_regionForm["tx_sigla"]);
                                
        /*CAMPOS*/
        $j813t_region->save($con);
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
	$codigo = $this->getRequestParameter("co_region");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j813t_region = J813tRegionPeer::retrieveByPk($codigo);			
	$j813t_region->delete($con);
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
                $tx_region      =   $this->getRequestParameter("tx_region");
            $tx_sigla      =   $this->getRequestParameter("tx_sigla");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J813tRegionPeer::CO_REGION);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_region!=""){$c->add(J813tRegionPeer::TX_REGION,'%'.$tx_region.'%',Criteria::LIKE);}
        
                                        if($tx_sigla!=""){$c->add(J813tRegionPeer::TX_SIGLA,'%'.$tx_sigla.'%',Criteria::LIKE);}
        
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J813tRegionPeer::doCount($c);
    
    $stmt = J813tRegionPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_region"     => trim($res["co_region"]),
            "tx_region"     => trim($res["tx_region"]),
            "tx_sigla"     => trim($res["tx_sigla"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
    }

                                


}