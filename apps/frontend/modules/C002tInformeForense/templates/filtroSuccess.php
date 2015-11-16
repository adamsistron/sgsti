<script type="text/javascript">
Ext.ns("C002tInformeForenseFiltro");
C002tInformeForenseFiltro.main = {
init:function(){

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

this.co_estado_informe = new Ext.form.ComboBox({
	fieldLabel:'Co estado informe',
	store: this.storeCO_ESTADO_INFORME,
	typeAhead: true,
	valueField: 'co_estado_informe',
	displayField:'co_estado_informe',
	hiddenName:'co_estado_informe',
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

this.tx_serial = new Ext.form.TextField({
	fieldLabel:'Tx serial',
	name:'tx_serial',
	value:''
});

this.tx_titulo = new Ext.form.TextField({
	fieldLabel:'Tx titulo',
	name:'tx_titulo',
	value:''
});

this.tx_descripcion_entorno = new Ext.form.TextArea({
	fieldLabel:'Tx descripcion entorno',
	name:'tx_descripcion_entorno',
	value:''
});

this.tx_resultados = new Ext.form.TextArea({
	fieldLabel:'Tx resultados',
	name:'tx_resultados',
	value:''
});

this.tx_conclusiones = new Ext.form.TextArea({
	fieldLabel:'Tx conclusiones',
	name:'tx_conclusiones',
	value:''
});

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

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.co_region,
                                                                                this.co_negocio,
                                                                                this.co_division,
                                                                                this.co_estado_informe,
                                                                                this.tx_serial,
                                                                                this.tx_titulo,
                                                                                this.tx_descripcion_entorno,
                                                                                this.tx_resultados,
                                                                                this.tx_conclusiones,
                                                                                this.tx_observaciones,
                                                                                this.tx_ruta,
                                                                                this.nb_archivo,
                                                                                this.co_transaccion,
                                                                                this.co_clasificacion,
                                                                                this.in_abierto,
                                                                                this.created_at,
                                                                                this.update_at,
                                                                                this.co_forense,
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
                     C002tInformeForenseFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    C002tInformeForenseFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    C002tInformeForenseFiltro.main.win.close();
                    C002tInformeForenseLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    C002tInformeForenseLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    C002tInformeForenseFiltro.main.panelfiltro.getForm().reset();
    C002tInformeForenseLista.main.store_lista.baseParams={}
    C002tInformeForenseLista.main.store_lista.baseParams.paginar = 'si';
    C002tInformeForenseLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = C002tInformeForenseFiltro.main.panelfiltro.getForm().getValues();
    C002tInformeForenseLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("C002tInformeForenseLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        C002tInformeForenseLista.main.store_lista.baseParams.paginar = 'si';
        C002tInformeForenseLista.main.store_lista.baseParams.BuscarBy = true;
        C002tInformeForenseLista.main.store_lista.load();


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

Ext.onReady(C002tInformeForenseFiltro.main.init,C002tInformeForenseFiltro.main);
</script>