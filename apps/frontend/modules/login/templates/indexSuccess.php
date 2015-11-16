<script type="text/javascript">
Ext.BLANK_IMAGE_URL = '/sti/web/images/ext/default/s.gif';
Ext.onReady(function(){
//Ventana para validar
function Validar(){
if (validarForm.form.isValid()) {
	validarForm.form.submit({
		waitTitle: "Validando",
		waitMsg : "Espere un momento por favor......",
		failure: function(form,action){
		    try{
			if(action.result.msg!=null)
			    Ext.utiles.msg('Error de Validaci&oacute;n', action.result.msg);
			else
			    throw Exception();
		    }catch(Exception){
			    Ext.utiles.msg('Error durante el proceso','Consulta al administrador del Sistema');
		    }
		},
		success: function(form,action) {
		    winValidar.hide();
		    location.href='<?php echo $_SERVER['SCRIPT_NAME']; ?>/inicio';
		}
	});
}else{
  Ext.utiles.msg('Error de Autenticación', "Existen Campos Vacios");
}
}
     

var usuario = new Ext.form.TextField({
	fieldLabel:'Usuario',
	name: 'usuario',
	id:'usuario',
	allowBlank:false,
	maxLength:250,
        width:200
});



var validarForm = new Ext.form.FormPanel({
	baseCls: 'x-plain',
	labelWidth: 180,
	autoWidth:true,
	autoHeight:true,
	frame:true,
	autoScroll:false,
	bodyStyle:'padding:10px;',
	url:'<?php echo $_SERVER['SCRIPT_NAME']; ?>/login/validar',
	items: [
		{xtype:'fieldset',title:'Usuario / Contraseña', autoWidth:true, labelWidth: 90, autoHeight:true, defaultType: 'textfield',
		items:[
			usuario,
			{fieldLabel:'Contraseña', inputType:'password', allowBlank:false, maxLength:20, name: 'password',width:200},
		],
		keys: [
			{key: [Ext.EventObject.ENTER], handler: function() {
				Validar();
			}
		   }
		]
	    }
        ]
});

var winValidar;

winValidar = new Ext.Window({
	title:'Validaci&oacute;n de Usuario',
	layout:'fit',
	bodyStyle:'padding:5px;',
	width:450,
	autoHeight:true,
	modal:true,
	autoScroll: true,
	maximizable:false,
	closable:false,
	plain: true,
	buttonAlign:'center',
	items:[
	    //{xtype:'panel', baseCls:'x-plain', border:false, contentEl:'msgValidar', autoWidth: true, autoHeight:true},
	    validarForm
	],
	buttons: [{
	    text:'Entrar',
	    align:'center',
	    iconCls: 'icon-login',
	    handler: function (){
		            Validar();
	    }
	}
        ]
});



setTimeout(function(){
	usuario.focus(true,true);
	},500);
	winValidar.show();
});
</script>
<input type="hidden" name="url_" id="url_" value="<?php echo $url ?>">
