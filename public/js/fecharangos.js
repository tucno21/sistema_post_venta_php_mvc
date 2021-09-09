//Date range as a button
$('#fechasDeVentas').daterangepicker({
    ranges   : {
        'Todo': [],
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Los últimos 7 días': [moment().subtract(6, 'days'), moment()],
        'Los últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
        startDate: moment(),
        endDate  : moment()
    },

    function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

        var fechaInicial = start.format('YYYY-MM-DD');
        // console.log(fechaInicial);
        var fechaFinal = end.format('YYYY-MM-DD');
        // console.log(fechaFinal);

        window.location = "/ventas?fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
        // var capturarRango = $('#fechasDeVentas span').html();
        // console.log(capturarRango);
    }
)

$(".daterangepicker .ranges li").on('click', function(){
    // window.location = "/ventas";
    var todo = $(this).attr("data-range-key");
    if(todo == "Todo"){
        window.location = "/ventas";
    }else if(todo == "Hoy"){
        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var ano = d.getFullYear();
        if(dia<10){
            dia='0'+dia;
        }
        if(mes<10){
            mes='0'+mes;
        }

        var fechaInicial = ano+"-"+mes+"-"+dia;
        var fechaFinal = ano+"-"+mes+"-"+dia;
        window.location = "/ventas?fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
        // console.log(mes);
    }

    // console.log($(this).attr("data-range-key"));
})