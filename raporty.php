<?php
session_start(); // Niezbędne do działania ukrywania/wyświetlania formularzy
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>PK - Raporty</title>

        <style>
            td, th{
                padding-left: 8px;
                border-bottom: 1px solid black;
                border-bottom-style: dotted;
            }
        </style>

        <script>
            window.onload = function() {
                var wybor = sessionStorage.getItem('selectedRaport');
                if (wybor) {
                    document.getElementById("wyborRaportu").value = wybor;
                    wyswietlRaport();
                }
            }

            function wyswietlRaport() {
                var wybor = document.getElementById("wyborRaportu").value;
    
                // Ukrywanie formularzy
                var raporty = document.getElementsByClassName("raport");
                for(var i = 0; i < raporty.length; i++){
                    raporty[i].style.display = "none";
                }

                // Ukrywanie/wyświetlanie formularza (Część kosmetyczna bo się źle wyświetlało)
                if (wybor === "selected") {
                    document.getElementById("formularz_outer").style.display = "none";
                } else {
                    document.getElementById("formularz_outer").style.display = "block";
                }
    
                // Wyświetlanie formularzy
                if (wybor) {
                    document.getElementById(wybor).style.display = "block";
                    sessionStorage.setItem('selectedRaport', wybor);
                }
            }
        </script>

    </head>

    <body>
        <div id="header">
            <select id="wyborRaportu" style="width: 20%; height: 40px; font-size: 18px;" onchange="wyswietlRaport()">
                <option value="selected" selected="selected">Wybierz formularz...</option>
                <option value="raport1">Lista klientów z danego miasta</option>
                <option value="raport2">Lista pracowników z danego województwa</option>
                <option value="raport3">Zamówienia do oddania w przeciągu dwóch tygodni</option>
                <option value="raport4">Dane dotyczące miar</option>
            </select>
        </div>

    <div id="raport1" class="raport" style="display: none;">
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">

                    <form method="post" action="">
                        <label for="miasto">Nazwa miasta zamieszkałego przez klienta:</label><br>
                        <input type="text" id="miasto" name="miasto"><br>
                        <input type="submit" value="Szukaj">
                    </form>



                    <?php
                    $conn = new mysqli('localhost','root','','pracownia_krawiecka');
                    if (!$conn){
                        exit("Błąd połączenia z serwerem");
                    }

                    else{
                        if (isset($_POST['miasto'])) {
                            $miasto = $_POST['miasto'];
                            $result = mysqli_query($conn, "SELECT id_klienta, imie, nazwisko, telefon, pesel, id_miasta, id_wojewodztwa, kod_pocztowy FROM klient JOIN miasto USING (id_miasta) WHERE nazwa_miasta = '$miasto'");

                            echo "<table>";
                            echo "<tr><th>ID Klienta</th><th>Imię</th><th>Nazwisko</th><th>Telefon</th><th>PESEL</th><th>ID Miasta</th><th>ID Województwa</th><th>Kod Pocztowy</th></tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr><td>" . $row['id_klienta'] . "</td><td>" . $row['imie'] . "</td><td>" . $row['nazwisko'] . "</td><td>" . $row['telefon'] . "</td><td>" . $row['pesel'] . "</td><td>" . $row['id_miasta'] . "</td><td>" . $row['id_wojewodztwa'] . "</td><td>" . $row['kod_pocztowy'] . "</td></tr>";
                            }
                            echo "</table>";

                            mysqli_close($conn);
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>



    <div id="raport2" class="raport" style="display: none;">
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">

                    <form method="post" action="">
                        <label for="wojewodztwo">Nazwa województwa zamieszkałego przez pracownika:</label><br>
                        <input type="text" id="wojewodztwo" name="wojewodztwo"><br>
                        <input type="submit" value="Szukaj">
                    </form>



                    <?php
                    $conn = new mysqli('localhost','root','','pracownia_krawiecka');
                    if (!$conn){
                        exit("Błąd połączenia z serwerem");
                    }
                    else{
                        if (isset($_POST['wojewodztwo'])) {
                            $wojewodztwo = $_POST['wojewodztwo'];

                            $result = mysqli_query($conn, "SELECT id_pracownika, imie, nazwisko, telefon, pesel, id_miasta, id_wojewodztwa, kod_pocztowy FROM pracownik JOIN wojewodztwo USING (id_wojewodztwa) WHERE nazwa_wojewodztwa = '$wojewodztwo'");

                            echo "<table>";
                            echo "<tr><th>ID Pracownik</th><th>Imię</th><th>Nazwisko</th><th>Telefon</th><th>PESEL</th><th>ID Miasta</th><th>ID Województwa</th><th>Kod Pocztowy</th></tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr><td>" . $row['id_pracownika'] . "</td><td>" . $row['imie'] . "</td><td>" . $row['nazwisko'] . "</td><td>" . $row['telefon'] . "</td><td>" . $row['pesel'] . "</td><td>" . $row['id_miasta'] . "</td><td>" . $row['id_wojewodztwa'] . "</td><td>" . $row['kod_pocztowy'] . "</td></tr>";
                            }
                            echo "</table>";

                            mysqli_close($conn);
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <div id="raport3" class="raport" style="display: none;">
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'pracownia_krawiecka');
                    if (!$conn) {
                        exit("Błąd połączenia z serwerem");
                    } else {
                        $query = "SELECT * FROM zamowienie WHERE data_oddania BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 WEEK)";
                        $result = mysqli_query($conn, $query);

                        echo "<table>";
                        echo "<tr><th>ID Zamówienia</th><th>ID Klienta</th><th>ID Pracownika</th><th>Koszt</th><th>Data oddania</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row['id_zamowienia'] . "</td><td>" . $row['id_klienta'] . "</td><td>" . $row['id_pracownika'] . "</td><td>" . $row['Koszt'] . "</td><td>" . $row['data_oddania'] . "</td></tr>";
                        }
                        echo "</table>";

                        mysqli_close($conn);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div id="raport4" class="raport" style="display: none;">
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">

                    <form method="post" action="">
                        <label for="rodzaj_pracy">Wybierz rodzaj pracy:</label><br>
                        <select id="rodzaj_pracy" name="rodzaj_pracy">
                            <option selected="selected">Wybierz rodzaj pracy</option>
                        
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'pracownia_krawiecka');
                            if (!$conn) {
                                exit("Błąd połączenia z serwerem");
                            }
                            $sql = 'SELECT id_rodzaju_pracy, rodzaj_pracy FROM rodzaj_pracy';
                            foreach ($conn->query($sql) as $row) {
                                echo "<option value='{$row['id_rodzaju_pracy']}'>{$row['rodzaj_pracy']}</option>";
                            }
                            ?>

                        </select>
                        <input type="submit" value="Pokaz">
                    </form>



                    <?php
                    if (isset($_POST['rodzaj_pracy'])) {
                        $rodzaj_pracy = $_POST['rodzaj_pracy'];
                        $result = mysqli_query($conn, "SELECT zamowienie.id_zamowienia, zamowienie.id_klienta, zamowienie.id_pracownika, zamowienie.koszt, zamowienie.data_oddania, szczegoly_zamowienia.id_zamowienia, szczegoly_zamowienia.id_wymiaru, szczegoly_zamowienia.id_rodzaju_szytej_odziezy, szczegoly_zamowienia.id_rodzaju_materialu_odziezy, szczegoly_zamowienia.id_rodzaju_pracy
                                FROM zamowienie
                                JOIN szczegoly_zamowienia ON zamowienie.id_zamowienia = szczegoly_zamowienia.id_zamowienia
                                WHERE szczegoly_zamowienia.id_rodzaju_pracy = '$rodzaj_pracy'"); 

                        echo "<table>";
                        echo "<tr><th>ID Zamówienia</th><th>ID Klienta</th><th>ID Pracownika</th><th>Koszt</th><th>Data oddania</th><th>ID Wymiaru</th><th>ID Rodzaju szytej odzieży</th><th>ID Rodzaju materiału odzieży</th><th>ID Rodzaju pracy</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row['id_zamowienia'] . "</td><td>" . $row['id_klienta'] . "</td><td>" . $row['id_pracownika'] . "</td><td>" . $row['koszt'] . "</td><td>" . $row['data_oddania'] . "</td><td>" . $row['id_wymiaru'] . "</td><td>" . $row['id_rodzaju_szytej_odziezy'] . "</td><td>" . $row['id_rodzaju_materialu_odziezy'] . "</td><td>" . $row['id_rodzaju_pracy'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    $conn->close();
                    ?>

                </div>
            </div>
        </div>
    </div>


    </body>
</html>