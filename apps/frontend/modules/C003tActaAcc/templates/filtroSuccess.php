<script type="text/javascript">
Ext.ns("C003tActaAccFiltro");
C003tActaAccFiltro.main = {
init:function(){

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



this.fe_emision = new Ext.form.DateField({
	fieldLabel:'Fe emision',
	name:'fe_emision'
});

this.co_forense = new Ext.form.ComboBox({
	fieldLabel:'Co forense',
	store: this.storeCO_FORENSE,
	typeAhead: true,
	valueField: 'co_forense',
	displayField:'co_forense',
	hiddenName:'co_forense',
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

this.co_region = new Ext.form.ComboBox({
	fieldLabel:'Co region',
	store: this.storeCO_REGION,
	typeAhead: true,
	valueField: 'co_region',
	displayField:'co_region',
	hiddenName:'co_region',
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

this.co_negocio = new Ext.form.ComboBox({
	fieldLabel:'Co negocio',
	store: this.storeCO_NEGOCIO,
	typeAhead: true,
	valueField: 'co_negocio',
	displayField:'co_negocio',
	hiddenName:'co_negocio',
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

this.co_division = new Ext.form.ComboBox({
	fieldLabel:'Co division',
	store: this.storeCO_DIVISION,
	typeAhead: true,
	valueField: 'co_division',
	displayField:'co_division',
	hiddenName:'co_division',
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

this.tx_serial = new Ext.form.TextField({
	fieldLabel:'Tx serial',
	name:'tx_serial',
	value:''
});

this.co_estado_acta = new Ext.form.ComboBox({
	fieldLabel:'Co estado acta',
	store: this.storeCO_ESTADO_ACTA,
	typeAhead: true,
	valueField: 'co_estado_acta',
	displayField:'co_estado_acta',
	hiddenName:'co_estado_acta',
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

this.fe_destruye = new Ext.form.DateField({
	fieldLabel:'Fe destruye',
	name:'fe_destruye'
});

this.co_destruye = new Ext.form.ComboBox({
	fieldLabel:'Co destruye',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'co_destruye',
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

this.tx_observaciones = new Ext.form.TextField({
	fieldLabel:'Tx observaciones',
	name:'tx_observaciones',
	value:''
});

this.tx_ruta = new Ext.form.TextField({
	fieldLabel:'Tx ruta',
	name:'tx_ruta',
	value:''
});

this.nb_archivo = new Ext.form.TextField({
	fieldLabel:'Nb archivo',
	name:'nb_archivo',
	value:''
});

this.in_abierta = new Ext.form.Checkbox({
	fieldLabel:'In abierta',
	name:'in_abierta',
	checked:true
});

this.co_clasificacion = new Ext.form.ComboBox({
	fieldLabel:'Co clasificacion',
	store: this.storeCO_CLASIFICACION,
	typeAhead: true,
	valueField: 'co_clasificacion',
	displayField:'co_clasificacion',
	hiddenName:'co_clasificacion',
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

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'co_transaccion',
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

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'created_at'
});
object_input_tag($c003t_acta_acc, 'getUpdatedAt', array (
  'disabled' => true,
  'control_name' => 'c003t_acta_acc[updated_at]',
))
this.co_elabora = new Ext.form.ComboBox({
	fieldLabel:'Co elabora',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'co_elabora',
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

this.co_custodio = new Ext.form.ComboBox({
	fieldLabel:'Co custodio',
	store: this.storeCO_PERSONA,
	typeAhead: true,
	valueField: 'co_persona',
	displayField:'co_persona',
	hiddenName:'co_custodio',
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

this.co_tipo_recurso = new Ext.form.ComboBox({
	fieldLabel:'Co tipo recurso',
	store: this.storeCO_TIPO_RECURSO,
	typeAhead: true,
	valueField: 'co_tipo_recurso',
	displayField:'co_tipo_recurso',
	hiddenName:'co_tipo_recurso',
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

this.co_ciudad_acta = new Ext.form.ComboBox({
	fieldLabel:'Co ciudad acta',
	store: this.storeCO_CIUDAD,
	typeAhead: true,
	valueField: 'co_ciudad',
	displayField:'co_ciudad',
	hiddenName:'co_ciudad_acta',
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

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.fe_emision,
                                                                                this.co_forense,
                                                                                this.co_region,
                                                                                this.co_negocio,
                                                                                this.co_division,
                                                                                this.tx_serial,
                                                                                this.co_estado_acta,
                                                                                this.fe_destruye,
                                                                                this.co_destruye,
                                                                                this.tx_observaciones,
                                                                                this.tx_ruta,
                                                                                this.nb_archivo,
                                                                                this.in_abierta,
                                                                                this.co_clasificacion,
                                                                                this.co_transaccion,
                                                                                this.created_at,
                                                                                this.updated_at,
                                                                                this.co_elabora,
                                                                                this.co_custodio,
                                                                                this.co_tipo_recurso,
                                                                                this.co_ciudad_acta,
                                           ]
               }
            ]
    });

    this.panelfiltro = new Ext.form.FormPanel({
        frame:true,
        autoWidth:true,
        border:false,
        items:[
            this.tabpanelfiltro
        ]
    });

    this.win = new Ext.Window({
        title:'Parametros de busqueda',
        iconCls: 'icon-buscar',
        width:600,
        autoHeight:true,
        constrain:true,
        closable:false,
        buttonAlign:'center',
        items:[
            this.panelfiltro
        ],
        buttons:[
            {
                text:'Filtrar',
                handler:function(){
                     C003tActaAccFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    C003tActaAccFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    C003tActaAccFiltro.main.win.close();
                    C003tActaAccLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    C003tActaAccLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    C003tActaAccFiltro.main.panelfiltro.getForm().reset();
    C003tActaAccLista.main.store_lista.baseParams={}
    C003tActaAccLista.main.store_lista.baseParams.paginar = 'si';
    C003tActaAccLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = C003tActaAccFiltro.main.panelfiltro.getForm().getValues();
    C003tActaAccLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("C003tActaAccLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        C003tActaAccLista.main.store_lista.baseParams.paginar = 'si';
        C003tActaAccLista.main.store_lista.baseParams.BuscarBy = true;
        C003tActaAccLista.main.store_lista.load();


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

Ext.onReady(C003tActaAccFiltro.main.init,C003tActaAccFiltro.main);
</script>