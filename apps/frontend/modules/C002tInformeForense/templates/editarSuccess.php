<script type="text/javascript">
Ext.ns("C002tInformeForenseEditar");
C002tInformeForenseEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_REGION = this.getStoreCO_REGION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_NEGOCIO = this.getStoreCO_NEGOCIO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_DIVISION = this.getStoreCO_DIVISION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_ESTADO_INFORME = this.getStoreCO_ESTADO_INFORME();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_CLASIFICACION = this.getStoreCO_CLASIFICACION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_FORENSE = this.getStoreCO_FORENSE();
//<Stores de fk>

//<ClavePrimaria>
this.co_informe_forense = new Ext.form.Hidden({
    name:'co_informe_forense',
    value:this.OBJ.co_informe_forense});
//</ClavePrimaria>

this.co_forense = new Ext.form.Hidden({
	  name:'c002t_informe_forense[co_forense]',
          value:'<?php echo $co_forense; ?>'
});
        
this.co_region = new Ext.form.ComboBox({
	fieldLabel:'Region',
	store: this.storeCO_REGION,
	typeAhead: true,
	valueField: 'co_region',
	displayField:'co_region',
	hiddenName:'c002t_informe_forense[co_region]',
	//readOnly:(this.OBJ.co_region!='')?true:false,
	//style:(this.main.OBJ.co_region!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_REGION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_region,
	value:  this.OBJ.co_region,
	objStore: this.storeCO_REGION
});

this.co_negocio = new Ext.form.ComboBox({
	fieldLabel:'Negocio',
	store: this.storeCO_NEGOCIO,
	typeAhead: true,
	valueField: 'co_negocio',
	displayField:'co_negocio',
	hiddenName:'c002t_informe_forense[co_negocio]',
	//readOnly:(this.OBJ.co_negocio!='')?true:false,
	//style:(this.main.OBJ.co_negocio!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_NEGOCIO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_negocio,
	value:  this.OBJ.co_negocio,
	objStore: this.storeCO_NEGOCIO
});

this.co_division = new Ext.form.ComboBox({
	fieldLabel:'Division',
	store: this.storeCO_DIVISION,
	typeAhead: true,
	valueField: 'co_division',
	displayField:'co_division',
	hiddenName:'c002t_informe_forense[co_division]',
	//readOnly:(this.OBJ.co_division!='')?true:false,
	//style:(this.main.OBJ.co_division!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_DIVISION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_division,
	value:  this.OBJ.co_division,
	objStore: this.storeCO_DIVISION
});

this.co_estado_informe = new Ext.form.ComboBox({
	fieldLabel:'Co estado informe',
	store: this.storeCO_ESTADO_INFORME,
	typeAhead: true,
	valueField: 'co_estado_informe',
	displayField:'co_estado_informe',
	hiddenName:'c002t_informe_forense[co_estado_informe]',
	//readOnly:(this.OBJ.co_estado_informe!='')?true:false,
	//style:(this.main.OBJ.co_estado_informe!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_estado_informe',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ESTADO_INFORME.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_estado_informe,
	value:  this.OBJ.co_estado_informe,
	objStore: this.storeCO_ESTADO_INFORME
});

this.tx_serial = new Ext.form.TextField({
	fieldLabel:'Tx serial',
	name:'c002t_informe_forense[tx_serial]',
	value:this.OBJ.tx_serial,
	allowBlank:false,
	width:200
});

this.tx_titulo = new Ext.form.TextField({
	fieldLabel:'Titulo',
	name:'c002t_informe_forense[tx_titulo]',
	value:this.OBJ.tx_titulo,
	allowBlank:false,
	width:500
});

this.tx_descripcion_entorno = new Ext.form.TextArea({
	fieldLabel:'Descripcion del Entorno',
	name:'c002t_informe_forense[tx_descripcion_entorno]',
	value:this.OBJ.tx_descripcion_entorno,
	allowBlank:false,
	width:500
});

this.tx_resultados = new Ext.form.TextArea({
	fieldLabel:'Resultados',
	name:'c002t_informe_forense[tx_resultados]',
	value:this.OBJ.tx_resultados,
	allowBlank:false,
	width:500
});

this.tx_conclusiones = new Ext.form.TextArea({
	fieldLabel:'Conclusiones',
	name:'c002t_informe_forense[tx_conclusiones]',
	value:this.OBJ.tx_conclusiones,
	allowBlank:false,
	width:500
});

this.tx_observaciones = new Ext.form.TextArea({
	fieldLabel:'Observaciones',
	name:'c002t_informe_forense[tx_observaciones]',
	value:this.OBJ.tx_observaciones,
	allowBlank:false,
	width:500
});

this.tx_ruta = new Ext.form.TextField({
	fieldLabel:'Tx ruta',
	name:'c002t_informe_forense[tx_ruta]',
	value:this.OBJ.tx_ruta,
	allowBlank:false,
	width:200
});

this.nb_archivo = new Ext.form.TextField({
	fieldLabel:'Nb archivo',
	name:'c002t_informe_forense[nb_archivo]',
	value:this.OBJ.nb_archivo,
	allowBlank:false,
	width:200
});

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'c002t_informe_forense[co_transaccion]',
	//readOnly:(this.OBJ.co_transaccion!='')?true:false,
	//style:(this.main.OBJ.co_transaccion!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_transaccion',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_TRANSACCION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_transaccion,
	value:  this.OBJ.co_transaccion,
	objStore: this.storeCO_TRANSACCION
});

this.co_clasificacion = new Ext.form.ComboBox({
	fieldLabel:'Co clasificacion',
	store: this.storeCO_CLASIFICACION,
	typeAhead: true,
	valueField: 'co_clasificacion',
	displayField:'co_clasificacion',
	hiddenName:'c002t_informe_forense[co_clasificacion]',
	//readOnly:(this.OBJ.co_clasificacion!='')?true:false,
	//style:(this.main.OBJ.co_clasificacion!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_CLASIFICACION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_clasificacion,
	value:  this.OBJ.co_clasificacion,
	objStore: this.storeCO_CLASIFICACION
});

this.in_abierto = new Ext.form.Checkbox({
	fieldLabel:'In abierto',
	name:'c002t_informe_forense[in_abierto]',
	checked:(this.OBJ.in_abierto=='0') ? true:false,
	allowBlank:false
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'c002t_informe_forense[created_at]',
	value:this.OBJ.created_at,
	allowBlank:false
});

this.update_at = new Ext.form.DateField({
	fieldLabel:'Update at',
	name:'c002t_informe_forense[update_at]',
	value:this.OBJ.update_at,
	allowBlank:false
});

this.storeCO_FORENSE.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_forense,
	value:  this.OBJ.co_forense,
	objStore: this.storeCO_FORENSE
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!C002tInformeForenseEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        C002tInformeForenseEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/C002tInformeForense/guardar',
            waitMsg: 'Enviando datos, por favor espere..',
            waitTitle:'Enviando',
            failure: function(form, action) {
                Ext.MessageBox.alert('Error en transacción', action.result.msg);
            },
            success: function(form, action) {
                 if(action.result.success){
                     Ext.MessageBox.show({
                         title: 'Mensaje',
                         msg: action.result.msg,
                         closable: false,
                         icon: Ext.MessageBox.INFO,
                         resizable: false,
			 animEl: document.body,
                         buttons: Ext.MessageBox.OK
                     });
                 }
                 C002tInformeForenseLista.main.store_lista.load();
                 C002tInformeForenseEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        C002tInformeForenseEditar.main.winformPanel_.close();
    }
});

this.fieldsetUbicacion = new Ext.form.FieldSet({
   title: 'Ubicación del Caso',
   items:[this.co_region,this.co_negocio,this.co_division
//            {
//                        xtype: 'compositefield',
//                        fieldLabel: 'Región',
//                        items: [
//                            this.co_region,
//                            {
//                               xtype: 'displayfield',
//                               value: 'Negocio'
//                            },
//                            this.co_negocio,
//                            {
//                               xtype: 'displayfield',
//                               value: 'División'
//                            },
//                            this.co_division,
//                        ]
//            } 
   ]
});

this.fieldsetDatosCaso = new Ext.form.FieldSet({
   title: 'Descripción del Informe',
   items:[
//            {
//                        xtype: 'compositefield',
//                        fieldLabel: 'Titulo',
//                        items: [
                            this.tx_titulo,
//                        ]
//            } ,
//            {
//                        xtype: 'compositefield',
//                        fieldLabel: 'Descripción del Entorno',
//                        items: [
                           this.tx_descripcion_entorno,
                           this.tx_resultados,
                           this.tx_conclusiones,
                           this.tx_observaciones
//                        ]
//                
//            }
            
            
   ]
});
       

this.formPanel_ = new Ext.form.FormPanel({
    frame:true,
    width:700,
    autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_informe_forense,
                    this.fieldsetUbicacion,
                    this.fieldsetDatosCaso
//                    this.tx_serial,     
//                   
//                    this.tx_observaciones,
//                    this.tx_ruta,
//                    this.nb_archivo,
//                    this.co_transaccion,
//                    this.co_clasificacion,
//                    this.in_abierto,
//                    this.created_at,
//                    this.update_at,
//                    this.co_forense,
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Informe Forense',
    modal:true,
    constrain:true,
    width:700,
    frame:true,
    closabled:true,
    autoHeight:true,
    items:[
        this.formPanel_
    ],
    buttons:[
        this.guardar,
        this.salir
    ],
    buttonAlign:'center'
});
this.winformPanel_.show();
C002tInformeForenseLista.main.mascara.hide();
}
,getStoreCO_REGION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcoregion',
        root:'data',
        fields:[
            {name: 'co_region'}
            ]
    });
    return this.store;
}
,getStoreCO_NEGOCIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkconegocio',
        root:'data',
        fields:[
            {name: 'co_negocio'}
            ]
    });
    return this.store;
}
,getStoreCO_DIVISION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcodivision',
        root:'data',
        fields:[
            {name: 'co_division'}
            ]
    });
    return this.store;
}
,getStoreCO_ESTADO_INFORME:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcoestadoinforme',
        root:'data',
        fields:[
            {name: 'co_estado_informe'}
            ]
    });
    return this.store;
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}
,getStoreCO_CLASIFICACION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcoclasificacion',
        root:'data',
        fields:[
            {name: 'co_clasificacion'}
            ]
    });
    return this.store;
}
,getStoreCO_FORENSE:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C002tInformeForense/storefkcoforense',
        root:'data',
        fields:[
            {name: 'co_forense'}
            ]
    });
    return this.store;
}
};
Ext.onReady(C002tInformeForenseEditar.main.init, C002tInformeForenseEditar.main);
</script>
