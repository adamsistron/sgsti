<script type="text/javascript">
Ext.ns("C002tInformeForenseLista");
C002tInformeForenseLista.main = {
condicion:function(codigo){
    return (codigo=='0')?'NO':'SI';
},
init:function(){
//Mascara general del modulo
this.mascara = new Ext.LoadMask(Ext.getBody(), {msg:"Cargando..."});
this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//objeto store
this.store_lista = this.getLista();

//Agregar un registro
this.nuevo = new Ext.Button({
    text:'Nuevo',
    iconCls: 'icon-nuevo',
    handler:function(){
        C002tInformeForenseLista.main.mascara.show();
        this.msg = Ext.get('formularioC002tInformeForense');
        this.msg.load({
         url:"/sgsti/web/index.php/C002tInformeForense/editar",
         params:{co_forense:C002tInformeForenseLista.main.OBJ.co_forense},
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
	this.codigo  = C002tInformeForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_informe_forense');
	C002tInformeForenseLista.main.mascara.show();
        this.msg = Ext.get('formularioC002tInformeForense');
        this.msg.load({
         url:"/sgsti/web/index.php/C002tInformeForense/editar/codigo/"+this.codigo,
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
	this.codigo  = C002tInformeForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_informe_forense');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/C002tInformeForense/eliminar',
            params:{
                co_informe_forense:C002tInformeForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_informe_forense')
            },
            success:function(result, request ) {
                obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    C002tInformeForenseLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                C002tInformeForenseLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroC002tInformeForense');
        C002tInformeForenseLista.main.mascara.show();
        C002tInformeForenseLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/C002tInformeForense/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de Informe Forense',
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
    {header: 'co_informe_forense',hidden:true, menuDisabled:true,dataIndex: 'co_informe_forense'},
    {header: 'Co region', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
    {header: 'Co negocio', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_negocio'},
    {header: 'Co division', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_division'},
    {header: 'Co estado informe', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_estado_informe'},
    {header: 'Tx serial', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_serial'},
    {header: 'Tx titulo', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_titulo'},
    {header: 'Tx descripcion entorno', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_descripcion_entorno'},
    {header: 'Tx resultados', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_resultados'},
    {header: 'Tx conclusiones', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_conclusiones'},
    {header: 'Tx observaciones', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_observaciones'},
    {header: 'Tx ruta', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'tx_ruta'},
    {header: 'Nb archivo', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'nb_archivo'},
    {header: 'Co transaccion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_transaccion'},
    {header: 'Co clasificacion', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_clasificacion'},
    {header: 'In abierto', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'in_abierto'},
    {header: 'Created at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'created_at'},
    {header: 'Update at', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'update_at'},
    {header: 'Co forense', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_forense'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){C002tInformeForenseLista.main.editar.enable();C002tInformeForenseLista.main.eliminar.enable();}},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    })
});

this.gridPanel_.render("contenedorC002tInformeForenseLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.baseParams.co_forense = this.OBJ.co_forense
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/C002tInformeForense/storelista',
    root:'data',
    fields:[
    {name: 'co_informe_forense'},
    {name: 'co_region'},
    {name: 'co_negocio'},
    {name: 'co_division'},
    {name: 'co_estado_informe'},
    {name: 'tx_serial'},
    {name: 'tx_titulo'},
    {name: 'tx_descripcion_entorno'},
    {name: 'tx_resultados'},
    {name: 'tx_conclusiones'},
    {name: 'tx_observaciones'},
    {name: 'tx_ruta'},
    {name: 'nb_archivo'},
    {name: 'co_transaccion'},
    {name: 'co_clasificacion'},
    {name: 'in_abierto'},
    {name: 'created_at'},
    {name: 'update_at'},
    {name: 'co_forense'},
           ]
    });
    return this.store;
}
};
Ext.onReady(C002tInformeForenseLista.main.init, C002tInformeForenseLista.main);
</script>
<div id="contenedorC002tInformeForenseLista"></div>
<div id="formularioC002tInformeForense"></div>
<div id="filtroC002tInformeForense"></div>
