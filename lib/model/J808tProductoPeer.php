<?php

class J808tProductoPeer extends BaseJ808tProductoPeer
{
    
    static public function  ArmaMenu($co_rol){  
       
       
        /*
         * Se buscan las opciones de menu padre
         */
        $c= new Criteria();
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,0);
        $c->add(J810tRolProductoPeer::IN_VER,'true');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
        $c->addAscendingOrderByColumn(J808tProductoPeer::NU_ORDEN);
                   
        $res = J808tProductoPeer::doSelect($c);

        $menu = '';
        foreach($res as $resul){

                $cantidad = self::cantidad_hijos($resul->getCoProducto(),$co_rol);
               //  echo $cantidad.'-'.$co_rol; exit();
                if($cantidad > 0)
                {

                       $menu.= "{
                                 text:'".$resul->getTxProducto()."',
                                // expanded:true,
                                 children:[".self::ArmaSubmenu($resul->getCoProducto(),$co_rol)."]
                                },";

                }
        }

        return $menu;

    }

    static public  function cantidad_hijos($co_padre,$co_rol){

                
        
        $c= new Criteria();
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,$co_padre);
        $c->add(J810tRolProductoPeer::IN_VER,'true');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
       
       // echo $co_padre; 
        return J808tProductoPeer::doCount($c);
    }

    static public  function cantidad_hijosPrivilegio($co_padre,$co_rol){

        $c= new Criteria();
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,$co_padre);
//        $c->add(T04RolMenuPeer::IN_VER,'t');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
        return J808tProductoPeer::doCount($c);
    }

    static public  function ArmaSubmenu($co_padre,$co_rol){

        $c= new Criteria();
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,$co_padre);
        $c->add(J810tRolProductoPeer::IN_VER,'t');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
        $c->addAscendingOrderByColumn(J808tProductoPeer::NU_ORDEN);
        $res = J808tProductoPeer::doSelect($c);

        $submenu = '';

        foreach($res as $result){


            $cantidad = self::cantidad_hijosPrivilegio($result->getCoProducto(),$co_rol);

            if($cantidad > 0)
            {
                 $cantidad_hijos = self::cantidad_hijos($result->getCoProducto(),$co_rol);

                 if($cantidad_hijos > 0){
                       $submenu.= "{
                                 text:'".$result->getTxProducto()."',
                                 children:[".self::ArmaSubmenu($result->getCoProducto(),$co_rol)."]
                                },";
                 }

            }else{

                $submenu.= "{
                                    text:'".$result->getTxProducto()."',
                                    iconCls:'".$result->getTxProducto()."',
                                    leaf:true,
                                    listeners :{

                                        click: function(){
                                            var msg = Ext.get('tabPrincipal');
                                                msg.load({
                                                        url: '".$result->getTxHref()."',
                                                        scripts: true,
                                                        text: 'Cargando...'
                                                });
						panel_detalle.collapse();
                                        }
                                    }
                                },";
            }

        }

        return  $submenu;

    }

    static public  function  ArmaMenuPrivilegio($co_rol){


        /*
         * Se buscan las opciones de menu padre
         */
        $c= new Criteria();
        $c->addSelectColumn(J810tRolProductoPeer::CO_ROL_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::CO_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::TX_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::TX_ICONO);

        $c->addSelectColumn(J810tRolProductoPeer::IN_VER);
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,0);
//        $c->add(J810tRolProductoPeer::IN_VER,'t');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
        $c->addAscendingOrderByColumn(J808tProductoPeer::NU_ORDEN);
        $res = J808tProductoPeer::doSelectStmt($c);

        $menu = '';
        foreach($res as $resul){

                $cantidad = self::cantidad_hijosPrivilegio($resul['co_producto'],$co_rol);

                if($cantidad > 0)
                {

                       $menu.= "{
                                 text:'".$resul['tx_producto']."',
				expanded: true,
                                 children:[".self::ArmaSubmenuPrivilegio($resul['co_producto'],$co_rol)."]
                                },";

                       

                }
        }

        return $menu;

    }

    static public  function ArmaSubmenuPrivilegio($co_padre,$co_rol){

        $c= new Criteria();

        $c->addSelectColumn(J810tRolProductoPeer::CO_ROL_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::CO_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::TX_PRODUCTO);
        $c->addSelectColumn(J808tProductoPeer::TX_ICONO);
        $c->addSelectColumn(J810tRolProductoPeer::IN_VER);
        
        $c->add(J810tRolProductoPeer::CO_ROL,$co_rol);
        $c->add(J808tProductoPeer::CO_PADRE,$co_padre);
//        $c->add(J810tRolProductoPeer::IN_VER,'t');
        $c->addJoin(J808tProductoPeer::CO_PRODUCTO,J810tRolProductoPeer::CO_PRODUCTO);
        $c->addAscendingOrderByColumn(J808tProductoPeer::NU_ORDEN);
        $res = J808tProductoPeer::doSelectStmt($c);


        $submenu = '';

        foreach($res as $result){

            $cantidad = self::cantidad_hijosPrivilegio($result['co_producto'],$co_rol);

            if($cantidad > 0)
            {

                       $submenu.= "{
                                 text:'".$result['tx_producto']."',
                                 id:'".$result['co_rol_producto']."',
                                 children:[".J808tProductoPeer::ArmaSubmenuPrivilegio($result['co_producto'],$co_rol)."]
                                 },";

                      

            }else{

                $submenu.= "{
                                    text:'".$result['tx_producto']."',
                                    id:'".$result['co_rol_producto']."',
                                    iconCls:'".$result['tx_icono']."',
                                    leaf:true, ";
                
                if($result['in_ver']==1)
                 $submenu.= "       checked: true },";
                else
                 $submenu.= "       checked: false },";
            }

        }

        return  $submenu;

    }

  
    
}
