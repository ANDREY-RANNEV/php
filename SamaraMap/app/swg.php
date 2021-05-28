<html>
<script>
    function fillRaion(evt, color) {
        evt.target.setAttribute('fill', color);
    }
</script>

<body>
    <?php
    include 'connectiv.php';

    $scaleFactor = 0.55;
    $svgX = 836 * $scaleFactor;
    $svgY = 876 * $scaleFactor;
    
    echo "<svg width=\"$svgX\" height=\"$svgY\" xmlns=\"http://www.w3.org/2000/svg\" style=\"background-color:#CCCCCC\">";
    // echo "<path d='m 100.56,100.89 150,100 150,150 Z'  fill='#00c256' >" ;
    $raionData_json = json_decode(file_get_contents('../json/Raion.json'));
    $localityData_json = json_decode(file_get_contents('../json/Locality.json'));
    foreach ($raionData_json->raion as $row) {
        if ($row->id > 0 && $row->id < 99)
            echo "<path d='" . $row->path . "'  fill='" . $row->fillStyle . "' stroke='" . $row->strokeStyle . "' stroke-width='1' transform='scale($scaleFactor)' onmouseover=\"fillRaion(evt,'#ffffff');\"  onmouseout=\"fillRaion(evt, '$row->fillStyle');\"/>  ";
        else
            echo "<path d='" . $row->path . "'  fill='" . $row->fillStyle . "' stroke='" . $row->strokeStyle . "' stroke-width='1' transform='scale($scaleFactor)' />";
    }

    foreach ($localityData_json->locality as $row) {

        echo "<text transform=\"scale($scaleFactor)\" x=\"$row->x_text\" y=\"$row->y_text\"  >$row->name</text>";

        echo "<circle transform=\"scale($scaleFactor)\" cx=\"$row->x_circle\" cy=\"$row->y_circle\" r=\"$row->r_circle\" stroke=\"$row->fillStyle_circle\" stroke-width=\"1\" fill=\"$row->fillStyle_circle\" />";
    }
    echo "</svg>";
    ?>
</body>

</html>