<script type="text/javascript">
Ext.ns("C004tActaAieLista");
C004tActaAieLista.main = {
condicion:function(codigo){
    return (codigo=='0')?'NO':'SI';
},
init:function(){
//Mascara general del modulo
this.mascara = new Ext.LoadMask(Ext.getBody(), {msg:"Cargando..."});

//objeto store
this.store_lista = this.getLista();

//Agregar un registro
this.nuevo = new Ext.Button({
    text:'Nuevo',
    iconCls: 'icon-nuevo',
    handler:function(){
        C004tActaAieLista.main.mascara.show();
        this.msg = Ext.get('formularioC004tActaAie');
        this.msg.load({
         url:"/sgsti/web/index.php/C004tActaAie/editar",
         scripts: true,
         text: "Cargando.."
        });
    }
});

//Editar un registro
this.editar= new Ext.Button({
    text:'Editar',
    iconCls: 'icon-editar',
    handler:function(){
	this.codigo  = C004tActaAieLista.main.gridPanel_.getSelectionModel().getSelected().get('co_aie');
	C004tActaAieLista.main.mascara.show();
        this.msg = Ext.get('formularioC004tActaAie');
        this.msg.load({
         url:"/sgsti/web/index.php/C004tActaAie/editar/codigo/"+this.codigo,
         scripts: true,
         text: "Cargando.."
        });
    }
});

//Eliminar un registro
this.eliminar= new Ext.Button({
    text:'Eliminar',
    iconCls: 'icon-eliminar',
    handler:function(){
	this.codigo  = C004tActaAieLista.main.gridPanel_.getSelectionModel().getSelected().get('co_aie');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/C004tActaAie/eliminar',
            params:{
                co_aie:C004tActaAieLista.main.gridPanel_.getSelectionModel().getSelected().get('co_aie')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    C004tActaAieLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                C004tActaAieLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroC004tActaAie');
        C004tActaAieLista.main.mascara.show();
        C004tActaAieLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/C004tActaAie/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de C004tActaAie',
    iconCls: 'icon-libro',
    store: this.store_lista,
    loadMask:true,
//    frame:true,
    height:550,
    tbar:[
        this.nuevo,'-',this.editar,'-',this.eliminar,'-',this.filtro
    ],
    columns: [
    new Ext.grid.RowNumberer(),
    {header: 'co_aie',hidden:true, menuDisabled:true,dataIndex: 'co_aie'},
    {header: 'Fe emision', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'fe_emision'},
    {header: 'Co forense', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_forense'},
    {header: 'Co region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
    {header: 'Co negocio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_negocio'},
    {header: 'Co division', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_division'},
    {header: 'Tx serial', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_serial'},
    {header: 'Tx observaciones', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_observaciones'},
    {header: 'Tx ruta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_ruta'},
    {header: 'Nb archivo', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'nb_archivo'},
    {header: 'In abierta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'in_abierta'},
    {header: 'Co clasificacion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_clasificacion'},
    {header: 'Co transaccion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_transaccion'},
    {header: 'Created at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'created_at'},
    {header: 'Updated at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'updated_at'},
    {header: 'Co elabora', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_elabora'},
    {header: 'Co custodio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_custodio'},
    {header: 'Co recurso', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_recurso'},
    {header: 'Co ciudad acta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_ciudad_acta'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){C004tActaAieLista.main.editar.enable();C004tActaAieLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorC004tActaAieLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/C004tActaAie/storelista',
    root:'data',
    fields:[
    {name: 'co_aie'},
    {name: 'fe_emision'},
    {name: 'co_forense'},
    {name: 'co_region'},
    {name: 'co_negocio'},
    {name: 'co_division'},
    {name: 'tx_serial'},
    {name: 'tx_observaciones'},
    {name: 'tx_ruta'},
    {name: 'nb_archivo'},
    {name: 'in_abierta'},
    {name: 'co_clasificacion'},
    {name: 'co_transaccion'},
    {name: 'created_at'},
    {name: 'updated_at'},
    {name: 'co_elabora'},
    {name: 'co_custodio'},
    {name: 'co_recurso'},
    {name: 'co_ciudad_acta'},
           ]
    });
    return this.store;
}
};
Ext.onReady(C004tActaAieLista.main.init, C004tActaAieLista.main);
</script>
<div id="contenedorC004tActaAieLista"></div>
<div id="formularioC004tActaAie"></div>
<div id="filtroC004tActaAie"></div>
