<script type="text/javascript">
Ext.ns("J811tUsuarioFiltro");
J811tUsuarioFiltro.main = {
init:function(){

//<Stores de fk>
this.storeCO_PERSONA = this.getStoreCO_PERSONA();
//<Stores de fk>
//<Stores de fk>
this.storeCO_ROL = this.getStoreCO_ROL();
//<Stores de fk>



this.tx_indicador = new Ext.form.TextField({
	fieldLabel:'Tx indicador',
	name:'tx_indicador',
	value:''
});

this.co_persona = new Ext.form.ComboBox({
	fieldLabel:'Co persona',
	store: this.storeCO_PERSONA,
	typeAhead: true,
	valueField: 'co_persona',
	displayField:'co_persona',
	hiddenName:'co_persona',
	//readOnly:(this.OBJ.co_persona!='')?true:false,
	//style:(this.main.OBJ.co_persona!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_persona',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_PERSONA.load();

this.co_rol = new Ext.form.ComboBox({
	fieldLabel:'Co rol',
	store: this.storeCO_ROL,
	typeAhead: true,
	valueField: 'co_rol',
	displayField:'co_rol',
	hiddenName:'co_rol',
	//readOnly:(this.OBJ.co_rol!='')?true:false,
	//style:(this.main.OBJ.co_rol!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_rol',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ROL.load();

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.tx_indicador,
                                                                                this.co_persona,
                                                                                this.co_rol,
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
                     J811tUsuarioFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J811tUsuarioFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J811tUsuarioFiltro.main.win.close();
                    J811tUsuarioLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J811tUsuarioLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J811tUsuarioFiltro.main.panelfiltro.getForm().reset();
    J811tUsuarioLista.main.store_lista.baseParams={}
    J811tUsuarioLista.main.store_lista.baseParams.paginar = 'si';
    J811tUsuarioLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J811tUsuarioFiltro.main.panelfiltro.getForm().getValues();
    J811tUsuarioLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J811tUsuarioLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J811tUsuarioLista.main.store_lista.baseParams.paginar = 'si';
        J811tUsuarioLista.main.store_lista.baseParams.BuscarBy = true;
        J811tUsuarioLista.main.store_lista.load();


}
,getStoreCO_PERSONA:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J811tUsuario/storefkcopersona',
        root:'data',
        fields:[
            {name: 'co_persona'}
            ]
    });
    return this.store;
}
,getStoreCO_ROL:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J811tUsuario/storefkcorol',
        root:'data',
        fields:[
            {name: 'co_rol'}
            ]
    });
    return this.store;
}

};

Ext.onReady(J811tUsuarioFiltro.main.init,J811tUsuarioFiltro.main);
</script>