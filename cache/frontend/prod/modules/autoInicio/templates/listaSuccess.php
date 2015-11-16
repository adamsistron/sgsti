<script type="text/javascript">
Ext.ns("inicioLista");
inicioLista.main = {
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
        inicioLista.main.mascara.show();
        this.msg = Ext.get('formularioinicio');
        this.msg.load({
         url:"/sgsti/web/index.php/inicio/editar",
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
	this.codigo  = inicioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_producto');
	inicioLista.main.mascara.show();
        this.msg = Ext.get('formularioinicio');
        this.msg.load({
         url:"/sgsti/web/index.php/inicio/editar/codigo/"+this.codigo,
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
	this.codigo  = inicioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_producto');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/inicio/eliminar',
            params:{
                co_producto:inicioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_producto')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    inicioLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                inicioLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroinicio');
        inicioLista.main.mascara.show();
        inicioLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/inicio/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de inicio',
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
    {header: 'co_producto',hidden:true, menuDisabled:true,dataIndex: 'co_producto'},
    {header: 'Tx producto', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_producto'},
    {header: 'Co padre', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_padre'},
    {header: 'Tx href', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_href'},
    {header: 'Tx icono', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_icono'},
    {header: 'Nu orden', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'nu_orden'},
    {header: 'Tx sigla', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_sigla'},
    {header: 'Created at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'created_at'},
    {header: 'Updated at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'updated_at'},
    {header: 'Co transaccion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_transaccion'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){inicioLista.main.editar.enable();inicioLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorinicioLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/inicio/storelista',
    root:'data',
    fields:[
    {name: 'co_producto'},
    {name: 'tx_producto'},
    {name: 'co_padre'},
    {name: 'tx_href'},
    {name: 'tx_icono'},
    {name: 'nu_orden'},
    {name: 'tx_sigla'},
    {name: 'created_at'},
    {name: 'updated_at'},
    {name: 'co_transaccion'},
           ]
    });
    return this.store;
}
};
Ext.onReady(inicioLista.main.init, inicioLista.main);
</script>
<div id="contenedorinicioLista"></div>
<div id="formularioinicio"></div>
<div id="filtroinicio"></div>
