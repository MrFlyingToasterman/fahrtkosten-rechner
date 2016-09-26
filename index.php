<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fahrtkosten Rechner</title>
        <style>
            #content {
                background-color: lightslategrey;
                width: 240px;
                padding: 5px; /* innenabstand */
                margin-top: 15%; /* Aussenabstand */
                box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75); /* super mega epischer Schatten */
            }
            .boxn {
                width: 215px;
            }
            body {
                background-color: activeborder;
            }
            
        </style>
    </head>
    <body>
        <?php
            //Prüfe ob bereits abgesendet
            if (isset($_POST["km"])) {
                //Einlesen der 2 Textboxwerte
                $trecke = $_POST["km"];
                $prns = $_POST["personen"];
                
                //Wichtige var's
                $fahrzeug;
                $fahrtgosten = 0;
                
                //Setze fahrzeug
                if ($prns <= 4) {
                    $fahrzeug = "audo";
                }else {
                    $fahrzeug = "pus";
                }
                
                //reche strecke
                if ($fahrzeug == "audo") {
                    //Ein Auto braucht 7,5 Liter auf 100km
                    $liter = $trecke * (7.5/100);
                    //Ein Liter Benzin kostet 1,25
                    $fahrtgosten = $liter * 1.25;
                } else {
                    
                    $repeter = true;
                    
                    while ($repeter) {
                    
                    if ($prns >= 10) {
                        $prns = $prns - 9;
                    }else{
                        $repeter = false;
                    }
                    
                    //Ein Bus braucht 12 Liter auf 100km
                    $liter = $trecke * (12/100);
                    //Ein Liter Benzin kostet 1,25
                    $fahrtgosten = $fahrtgosten + $liter * 1.25;
                    
                    }
                }
            }
        ?>
    <center>
        <div id="content">
            <form action="index.php" method="post">
                <table border="0px">
                <tr>
                    <td colspan="2"><input type="text" placeholder="Strecke in KM" name="km" class="boxn"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" placeholder="Personen" name="personen" class="boxn"></td>
                </tr>
                <tr>
                    <td colspan="2"> &nbsp; <?php if (isset($_POST["km"])) {echo "<br>Sie Fahren mit'm "; echo $fahrzeug; echo " und das kostet Sie: "; echo round($fahrtgosten, 2); echo " €"; }?></td>
                </tr>
                <tr>
                    <td> &nbsp; </td> <td> &nbsp; </td>
                </tr>
                <tr>
                    <td> </td> <td align="right"> <input type="submit"> </td>
                </tr>
                </table>
            </form>
        </div>
    </center>
</body>
</html>
