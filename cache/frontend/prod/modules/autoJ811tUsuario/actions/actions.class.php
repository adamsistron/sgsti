<?php

/**
 * autoJ811tUsuario actions.
 * NombreClaseModel(J811tUsuario)
 * NombreTabla(j811t_usuario)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ811tUsuario
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ811tUsuarioActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J811tUsuario', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J811tUsuario', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J811tUsuarioPeer::CO_USUARIO,$codigo);
        
        $stmt = J811tUsuarioPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_usuario"     => $campos["co_usuario"],
                            "tx_indicador"     => $campos["tx_indicador"],
                            "co_persona"     => $campos["co_persona"],
                            "co_rol"     => $campos["co_rol"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_usuario"     => "",
                            "tx_indicador"     => "",
                            "co_persona"     => "",
                            "co_rol"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_usuario");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j811t_usuario = J811tUsuarioPeer::retrieveByPk($codigo);
     }else{
         $j811t_usuario = new J811tUsuario();
     }
     try
      { 
        $con->beginTransaction();
       
        $j811t_usuarioForm = $this->getRequestParameter('j811t_usuario');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j811t_usuario->setTxIndicador($j811t_usuarioForm["tx_indicador"]);
                                                        
        /*Campo tipo BIGINT */
        $j811t_usuario->setCoPersona($j811t_usuarioForm["co_persona"]);
                                                        
        /*Campo tipo BIGINT */
        $j811t_usuario->setCoRol($j811t_usuarioForm["co_rol"]);
                                
        /*CAMPOS*/
        $j811t_usuario->save($con);
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
	$codigo = $this->getRequestParameter("co_usuario");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j811t_usuario = J811tUsuarioPeer::retrieveByPk($codigo);			
	$j811t_usuario->delete($con);
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
                $tx_indicador      =   $this->getRequestParameter("tx_indicador");
            $co_persona      =   $this->getRequestParameter("co_persona");
            $co_rol      =   $this->getRequestParameter("co_rol");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J811tUsuarioPeer::CO_USUARIO);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_indicador!=""){$c->add(J811tUsuarioPeer::TX_INDICADOR,'%'.$tx_indicador.'%',Criteria::LIKE);}
        
                                            if($co_persona!=""){$c->add(J811tUsuarioPeer::CO_PERSONA,$co_persona);}
    
                                            if($co_rol!=""){$c->add(J811tUsuarioPeer::CO_ROL,$co_rol);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J811tUsuarioPeer::doCount($c);
    
    $stmt = J811tUsuarioPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_usuario"     => trim($res["co_usuario"]),
            "tx_indicador"     => trim($res["tx_indicador"]),
            "co_persona"     => trim($res["co_persona"]),
            "co_rol"     => trim($res["co_rol"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
    }

                                //modelo fk j812_persona.CO_PERSONA
    public function executeStorefkcopersona(sfWebRequest $request){
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
        


}