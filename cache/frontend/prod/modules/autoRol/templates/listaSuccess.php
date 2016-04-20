<script type="text/javascript">
Ext.ns("rolLista");
rolLista.main = {
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
        rolLista.main.mascara.show();
        this.msg = Ext.get('formulariorol');
        this.msg.load({
         url:"/sgsti/web/index.php/rol/editar",
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
	this.codigo  = rolLista.main.gridPanel_.getSelectionModel().getSelected().get('co_rol');
	rolLista.main.mascara.show();
        this.msg = Ext.get('formulariorol');
        this.msg.load({
         url:"/sgsti/web/index.php/rol/editar/codigo/"+this.codigo,
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
	this.codigo  = rolLista.main.gridPanel_.getSelectionModel().getSelected().get('co_rol');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/rol/eliminar',
            params:{
                co_rol:rolLista.main.gridPanel_.getSelectionModel().getSelected().get('co_rol')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    rolLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                rolLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtrorol');
        rolLista.main.mascara.show();
        rolLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/rol/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de rol',
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
    {header: 'co_rol',hidden:true, menuDisabled:true,dataIndex: 'co_rol'},
    {header: 'Tx rol', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_rol'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){rolLista.main.editar.enable();rolLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorrolLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/rol/storelista',
    root:'data',
    fields:[
    {name: 'co_rol'},
    {name: 'tx_rol'},
           ]
    });
    return this.store;
}
};
Ext.onReady(rolLista.main.init, rolLista.main);
</script>
<div id="contenedorrolLista"></div>
<div id="formulariorol"></div>
<div id="filtrorol"></div>
