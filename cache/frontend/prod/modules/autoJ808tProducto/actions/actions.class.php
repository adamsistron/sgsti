<?php

/**
 * autoJ808tProducto actions.
 * NombreClaseModel(J808tProducto)
 * NombreTabla(j808t_producto)
 * @package    ##PROJECT_NAME##
 * @subpackage autoJ808tProducto
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoJ808tProductoActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('J808tProducto', 'lista');
  }

  public function executeNuevo(sfWebRequest $request)
  {
    $this->forward('J808tProducto', 'editar');
  }

  public function executeFiltro(sfWebRequest $request)
  {

  }

  public function executeEditar(sfWebRequest $request)
  {
    $codigo = $this->getRequestParameter("codigo");
    if($codigo!=''||$codigo!=null){
        $c = new Criteria();
                $c->add(J808tProductoPeer::CO_PRODUCTO,$codigo);
        
        $stmt = J808tProductoPeer::doSelectStmt($c);
        $campos = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->data = json_encode(array(
                            "co_producto"     => $campos["co_producto"],
                            "tx_producto"     => $campos["tx_producto"],
                            "co_padre"     => $campos["co_padre"],
                            "tx_href"     => $campos["tx_href"],
                            "tx_icono"     => $campos["tx_icono"],
                            "nu_orden"     => $campos["nu_orden"],
                            "tx_sigla"     => $campos["tx_sigla"],
                            "created_at"     => $campos["created_at"],
                            "updated_at"     => $campos["updated_at"],
                            "co_transaccion"     => $campos["co_transaccion"],
                    ));
    }else{
        $this->data = json_encode(array(
                            "co_producto"     => "",
                            "tx_producto"     => "",
                            "co_padre"     => "",
                            "tx_href"     => "",
                            "tx_icono"     => "",
                            "nu_orden"     => "",
                            "tx_sigla"     => "",
                            "created_at"     => "",
                            "updated_at"     => "",
                            "co_transaccion"     => "",
                    ));
    }

  }

  public function executeGuardar(sfWebRequest $request)
  {

            $codigo = $this->getRequestParameter("co_producto");
        
     $con = Propel::getConnection();
     if($codigo!=''||$codigo!=null){
         $j808t_producto = J808tProductoPeer::retrieveByPk($codigo);
     }else{
         $j808t_producto = new J808tProducto();
     }
     try
      { 
        $con->beginTransaction();
       
        $j808t_productoForm = $this->getRequestParameter('j808t_producto');
/*CAMPOS*/
                                        
        /*Campo tipo VARCHAR */
        $j808t_producto->setTxProducto($j808t_productoForm["tx_producto"]);
                                                        
        /*Campo tipo BIGINT */
        $j808t_producto->setCoPadre($j808t_productoForm["co_padre"]);
                                                        
        /*Campo tipo VARCHAR */
        $j808t_producto->setTxHref($j808t_productoForm["tx_href"]);
                                                        
        /*Campo tipo VARCHAR */
        $j808t_producto->setTxIcono($j808t_productoForm["tx_icono"]);
                                                        
        /*Campo tipo BIGINT */
        $j808t_producto->setNuOrden($j808t_productoForm["nu_orden"]);
                                                        
        /*Campo tipo VARCHAR */
        $j808t_producto->setTxSigla($j808t_productoForm["tx_sigla"]);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$j808t_productoForm["created_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $j808t_producto->setCreatedAt($fecha);
                                                        
        /*Campo tipo TIMESTAMP */
        list($dia, $mes, $anio) = explode("/",$j808t_productoForm["updated_at"]);
        $fecha = $anio."-".$mes."-".$dia;
        $j808t_producto->setUpdatedAt($fecha);
                                                        
        /*Campo tipo BIGINT */
        $j808t_producto->setCoTransaccion($j808t_productoForm["co_transaccion"]);
                                
        /*CAMPOS*/
        $j808t_producto->save($con);
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
	$codigo = $this->getRequestParameter("co_producto");
	$con = Propel::getConnection();
	try
	{ 
	$con->beginTransaction();
	/*CAMPOS*/
	$j808t_producto = J808tProductoPeer::retrieveByPk($codigo);			
	$j808t_producto->delete($con);
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
                $tx_producto      =   $this->getRequestParameter("tx_producto");
            $co_padre      =   $this->getRequestParameter("co_padre");
            $tx_href      =   $this->getRequestParameter("tx_href");
            $tx_icono      =   $this->getRequestParameter("tx_icono");
            $nu_orden      =   $this->getRequestParameter("nu_orden");
            $tx_sigla      =   $this->getRequestParameter("tx_sigla");
            $created_at      =   $this->getRequestParameter("created_at");
            $updated_at      =   $this->getRequestParameter("updated_at");
            $co_transaccion      =   $this->getRequestParameter("co_transaccion");
    
    
    $c = new Criteria();

    if($paginar=='si') $c->setLimit($limit)->setOffset($start);
        $c->addAscendingOrderByColumn(J808tProductoPeer::CO_PRODUCTO);
    
    if($this->getRequestParameter("BuscarBy")=="true"){
                                if($tx_producto!=""){$c->add(J808tProductoPeer::TX_PRODUCTO,'%'.$tx_producto.'%',Criteria::LIKE);}
        
                                            if($co_padre!=""){$c->add(J808tProductoPeer::CO_PADRE,$co_padre);}
    
                                        if($tx_href!=""){$c->add(J808tProductoPeer::TX_HREF,'%'.$tx_href.'%',Criteria::LIKE);}
        
                                        if($tx_icono!=""){$c->add(J808tProductoPeer::TX_ICONO,'%'.$tx_icono.'%',Criteria::LIKE);}
        
                                            if($nu_orden!=""){$c->add(J808tProductoPeer::NU_ORDEN,$nu_orden);}
    
                                        if($tx_sigla!=""){$c->add(J808tProductoPeer::TX_SIGLA,'%'.$tx_sigla.'%',Criteria::LIKE);}
        
                                    
        if($created_at!=""){
    list($dia, $mes,$anio) = explode("/",$created_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(J808tProductoPeer::CREATED_AT,$fecha);
    }
                                    
        if($updated_at!=""){
    list($dia, $mes,$anio) = explode("/",$updated_at);
    $fecha = $anio."-".$mes."-".$dia;
    $c->add(J808tProductoPeer::UPDATED_AT,$fecha);
    }
                                            if($co_transaccion!=""){$c->add(J808tProductoPeer::CO_TRANSACCION,$co_transaccion);}
    
                    }
    $c->setIgnoreCase(true);
    $cantidadTotal = J808tProductoPeer::doCount($c);
    
    $stmt = J808tProductoPeer::doSelectStmt($c);
    $registros = "";
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $registros[] = array(
            "co_producto"     => trim($res["co_producto"]),
            "tx_producto"     => trim($res["tx_producto"]),
            "co_padre"     => trim($res["co_padre"]),
            "tx_href"     => trim($res["tx_href"]),
            "tx_icono"     => trim($res["tx_icono"]),
            "nu_orden"     => trim($res["nu_orden"]),
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

                                //modelo fk j808t_producto.CO_PRODUCTO
    public function executeStorefkcopadre(sfWebRequest $request){
        $c = new Criteria();
        $stmt = J808tProductoPeer::doSelectStmt($c);
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
        


}