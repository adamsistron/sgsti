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
         url:"<?php echo $_SERVER["SCRIPT_NAME"] ?>/rol/nuevo",
         scripts: true,
         text: "Cargando.."
        });
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
             url: '<?php echo $_SERVER["SCRIPT_NAME"] ?>/rol/filtro',
             scripts: true
        });
    }
});


//filtro
this.privilegios = new Ext.Button({
    text:'Ver Privilegios',
    iconCls: 'icon-reportes',
    handler:function(){
        this.codigo = rolLista.main.gridPanel_.getSelectionModel().getSelected().get('co_rol');
        this.msg = Ext.get('formulariorol');
        this.msg.load({
            url:"<?php echo $_SERVER["SCRIPT_NAME"] ?>/rol/editar/codigo/"+this.codigo,
            scripts: true,
            text: "Cargando.."
        });
    }
});

this.privilegios.disable();
//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de Roles',iconCls: 'icon-privilegio',
    store: this.store_lista,
    loadMask:true,
//    frame:true,
    height:350,
    tbar:[
        this.nuevo,'-',this.filtro,this.privilegios
    ],
    columns: [
    new Ext.grid.RowNumberer(),
    {header: 'co_rol',hidden:true, menuDisabled:true,dataIndex: 'co_rol'},
    {header: 'Nombre del Rol', width:200,  menuDisabled:true, sortable: true,  dataIndex: 'tx_rol'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    bbar: new Ext.PagingToolbar({
        pageSize: 10,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    }),
    sm: new Ext.grid.RowSelectionModel({
        singleSelect: true,
        //AQUI ES DONDE ESTA EL LISTENER
            listeners: {
            rowselect: function(sm, row, rec) {
                    rolLista.main.privilegios.enable();
            }
        }
     })
});

//Evento Doble Click
this.gridPanel_.on('rowdblclick', function( grid, row, evt){
this.record = rolLista.main.store_lista.getAt(row);
this.codigo = this.record.data["co_rol"];
rolLista.main.mascara.show();
this.msg = Ext.get('formulariorol');
this.msg.load({
    url:"<?php echo $_SERVER["SCRIPT_NAME"] ?>/rol/editar/codigo/"+this.codigo,
    scripts: true,
    text: "Cargando.."
});

});

this.gridPanel_.render("contenedorrolLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/rol/storelista',
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
