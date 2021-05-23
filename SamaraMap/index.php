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
        /* padding: 0; */
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
        height: 96%;
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

<body>
    <!-- <header class=""> -->
    <div class="header" id="header">
        текст<br />ytortuoiertu
    </div>
    <!-- </header> -->
    <div class="content" id="content">
        <?php
        // phpinfo();
        // $serverName = "[2001:470:1f0b:3f7:5572:aa5a:4c71:a93e]";  
//         $myServer = "127.0.0.1";
// $myUser = "sa";
// $myPass = "sd666999666";
// $myDB = "vs_new";
// $dbhandle = sqlsrv_connect($myServer, $myUser, $myPass) or die("Could not connect to database: ".mssql_get_last_message()); 
$server_name = "localhost";
$database_name = "vs_new";

try {
   $conn = new PDO("sqlsrv:Server=$server_name;Database=$database_name;ConnectionPooling=0", "sa", "sd666999666");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "work";
} catch(PDOException $e) {
    // $e->getMessage();
    echo "not work</br>";
    echo $e->getMessage();
}
        // $serverName = "localhost";  
        // $connectionOptions = array("Database"=>"vs_new"); 
        // $conn = sqlsrv_connect( $serverName, $connectionInfo);  
        // echo $conn;
        // echo "Could  connect.\n"; 
        // if( $conn === false )  
        // {  
        //      echo "Could not connect.\n";  
        //      die( print_r( sqlsrv_errors(), true));  
        // }  
        
              
            //  die( print_r( sqlsrv_errors(), true));  
 
        ?>
    </div>
    <div class="footer" id="footer">
        <?php
        echo '<a href="https://windows.php.net/" target="_blank">';
        echo "PHP version: " . phpversion();
        echo '</a> &nbsp;';
        echo '<a href="https://github.com/ANDREY-RANNEV/php.git" target="_blank">';
        //   echo '<img class="fit-picture" src="img/GitHub-Mark-Light-32px.png"/>' ;
        echo '<img class="fit-picture" src="img/GitHub-Mark-32px.png"/>';
        ?>
    </div>
</body>

</html>