<html>

    <head>
        <title>Scope</title>
    </head>

    <body>
        <?php
        class test
        {

        public function test1()
        {
            $var = 1;

            global $var;
            $var = 2;
            return $var;
        }

        //echo $var . '<br>';


        public function test3()
        {
            $var = 1;
            static $var;
            $var++;
            return $var;
        }

        }
        ?>


    </body>

</html>