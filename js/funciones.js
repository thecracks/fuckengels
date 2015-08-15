//MANEJO DE PESTAÑAS

var preidli = '';
var preidtab = '';
function setids_li_tab(idli, idtab)
{
    preidli = idli;
    preidtab = idtab;
}

function activapestaña(n) {

    $("[id^='" + preidtab + "']").removeClass("active in");
    $("#" + preidtab + n + "").addClass("active in");

    $("[id^='" + preidli + "']").removeClass("active");
    $("#" + preidli + n + "").removeClass("deshabilitado");
    $("#" + preidli + n + "").addClass("active");
}

function desabilitapestaña(n) {

    if (n == 0) {
        $("[id^='" + preidli + "']").addClass("deshabilitado");
    } else
    {
        $("#" + preidli + n + "").addClass("deshabilitado");
    }
}

//FIN MANEJO DE PESTAÑAS