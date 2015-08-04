
<script type="text/javascript">
    function imprSelec(muestra)
    {
        var ficha = document.getElementById(muestra);
        var ventimp = window.open(' ', 'popimpr');
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.print();
        ventimp.close();
    }
</script>


<a href="javascript:imprSelec('muestra')">Imprimir Tabla</a>

<div id="muestra">

    <?php
    $this->Widget('ext.highcharts.HighchartsWidget', array(
        'scripts' => array(
            'modules/exporting',
            'themes/grid-light'),
        'options' => array(
            'title' => array('text' => 'Estadísticas Notas 2015'),
            'xAxis' => array(
                'categories' => array('Bimestre 1', 'Bimestre 2', 'Bimestre 3', 'Bimestre 4')
            ),
            'yAxis' => array(
                'title' => array('text' => 'Promedio')
            ),
            'series' => $arrayNotasBimetres
        )
    ));
    ?>
</div>
