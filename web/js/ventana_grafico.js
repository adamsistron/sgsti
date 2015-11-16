function abrir_ventana_grafico(geturl){
    var msg = Ext.get('tabPrincipal');
        msg.load({
                url: geturl,
                scripts: true,
                text: 'Cargando...'
     });
}
