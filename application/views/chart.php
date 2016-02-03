<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title></title>
        <!-- Load Google chart api -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Tahun', 'Fakultas Teknologi Informasi', 'Fakultas Ekonomi', 'Fakultas Kesehatan Masyarakat'],
<?php
foreach ($chart_data as $data) {
    echo '[' . $data->tahun . ',' . $data->fti . ',' . $data->fekon . ',' . $data->kesmas . '],';
}
?>
                ]);

                var options = {
                    chart: {
                        title: 'SIAKAD UNISKA',
                        subtitle: 'Data Statistik Mahasiswa UNISKA: <?php echo $min_year.'-'.$max_year;?>',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>        
        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
    </body>
</html>