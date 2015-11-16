<script type="text/javascript">
Ext.ns("J817tProcesoStiLista");
J817tProcesoStiLista.main = {
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
        J817tProcesoStiLista.main.mascara.show();
        this.msg = Ext.get('formularioJ817tProcesoSti');
        this.msg.load({
         url:"/sgsti/web/index.php/J817tProcesoSti/editar",
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
	this.codigo  = J817tProcesoStiLista.main.gridPanel_.getSelectionModel().getSelected().get('co_proceso_sti');
	J817tProcesoStiLista.main.mascara.show();
        this.msg = Ext.get('formularioJ817tProcesoSti');
        this.msg.load({
         url:"/sgsti/web/index.php/J817tProcesoSti/editar/codigo/"+this.codigo,
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
	this.codigo  = J817tProcesoStiLista.main.gridPanel_.getSelectionModel().getSelected().get('co_proceso_sti');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/J817tProcesoSti/eliminar',
            params:{
                co_proceso_sti:J817tProcesoStiLista.main.gridPanel_.getSelectionModel().getSelected().get('co_proceso_sti')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    J817tProcesoStiLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                J817tProcesoStiLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroJ817tProcesoSti');
        J817tProcesoStiLista.main.mascara.show();
        J817tProcesoStiLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/J817tProcesoSti/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de J817tProcesoSti',
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
    {header: 'co_proceso_sti',hidden:true, menuDisabled:true,dataIndex: 'co_proceso_sti'},
    {header: 'Tx descripcion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_descripcion'},
    {header: 'Tx sigla', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_sigla'},
    {header: 'Created at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'created_at'},
    {header: 'Updated at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'updated_at'},
    {header: 'Co transaccion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_transaccion'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){J817tProcesoStiLista.main.editar.enable();J817tProcesoStiLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorJ817tProcesoStiLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/J817tProcesoSti/storelista',
    root:'data',
    fields:[
    {name: 'co_proceso_sti'},
    {name: 'tx_descripcion'},
    {name: 'tx_sigla'},
    {name: 'created_at'},
    {name: 'updated_at'},
    {name: 'co_transaccion'},
           ]
    });
    return this.store;
}
};
Ext.onReady(J817tProcesoStiLista.main.init, J817tProcesoStiLista.main);
</script>
<div id="contenedorJ817tProcesoStiLista"></div>
<div id="formularioJ817tProcesoSti"></div>
<div id="filtroJ817tProcesoSti"></div>
