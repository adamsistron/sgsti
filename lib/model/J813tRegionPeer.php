<?php

class J813tRegionPeer extends BaseJ813tRegionPeer
{
    static public function getTxRegion($codigo) {
      $c = new Criteria();
      $c->add(J813tRegionPeer::CO_REGION,$codigo);
      $res = J813tRegionPeer::doSelect($c);
      foreach ($res as $result)
           return $result->getTxRegion();      
     }    
}
