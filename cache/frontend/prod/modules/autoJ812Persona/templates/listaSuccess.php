<script type="text/javascript">
Ext.ns("J812PersonaLista");
J812PersonaLista.main = {
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
        J812PersonaLista.main.mascara.show();
        this.msg = Ext.get('formularioJ812Persona');
        this.msg.load({
         url:"/sgsti/web/index.php/J812Persona/editar",
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
	this.codigo  = J812PersonaLista.main.gridPanel_.getSelectionModel().getSelected().get('co_persona');
	J812PersonaLista.main.mascara.show();
        this.msg = Ext.get('formularioJ812Persona');
        this.msg.load({
         url:"/sgsti/web/index.php/J812Persona/editar/codigo/"+this.codigo,
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
	this.codigo  = J812PersonaLista.main.gridPanel_.getSelectionModel().getSelected().get('co_persona');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/J812Persona/eliminar',
            params:{
                co_persona:J812PersonaLista.main.gridPanel_.getSelectionModel().getSelected().get('co_persona')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    J812PersonaLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                J812PersonaLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroJ812Persona');
        J812PersonaLista.main.mascara.show();
        J812PersonaLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/J812Persona/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de J812Persona',
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
    {header: 'co_persona',hidden:true, menuDisabled:true,dataIndex: 'co_persona'},
    {header: 'Nb persona', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'nb_persona'},
    {header: 'Ap persona', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'ap_persona'},
    {header: 'Co division', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_division'},
    {header: 'Co rol', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_rol'},
    {header: 'Co region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
    {header: 'Co negocio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_negocio'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){J812PersonaLista.main.editar.enable();J812PersonaLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorJ812PersonaLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/J812Persona/storelista',
    root:'data',
    fields:[
    {name: 'co_persona'},
    {name: 'nb_persona'},
    {name: 'ap_persona'},
    {name: 'co_division'},
    {name: 'co_rol'},
    {name: 'co_region'},
    {name: 'co_negocio'},
           ]
    });
    return this.store;
}
};
Ext.onReady(J812PersonaLista.main.init, J812PersonaLista.main);
</script>
<div id="contenedorJ812PersonaLista"></div>
<div id="formularioJ812Persona"></div>
<div id="filtroJ812Persona"></div>
