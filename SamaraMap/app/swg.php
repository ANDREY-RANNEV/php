<svg width="900" height="900" xmlns="http://www.w3.org/2000/svg">
    <?php
    // echo "<path d='m 100.56,100.89 150,100 150,150 Z'  fill='#00c256' >" ;
    $raionData_json = json_decode(file_get_contents('../json/Raion.json'));
    foreach ($raionData_json->raion as $row) {
        echo "<path d='".$row->path."'  fill='".$row->fillStyle."' stroke='".$row->strokeStyle."' stroke-width='1' transform='scale(0.75)' onmouseover=\"evt.target.setAttribute('fill', 'blue');\"  onmouseout=\"evt.target.setAttribute('fill', '$row->fillStyle');\"/>  ";
    }
    ?>
</svg>