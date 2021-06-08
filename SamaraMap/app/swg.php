<html>
<script>
    function fillRaion(evt, color) {
        evt.target.setAttribute('fill', color);
    }
</script>

<body>
    <?php

    include 'connectiv.php';
    $conn = @new mysqli($_server_name, $_myUser, $_myPass, 'FBUZ');

    // Check connection
    if ($conn->connect_error) {
        echo $conn->connect_error;
        // die("Connection failed: " . $conn->connect_error);
    }
    if ($conn->connect_errno) {
        printf("Не удалось подключиться: %s\n", $conn->connect_error);
        exit();
    }

    $scaleFactor = $_GET['scaleF'];
    $svgX = 836 * $scaleFactor;
    $svgY = 876 * $scaleFactor;


    echo "<svg width=\"$svgX\" height=\"$svgY\" xmlns=\"http://www.w3.org/2000/svg\" style=\"background-color:#CCCCCC\">\n";
    // $raionData_json = json_decode(file_get_contents('../json/Raion.json'));
    // foreach ($raionData_json->raion as $row) {
    // echo "<path d='" . $row->path . "'  fill='" . $row->fillStyle . "' stroke='" . $row->strokeStyle . "' stroke-width='1' transform='scale($scaleFactor)'";
    // if ($row->id > 0 && $row->id < 99) echo " onmouseover=\"fillRaion(evt,'#fafaff');\"  onmouseout=\"fillRaion(evt, '$row->fillStyle');\"";
    // echo "/>\n";
    // }
    $result = $conn->query("SELECT * from Raion;");
    // , MYSQLI_USE_RESULT);
    if (!$result) {
        die("Connection failed: " . $conn->error);
    }
    foreach ($result as $key => $row) {
        echo "<path id='".$row['id'] ."' fill='" . $row['fillStyle'] . "' stroke='" . $row['strokeStyle'] . "' stroke-width='1' transform='scale(" . $scaleFactor . ")' ";
        if ($row['id'] > 0 && $row['id'] < 99) echo " onmouseover=\"fillRaion(evt,'#fafaff');\"  onmouseout=\"fillRaion(evt, '" . $row['fillStyle'] . "');\"";
        echo "  d='" . $row['path'] . "' />\n";
    }
    $localityData_json = json_decode(file_get_contents('../json/Locality.json'));
    foreach ($localityData_json->locality as $row) {

        echo "<text transform=\"scale($scaleFactor)\" x=\"$row->x_text\" y=\"$row->y_text\"  >$row->name</text>\n";

        echo "<circle transform=\"scale($scaleFactor)\" cx=\"$row->x_circle\" cy=\"$row->y_circle\" r=\"$row->r_circle\" stroke=\"$row->fillStyle_circle\" stroke-width=\"1\" fill=\"$row->fillStyle_circle\" />\n";
    }
    echo "</svg>\n";
    ?>

</body>

</html>