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
        phpinfo();
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