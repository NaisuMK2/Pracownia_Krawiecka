<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>PK - Rodzaj pracy</title>
    </head>
    <body>
        <div id="formularz_outer">
            <div id="otoczka_outer">
                <div id="otoczka_inner">
                    <form method="post" id="formularz2">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h2 style="text-align: center;">Wybierz opcje dotyczące swojego zamówienia</h2>
                                </th>
                            </tr>
                            <tr>
                                <th><label for="rodzaj_pracy" >Rodzaj wykonywanej pracy</label></th>
                                <th>

                                <?php
                                    $conn = new mysqli('localhost', 'root', '', 'pracownia_krawiecka');
                                    if (!$conn) {
                                        exit("Błąd połączenia z serwerem");
                                    } else {
                                        echo '<select name="rodzaj_pracy">';

                                        $sql = 'SELECT id_rodzaju_pracy, rodzaj_pracy FROM rodzaj_pracy'; // Zapytanie pobiera id_rodzaju_pracy i rodzaj_pracy, wstawia do tabeli select
                                        foreach ($conn->query($sql) as $row) {
                                            echo "<option value='{$row['id_rodzaju_pracy']}'>{$row['rodzaj_pracy']}</option>";
                                        }
                                        
                                        echo '</select>';

                                        $conn->close();
                                    }
                                ?>

                                </th>
                            </tr>
                            <tr>
                                <th><label for="rodzaj_szytej_odziezy" >Rodzaj szytej odziezy </label></th>
                                <th>

                                <?php
                                    $conn = new mysqli('localhost', 'root', '', 'pracownia_krawiecka');
                                    if (!$conn) {
                                        exit("Błąd połączenia z serwerem");
                                    } else {
                                        echo '<select name="rodzaj_szytej_odziezy">';

                                        $sql = 'SELECT id_rodzaju_szytej_odziezy, rodzaj_szytej_odziezy FROM rodzaj_szytej_odziezy';
                                        foreach ($conn->query($sql) as $row) {
                                            echo "<option value='{$row['id_rodzaju_szytej_odziezy']}'>{$row['rodzaj_szytej_odziezy']}</option>";
                                        }
                                        
                                        echo '</select>';

                                        $conn->close();
                                    }
                                ?>

                                </th>
                            </tr>
                            <tr>
                                <th><label for="rodzaj_materialu_odziezy" >Rodzaj materiału szytej odziezy </label></th>
                                <th>

                                <?php
                                    $conn = new mysqli('localhost', 'root', '', 'pracownia_krawiecka');
                                    if (!$conn) {
                                        exit("Błąd połączenia z serwerem");
                                    } else {
                                        echo '<select name="rodzaj_materialu_odziezy">';

                                        $sql = 'SELECT id_rodzaju_materialu_odziezy, rodzaj_materialu_odziezy FROM rodzaj_materialu_odziezy';
                                        foreach ($conn->query($sql) as $row) {
                                            echo "<option value='{$row['id_rodzaju_materialu_odziezy']}'>{$row['rodzaj_materialu_odziezy']}</option>";
                                        }
                                        
                                        echo '</select>';

                                        $conn->close();
                                    }
                                ?>

                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div style="text-align: center;">
                                    <input type="submit" value="Przejdź dalej">
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

            else {
                if (isset($_GET['id_zamowienia'])) {
                    $id_zamowienia = $_GET['id_zamowienia'];
                    

                    $id_rodzaju_pracy = $_POST['rodzaj_pracy'];
                    $id_rodzaju_szytej_odziezy = $_POST['rodzaj_szytej_odziezy'];
                    $id_rodzaju_materialu_odziezy = $_POST['rodzaj_materialu_odziezy'];

                    mysqli_query($conn, "INSERT INTO szczegoly_zamowienia (id_zamowienia, id_rodzaju_szytej_odziezy, id_rodzaju_materialu_odziezy, id_rodzaju_pracy)
                            VALUES ('$id_zamowienia', '$id_rodzaju_szytej_odziezy', '$id_rodzaju_materialu_odziezy', '$id_rodzaju_pracy')");
                    
                    $conn->close();

                    header("Location: formularz3.php?id_zamowienia=$id_zamowienia");
                    exit;
                }
            }
        }
        ?>
    </body>
</html>