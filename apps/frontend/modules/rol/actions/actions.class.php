<?php

/**
 * autoRol actions.
 * NombreClaseModel(T02Rol)
 * NombreTabla(t02_rol)
 * @package    ##PROJECT_NAME##
 * @subpackage autoRol
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class RolActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('rol', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
//    $this->forward('rol', 'editar');
        $this->data = json_encode(array(
                            "co_rol"     => "",
                            "tx_rol"     => "",
                    ));
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
      $this->menu = J808tProductoPeer::ArmaMenuPrivilegio($this->getRequestParameter('codigo'));
      $this->co_rol = $this->getRequestParameter('codigo');
  }

  public function executeGuardar(sfWebRequest $request)
  {
	$json  = json_decode($this->getRequestParameter('arreglo'),true);
	$opciones = $json['opcion'];

	$codigo = $this->getRequestParameter("co_rol");
        if($codigo!=''||$codigo!=null){
        $con = Propel::getConnection();
        try
        { 
             $con->beginTransaction();
             $J809tRolPeer = J809tRolPeer::retrieveByPk($codigo);
             $J809tRolPeerForm = $this->getRequestParameter('t02_rol');
            /*CAMPOS*/

            /*Campo tipo VARCHAR */
              $J809tRolPeer->setTxRol($J809tRolPeerForm["tx_rol"]);

            /*CAMPOS*/

              $J809tRolPeer->save($con);

              /*habilita los padres*/
              $data = '';
              $stmt = $con->prepare("update j810t_rol_producto
                                        set in_ver = true
                                      where co_rol_producto in(
                                             select co_rol_producto from vista_rol_producto where co_rol = $codigo and cant > 0)");
              $stmt->execute();

              /*de desabilitan todos los hijos*/
              $data = '';
              $stmt2 = $con->prepare("update j810t_rol_producto
                                        set in_ver = false
                                      where co_rol_producto in(
                                             select co_rol_producto from vista_rol_producto where co_rol = $codigo and cant = 0)");
              $stmt2->execute();

            foreach ($opciones as $lista){
                    $menu = J810tRolProductoPeer::retrieveByPK($lista);
                    $menu->setInVer(true)->save($con);
            }
            
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
        }else{
            $con = Propel::getConnection();
            try{
            $con->beginTransaction();
            $rol = new J809tRol();
            $J809tRolPeerForm = $this->getRequestParameter('t02_rol');

            /*CAMPOS*/

            /*Campo tipo VARCHAR */
            $J809tRolPeer->setTxRol($J809tRolPeerForm["tx_rol"]);

            /*CAMPOS*/

            $J809tRolPeer->save($con);
                $this->data = json_encode(array(
                    "success" => true,
                    "msg" => 'Proceso realizado exitosamente.'
                ));
                $con->commit($con);
            }catch (Exception $e){
                $con->rollback();
                $this->data = json_encode(array(
                    "success" => false,
                    "msg" =>  $e->getMessage()
                ));
            }
        }
  }

  public function executeLista(sfWebRequest $request)
  {

  }

  public function executeStorelista(sfWebRequest $request)
  {
    $paginar    =   $this->getRequestParameter("paginar");
    $limit      =   $this->getRequestParameter("limit",10);
    $start      =   $this->getRequestParameter("start",0);
                $tx_rol      =   $this->getRequestParameter("tx_rol");
    
    $c1 = new Criteria();

    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_rol!=""){$c1->add(J809tRolPeer::TX_ROL,'%'.$tx_rol.'%',Criteria::LIKE);}
                
                    }
    $c1->setIgnoreCase(true);
    $cantidadTotal = J809tRolPeer::doCount($c1);

    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J809tRolPeer::CO_ROL);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
        if($tx_rol!=""){$c->add(J809tRolPeer::TX_ROL,'%'.$tx_rol.'%',Criteria::LIKE);}
    }
    $c->setIgnoreCase(true);

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
