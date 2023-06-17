
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục','Số lượng sản phẩm'],
            <?php
            $tongloai = count($list_thongke);
            $i=1;
            foreach ($list_thongke as $item) {
                if($i==$tongloai)
                { $end="";}
                else{
                     $end=",";};
                ?>
                ['<?php echo $item['tenloai'] ?>',<?php echo $item['sl']?>]<?php echo $end ?>
                <?php
$i++;
            }
            ?>
        ]);

        var options = {
            title: 'Biểu đồ phân loại'
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
<div id="myChart">
</div>

