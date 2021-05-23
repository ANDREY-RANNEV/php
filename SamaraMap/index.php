<html>
<style>
    #footer {
        clear: both;
        border: 1px groove #aaaaaa;
        background: lightgray;
        color: black;
        padding: 0;
        text-align: center;
        vertical-align: middle;
        line-height: normal;
        margin: 0;
        position: fixed;
        bottom: 0px;
        height: 2%;
        width: 100%;
        left: 0;
    }

    .header {
        clear: both;
        border: 1px groove #aaaaaa;
        background: lightgray;
        color: black;
        padding: 0;
        text-align: center;
        vertical-align: middle;
        line-height: normal;
        margin: 0;
        position: fixed;
        top: 0px;
        height: 2%;
        width: 100%;
        left: 0;
    }

    .content {
        clear: both;
        border: 1px groove #aaaaaa;
        background: lightyellow;
        color: black;
        padding: 0;
        text-align: center;
        vertical-align: middle;
        line-height: normal;
        margin: 0;
        position: fixed;
        top: 20px;
        /* bottom: 20px; */
        width: 100%;
        height: 97%;
        left: 0;
        overflow-y: scroll;
        /* scrollbar-color: rebeccapurple green;
    scrollbar-width: thin; */
    }

    /* .content::-webkit-scrollbar */

    /* {
    width: 12px;
    background-color: greenyellow;
} */
    .fit-picture {
        width: 20px;
    }
</style>

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html" charset="utf-8"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

</head>

<body>
    <div class="header" id="header">
        текст<br />ytortuoiertu
    </div>

    <div class="content" id="content">
        <?php
        // phpinfo();

        $myUser = "sa";
        $myPass = "saadmin";
        // $database_name = "Went_Test"; 
        // $serverName = "localhost";  
        $server_name = "[2001:470:1f0b:3f7:5572:aa5a:4c71:a93e]";
        $database_name = "FBUZ";
        $connectionInfo = array("Database" => $database_name, "UID" => $myUser, "PWD" => $myPass);

        try {
           $conn = new PDO("sqlsrv:Server=$server_name;Database=$database_name;ConnectionPooling=0", $myUser, $myPass);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $mssqldb_a= "доступна";
           
        } catch(PDOException $e) {
            $mssqldb_a= "не доступна";
            echo "not work</br>";
            echo $e->getMessage();
        }

        $sql = 'SELECT * FROM Users ORDER BY Name';
        foreach ($conn->query($sql) as $row) {
            print $row['Name'] . "\t";
            print $row['Password'] . "\t";
            print $row['Login'] . "\n";
        }   
// $dbhandle = sqlsrv_connect($myServer, $myUser, $myPass);
// //  or die("Could not connect to database: ".mssql_get_last_message());
// echo mssql_get_last_message();
        
        // $conn = sqlsrv_connect($server_name, $connectionInfo);
        // if ($conn === false) {
        //     echo "Could not connect.</br>";
        //     //  die( print_r( sqlsrv_errors(), true));  
        //     if (($errors = sqlsrv_errors()) != null) {
        //         foreach ($errors as $error) {
        //             echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
        //             echo "code: " . $error['code'] . "<br />";
        //             echo "message: " . $error['message'] . "<br />";
        //         }
        //     }
        //     $mssqldb_a = "не доступна";
        // } else {
        //     $mssqldb_a = "доступна";
        // }
        ?>
    </div>

    <div class="footer" id="footer">
        <?php
        echo 'Database "' . $database_name . '" ' . $mssqldb_a;
        echo '&nbsp; <a href="https://windows.php.net/" target="_blank">';
        echo "PHP version: " . phpversion();
        echo '</a> &nbsp;';
        echo '<a href="https://github.com/ANDREY-RANNEV/php.git" target="_blank">';
        //   echo '<img class="fit-picture" src="img/GitHub-Mark-Light-32px.png"/>' ;
        echo '<img class="fit-picture" src="img/GitHub-Mark-32px.png"/>';
        ?>
    </div>
</body>

</html>