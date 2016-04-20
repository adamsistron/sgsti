<script type="text/javascript">
Ext.ns("J816tRelRegionNegocioLista");
J816tRelRegionNegocioLista.main = {
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
        J816tRelRegionNegocioLista.main.mascara.show();
        this.msg = Ext.get('formularioJ816tRelRegionNegocio');
        this.msg.load({
         url:"/sgsti/web/index.php/J816tRelRegionNegocio/editar",
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
	this.codigo  = J816tRelRegionNegocioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_relacion');
	J816tRelRegionNegocioLista.main.mascara.show();
        this.msg = Ext.get('formularioJ816tRelRegionNegocio');
        this.msg.load({
         url:"/sgsti/web/index.php/J816tRelRegionNegocio/editar/codigo/"+this.codigo,
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
	this.codigo  = J816tRelRegionNegocioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_relacion');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/J816tRelRegionNegocio/eliminar',
            params:{
                co_relacion:J816tRelRegionNegocioLista.main.gridPanel_.getSelectionModel().getSelected().get('co_relacion')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    J816tRelRegionNegocioLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                J816tRelRegionNegocioLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroJ816tRelRegionNegocio');
        J816tRelRegionNegocioLista.main.mascara.show();
        J816tRelRegionNegocioLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/J816tRelRegionNegocio/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de J816tRelRegionNegocio',
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
    {header: 'co_relacion',hidden:true, menuDisabled:true,dataIndex: 'co_relacion'},
    {header: 'Co region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
    {header: 'Co negocio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_negocio'},
    {header: 'Co division', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_division'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){J816tRelRegionNegocioLista.main.editar.enable();J816tRelRegionNegocioLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorJ816tRelRegionNegocioLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/J816tRelRegionNegocio/storelista',
    root:'data',
    fields:[
    {name: 'co_relacion'},
    {name: 'co_region'},
    {name: 'co_negocio'},
    {name: 'co_division'},
           ]
    });
    return this.store;
}
};
Ext.onReady(J816tRelRegionNegocioLista.main.init, J816tRelRegionNegocioLista.main);
</script>
<div id="contenedorJ816tRelRegionNegocioLista"></div>
<div id="formularioJ816tRelRegionNegocio"></div>
<div id="filtroJ816tRelRegionNegocio"></div>
