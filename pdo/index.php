<?php
try {
    // On se connecte à MySQL
    $db = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}


// Ajout ville + temp
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {

    $ville = trim($_POST['ville']);
    $max = trim($_POST['max']);
    $min = trim($_POST['min']);

    if (!empty($ville) && is_numeric($max) && is_numeric($min)) {
        $query = $db->prepare('INSERT INTO météo(ville, haut, bas) VALUES(:ville,:haut,:bas)');

        $query->execute([
            ':ville' => $ville,
            ':haut' => $max,
            ':bas' => $min,
        ]);

        echo "<h2>Données insérées avec succès !</h2> ";
    } elseif (empty($ville) || !is_numeric($max) || !is_numeric($min)) {
        echo "<h2>Veuillez remplir tous les champs correctement.</h2>";
    }
}

// Suppression ville si checkbox true
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    if (isset($_POST['checkboxes']) && is_array($_POST['checkboxes'])) {
        foreach ($_POST['checkboxes'] as $ville) {
            $ville = trim($ville);
            if (!empty($ville)) {
                $query = $db->prepare(
                    'DELETE FROM météo WHERE ville = :ville'
                );
                $query->execute([
                    ':ville' => $ville,
                ]);
            }
        }
    }
}


$query = $db->prepare('SELECT * FROM météo');
$query->execute();
$result = $query->fetchAll();

function weather($result)
{
    echo '<form action="" method="POST">';
    echo '<table>';
    echo '<tr>
<th>Ville</th>
<th>Max</th>
<th>Min</th>
<th>Supprimer</th>
</tr>';
    foreach ($result as $row) {
        echo '<tr>
            
            <td>' . $row['ville'] . '</td>
            <td>' . $row['haut'] . '</td>
            <td>' . $row['bas'] . '</td>
            <td><input type="checkbox" name="checkboxes[]" value=" ' . $row['ville'] . '"></td>
            </tr>';
    }
    echo '</table>';
    echo '<br>';
    echo '<button type="submit" name="delete">Supprimer les villes sélectionnées</button>';
    echo '</form>';
}

weather($result);

?>

<br>
<hr>
<br>

<h3>Ajouter une nouvelle ville</h3>
<form method="POST" action="">
    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required>
    <br><br>

    <label for="max">Température Max :</label>
    <input type="number" id="max" name="max" required>
    <br><br>

    <label for="min">Température Min :</label>
    <input type="number" id="min" name="min" required>
    <br><br>

    <button type="submit" name="add">Ajouter la ville</button>
</form>
