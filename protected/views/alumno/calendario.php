


<script language="javascript" type="text/javascript">



    date = new Date();
    annee = date.getFullYear();
    mois = date.getMonth();
    los_meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    los_meses2 = ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"];
    los_dias = ["D", "L", "M", "M", "J", "V", "S", "D"];
    jsonFechas = null;
    clase = "colortexto4 negrita";

    $(document).ready(function () {

        idanio = date.getFullYear();

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/alumno/ajax_retorna_fechas_anuales',
            cache: false,
            data: {idanio: idanio},
            success: function (resultado) {
                jsonFechas = JSON.parse(resultado);
            }
        });
    });


    function Mois()
    {
        for (i = 0; i < 7; i++)
        {
            calendrier += "<td  class='negrita' width='" + 100 / 7 + "%'>" + los_dias[i + 1] + "</td>";
        }
        calendrier += "</tr>";
        afficher.setYear(document.Calendrier.Annee.value);
        afficher.setMonth(document.Calendrier.Mois.value);
        afficher.setDate(31);
        if (afficher.getDate() != 31)
            afficher.setDate(31 - afficher.getDate());
        afficher.setMonth(document.Calendrier.Mois.value);
        nbjours = afficher.getDate();
        nbsem = Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, nbjours);
        nbsem = Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, nbjours);
        nbsem -= Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, 1) - 1;
        boutmois = new Date(document.Calendrier.Annee.value, document.Calendrier.Mois.value, nbjours);
        if (boutmois.getDay() == 0)
        {
            nbsem--;
        }
        boutmois = new Date(document.Calendrier.Annee.value, document.Calendrier.Mois.value, 1);
        if (boutmois.getDay() == 0)
        {
            nbsem++;
        }
        h = 1;
        for (i = 0; i < nbsem; i++)
        {
            calendrier += "<tr align='center'>";
            for (j = 1; j <= 7; j++, h++)
            {
                afficher.setDate(h);
                if ((afficher.getDay() == j || (afficher.getDay() == 0 && j == 7)) && afficher.getMonth() == document.Calendrier.Mois.value)
                {
                    Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, h - 1);
                    Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, h - 1);


                    dia = afficher.getDate();
                    if (dia < 10)
                        dia = "0" + dia;

                    mes = (afficher.getMonth() + 1);
                    if (mes < 10)
                        mes = "0" + mes;

                    fechax = afficher.getFullYear() + '-' + mes + '-' + dia;

                    clase = "colortexto4 negrita";

                    for (var prop in jsonFechas) {

                        if (jsonFechas[prop].fecha == fechax)
                        {
//                            alert('encontrada: ' + fechax + ' fecha json: '+jsonFechas[prop].fecha);

                            if (jsonFechas[prop].asistencia == 'F')
                                clase = "colortexto1 negrita";
                            else if (jsonFechas[prop].asistencia == 'T')
                                clase = "colortexto3 negrita";
                            else if (jsonFechas[prop].asistencia == 'A')
                                clase = "colortexto2 negrita";

                            break;
                        }

                    }

                    calendrier += "<td class='" + clase + "' title='Semaine N°" + Sem(document.Calendrier.Annee.value, document.Calendrier.Mois.value, h - 1) + "'>";
                    calendrier += afficher.getDate();
                }

                else
                {
                    calendrier += "<td>&nbsp";
                    h--;
                }
                calendrier += "</td>";
            }
            calendrier += "</tr>";
        }
        calendrier += "</table>";
        document.getElementById("Cal").innerHTML = calendrier;
        document.getElementById("SelMois").style.visibility = "visible";
    }

    function Annee()
    {
        calendrier += "<td width='" + 100 / 13 + "%'>&nbsp</td>";
        for (i = 0; i < 12; i++)
        {
            calendrier += "<td class='negrita' width='" + 100 / 13 + "%'>" + los_meses2[i] + "</td>";
        }
        calendrier += "</tr>";
        afficher.setYear(document.Calendrier.Annee.value);
        for (i = 0; i < 31; i++)
        {
            afficher.setDate(i + 1);
            calendrier += "<tr align='center'>";
            calendrier += "<td class='color36 negrita'>" + (i + 1) + "</td>";
            for (j = 0; j < 12; j++)
            {
                afficher.setMonth(j);
                switch ((i % 2) + (j % 2))
                {
                    case 2:
                        calendrier += "<td bgcolor='#C0C0C0'";
                        break;
                    case 1:
                        calendrier += "<td bgcolor='#E0E0E0'";
                        break;
                    case 0:
                    default:
                        calendrier += "<td";
                }
                if (afficher.getDate() != i + 1)
                {
                    calendrier += ">&nbsp";
                    afficher.setDate(i + 1);
                }
                else
                {
                    calendrier += " title='Semaine N°" + Sem(document.Calendrier.Annee.value, j, i) + "'>";
                    calendrier += los_dias[afficher.getDay()];
                }
                calendrier += "</td>";
            }
            calendrier += "</tr>";
        }
        calendrier += "</table>";
        document.getElementById("Cal").innerHTML = calendrier;
        document.getElementById("SelMois").style.visibility = "hidden";
    }
    function Mode()
    {
        mode = document.Calendrier.Modes.value;
        calendrier = '<table class="table table-bordered">';
        calendrier += "<tr align='center' class='color36'>";
        afficher = new Date();

        if (mode == 1) {
            Mois();
        }
        else {
            Annee();
        }
        alert('Esto va antes');



    }

    function Sem(A, M, J)
    {
        date.setYear(A);
        date.setMonth(M);
        date.setDate(J);
        date2 = new Date(A, 0, 1);
        x = 1;
        do
        {
            date2.setDate(x);
            x++;
        }
        while (date2.getDay() != 1);
        temps = date.getTime() - date2.getTime() + 24 * 60 * 60 * 1000;
        sem = temps / (1000 * 60 * 60 * 24 * 7);
        return Math.ceil(sem);
    }

</script>

<!--<body onload="javascript:window.status = 'C A L E N D A R I O';
        Mode()" onselectstart="return false" oncontextmenu="return false" style="cursor:default">-->
<div align="center" ID="tableau" class="row">
    <form name="Calendrier">
        <table class="table table-bordered">
            <tr align="center">
                <td>
                    <select name="Modes" tabindex="0" onchange="Mode()">
                        <option value="0">Anual</option>
                        <option selected value="1">Mensual</option>
                    </select>
                </td>
                <td>
                    <div id=SelMois>
                        <select name="Mois" tabindex="1" onchange="Mode()">
                            <script language="JavaScript">
                                for (i = 0; i < 12; i++)
                                {
                                    document.write("<option ");
                                    if (i == mois)
                                        document.write("selected ");
                                    document.write("value='" + i + "'>" + los_meses[i] + "</option>");
                                }
                            </script>
                        </select>
                    </div>
                </td>
                <td>
                    <select name="Annee" tabindex="2" onchange="Mode()">
                        <script language="JavaScript">
                            for (i = (annee - 50); i < (annee + 51); i++)
                            {
                                document.write("<option ");
                                if (i == annee)
                                    document.write("selected ");
                                document.write("value='" + i + "'>" + i + "</option>");
                            }
                        </script>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="3">
                    <div align="center" ID=Cal>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="row">


    <table class="table columasiguales" >
        <tr>
            <td class="colortexto1 negrita">Faltó</td>
            <td class="colortexto2 negrita">Asistió</td>
            <td class="colortexto3 negrita">LLegó Tarde</td>
            <td class="colortexto4 negrita">No hubo clases</td>
        </tr>
    </table>


</div>
<!--</body>-->
