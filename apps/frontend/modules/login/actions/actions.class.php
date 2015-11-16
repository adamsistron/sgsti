<?php

/**
 * login actions.
 *
 * @package    comando
 * @subpackage login
 * @author     yoserperez
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class LoginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {     
     $this->getUser()->setAuthenticated(false);
     $this->getUser()->getAttributeHolder()->clear();
  }

  public function executeValidar(sfWebRequest $request)
  {
     $usuario = $this->getRequestParameter('usuario');
     $password = $this->getRequestParameter('password');

     //$usuario='camarilloj';
     $this->datos = $this->getDatosUsuario($usuario,$password);
   
      
     if($this->datos!=""){
             $this->getUser()->setAuthenticated(true);
	     $codigo = $this->datos['co_usuario'];
	     $nombre = $this->datos['nb_persona'].' '.$this->datos['ap_persona'];
	     $co_rol = $this->datos['co_rol'];
             $co_region = $this->datos['co_region'];
             $co_division = $this->datos['co_division'];

	     $_SESSION['codigo'] = $this->codigo;
	     $_SESSION['nombre'] = $this->nombre;
             $_SESSION['co_region'] = $this->co_region;

	     $this->getUser()->setAttribute('nombre', $nombre);
	     $this->getUser()->setAttribute('codigo', $codigo);
	     $this->getUser()->setAttribute('rol', $co_rol);
             $this->getUser()->setAttribute('co_region', $co_region);
             $this->getUser()->setAttribute('co_division', $co_division);
	     
     }
     
     
     
     
  }

  public function executeLimpiar(sfWebRequest $request)
  {
      $this->getUser()->setAuthenticated(false);
      $this->getUser()->getAttributeHolder()->clear();
      $this->redirect('/sgsti/web/');
          
  }

  protected function getDatosUsuario($usuario,$password){

          $c= new Criteria();
          $c->clearSelectColumns();
          $c->addSelectColumn(J811tUsuarioPeer::CO_USUARIO);          
          $c->addSelectColumn(J811tUsuarioPeer::CO_ROL);   
          $c->addSelectColumn(J812PersonaPeer::CO_REGION);
          $c->addSelectColumn(J812PersonaPeer::CO_DIVISION);
          $c->addSelectColumn(J812PersonaPeer::NB_PERSONA);
          $c->addSelectColumn(J812PersonaPeer::AP_PERSONA);
          $c->add(J811tUsuarioPeer::TX_INDICADOR,$usuario);
          $c->addJoin(J812PersonaPeer::CO_PERSONA,  J811tUsuarioPeer::CO_PERSONA);
	
	 
          $res = J811tUsuarioPeer::doSelectStmt($c);
          
         
          foreach($res as $result)
            return $result;
    }
	
}
