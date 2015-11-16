<?php

/**
 * autoJ816tRelRegionNegocio actions.
 * NombreClaseModel(J816tRelRegionNegocio)
 * NombreTabla(j816t_rel_region_negocio)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ816tRelRegionNegocio
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ816tRelRegionNegocioActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J816tRelRegionNegocio', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J816tRelRegionNegocio', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J816tRelRegionNegocioPeer::CO_RELACION,$codigo);
        
        $stmt = J816tRelRegionNegocioPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_relacion"     => $campos["co_relacion"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                            "co_division"     => $campos["co_division"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_relacion"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                            "co_division"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_relacion");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j816t_rel_region_negocio = J816tRelRegionNegocioPeer::retrieveByPk($codigo);
     }else{
         $j816t_rel_region_negocio = new J816tRelRegionNegocio();
     }
     try
      { 
        $con->beginTransaction();
       
        $j816t_rel_region_negocioForm = $this->getRequestParameter('j816t_rel_region_negocio');
/*CAMPOS*/
                                        
        /*Campo tipo BIGINT */
        $j816t_rel_region_negocio->setCoRegion($j816t_rel_region_negocioForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $j816t_rel_region_negocio->setCoNegocio($j816t_rel_region_negocioForm["co_negocio"]);
                                                        
        /*Campo tipo BIGINT */
        $j816t_rel_region_negocio->setCoDivision($j816t_rel_region_negocioForm["co_division"]);
                                
        /*CAMPOS*/
        $j816t_rel_region_negocio->save($con);
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
	$codigo = $this->getRequestParameter("co_relacion");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j816t_rel_region_negocio = J816tRelRegionNegocioPeer::retrieveByPk($codigo);			
	$j816t_rel_region_negocio->delete($con);
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
                $co_region      =   $this->getRequestParameter("co_region");
            $co_negocio      =   $this->getRequestParameter("co_negocio");
            $co_division      =   $this->getRequestParameter("co_division");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J816tRelRegionNegocioPeer::CO_RELACION);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                    if($co_region!=""){$c->add(J816tRelRegionNegocioPeer::CO_REGION,$co_region);}
    
                                            if($co_negocio!=""){$c->add(J816tRelRegionNegocioPeer::CO_NEGOCIO,$co_negocio);}
    
                                            if($co_division!=""){$c->add(J816tRelRegionNegocioPeer::CO_DIVISION,$co_division);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J816tRelRegionNegocioPeer::doCount($c);
    
    $stmt = J816tRelRegionNegocioPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_relacion"     => trim($res["co_relacion"]),
            "co_region"     => trim($res["co_region"]),
            "co_negocio"     => trim($res["co_negocio"]),
            "co_division"     => trim($res["co_division"]),
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
        


}