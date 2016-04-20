<script type="text/javascript">
Ext.ns("J817tProcesoStiFiltro");
J817tProcesoStiFiltro.main = {
init:function(){

//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>



this.tx_descripcion = new Ext.form.TextField({
	fieldLabel:'Tx descripcion',
	name:'tx_descripcion',
	value:''
});

this.tx_sigla = new Ext.form.TextField({
	fieldLabel:'Tx sigla',
	name:'tx_sigla',
	value:''
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'created_at'
});

this.updated_at = new Ext.form.DateField({
	fieldLabel:'Updated at',
	name:'updated_at'
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

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.tx_descripcion,
                                                                                this.tx_sigla,
                                                                                this.created_at,
                                                                                this.updated_at,
                                                                                this.co_transaccion,
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
                     J817tProcesoStiFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J817tProcesoStiFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J817tProcesoStiFiltro.main.win.close();
                    J817tProcesoStiLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J817tProcesoStiLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J817tProcesoStiFiltro.main.panelfiltro.getForm().reset();
    J817tProcesoStiLista.main.store_lista.baseParams={}
    J817tProcesoStiLista.main.store_lista.baseParams.paginar = 'si';
    J817tProcesoStiLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J817tProcesoStiFiltro.main.panelfiltro.getForm().getValues();
    J817tProcesoStiLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J817tProcesoStiLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J817tProcesoStiLista.main.store_lista.baseParams.paginar = 'si';
        J817tProcesoStiLista.main.store_lista.baseParams.BuscarBy = true;
        J817tProcesoStiLista.main.store_lista.load();


}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J817tProcesoSti/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}

};

Ext.onReady(J817tProcesoStiFiltro.main.init,J817tProcesoStiFiltro.main);
</script>