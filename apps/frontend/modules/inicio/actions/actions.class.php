<?php

/**
 * inicio actions.
 *
 * @package    comando
 * @subpackage inicio
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class inicioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->nombre = $this->getUser()->getAttribute('nombre');
      $this->getRequest()->setAttribute('titulo', $this->nombre);
 
     $menu = J808tProductoPeer::ArmaMenu(1);//$this->getUser()->getAttribute('rol')); 
     $this->getRequest()->setAttribute('menu', $menu);
     $this->usuario = $this->getUser()->setAttribute('member_id', $this->nombre); 
      $this->getUser()->setAuthenticated(true);  
      if(!$this->getUser()->isAuthenticated()){
        $this->redirect('/sgsti/web/index.php');
      }else{
         $this->getUser()->setAuthenticated(true);      
      }
      
      $this->getResponse ()-> setTitle('thetitle',false);
  }
    
}
