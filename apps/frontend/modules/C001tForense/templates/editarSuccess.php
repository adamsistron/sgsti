<script type="text/javascript">
Ext.ns("C001tForenseEditar");
C001tForenseEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_USUARIO = this.getStoreCO_USUARIO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_USUARIO = this.getStoreCO_USUARIO();
//<Stores de fk>
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
this.storeCO_ALCANCE_FORENSE = this.getStoreCO_ALCANCE_FORENSE();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_CLASIFICACION = this.getStoreCO_CLASIFICACION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_ESTADO_FORENSE = this.getStoreCO_ESTADO_FORENSE();
//<Stores de fk>

//<ClavePrimaria>
this.co_forense = new Ext.form.Hidden({
    name:'co_forense',
    value:this.OBJ.co_forense});
//</ClavePrimaria>


this.fe_apertura = new Ext.form.DateField({
	fieldLabel:'Fe apertura',
	name:'c001t_forense[fe_apertura]',
	value:this.OBJ.fe_apertura,
	allowBlank:false,
        format:'d/m/Y',
	width:100
});

this.fe_cierre = new Ext.form.DateField({
	fieldLabel:'Fe cierre',
	name:'c001t_forense[fe_cierre]',
	value:this.OBJ.fe_cierre,
	allowBlank:false,
	width:100,
        format:'d/m/Y'
});

this.co_usuario_apertura = new Ext.form.ComboBox({
	fieldLabel:'Co usuario apertura',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'c001t_forense[co_usuario_apertura]',
	//readOnly:(this.OBJ.co_usuario_apertura!='')?true:false,
	//style:(this.main.OBJ.co_usuario_apertura!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_usuario_apertura',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_USUARIO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_usuario_apertura,
	value:  this.OBJ.co_usuario_apertura,
	objStore: this.storeCO_USUARIO
});

this.co_usuario_cierre = new Ext.form.ComboBox({
	fieldLabel:'Co usuario cierre',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'c001t_forense[co_usuario_cierre]',
	//readOnly:(this.OBJ.co_usuario_cierre!='')?true:false,
	//style:(this.main.OBJ.co_usuario_cierre!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_usuario_cierre',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_USUARIO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_usuario_cierre,
	value:  this.OBJ.co_usuario_cierre,
	objStore: this.storeCO_USUARIO
});

this.co_region = new Ext.form.ComboBox({
	fieldLabel:'Co region',
	store: this.storeCO_REGION,
	typeAhead: true,
	valueField: 'co_region',
	displayField:'tx_region',
	hiddenName:'c001t_forense[co_region]',
	//readOnly:(this.OBJ.co_region!='')?true:false,
	//style:(this.main.OBJ.co_region!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'...',
	selectOnFocus: true,
	mode: 'local',
	width:100,
	resizable:true,
	allowBlank:false,
	listeners:{
            change: function(){
               C001tForenseEditar.main.storeCO_NEGOCIO.load({
                    params: {co_region:this.getValue()}
                });
            }
        }
});

this.storeCO_REGION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_region,
	value:  this.OBJ.co_region,
	objStore: this.storeCO_REGION
});

this.co_negocio = new Ext.form.ComboBox({
	fieldLabel:'Co negocio',
	store: this.storeCO_NEGOCIO,
	typeAhead: true,
	valueField: 'co_negocio',
	displayField:'tx_negocio',
	hiddenName:'c001t_forense[co_negocio]',
	//readOnly:(this.OBJ.co_negocio!='')?true:false,
	//style:(this.main.OBJ.co_negocio!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'...',
	selectOnFocus: true,
	mode: 'local',
	width:210,
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
	fieldLabel:'Co division',
	store: this.storeCO_DIVISION,
	typeAhead: true,
	valueField: 'co_division',
	displayField:'tx_division',
	hiddenName:'c001t_forense[co_division]',
	//readOnly:(this.OBJ.co_division!='')?true:false,
	//style:(this.main.OBJ.co_division!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'...',
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

this.tx_serial = new Ext.form.TextField({
	fieldLabel:'Tx serial',
	name:'c001t_forense[tx_serial]',
	value:this.OBJ.tx_serial,
	allowBlank:false,
	width:200
});

this.tx_titulo = new Ext.form.TextField({
	fieldLabel:'Tx titulo',
	name:'c001t_forense[tx_titulo]',
	value:this.OBJ.tx_titulo,
	allowBlank:false,
	width:365
});

this.tx_descripcion_solicitud = new Ext.form.TextArea({
	fieldLabel:'Descripcion de la Solicitud',
	name:'c001t_forense[tx_descripcion_solicitud]',
	value:this.OBJ.tx_descripcion_solicitud,
	allowBlank:false,
	width:630
});

this.tx_caso_aaii = new Ext.form.TextField({
	fieldLabel:'Tx caso aaii',
	name:'c001t_forense[tx_caso_aaii]',
	value:this.OBJ.tx_caso_aaii,
	allowBlank:false,
	width:200
});

this.co_alcance_forense = new Ext.form.ComboBox({
	fieldLabel:'Co alcance forense',
	store: this.storeCO_ALCANCE_FORENSE,
	typeAhead: true,
	valueField: 'co_alcance_forense',
	displayField:'tx_descripcion',
	hiddenName:'c001t_forense[co_alcance_forense]',
	//readOnly:(this.OBJ.co_alcance_forense!='')?true:false,
	//style:(this.main.OBJ.co_alcance_forense!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_alcance_forense',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ALCANCE_FORENSE.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_alcance_forense,
	value:  this.OBJ.co_alcance_forense,
	objStore: this.storeCO_ALCANCE_FORENSE
});

this.tx_metologia_herramientas = new Ext.form.TextField({
	fieldLabel:'Tx metologia herramientas',
	name:'c001t_forense[tx_metologia_herramientas]',
	value:this.OBJ.tx_metologia_herramientas,
	allowBlank:false,
	width:200
});

this.tx_observaciones = new Ext.form.TextArea({
	fieldLabel:'Observaciones',
	name:'c001t_forense[tx_observaciones]',
	value:this.OBJ.tx_observaciones,
	allowBlank:false,
	width:630
});

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'c001t_forense[co_transaccion]',
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
	displayField:'tx_clasificacion',
	hiddenName:'c001t_forense[co_clasificacion]',
	//readOnly:(this.OBJ.co_clasificacion!='')?true:false,
	//style:(this.main.OBJ.co_clasificacion!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_clasificacion',
	selectOnFocus: true,
	mode: 'local',
	width:150,
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
	name:'c001t_forense[in_abierto]',
	checked:(this.OBJ.in_abierto=='0') ? true:false,
	allowBlank:false
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'c001t_forense[created_at]',
	value:this.OBJ.created_at,
	allowBlank:false
});

this.update_at = new Ext.form.DateField({
	fieldLabel:'Update at',
	name:'c001t_forense[update_at]',
	value:this.OBJ.update_at,
	allowBlank:false
});

this.co_estado_forense = new Ext.form.ComboBox({
	fieldLabel:'Co estado forense',
	store: this.storeCO_ESTADO_FORENSE,
	typeAhead: true,
	valueField: 'co_estado_forense',
	displayField:'tx_descripcion',
	hiddenName:'c001t_forense[co_estado_forense]',
	//readOnly:(this.OBJ.co_estado_forense!='')?true:false,
	//style:(this.main.OBJ.co_estado_forense!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_estado_forense',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ESTADO_FORENSE.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_estado_forense,
	value:  this.OBJ.co_estado_forense,
	objStore: this.storeCO_ESTADO_FORENSE
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!C001tForenseEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        C001tForenseEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/C001tForense/guardar',
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
                 C001tForenseLista.main.store_lista.load();
                 C001tForenseEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        C001tForenseEditar.main.winformPanel_.close();
    }
});



this.fieldsetUbicacion = new Ext.form.FieldSet({
   title: 'Ubicación de Apertura del Caso',
   items:[
            {
                        xtype: 'compositefield',
                        fieldLabel: 'Región',
                        items: [
                            this.co_region,
                            {
                               xtype: 'displayfield',
                               value: 'Negocio'
                            },
                            this.co_negocio,
                            {
                               xtype: 'displayfield',
                               value: 'División'
                            },
                            this.co_division,
                        ]
            } 
   ]
});



this.fieldsetDatosCaso = new Ext.form.FieldSet({
   title: 'Datos del Caso',
   items:[
            {
                        xtype: 'compositefield',
                        fieldLabel: 'Fecha Apertura',
                        items: [
                            this.fe_apertura,                           
                            {
                               xtype: 'displayfield',
                               value: 'Nro. Caso AAII'
                            },
                            this.tx_caso_aaii,
                            {
                               xtype: 'displayfield',
                               value: 'Clasificación'
                            },
                            this.co_clasificacion,
                        ]
            } ,
            {
                        xtype: 'compositefield',
                        fieldLabel: 'Titulo',
                        items: [
                            this.tx_titulo,
                            {
                               xtype: 'displayfield',
                               value: 'Alcance'
                            },
                            this.co_alcance_forense
                        ]
                
            },
             this.tx_descripcion_solicitud,
             this.tx_observaciones,
            
   ]
});
        




this.formPanel_ = new Ext.form.FormPanel({
   // frame:true,
    width:800,
    autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_forense,
                    this.fieldsetUbicacion, 
                    this.fieldsetDatosCaso
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Solicitud de Analisis Forense',
    modal:true,
    constrain:true,
    width:800,
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
C001tForenseLista.main.mascara.hide();
}
,getStoreCO_USUARIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcousuarioapertura',
        root:'data',
        fields:[
            {name: 'co_usuario'}
            ]
    });
    return this.store;
}
,getStoreCO_USUARIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcousuariocierre',
        root:'data',
        fields:[
            {name: 'co_usuario'}
            ]
    });
    return this.store;
}
,getStoreCO_REGION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcoregion',
        root:'data',
        fields:[
            {name: 'co_region'},
            {name: 'tx_region'}
            ]
    });
    return this.store;
}
,getStoreCO_NEGOCIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkconegocio',
        root:'data',
        fields:[
            {name: 'co_negocio'},
            {name: 'tx_negocio'}
            ]
    });
    return this.store;
}
,getStoreCO_DIVISION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcodivision',
        root:'data',
        fields:[
            {name: 'co_division'},
            {name: 'tx_division'}
            ]
    });
    return this.store;
}
,getStoreCO_ALCANCE_FORENSE:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcoalcanceforense',
        root:'data',
        fields:[
            {name: 'co_alcance_forense'},
            {name: 'tx_descripcion'}
            ]
    });
    return this.store;
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}
,getStoreCO_CLASIFICACION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcoclasificacion',
        root:'data',
        fields:[
            {name: 'co_clasificacion'},
            {name: 'tx_clasificacion'}
            
            ]
    });
    return this.store;
}
,getStoreCO_ESTADO_FORENSE:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcoestadoforense',
        root:'data',
        fields:[
            {name: 'co_estado_forense'},
            {name: 'tx_descripcion'}
            ]
    });
    return this.store;
}
};
Ext.onReady(C001tForenseEditar.main.init, C001tForenseEditar.main);
</script>
