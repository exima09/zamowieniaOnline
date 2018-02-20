<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>
        <?php
        $q = intval($_GET['q']);
        echo "<table>
<tr>
<th>Imię</th>
<th>Nazwisko</th>
<th>E-mail</th>
<th>Nr Telefonu</th>
<th>Ulica</th>
</tr>";
        require_once "connect.php";
        $polaczanie = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczanie->connect_errno != 0) {
            echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
        } else {
            if (!$polaczanie->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $polaczanie->error);
                exit();
            }
            $sql = "SELECT * FROM klienci";
            if ($result = @$polaczanie->query($sql)) { //wproawadzanie zapytania do bazy danych
                $How_much = $result->num_rows;
                if ($How_much > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['imie'] . "</td>";
                        echo "<td>" . $row['nazwisko'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['nr_telefonu'] . "</td>";
                        echo "<td>" . $row['ulica'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
        }
        echo "</table>";
        ?>
    </body>
</html>