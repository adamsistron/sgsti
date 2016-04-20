<script type="text/javascript">
Ext.ns("J808tProductoFiltro");
J808tProductoFiltro.main = {
init:function(){

//<Stores de fk>
this.storeCO_PRODUCTO = this.getStoreCO_PRODUCTO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>



this.tx_producto = new Ext.form.TextField({
	fieldLabel:'Tx producto',
	name:'tx_producto',
	value:''
});

this.co_padre = new Ext.form.ComboBox({
	fieldLabel:'Co padre',
	store: this.storeCO_PRODUCTO,
	typeAhead: true,
	valueField: 'co_producto',
	displayField:'co_producto',
	hiddenName:'co_padre',
	//readOnly:(this.OBJ.co_padre!='')?true:false,
	//style:(this.main.OBJ.co_padre!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_padre',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_PRODUCTO.load();

this.tx_href = new Ext.form.TextField({
	fieldLabel:'Tx href',
	name:'tx_href',
	value:''
});

this.tx_icono = new Ext.form.TextField({
	fieldLabel:'Tx icono',
	name:'tx_icono',
	value:''
});

this.nu_orden = new Ext.form.NumberField({
	fieldLabel:'Nu orden',
	name:'nu_orden',
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
                                                                                                            this.tx_producto,
                                                                                this.co_padre,
                                                                                this.tx_href,
                                                                                this.tx_icono,
                                                                                this.nu_orden,
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
                     J808tProductoFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J808tProductoFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J808tProductoFiltro.main.win.close();
                    J808tProductoLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J808tProductoLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J808tProductoFiltro.main.panelfiltro.getForm().reset();
    J808tProductoLista.main.store_lista.baseParams={}
    J808tProductoLista.main.store_lista.baseParams.paginar = 'si';
    J808tProductoLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J808tProductoFiltro.main.panelfiltro.getForm().getValues();
    J808tProductoLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J808tProductoLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J808tProductoLista.main.store_lista.baseParams.paginar = 'si';
        J808tProductoLista.main.store_lista.baseParams.BuscarBy = true;
        J808tProductoLista.main.store_lista.load();


}
,getStoreCO_PRODUCTO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J808tProducto/storefkcopadre',
        root:'data',
        fields:[
            {name: 'co_producto'}
            ]
    });
    return this.store;
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J808tProducto/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}

};

Ext.onReady(J808tProductoFiltro.main.init,J808tProductoFiltro.main);
</script>