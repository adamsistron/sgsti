<script type="text/javascript">
Ext.ns("C003tActaAccLista");
C003tActaAccLista.main = {
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
        C003tActaAccLista.main.mascara.show();
        this.msg = Ext.get('formularioC003tActaAcc');
        this.msg.load({
         url:"/sgsti/web/index.php/C003tActaAcc/editar",
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
	this.codigo  = C003tActaAccLista.main.gridPanel_.getSelectionModel().getSelected().get('co_acc');
	C003tActaAccLista.main.mascara.show();
        this.msg = Ext.get('formularioC003tActaAcc');
        this.msg.load({
         url:"/sgsti/web/index.php/C003tActaAcc/editar/codigo/"+this.codigo,
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
	this.codigo  = C003tActaAccLista.main.gridPanel_.getSelectionModel().getSelected().get('co_acc');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/C003tActaAcc/eliminar',
            params:{
                co_acc:C003tActaAccLista.main.gridPanel_.getSelectionModel().getSelected().get('co_acc')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    C003tActaAccLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                C003tActaAccLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroC003tActaAcc');
        C003tActaAccLista.main.mascara.show();
        C003tActaAccLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/C003tActaAcc/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Actas de Cadena de Costodia del Caso',
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
    {header: 'co_acc',hidden:true, menuDisabled:true,dataIndex: 'co_acc'},
    {header: 'Fe emision', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'fe_emision'},
    {header: 'Co forense', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_forense'},
    {header: 'Co region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
    {header: 'Co negocio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_negocio'},
    {header: 'Co division', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_division'},
    {header: 'Tx serial', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_serial'},
    {header: 'Co estado acta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_estado_acta'},
    {header: 'Fe destruye', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'fe_destruye'},
    {header: 'Co destruye', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_destruye'},
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
    {header: 'Co tipo recurso', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_tipo_recurso'},
    {header: 'Co ciudad acta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_ciudad_acta'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){C003tActaAccLista.main.editar.enable();C003tActaAccLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 3,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorC003tActaAccLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/C003tActaAcc/storelista',
    root:'data',
    fields:[
    {name: 'co_acc'},
    {name: 'fe_emision'},
    {name: 'co_forense'},
    {name: 'co_region'},
    {name: 'co_negocio'},
    {name: 'co_division'},
    {name: 'tx_serial'},
    {name: 'co_estado_acta'},
    {name: 'fe_destruye'},
    {name: 'co_destruye'},
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
    {name: 'co_tipo_recurso'},
    {name: 'co_ciudad_acta'},
           ]
    });
    return this.store;
}
};
Ext.onReady(C003tActaAccLista.main.init, C003tActaAccLista.main);
</script>
<div id="contenedorC003tActaAccLista"></div>
<div id="formularioC003tActaAcc"></div>
<div id="filtroC003tActaAcc"></div>
