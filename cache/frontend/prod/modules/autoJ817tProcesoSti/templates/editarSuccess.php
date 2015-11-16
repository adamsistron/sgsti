<script type="text/javascript">
Ext.ns("J817tProcesoStiEditar");
J817tProcesoStiEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_TRANSACCION = this.getStoreCO_TRANSACCION();
//<Stores de fk>

//<ClavePrimaria>
this.co_proceso_sti = new Ext.form.Hidden({
    name:'co_proceso_sti',
    value:this.OBJ.co_proceso_sti});
//</ClavePrimaria>


this.tx_descripcion = new Ext.form.TextField({
	fieldLabel:'Tx descripcion',
	name:'j817t_proceso_sti[tx_descripcion]',
	value:this.OBJ.tx_descripcion,
	allowBlank:false,
	width:200
});

this.tx_sigla = new Ext.form.TextField({
	fieldLabel:'Tx sigla',
	name:'j817t_proceso_sti[tx_sigla]',
	value:this.OBJ.tx_sigla,
	allowBlank:false,
	width:200
});

this.created_at = new Ext.form.DateField({
	fieldLabel:'Created at',
	name:'j817t_proceso_sti[created_at]',
	value:this.OBJ.created_at,
	allowBlank:false
});

this.updated_at = new Ext.form.DateField({
	fieldLabel:'Updated at',
	name:'j817t_proceso_sti[updated_at]',
	value:this.OBJ.updated_at,
	allowBlank:false
});

this.co_transaccion = new Ext.form.ComboBox({
	fieldLabel:'Co transaccion',
	store: this.storeCO_TRANSACCION,
	typeAhead: true,
	valueField: 'co_transaccion',
	displayField:'co_transaccion',
	hiddenName:'j817t_proceso_sti[co_transaccion]',
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

        if(!J817tProcesoStiEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        J817tProcesoStiEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/J817tProcesoSti/guardar',
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
                 J817tProcesoStiLista.main.store_lista.load();
                 J817tProcesoStiEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        J817tProcesoStiEditar.main.winformPanel_.close();
    }
});

this.formPanel_ = new Ext.form.FormPanel({
    frame:true,
    width:400,
autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_proceso_sti,
                    this.tx_descripcion,
                    this.tx_sigla,
                    this.created_at,
                    this.updated_at,
                    this.co_transaccion,
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Formulario: J817tProcesoSti',
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
J817tProcesoStiLista.main.mascara.hide();
}
,getStoreCO_TRANSACCION:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J817tProcesoSti/storefkcotransaccion',
        root:'data',
        fields:[
            {name: 'co_transaccion'}
            ]
    });
    return this.store;
}
};
Ext.onReady(J817tProcesoStiEditar.main.init, J817tProcesoStiEditar.main);
</script>
