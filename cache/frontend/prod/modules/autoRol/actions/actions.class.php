<?php

/**
 * autoRol actions.
 * NombreClaseModel(J809tRol)
 * NombreTabla(j809t_rol)
 * @package    ##PROJECT_NAME##
 * @subpackage autoRol
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoRolActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('rol', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('rol', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J809tRolPeer::CO_ROL,$codigo);
        
        $stmt = J809tRolPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_rol"     => $campos["co_rol"],
                            "tx_rol"     => $campos["tx_rol"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_rol"     => "",
                            "tx_rol"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_rol");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j809t_rol = J809tRolPeer::retrieveByPk($codigo);
     }else{
         $j809t_rol = new J809tRol();
     }
     try
      { 
        $con->beginTransaction();
       
        $j809t_rolForm = $this->getRequestParameter('j809t_rol');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j809t_rol->setTxRol($j809t_rolForm["tx_rol"]);
                                
        /*CAMPOS*/
        $j809t_rol->save($con);
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
	$codigo = $this->getRequestParameter("co_rol");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j809t_rol = J809tRolPeer::retrieveByPk($codigo);			
	$j809t_rol->delete($con);
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
                $tx_rol      =   $this->getRequestParameter("tx_rol");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J809tRolPeer::CO_ROL);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_rol!=""){$c->add(J809tRolPeer::TX_ROL,'%'.$tx_rol.'%',Criteria::LIKE);}
        
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J809tRolPeer::doCount($c);
    
    $stmt = J809tRolPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_rol"     => trim($res["co_rol"]),
            "tx_rol"     => trim($res["tx_rol"]),
        );
    }

    $this->data = json_encode(array(
        "success"   =>  true,
        "total"     =>  $cantidadTotal,
        "data"      =>  $registros
        ));
    }

                    


}