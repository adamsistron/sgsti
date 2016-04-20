<script type="text/javascript">
Ext.ns("J813tRegionLista");
J813tRegionLista.main = {
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
        J813tRegionLista.main.mascara.show();
        this.msg = Ext.get('formularioJ813tRegion');
        this.msg.load({
         url:"/sgsti/web/index.php/J813tRegion/editar",
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
	this.codigo  = J813tRegionLista.main.gridPanel_.getSelectionModel().getSelected().get('co_region');
	J813tRegionLista.main.mascara.show();
        this.msg = Ext.get('formularioJ813tRegion');
        this.msg.load({
         url:"/sgsti/web/index.php/J813tRegion/editar/codigo/"+this.codigo,
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
	this.codigo  = J813tRegionLista.main.gridPanel_.getSelectionModel().getSelected().get('co_region');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/J813tRegion/eliminar',
            params:{
                co_region:J813tRegionLista.main.gridPanel_.getSelectionModel().getSelected().get('co_region')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    J813tRegionLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                J813tRegionLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroJ813tRegion');
        J813tRegionLista.main.mascara.show();
        J813tRegionLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/J813tRegion/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de J813tRegion',
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
    {header: 'co_region',hidden:true, menuDisabled:true,dataIndex: 'co_region'},
    {header: 'Tx region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_region'},
    {header: 'Tx sigla', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_sigla'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){J813tRegionLista.main.editar.enable();J813tRegionLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorJ813tRegionLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/J813tRegion/storelista',
    root:'data',
    fields:[
    {name: 'co_region'},
    {name: 'tx_region'},
    {name: 'tx_sigla'},
           ]
    });
    return this.store;
}
};
Ext.onReady(J813tRegionLista.main.init, J813tRegionLista.main);
</script>
<div id="contenedorJ813tRegionLista"></div>
<div id="formularioJ813tRegion"></div>
<div id="filtroJ813tRegion"></div>
