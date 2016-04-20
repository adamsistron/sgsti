<script type="text/javascript">
Ext.ns("J812PersonaFiltro");
J812PersonaFiltro.main = {
init:function(){

//<Stores de fk>
this.storeCO_DIVISION = this.getStoreCO_DIVISION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_ROL = this.getStoreCO_ROL();
//<Stores de fk>
//<Stores de fk>
this.storeCO_REGION = this.getStoreCO_REGION();
//<Stores de fk>
//<Stores de fk>
this.storeCO_NEGOCIO = this.getStoreCO_NEGOCIO();
//<Stores de fk>



this.nb_persona = new Ext.form.TextField({
	fieldLabel:'Nb persona',
	name:'nb_persona',
	value:''
});

this.ap_persona = new Ext.form.TextField({
	fieldLabel:'Ap persona',
	name:'ap_persona',
	value:''
});

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

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.nb_persona,
                                                                                this.ap_persona,
                                                                                this.co_division,
                                                                                this.co_rol,
                                                                                this.co_region,
                                                                                this.co_negocio,
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
                     J812PersonaFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J812PersonaFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J812PersonaFiltro.main.win.close();
                    J812PersonaLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J812PersonaLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J812PersonaFiltro.main.panelfiltro.getForm().reset();
    J812PersonaLista.main.store_lista.baseParams={}
    J812PersonaLista.main.store_lista.baseParams.paginar = 'si';
    J812PersonaLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J812PersonaFiltro.main.panelfiltro.getForm().getValues();
    J812PersonaLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J812PersonaLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J812PersonaLista.main.store_lista.baseParams.paginar = 'si';
        J812PersonaLista.main.store_lista.baseParams.BuscarBy = true;
        J812PersonaLista.main.store_lista.load();


}
,getStoreCO_DIVISION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J812Persona/storefkcodivision',
        root:'data',
        fields:[
            {name: 'co_division'}
            ]
    });
    return this.store;
}
,getStoreCO_ROL:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J812Persona/storefkcorol',
        root:'data',
        fields:[
            {name: 'co_rol'}
            ]
    });
    return this.store;
}
,getStoreCO_REGION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J812Persona/storefkcoregion',
        root:'data',
        fields:[
            {name: 'co_region'}
            ]
    });
    return this.store;
}
,getStoreCO_NEGOCIO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J812Persona/storefkconegocio',
        root:'data',
        fields:[
            {name: 'co_negocio'}
            ]
    });
    return this.store;
}

};

Ext.onReady(J812PersonaFiltro.main.init,J812PersonaFiltro.main);
</script>