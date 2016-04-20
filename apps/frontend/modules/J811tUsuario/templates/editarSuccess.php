<script type="text/javascript">
Ext.ns("J811tUsuarioEditar");
J811tUsuarioEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});
//<Stores de fk>
this.storeCO_PERSONA = this.getStoreCO_PERSONA();
//<Stores de fk>
//<Stores de fk>
this.storeCO_ROL = this.getStoreCO_ROL();
//<Stores de fk>

//<ClavePrimaria>
this.co_usuario = new Ext.form.Hidden({
    name:'co_usuario',
    value:this.OBJ.co_usuario});
//</ClavePrimaria>


this.tx_indicador = new Ext.form.TextField({
	fieldLabel:'Tx indicador',
	name:'j811t_usuario[tx_indicador]',
	value:this.OBJ.tx_indicador,
	allowBlank:false,
	width:200
});

this.co_persona = new Ext.form.ComboBox({
	fieldLabel:'Co persona',
	store: this.storeCO_PERSONA,
	typeAhead: true,
	valueField: 'co_persona',
	displayField:'co_persona',
	hiddenName:'j811t_usuario[co_persona]',
	//readOnly:(this.OBJ.co_persona!='')?true:false,
	//style:(this.main.OBJ.co_persona!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_persona',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_PERSONA.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_persona,
	value:  this.OBJ.co_persona,
	objStore: this.storeCO_PERSONA
});

this.co_rol = new Ext.form.ComboBox({
	fieldLabel:'Co rol',
	store: this.storeCO_ROL,
	typeAhead: true,
	valueField: 'co_rol',
	displayField:'co_rol',
	hiddenName:'j811t_usuario[co_rol]',
	//readOnly:(this.OBJ.co_rol!='')?true:false,
	//style:(this.main.OBJ.co_rol!='')?'background:#c9c9c9;':'',
	forceSelection:true,
	resizable:true,
	triggerAction: 'all',
	emptyText:'Seleccione co_rol',
	selectOnFocus: true,
	mode: 'local',
	width:200,
	resizable:true,
	allowBlank:false
});
this.storeCO_ROL.load();
	paqueteComunJS.funcion.seleccionarComboByCo({
	objCMB: this.co_rol,
	value:  this.OBJ.co_rol,
	objStore: this.storeCO_ROL
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!J811tUsuarioEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        J811tUsuarioEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/J811tUsuario/guardar',
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
                 J811tUsuarioLista.main.store_lista.load();
                 J811tUsuarioEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        J811tUsuarioEditar.main.winformPanel_.close();
    }
});

this.formPanel_ = new Ext.form.FormPanel({
    frame:true,
    width:400,
autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_usuario,
                    this.tx_indicador,
                    this.co_persona,
                    this.co_rol,
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Formulario: J811tUsuario',
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
J811tUsuarioLista.main.mascara.hide();
}
,getStoreCO_PERSONA:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J811tUsuario/storefkcopersona',
        root:'data',
        fields:[
            {name: 'co_persona'}
            ]
    });
    return this.store;
}
,getStoreCO_ROL:function(){
    this.store = new Ext.data.JsonStore({
        url:'<?php echo $_SERVER["SCRIPT_NAME"] ?>/J811tUsuario/storefkcorol',
        root:'data',
        fields:[
            {name: 'co_rol'}
            ]
    });
    return this.store;
}
};
Ext.onReady(J811tUsuarioEditar.main.init, J811tUsuarioEditar.main);
</script>
