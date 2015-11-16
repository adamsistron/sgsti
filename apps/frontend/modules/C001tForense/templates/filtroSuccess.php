<script type="text/javascript">
Ext.ns("C001tForenseFiltro");
C001tForenseFiltro.main = {
init:function(){

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



this.fe_apertura = new Ext.form.DateField({
	fieldLabel:'Fecha Apertura',
	name:'fe_apertura'
});

this.fe_cierre = new Ext.form.DateField({
	fieldLabel:'Fecha Cierre',
	name:'fe_cierre'
});

this.co_usuario_apertura = new Ext.form.ComboBox({
	fieldLabel:'Co usuario apertura',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'co_usuario_apertura',
	//readOnly:(this.OBJ.co_usuario_apertura!='')?true:false,
	//style:(this.main.OBJ.co_usuario_apertura!='')?'background:#c9c9c9;':'',
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
this.storeCO_USUARIO.load();

this.co_usuario_cierre = new Ext.form.ComboBox({
	fieldLabel:'Co usuario cierre',
	store: this.storeCO_USUARIO,
	typeAhead: true,
	valueField: 'co_usuario',
	displayField:'co_usuario',
	hiddenName:'co_usuario_cierre',
	//readOnly:(this.OBJ.co_usuario_cierre!='')?true:false,
	//style:(this.main.OBJ.co_usuario_cierre!='')?'background:#c9c9c9;':'',
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
this.storeCO_USUARIO.load();

this.co_region = new Ext.form.ComboBox({
	fieldLabel:'Region',
	store: this.storeCO_REGION,
	typeAhead: true,
	valueField: 'co_region',
	displayField:'tx_region',
	hiddenName:'co_region',
	//readOnly:(this.OBJ.co_region!='')?true:false,
	//style:(this.main.OBJ.co_region!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:250,
	resizable:true,
	allowBlank:false
});
this.storeCO_REGION.load();

this.co_negocio = new Ext.form.ComboBox({
	fieldLabel:'Negocio',
	store: this.storeCO_NEGOCIO,
	typeAhead: true,
	valueField: 'co_negocio',
	displayField:'tx_negocio',
	hiddenName:'co_negocio',
	//readOnly:(this.OBJ.co_negocio!='')?true:false,
	//style:(this.main.OBJ.co_negocio!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:250,
	resizable:true,
	allowBlank:false
});
this.storeCO_NEGOCIO.load();

this.co_division = new Ext.form.ComboBox({
	fieldLabel:'Division',
	store: this.storeCO_DIVISION,
	typeAhead: true,
	valueField: 'co_division',
	displayField:'tx_division',
	hiddenName:'co_division',
	//readOnly:(this.OBJ.co_division!='')?true:false,
	//style:(this.main.OBJ.co_division!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:250,
	resizable:true,
	allowBlank:false
});
this.storeCO_DIVISION.load();

this.tx_serial = new Ext.form.TextField({
	fieldLabel:'Serial',
	name:'tx_serial',
	value:''
});

this.tx_titulo = new Ext.form.TextField({
	fieldLabel:'Titulo',
	name:'tx_titulo',
	value:''
});

this.tx_descripcion_solicitud = new Ext.form.TextField({
	fieldLabel:'Descripcion de la Solicitud',
	name:'tx_descripcion_solicitud',
	value:''
});

this.tx_caso_aaii = new Ext.form.TextField({
	fieldLabel:'Caso AAII',
	name:'tx_caso_aaii',
	value:''
});

this.co_alcance_forense = new Ext.form.ComboBox({
	fieldLabel:'Co alcance forense',
	store: this.storeCO_ALCANCE_FORENSE,
	typeAhead: true,
	valueField: 'co_alcance_forense',
	displayField:'co_alcance_forense',
	hiddenName:'co_alcance_forense',
	//readOnly:(this.OBJ.co_alcance_forense!='')?true:false,
	//style:(this.main.OBJ.co_alcance_forense!='')?'background:#c9c9c9;':'',
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
this.storeCO_ALCANCE_FORENSE.load();

this.tx_metologia_herramientas = new Ext.form.TextField({
	fieldLabel:'Tx metologia herramientas',
	name:'tx_metologia_herramientas',
	value:''
});

this.tx_observaciones = new Ext.form.TextField({
	fieldLabel:'Tx observaciones',
	name:'tx_observaciones',
	value:''
});

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
	emptyText:'Seleccione...',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_TRANSACCION.load();

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

this.in_abierto = new Ext.form.Checkbox({
	fieldLabel:'In abierto',
	name:'in_abierto',
	checked:true
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'created_at'
});

this.update_at = new Ext.form.DateField({
	fieldLabel:'Update at',
	name:'update_at'
});

this.co_estado_forense = new Ext.form.ComboBox({
	fieldLabel:'Co estado forense',
	store: this.storeCO_ESTADO_FORENSE,
	typeAhead: true,
	valueField: 'co_estado_forense',
	displayField:'co_estado_forense',
	hiddenName:'co_estado_forense',
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

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:335,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.fe_apertura,
                                                                                this.fe_cierre,
//                                                                                this.co_usuario_apertura,
//                                                                                this.co_usuario_cierre,
                                                                                this.co_region,
                                                                                this.co_negocio,
                                                                                this.co_division,
                                                                                this.tx_serial,
                                                                                this.tx_titulo,
                                                                                this.tx_descripcion_solicitud,
                                                                                this.tx_caso_aaii
//                                                                                this.co_alcance_forense,
//                                                                                this.tx_metologia_herramientas,
//                                                                                this.tx_observaciones,
//                                                                                this.co_transaccion,
//                                                                                this.co_clasificacion,
//                                                                                this.in_abierto,
//                                                                                this.created_at,
//                                                                                this.update_at,
//                                                                                this.co_estado_forense,
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
                     C001tForenseFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    C001tForenseFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    C001tForenseFiltro.main.win.close();
                    C001tForenseLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    C001tForenseLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    C001tForenseFiltro.main.panelfiltro.getForm().reset();
    C001tForenseLista.main.store_lista.baseParams={}
    C001tForenseLista.main.store_lista.baseParams.paginar = 'si';
    C001tForenseLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = C001tForenseFiltro.main.panelfiltro.getForm().getValues();
    C001tForenseLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("C001tForenseLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        C001tForenseLista.main.store_lista.baseParams.paginar = 'si';
        C001tForenseLista.main.store_lista.baseParams.BuscarBy = true;
        C001tForenseLista.main.store_lista.load();


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
            {name: 'co_alcance_forense'}
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
            {name: 'co_clasificacion'}
            ]
    });
    return this.store;
}
,getStoreCO_ESTADO_FORENSE:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/C001tForense/storefkcoestadoforense',
        root:'data',
        fields:[
            {name: 'co_estado_forense'}
            ]
    });
    return this.store;
}

};

Ext.onReady(C001tForenseFiltro.main.init,C001tForenseFiltro.main);
</script>