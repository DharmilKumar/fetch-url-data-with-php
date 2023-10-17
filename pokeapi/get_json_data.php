<!DOCTYPE html>
<html>

<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    // $url = "https://pokeapi.co/api/v2/pokemon?offset=300&limit=100";

    for ($i = 1; $i <= 21; $i++) {
        $data = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $i . "/");
        $decode = json_decode($data);

        $img = $decode->sprites->other->{'official-artwork'}->front_default;



        $abt = count($decode->abilities);

        $b = $decode->stats[0]->stat->name;
        echo '
        <div class="card mx-auto" style="width:50rem">
        <div class="card-body text-center">
            <div class="card-title"><h3>Name: ' . $decode->name . '</h3></div>
            <div class="card-image"><img src="' . $img . '" style="width:150px"></div>
            <div class="card-text">Stat: ' . $b . '</div>';
    ?>

    <?php
        if ($abt >= 3) {

            echo '<div class="card-text"><h4>Abilities:  </h4></div>';

            //using dropdown
            echo '
                <select>
                <option>Show All Abilities</option>
                ';
            for($k=0;$k<$abt;$k++){
                $a = $decode->abilities[$k]->ability->name;
                echo '<option>'.$a.'</option>';
            }
            echo '</select>';


            /*
            echo '<script type="text/javascript">
                function onclick(){
                    var y = document.getElementById("<?php echo $abt?>");
                    for(var q = 0;q<y;q++){
                        
                    var x = document.getElementById("<?php echo $decode->abilities[$q]->ability->name?>");
                        print(x);
                    }
                }
                
            </script>
               <button onclick="onclick();" value="button" type="button">click</button>
            ';*/


            /*
                ?>
                <script type="text/javascript">
                function onclick(){
                    console.log("akweg");
                    var y = ("<?php echo count($decode->abilities)?>");
                    for(var q = 0;q<y;q++){ 
                    var x = document.getElementsByName("<?php echo $decode->abilities[$q]->ability->name?>");
                        console.log(x);
                    }
                }
                </script>

                <form><button onclick="onclick();" value="button" type="button">click</button>
                </form>
                
                <?php
                */

            /*

        ?>
            <p >count: <input id="value" type="text"></p>
            <script>
                function myFunction() {
                    document.getElementById("value").value = document.getElementById("<?php echo count($decode->abilities)?>").value;
                }
            </script>
            <button onclick="onclick();" value="button" type="button">click</button>

    <?php
 */
        } else {
            echo '<div class="card-text">Abilities:  </div>';
            for ($j = 0; $j < $abt; $j++) {
                $a = $decode->abilities[$j]->ability->name;
                echo '<div class="card-text">' . $a . '</div>';
            }
        }
        echo '</div>';
        echo '</div>';
    }

    ?>




</body>

</html>