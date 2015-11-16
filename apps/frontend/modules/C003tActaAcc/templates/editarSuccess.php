<script type="text/javascript">
Ext.ns("C003tActaAccEditar");
C003tActaAccEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_FORENSE = this.getStoreCO_FORENSE();
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
this.storeCO_ESTADO_ACTA = this.getStoreCO_ESTADO_ACTA();
//<Stores de fk>
//<Stores de fk>
this.storeCO_USUARIO = this.getStoreCO_USUARIO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_CLASIFICACION = this.getStoreCO_CLASIFICACION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_USUARIO = this.getStoreCO_USUARIO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_PERSONA = this.getStoreCO_PERSONA();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TIPO_RECURSO = this.getStoreCO_TIPO_RECURSO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_CIUDAD = this.getStoreCO_CIUDAD();
//<Stores de fk>

//<ClavePrimaria>
this.co_acc = new Ext.form.Hidden({
    name:'co_acc',
    value:this.OBJ.co_acc});
//</ClavePrimaria>


this.fe_emision = new Ext.form.DateField({
	fieldLabel:'Fecha Emision',
	name:'c003t_acta_acc[fe_emision]',
	value:this.OBJ.fe_emision,
	allowBlank:false,
	width:100
});

this.co_forense = new Ext.form.ComboBox({
	fieldLabel:'Co forense',
	store: this.storeCO_FORENSE,
	typeAhead: true,
	valueField: 'co_forense',
	displayField:'co_forense',
	hiddenName:'c003t_acta_acc[co_forense]',
	//readOnly:(this.OBJ.co_forense!='')?true:false,
	//style:(this.main.OBJ.co_forense!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_forense',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_FORENSE.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_forense,
	value:  this.OBJ.co_forense,
	objStore: this.storeCO_FORENSE
});

this.co_region = new Ext.form.ComboBox({
	fieldLabel:'Region',
	store: this.storeCO_REGION,
	typeAhead: true,
	valueField: 'co_region',
	displayField:'co_region',
	hiddenName:'c003t_acta_acc[co_region]',
	//readOnly:(this.OBJ.co_region!='')?true:false,
	//style:(this.main.OBJ.co_region!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_region',
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
	hiddenName:'c003t_acta_acc[co_negocio]',
	//readOnly:(this.OBJ.co_negocio!='')?true:false,
	//style:(this.main.OBJ.co_negocio!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_negocio',
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
	hiddenName:'c003t_acta_acc[co_division]',
	//readOnly:(this.OBJ.co_division!='')?true:false,
	//style:(this.main.OBJ.co_division!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_division',
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
	name:'c003t_acta_acc[tx_serial]',
	value:this.OBJ.tx_serial,
	allowBlank:false,
	width:200
});

this.co_estado_acta = new Ext.form.ComboBox({
	fieldLabel:'Co estado acta',
	store: this.storeCO_ESTADO_ACTA,
	typeAhead: true,
	valueField: 'co_estado_acta',
	displayField:'co_estado_acta',
	hiddenName:'c003t_acta_acc[co_estado_acta]',
	//readOnly:(this.OBJ.co_estado_acta!='')?true:false,
	//style:(this.main.OBJ.co_estado_acta!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_estado_acta',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ESTADO_ACTA.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_estado_acta,
	value:  this.OBJ.co_estado_acta,
	objStore: this.storeCO_ESTADO_ACTA
});

this.fe_destruye = new Ext.form.DateField({
	fieldLabel:'Fe destruye',
	name:'c003t_acta_acc[fe_destruye]',
	value:this.OBJ.fe_destruye,
	allowBlank:false,
	width:100
});

this.co_destruye = new Ext.form.ComboBox({
	fieldLabel:'Co destruye',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'c003t_acta_acc[co_destruye]',
	//readOnly:(this.OBJ.co_destruye!='')?true:false,
	//style:(this.main.OBJ.co_destruye!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_destruye',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_USUARIO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_destruye,
	value:  this.OBJ.co_destruye,
	objStore: this.storeCO_USUARIO
});

this.tx_observaciones = new Ext.form.TextArea({
	fieldLabel:'Observaciones',
	name:'c003t_acta_acc[tx_observaciones]',
	value:this.OBJ.tx_observaciones,
	allowBlank:false,
	width:400
});

this.tx_ruta = new Ext.form.TextField({
	fieldLabel:'Tx ruta',
	name:'c003t_acta_acc[tx_ruta]',
	value:this.OBJ.tx_ruta,
	allowBlank:false,
	width:200
});

this.nb_archivo = new Ext.form.TextField({
	fieldLabel:'Nb archivo',
	name:'c003t_acta_acc[nb_archivo]',
	value:this.OBJ.nb_archivo,
	allowBlank:false,
	width:200
});

this.in_abierta = new Ext.form.Checkbox({
	fieldLabel:'In abierta',
	name:'c003t_acta_acc[in_abierta]',
	checked:(this.OBJ.in_abierta=='0') ? true:false,
	allowBlank:false
});

this.co_clasificacion = new Ext.form.ComboBox({
	fieldLabel:'Clasificacion',
	store: this.storeCO_CLASIFICACION,
	typeAhead: true,
	valueField: 'co_clasificacion',
	displayField:'co_clasificacion',
	hiddenName:'c003t_acta_acc[co_clasificacion]',
	//readOnly:(this.OBJ.co_clasificacion!='')?true:false,
	//style:(this.main.OBJ.co_clasificacion!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_clasificacion',
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

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'c003t_acta_acc[co_transaccion]',
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


this.co_elabora = new Ext.form.ComboBox({
	fieldLabel:'Elabora',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'c003t_acta_acc[co_elabora]',
	//readOnly:(this.OBJ.co_elabora!='')?true:false,
	//style:(this.main.OBJ.co_elabora!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_elabora',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_USUARIO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_elabora,
	value:  this.OBJ.co_elabora,
	objStore: this.storeCO_USUARIO
});

this.co_custodio = new Ext.form.ComboBox({
	fieldLabel:'Custodio',
	store: this.storeCO_PERSONA,
	typeAhead: true,
	valueField: 'co_persona',
	displayField:'co_persona',
	hiddenName:'c003t_acta_acc[co_custodio]',
	//readOnly:(this.OBJ.co_custodio!='')?true:false,
	//style:(this.main.OBJ.co_custodio!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_custodio',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_PERSONA.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_custodio,
	value:  this.OBJ.co_custodio,
	objStore: this.storeCO_PERSONA
});

this.co_tipo_recurso = new Ext.form.ComboBox({
	fieldLabel:'Tipo Recurso',
	store: this.storeCO_TIPO_RECURSO,
	typeAhead: true,
	valueField: 'co_tipo_recurso',
	displayField:'co_tipo_recurso',
	hiddenName:'c003t_acta_acc[co_tipo_recurso]',
	//readOnly:(this.OBJ.co_tipo_recurso!='')?true:false,
	//style:(this.main.OBJ.co_tipo_recurso!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_tipo_recurso',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_TIPO_RECURSO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_tipo_recurso,
	value:  this.OBJ.co_tipo_recurso,
	objStore: this.storeCO_TIPO_RECURSO
});

this.co_ciudad_acta = new Ext.form.ComboBox({
	fieldLabel:'Ciudad Acta',
	store: this.storeCO_CIUDAD,
	typeAhead: true,
	valueField: 'co_ciudad',
	displayField:'co_ciudad',
	hiddenName:'c003t_acta_acc[co_ciudad_acta]',
	//readOnly:(this.OBJ.co_ciudad_acta!='')?true:false,
	//style:(this.main.OBJ.co_ciudad_acta!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_ciudad_acta',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_CIUDAD.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_ciudad_acta,
	value:  this.OBJ.co_ciudad_acta,
	objStore: this.storeCO_CIUDAD
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!C003tActaAccEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        C003tActaAccEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/C003tActaAcc/guardar',
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
                 C003tActaAccLista.main.store_lista.load();
                 C003tActaAccEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        C003tActaAccEditar.main.winformPanel_.close();
    }
});


this.fieldsetUbicacion  = new Ext.form.FieldSet({
   title: 'Ubicación de Apertura del Caso',
   items:[
          this.co_region,
          this.co_negocio,
          this.co_division 
   ]
});

this.fieldsetDatosActa = new Ext.form.FieldSet({
   title: 'Datos del Acta de Cadena de Custodia',
   items:[
            this.fe_emision,
            this.co_elabora,
            this.co_clasificacion,
            this.co_estado_acta,
            this.co_tipo_recurso,
            this.tx_observaciones,            
            this.co_custodio,            
            this.co_ciudad_acta 
   ]
})

this.formPanel_ = new Ext.form.FormPanel({
 //   frame:true,
    width:600,
autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_acc,
                    this.fieldsetUbicacion,
                    this.fieldsetDatosActa
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Acta de Cadena de Custodia',
    modal:true,
    constrain:true,
width:600,
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
this.winformPanel_ .show();
C003tActaAccLista.main.mascara.hide();
}
,getStoreCO_FORENSE:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcoforense',
        root:'data',
        fields:[
            {name: 'co_forense'}
            ]
    });
    return this.store;
}
,getStoreCO_REGION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcoregion',
        root:'data',
        fields:[
            {name: 'co_region'}
            ]
    });
    return this.store;
}
,getStoreCO_NEGOCIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkconegocio',
        root:'data',
        fields:[
            {name: 'co_negocio'}
            ]
    });
    return this.store;
}
,getStoreCO_DIVISION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcodivision',
        root:'data',
        fields:[
            {name: 'co_division'}
            ]
    });
    return this.store;
}
,getStoreCO_ESTADO_ACTA:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcoestadoacta',
        root:'data',
        fields:[
            {name: 'co_estado_acta'}
            ]
    });
    return this.store;
}
,getStoreCO_USUARIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcodestruye',
        root:'data',
        fields:[
            {name: 'co_usuario'}
            ]
    });
    return this.store;
}
,getStoreCO_CLASIFICACION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcoclasificacion',
        root:'data',
        fields:[
            {name: 'co_clasificacion'}
            ]
    });
    return this.store;
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}
,getStoreCO_USUARIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcoelabora',
        root:'data',
        fields:[
            {name: 'co_usuario'}
            ]
    });
    return this.store;
}
,getStoreCO_PERSONA:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcocustodio',
        root:'data',
        fields:[
            {name: 'co_persona'}
            ]
    });
    return this.store;
}
,getStoreCO_TIPO_RECURSO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcotiporecurso',
        root:'data',
        fields:[
            {name: 'co_tipo_recurso'}
            ]
    });
    return this.store;
}
,getStoreCO_CIUDAD:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C003tActaAcc/storefkcociudadacta',
        root:'data',
        fields:[
            {name: 'co_ciudad'}
            ]
    });
    return this.store;
}
};
Ext.onReady(C003tActaAccEditar.main.init, C003tActaAccEditar.main);
</script>
