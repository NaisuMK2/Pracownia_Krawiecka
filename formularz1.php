<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>PK - Dane osobowe</title>
    </head>
    <body>
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">
                    <form method="post" id="formularz1">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h2 style="text-align: center;">Wprowadź dane osobowe:</h2>
                                </th>
                            </tr>
                            <tr>
                                <th><label for="imie" >Imie </label></th>
                                <th><input type="text" id="imie" name="imie"></th>
                            </tr>
                            <tr>
                                <th><label for="nazwisko" >Nazwisko </label></th>
                                <th><input type="text" id="nazwisko" name="nazwisko"></th>
                            </tr>
                            <tr>
                                <th><label for="telefon" >Numer telefonu </label></th>
                                <th><input type="text" id="telefon" name="telefon"></th>
                            </tr>
                            <tr>
                                <th><label for="pesel" >Numer pesel </label></th>
                                <th><input type="text" id="pesel" name="pesel"></th>
                            </tr>
                            <tr>
                                <th><label for="miasto" >Miasto </label></th>
                                <th><input type="text" id="miasto" name="miasto"></th>
                            </tr>
                            <tr>
                                <th><label for="wojewodztwo" >Województwo </label></th>
                                <th><input type="text" id="wojewodztwo" name="wojewodztwo"></th>
                            </tr>
                            <tr>
                                <th><label for="kod_pocztowy" >Kod pocztowy </label></th>
                                <th><input type="text" id="kod_pocztowy" name="kod_pocztowy"></th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div style="text-align: center;">
                                    <input type="submit" value="Przejdź dalej" name="dodawanie_klienta">
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
                if (isset($_POST['dodawanie_klienta'])){
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $telefon = $_POST['telefon'];
                    $pesel = $_POST['pesel'];
                    $nazwa_miasta = $_POST['miasto'];
                    $nazwa_wojewodztwa = $_POST['wojewodztwo'];
                    $kod_pocztowy = $_POST['kod_pocztowy'];

                    if (strlen($telefon) !=9){
                        echo "Numer telefonu musi mieć 9 cyfr. </br> Pamiętaj aby go podać bez odnośników krajowych.";
                        exit();
                    }

                    if (strlen($pesel) !=11){
                        echo "Numer pesel musi mieć 11 cyfr.";
                        exit();
                    }
                
                    $check_miasto_id = mysqli_query($conn, "SELECT id_miasta FROM miasto WHERE nazwa_miasta = '$nazwa_miasta'");
                
                    if (mysqli_num_rows($check_miasto_id) > 0) { // Sprawdzanie czy w bazie istnieje podane miasto
                        $row = mysqli_fetch_assoc($check_miasto_id);
                        $id_miasta = $row['id_miasta'];
                
                        $check_wojewodztwo_id = mysqli_query($conn, "SELECT id_wojewodztwa FROM wojewodztwo WHERE nazwa_wojewodztwa = '$nazwa_wojewodztwa'");
                
                        if (mysqli_num_rows($check_wojewodztwo_id) > 0) { // Sprawdzanie czy w bazie istnieje podane województwo
                            $row = mysqli_fetch_assoc($check_wojewodztwo_id);
                            $id_wojewodztwa = $row['id_wojewodztwa'];

                            // Przesłanie danych jeżeli jest miasto i województwo
                            mysqli_query($conn, "INSERT INTO klient(imie, nazwisko, telefon, pesel, id_miasta, id_wojewodztwa, kod_pocztowy)
                            VALUES ('$imie', '$nazwisko', '$telefon', '$pesel', '$id_miasta', '$id_wojewodztwa', '$kod_pocztowy')");

                        } else {
                            echo "Nie znaleziono województwa: " . $nazwa_wojewodztwa;
                        }
                    } else {
                        echo "Nie znaleziono miasta: " . $nazwa_miasta;
                    }

                    $id_klienta = $conn->insert_id; // Odczytanie ostatniego id_klienta (tego co został własnie wstawiony)

                    $id_pracownika = rand(1, 9); // Trzeba dodać zczytanie max id_pracownika i podstawienie
                    $koszt = rand(100, 600);
                    $data_oddania = date('Y-m-d', strtotime('+7 days'));

                    mysqli_query($conn, "INSERT INTO zamowienie (id_klienta, id_pracownika, koszt, data_oddania)
                    VALUES ('$id_klienta', '$id_pracownika', '$koszt', '$data_oddania')");


                    $id_zamowienia = $conn->insert_id;

                    // Przekierowanie do formularz2.php z przekazaniem id_zamowienia w URL
                    header("Location: formularz2.php?id_zamowienia=$id_zamowienia");
                    exit();

                }
            }

            $conn->close();
        }
        ?>
    </body>
</html>