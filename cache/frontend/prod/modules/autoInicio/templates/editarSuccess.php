<script type="text/javascript">
Ext.ns("inicioEditar");
inicioEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_PRODUCTO = this.getStoreCO_PRODUCTO();
//<Stores de fk>
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>

//<ClavePrimaria>
this.co_producto = new Ext.form.Hidden({
    name:'co_producto',
    value:this.OBJ.co_producto});
//</ClavePrimaria>


this.tx_producto = new Ext.form.TextField({
	fieldLabel:'Tx producto',
	name:'j808t_producto[tx_producto]',
	value:this.OBJ.tx_producto,
	allowBlank:false,
	width:200
});

this.co_padre = new Ext.form.ComboBox({
	fieldLabel:'Co padre',
	store: this.storeCO_PRODUCTO,
	typeAhead: true,
	valueField: 'co_producto',
	displayField:'co_producto',
	hiddenName:'j808t_producto[co_padre]',
	//readOnly:(this.OBJ.co_padre!='')?true:false,
	//style:(this.main.OBJ.co_padre!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_padre',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_PRODUCTO.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_padre,
	value:  this.OBJ.co_padre,
	objStore: this.storeCO_PRODUCTO
});

this.tx_href = new Ext.form.TextField({
	fieldLabel:'Tx href',
	name:'j808t_producto[tx_href]',
	value:this.OBJ.tx_href,
	allowBlank:false,
	width:200
});

this.tx_icono = new Ext.form.TextField({
	fieldLabel:'Tx icono',
	name:'j808t_producto[tx_icono]',
	value:this.OBJ.tx_icono,
	allowBlank:false,
	width:200
});

this.nu_orden = new Ext.form.NumberField({
	fieldLabel:'Nu orden',
	name:'j808t_producto[nu_orden]',
	value:this.OBJ.nu_orden,
	allowBlank:false
});

this.tx_sigla = new Ext.form.TextField({
	fieldLabel:'Tx sigla',
	name:'j808t_producto[tx_sigla]',
	value:this.OBJ.tx_sigla,
	allowBlank:false,
	width:200
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'j808t_producto[created_at]',
	value:this.OBJ.created_at,
	allowBlank:false
});

this.updated_at = new Ext.form.DateField({
	fieldLabel:'Updated at',
	name:'j808t_producto[updated_at]',
	value:this.OBJ.updated_at,
	allowBlank:false
});

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'j808t_producto[co_transaccion]',
	//readOnly:(this.OBJ.co_transaccion!='')?true:false,
	//style:(this.main.OBJ.co_transaccion!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_transaccion',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_TRANSACCION.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_transaccion,
	value:  this.OBJ.co_transaccion,
	objStore: this.storeCO_TRANSACCION
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!inicioEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        inicioEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/inicio/guardar',
            waitMsg: 'Enviando datos, por favor espere..',
            waitTitle:'Enviando',
            failure: function(form, action) {
                Ext.MessageBox.alert('Error en transacción', action.result.msg);
            },
            success: function(form, action) {
                 if(action.result.success){
                     Ext.MessageBox.show({
                         title: 'Mensaje',
                         msg: action.result.msg,
                         closable: false,
                         icon: Ext.MessageBox.INFO,
                         resizable: false,
			 animEl: document.body,
                         buttons: Ext.MessageBox.OK
                     });
                 }
                 inicioLista.main.store_lista.load();
                 inicioEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        inicioEditar.main.winformPanel_.close();
    }
});

this.formPanel_ = new Ext.form.FormPanel({
    frame:true,
    width:400,
autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_producto,
                    this.tx_producto,
                    this.co_padre,
                    this.tx_href,
                    this.tx_icono,
                    this.nu_orden,
                    this.tx_sigla,
                    this.created_at,
                    this.updated_at,
                    this.co_transaccion,
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Formulario: inicio',
    modal:true,
    constrain:true,
width:400,
    frame:true,
    closabled:true,
    autoHeight:true,
    items:[
        this.formPanel_
    ],
    buttons:[
        this.guardar,
        this.salir
    ],
    buttonAlign:'center'
});
this.winformPanel_.show();
inicioLista.main.mascara.hide();
}
,getStoreCO_PRODUCTO:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/inicio/storefkcopadre',
        root:'data',
        fields:[
            {name: 'co_producto'}
            ]
    });
    return this.store;
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/inicio/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}
};
Ext.onReady(inicioEditar.main.init, inicioEditar.main);
</script>
