<script type="text/javascript">
Ext.ns('detalle');
detalle.main = {
    init: function(){

        this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});

        this.datos = '<p class="registro_detalle"><b>Región: </b>'+this.OBJ.tx_region+'</p>';
        this.datos +='<p class="registro_detalle"><b>Negocio: </b>'+this.OBJ.tx_negocio+'</p>';
        this.datos +='<p class="registro_detalle"><b>División: </b>'+this.OBJ.tx_division+'</p>';


        this.fieldDatos = new Ext.form.FieldSet({
                title: 'Ubicación Apertura del Caso',
                html: this.datos
        });
        
        this.datos2 ='<p class="registro_detalle"><b>Clasificación: </b>'+this.OBJ.tx_clasificacion+'</p>';
        this.datos2 +='<p class="registro_detalle"><b>Fecha de Apertura: </b>'+paqueteComunJS.funcion.getFechaFormateado(this.OBJ.fe_apertura)+'</p>';
        this.datos2 +='<p class="registro_detalle"><b>Titulo: </b>'+this.OBJ.tx_titulo+'</p>';
        this.datos2 +='<p class="registro_detalle"><b>Caso AAII: </b>'+this.OBJ.tx_caso_aaii+'</p>';
        this.datos2 +='<p class="registro_detalle"><b>Alcance: </b>'+this.OBJ.tx_descripcion+'</p>';     
        this.datos2 +='<p class="registro_detalle"><b>Descripcion de la Solicitud: </b>'+this.OBJ.tx_descripcion_solicitud+'</p>';
        this.datos2 +='<p class="registro_detalle"><b>Observacion: </b>'+this.OBJ.tx_observaciones+'</p>';

        this.fieldDatos1 = new Ext.form.FieldSet({
                title: 'Datos del Caso',
                html: this.datos2
        });

        this.formpanel = new Ext.form.FormPanel({
                bodyStyle: 'padding:10px',
                autoWidth:true,
                autoHeight:true,
                border:false,
                items:[this.fieldDatos,this.fieldDatos1]
        });
        
        
     
        
        this.tabs2 = new Ext.TabPanel({
        renderTo: datos_detalle,
        activeTab: 0,
        width:450,
        height:600,
        plain:true,
        defaults:{autoScroll: true},
        items:[{
                    title: 'Datos del Forense',
                    items:[this.formpanel]
               },
               {
                        title: 'Forense',
                        autoLoad:{
                           url:'<?= $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/index',
                           scripts: true,
                             params:{
                                co_forense:detalle.main.OBJ.co_forense
                           }
                        }        
                },
                {
                        title: 'ACC',
                        autoLoad:{
                           url:'<?= $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/index',
                           scripts: true,
                             params:{
                               co_forense:detalle.main.OBJ.co_forense
                           }
                        }        
                 },{
                        title: 'AIE',
                        autoLoad:{
                           url:'<?= $_SERVER["SCRIPT_NAME"] ?>/C004tActaAie/index',
                           scripts: true,
                             params:{
                                co_forense:detalle.main.OBJ.co_forense
                           }
                       }
                },{
                    title: 'ANIE',
                    autoLoad:{
                       url:'<?= $_SERVER["SCRIPT_NAME"] ?>/C005tActaAnie/index',
                       scripts: true,
                         params:{
                               co_forense:detalle.main.OBJ.co_forense
                       }
                    }
                }
              ]
    });
    
 

    }   
}
Ext.onReady(detalle.main.init, detalle.main);
</script>
<div id="datos_detalle"></div>

