<?php

/**
 * autoJ812Persona actions.
 * NombreClaseModel(J812Persona)
 * NombreTabla(j812_persona)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ812Persona
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ812PersonaActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J812Persona', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J812Persona', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J812PersonaPeer::CO_PERSONA,$codigo);
        
        $stmt = J812PersonaPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_persona"     => $campos["co_persona"],
                            "nb_persona"     => $campos["nb_persona"],
                            "ap_persona"     => $campos["ap_persona"],
                            "co_division"     => $campos["co_division"],
                            "co_rol"     => $campos["co_rol"],
                            "co_region"     => $campos["co_region"],
                            "co_negocio"     => $campos["co_negocio"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_persona"     => "",
                            "nb_persona"     => "",
                            "ap_persona"     => "",
                            "co_division"     => "",
                            "co_rol"     => "",
                            "co_region"     => "",
                            "co_negocio"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_persona");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j812_persona = J812PersonaPeer::retrieveByPk($codigo);
     }else{
         $j812_persona = new J812Persona();
     }
     try
      { 
        $con->beginTransaction();
       
        $j812_personaForm = $this->getRequestParameter('j812_persona');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j812_persona->setNbPersona($j812_personaForm["nb_persona"]);
                                                        
        /*Campo tipo VARCHAR */
        $j812_persona->setApPersona($j812_personaForm["ap_persona"]);
                                                        
        /*Campo tipo BIGINT */
        $j812_persona->setCoDivision($j812_personaForm["co_division"]);
                                                        
        /*Campo tipo BIGINT */
        $j812_persona->setCoRol($j812_personaForm["co_rol"]);
                                                        
        /*Campo tipo BIGINT */
        $j812_persona->setCoRegion($j812_personaForm["co_region"]);
                                                        
        /*Campo tipo BIGINT */
        $j812_persona->setCoNegocio($j812_personaForm["co_negocio"]);
                                
        /*CAMPOS*/
        $j812_persona->save($con);
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
	$codigo = $this->getRequestParameter("co_persona");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j812_persona = J812PersonaPeer::retrieveByPk($codigo);			
	$j812_persona->delete($con);
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
                $nb_persona      =   $this->getRequestParameter("nb_persona");
            $ap_persona      =   $this->getRequestParameter("ap_persona");
            $co_division      =   $this->getRequestParameter("co_division");
            $co_rol      =   $this->getRequestParameter("co_rol");
            $co_region      =   $this->getRequestParameter("co_region");
            $co_negocio      =   $this->getRequestParameter("co_negocio");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J812PersonaPeer::CO_PERSONA);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($nb_persona!=""){$c->add(J812PersonaPeer::NB_PERSONA,'%'.$nb_persona.'%',Criteria::LIKE);}
        
                                        if($ap_persona!=""){$c->add(J812PersonaPeer::AP_PERSONA,'%'.$ap_persona.'%',Criteria::LIKE);}
        
                                            if($co_division!=""){$c->add(J812PersonaPeer::CO_DIVISION,$co_division);}
    
                                            if($co_rol!=""){$c->add(J812PersonaPeer::CO_ROL,$co_rol);}
    
                                            if($co_region!=""){$c->add(J812PersonaPeer::CO_REGION,$co_region);}
    
                                            if($co_negocio!=""){$c->add(J812PersonaPeer::CO_NEGOCIO,$co_negocio);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J812PersonaPeer::doCount($c);
    
    $stmt = J812PersonaPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_persona"     => trim($res["co_persona"]),
            "nb_persona"     => trim($res["nb_persona"]),
            "ap_persona"     => trim($res["ap_persona"]),
            "co_division"     => trim($res["co_division"]),
            "co_rol"     => trim($res["co_rol"]),
            "co_region"     => trim($res["co_region"]),
            "co_negocio"     => trim($res["co_negocio"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
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
                    //modelo fk j809t_rol.CO_ROL
    public function executeStorefkcorol(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J809tRolPeer::doSelectStmt($c);
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
        


}