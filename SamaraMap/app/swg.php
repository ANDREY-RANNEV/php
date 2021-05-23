<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
    <?php
    $raionData_json = json_decode(file_get_contents('../json/Raion.json'));
    foreach ($raionData_json->raion as $row) {
        print '<path d="'.$row->path.'"  fill="#00c256" stroke="#fadf50" stroke-width="1" />';
    }
    ?>
</svg>