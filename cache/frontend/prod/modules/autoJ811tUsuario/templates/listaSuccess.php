<script type="text/javascript">
Ext.ns("J811tUsuarioLista");
J811tUsuarioLista.main = {
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
        J811tUsuarioLista.main.mascara.show();
        this.msg = Ext.get('formularioJ811tUsuario');
        this.msg.load({
         url:"/sgsti/web/index.php/J811tUsuario/editar",
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
	this.codigo  = J811tUsuarioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_usuario');
	J811tUsuarioLista.main.mascara.show();
        this.msg = Ext.get('formularioJ811tUsuario');
        this.msg.load({
         url:"/sgsti/web/index.php/J811tUsuario/editar/codigo/"+this.codigo,
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
	this.codigo  = J811tUsuarioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_usuario');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/J811tUsuario/eliminar',
            params:{
                co_usuario:J811tUsuarioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_usuario')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    J811tUsuarioLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                J811tUsuarioLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroJ811tUsuario');
        J811tUsuarioLista.main.mascara.show();
        J811tUsuarioLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/J811tUsuario/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de J811tUsuario',
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
    {header: 'co_usuario',hidden:true, menuDisabled:true,dataIndex: 'co_usuario'},
    {header: 'Tx indicador', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_indicador'},
    {header: 'Co persona', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_persona'},
    {header: 'Co rol', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_rol'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){J811tUsuarioLista.main.editar.enable();J811tUsuarioLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorJ811tUsuarioLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/J811tUsuario/storelista',
    root:'data',
    fields:[
    {name: 'co_usuario'},
    {name: 'tx_indicador'},
    {name: 'co_persona'},
    {name: 'co_rol'},
           ]
    });
    return this.store;
}
};
Ext.onReady(J811tUsuarioLista.main.init, J811tUsuarioLista.main);
</script>
<div id="contenedorJ811tUsuarioLista"></div>
<div id="formularioJ811tUsuario"></div>
<div id="filtroJ811tUsuario"></div>
