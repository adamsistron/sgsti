<script type="text/javascript">
Ext.ns("J816tRelRegionNegocioFiltro");
J816tRelRegionNegocioFiltro.main = {
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
                     J816tRelRegionNegocioFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J816tRelRegionNegocioFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J816tRelRegionNegocioFiltro.main.win.close();
                    J816tRelRegionNegocioLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J816tRelRegionNegocioLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J816tRelRegionNegocioFiltro.main.panelfiltro.getForm().reset();
    J816tRelRegionNegocioLista.main.store_lista.baseParams={}
    J816tRelRegionNegocioLista.main.store_lista.baseParams.paginar = 'si';
    J816tRelRegionNegocioLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J816tRelRegionNegocioFiltro.main.panelfiltro.getForm().getValues();
    J816tRelRegionNegocioLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J816tRelRegionNegocioLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J816tRelRegionNegocioLista.main.store_lista.baseParams.paginar = 'si';
        J816tRelRegionNegocioLista.main.store_lista.baseParams.BuscarBy = true;
        J816tRelRegionNegocioLista.main.store_lista.load();


}
,getStoreCO_REGION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J816tRelRegionNegocio/storefkcoregion',
        root:'data',
        fields:[
            {name: 'co_region'}
            ]
    });
    return this.store;
}
,getStoreCO_NEGOCIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J816tRelRegionNegocio/storefkconegocio',
        root:'data',
        fields:[
            {name: 'co_negocio'}
            ]
    });
    return this.store;
}
,getStoreCO_DIVISION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J816tRelRegionNegocio/storefkcodivision',
        root:'data',
        fields:[
            {name: 'co_division'}
            ]
    });
    return this.store;
}

};

Ext.onReady(J816tRelRegionNegocioFiltro.main.init,J816tRelRegionNegocioFiltro.main);
</script>