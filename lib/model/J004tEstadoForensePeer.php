<?php

class J004tEstadoForensePeer extends BaseJ004tEstadoForensePeer
{
     static public function getTxEstado($codigo) {
      $c = new Criteria();
      $c->add(self::CO_ESTADO_FORENSE,$codigo);
      $res = self::doSelect($c);
      foreach ($res as $result)
           return $result->getTxDescripcion();      
      }   
}
