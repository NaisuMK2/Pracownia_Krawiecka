<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>PK - Wymiary</title>
    </head>
    <body>
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">
                    <form method="post" id="formularz3">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h2 style="text-align: center;">Podaj szczegóły swoich wymiarów</h2>
                                </th>
                            </tr>
                            <tr>
                            <th><label for="plec" >Płeć </label></th>
                            <th>
                                <select name="plec">
                                    <option value="Mężczyzna">Mężczyzna</option>
                                    <option value="Kobieta">Kobieta</option>
                                    <option value="Inna">Inna</option>
                                </select></th>
                            </tr>
                            <tr>
                                <th><label for="wzrost" >Wzrost </label></th>
                                <th><input type="text" id="wzrost" name="wzrost"></th>
                            </tr>
                            <tr>
                                <th><label for="rozmiar_klatki_piersiowej" >Rozmiar klatki piersiowej </label></th>
                                <th><input type="text" id="rozmiar_klatki_piersiowej" name="rozmiar_klatki_piersiowej"></th>
                            </tr>
                            <tr>
                                <th><label for="rozmiar_talii" >Rozmiar talii </label></th>
                                <th><input type="text" id="rozmiar_talii" name="rozmiar_talii"></th>
                            </tr>
                            <tr>
                                <th><label for="rozmiar_bioder" >Rozmiar bioder </label></th>
                                <th><input type="text" id="rozmiar_bioder" name="rozmiar_bioder"></th>
                            </tr>
                            <tr>
                                <th><label for="rozmiar_rekawow " >Rozmiar rekawow  </label></th>
                                <th><input type="text" id="rozmiar_rekawow " name="rozmiar_rekawow"></th>
                            </tr>
                            <tr>
                                <th><label for="rozmiar_nogawki " >Rozmiar nogawki  </label></th>
                                <th><input type="text" id="rozmiar_nogawki " name="rozmiar_nogawki"></th>
                            </tr>
                            <tr>
                                <th><label for="dlugosc " >Długość </label></th>
                                <th><input type="text" id="dlugosc " name="dlugosc"></th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div style="text-align: center;">
                                    <input type="submit" value="Prześlij zamówienie" name="submit">
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $conn = new mysqli('localhost','root','','pracownia_krawiecka');
            if (!$conn){
                exit("Błąd połączenia z serwerem");
            }

            else{
                if (isset($_POST['submit'])){
                    $plec = $_POST['plec'];
                    $wzrost = $_POST['wzrost'];
                    $rozmiar_klatki_piersiowej = $_POST['rozmiar_klatki_piersiowej'];
                    $rozmiar_talii = $_POST['rozmiar_talii'];
                    $rozmiar_bioder = $_POST['rozmiar_bioder'];
                    $rozmiar_rekawow = $_POST['rozmiar_rekawow'];
                    $rozmiar_nogawki = $_POST['rozmiar_nogawki'];
                    $dlugosc = $_POST['dlugosc'];
                }

                if (isset($_GET['id_zamowienia'])) {
                    $id_zamowienia = $_GET['id_zamowienia'];
                }
            

            mysqli_query($conn, "INSERT INTO wymiary (plec, wzrost, rozmiar_klatki_piersiowej, rozmiar_talii, rozmiar_bioder, rozmiar_rekawow, rozmiar_nogawki, dlugosc)
                            VALUES ('$plec', '$wzrost', '$rozmiar_klatki_piersiowej', '$rozmiar_talii', '$rozmiar_bioder', '$rozmiar_rekawow', '$rozmiar_nogawki', '$dlugosc')");
                    
                    $id_wymiaru = $conn->insert_id;

                    // Aktualizacja rekordu w tabeli szczegoly_zamowienia z id_wymiaru
                    mysqli_query($conn, "UPDATE szczegoly_zamowienia SET id_wymiaru = '$id_wymiaru' WHERE id_zamowienia = '$id_zamowienia'");

                    $conn->close();

                    header("Location: potwierdzenie.html");
                    exit;
            }
        }
        ?>

    </body>
</html>