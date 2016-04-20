<script type="text/javascript">
Ext.ns("J813tRegionEditar");
J813tRegionEditar.main = {
init:function(){

this.OBJ = paqueteComunJS.funcion.doJSON({stringData:'<?php echo $data ?>'});

//<ClavePrimaria>
this.co_region = new Ext.form.Hidden({
    name:'co_region',
    value:this.OBJ.co_region});
//</ClavePrimaria>


this.tx_region = new Ext.form.TextField({
	fieldLabel:'Tx region',
	name:'j813t_region[tx_region]',
	value:this.OBJ.tx_region,
	allowBlank:false,
	width:200
});

this.tx_sigla = new Ext.form.TextField({
	fieldLabel:'Tx sigla',
	name:'j813t_region[tx_sigla]',
	value:this.OBJ.tx_sigla,
	allowBlank:false,
	width:200
});

this.guardar = new Ext.Button({
    text:'Guardar',
    iconCls: 'icon-guardar',
    handler:function(){

        if(!J813tRegionEditar.main.formPanel_.getForm().isValid()){
            Ext.Msg.alert("Alerta","Debe ingresar los campos en rojo");
            return false;
        }
        J813tRegionEditar.main.formPanel_.getForm().submit({
            method:'POST',
            url:'/sgsti/web/index.php/J813tRegion/guardar',
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
                 J813tRegionLista.main.store_lista.load();
                 J813tRegionEditar.main.winformPanel_.hide();
             }
        });

   
    }
});

this.salir = new Ext.Button({
    text:'Salir',
//    iconCls: 'icon-cancelar',
    handler:function(){
        J813tRegionEditar.main.winformPanel_.close();
    }
});

this.formPanel_ = new Ext.form.FormPanel({
    frame:true,
    width:400,
autoHeight:true,  
    autoScroll:true,
    bodyStyle:'padding:10px;',
    items:[

                    this.co_region,
                    this.tx_region,
                    this.tx_sigla,
            ]
});

this.winformPanel_ = new Ext.Window({
    title:'Formulario: J813tRegion',
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
J813tRegionLista.main.mascara.hide();
}
};
Ext.onReady(J813tRegionEditar.main.init, J813tRegionEditar.main);
</script>
