<script type="text/javascript">
Ext.ns("J813tRegionFiltro");
J813tRegionFiltro.main = {
init:function(){




this.tx_region = new Ext.form.TextField({
	fieldLabel:'Tx region',
	name:'tx_region',
	value:''
});

this.tx_sigla = new Ext.form.TextField({
	fieldLabel:'Tx sigla',
	name:'tx_sigla',
	value:''
});

    this.tabpanelfiltro = new Ext.TabPanel({
       activeTab:0,
       defaults:{layout:'form',bodyStyle:'padding:7px;',height:135,autoScroll:true},
       items:[
               {
                   title:'Información general',
                   items:[
                                                                                                            this.tx_region,
                                                                                this.tx_sigla,
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
                     J813tRegionFiltro.main.aplicarFiltroByFormulario();
                }
            },
            {
                text:'Limpiar',
                handler:function(){
                    J813tRegionFiltro.main.limpiarCamposByFormFiltro();
                }
            },
            {
                text:'Cerrar',
                handler:function(){
                    J813tRegionFiltro.main.win.close();
                    J813tRegionLista.main.filtro.setDisabled(false);
                }
            }
        ]
    });
    this.win.show();
    J813tRegionLista.main.mascara.hide();
},
limpiarCamposByFormFiltro: function(){
    J813tRegionFiltro.main.panelfiltro.getForm().reset();
    J813tRegionLista.main.store_lista.baseParams={}
    J813tRegionLista.main.store_lista.baseParams.paginar = 'si';
    J813tRegionLista.main.gridPanel_.store.load();
},
aplicarFiltroByFormulario: function(){
    //Capturamos los campos con su value para posteriormente verificar cual
    //esta lleno y trabajar en base a ese.
    var campo = J813tRegionFiltro.main.panelfiltro.getForm().getValues();
    J813tRegionLista.main.store_lista.baseParams={};

    var swfiltrar = false;
    for(campName in campo){
        if(campo[campName]!=''){
            swfiltrar = true;
            eval("J813tRegionLista.main.store_lista.baseParams."+campName+" = '"+campo[campName]+"';");
        }
    }

        J813tRegionLista.main.store_lista.baseParams.paginar = 'si';
        J813tRegionLista.main.store_lista.baseParams.BuscarBy = true;
        J813tRegionLista.main.store_lista.load();


}

};

Ext.onReady(J813tRegionFiltro.main.init,J813tRegionFiltro.main);
</script>