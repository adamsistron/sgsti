<script type="text/javascript">
Ext.ns("C001tForenseLista");
C001tForenseLista.main = {
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
        C001tForenseLista.main.mascara.show();
        this.msg = Ext.get('formularioC001tForense');
        this.msg.load({
         url:"/sgsti/web/index.php/C001tForense/editar",
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
	this.codigo  = C001tForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_forense');
	C001tForenseLista.main.mascara.show();
        this.msg = Ext.get('formularioC001tForense');
        this.msg.load({
         url:"/sgsti/web/index.php/C001tForense/editar/codigo/"+this.codigo,
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
	this.codigo  = C001tForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_forense');
	Ext.MessageBox.confirm('Confirmación', '¿Realmente desea eliminar este registro?', function(boton){
	if(boton=="yes"){
        Ext.Ajax.request({
            method:'POST',
            url:'/sgsti/web/index.php/C001tForense/eliminar',
            params:{
                co_forense:C001tForenseLista.main.gridPanel_.getSelectionModel().getSelected().get('co_forense')
            },
            success:function(result, request ) {
                    obj = Ext.util.JSON.decode(result.responseText);
                if(obj.success==true){
		    C001tForenseLista.main.store_lista.load();
                    Ext.Msg.alert("Notificación",obj.msg);
                }else{
                    Ext.Msg.alert("Notificación",obj.msg);
                }
                C001tForenseLista.main.mascara.hide();
            }});
	}});
    }
});

//filtro
this.filtro = new Ext.Button({
    text:'Filtro',
    iconCls: 'icon-buscar',
    handler:function(){
        this.msg = Ext.get('filtroC001tForense');
        C001tForenseLista.main.mascara.show();
        C001tForenseLista.main.filtro.setDisabled(true);
        this.msg.load({
             url: '/sgsti/web/index.php/C001tForense/filtro',
             scripts: true
        });
    }
});

this.editar.disable();
this.eliminar.disable();

//Grid principal
this.gridPanel_ = new Ext.grid.GridPanel({
    title:'Lista de Casos de Analisis Forense',
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
        {header: 'co_forense',hidden:true, menuDisabled:true,dataIndex: 'co_forense'},
        {header: 'Región', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_region'},
        {header: 'Titulo', width:300,  menuDisabled:true, sortable: true,  dataIndex: 'tx_titulo'},
        {header: 'Caso AAII', width:150,  menuDisabled:true, sortable: true,  dataIndex: 'tx_caso_aaii'},
        {header: 'Estado', width:100,  menuDisabled:true, sortable: true,  dataIndex: 'co_estado_forense'},
    ],
    stripeRows: true,
    autoScroll:true,
    stateful: true,
    listeners:{cellclick:function(Grid, rowIndex, columnIndex,e ){
            C001tForenseLista.main.editar.enable();
            C001tForenseLista.main.eliminar.enable();
            panel_detalle.toggleCollapse();
    }},
    bbar: new Ext.PagingToolbar({
        pageSize: 20,
        store: this.store_lista,
        displayInfo: true,
        displayMsg: '<span style="color:white">Registros: {0} - {1} de {2}</span>',
        emptyMsg: "<span style=\"color:white\">No se encontraron registros</span>"
    }),
    //evento al darle click a un registro
    sm: new Ext.grid.RowSelectionModel({
            singleSelect: true,
            //AQUI ES DONDE ESTA EL LISTENER
            listeners: {
                rowselect: function(sm, row, rec) {

                        var msg = Ext.get('detalle');
                        msg.load({
                                url: '<?php echo $_SERVER['SCRIPT_NAME']?>/C001tForense/detalle',
                                scripts: true,
                                params: {co_forense:rec.json.co_forense},
                                text: 'Cargando...'
                        });

                        if(panel_detalle.collapsed == true)
                        {
                           panel_detalle.toggleCollapse();
                        }   
                }
            }
      })
});

this.gridPanel_.render("contenedorC001tForenseLista");

//Cargar el grid
this.store_lista.baseParams.paginar = 'si';
this.store_lista.load();
},
getLista: function(){
    this.store = new Ext.data.JsonStore({
    url:'/sgsti/web/index.php/C001tForense/storelista',
    root:'data',
    fields:[
    {name: 'co_forense'},
    {name: 'fe_apertura'},
    {name: 'fe_cierre'},
    {name: 'co_usuario_apertura'},
    {name: 'co_usuario_cierre'},
    {name: 'co_region'},
    {name: 'co_negocio'},
    {name: 'co_division'},
    {name: 'tx_serial'},
    {name: 'tx_titulo'},
    {name: 'tx_descripcion_solicitud'},
    {name: 'tx_caso_aaii'},
    {name: 'co_alcance_forense'},
    {name: 'tx_metologia_herramientas'},
    {name: 'tx_observaciones'},
    {name: 'co_transaccion'},
    {name: 'co_clasificacion'},
    {name: 'in_abierto'},
    {name: 'created_at'},
    {name: 'update_at'},
    {name: 'co_estado_forense'},
           ]
    });
    return this.store;
}
};
Ext.onReady(C001tForenseLista.main.init, C001tForenseLista.main);
</script>
<div id="contenedorC001tForenseLista"></div>
<div id="formularioC001tForense"></div>
<div id="filtroC001tForense"></div>
