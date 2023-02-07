<!DOCTYPE html>
<html>
<title>LOGIN APP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<body>
    <div class="container-sm mt-5 bg-dark.bg-gradient p-5">
        <form name="FormLogin" action="#" method="post">
            <h1 class="h1">login</h1>
            <br>
            <input class="form-control" type="text" id="Username" placeholder="username" name="username" required>
            <br>
            <input class="form-control" type="password" id="Password" placeholder="password" name="password" required>
            <br>
            <button class="btn btn-primary" type="submit" value="accedi">Login</button>
        </form>
    </div>
    <?php
    include "../dbconn.php";
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];



    if (!empty($username) && !empty($password)) {
        $strSQL = "select * from TUserSocial WHERE Username='" . $username . "' AND Password='" . $password . "' AND Eliminato=0 AND RegistrazioneConfermata=1 ";
        echo $strSQL;
        $query = mysqli_query($conn, $strSQL);
        $numeroRecord = mysqli_num_rows($query);
        if ($numeroRecord > 0) {

            $row = mysqli_fetch_assoc($query);
            // questa variabile session potrà essere usata anche in altre pagine DELLA STESSA SESSIONE
            // NOMEVARIABILE= VALORE (SESSION)
            $_SESSION['Username'] = $username;
            $_SESSION['ID'] = $row['ID'];

            header("location: home.php");
        } else {
            echo ("credenziali non valide o email non confermata oppure utente eliminato");
        }
    }

    ?>


</body>

</html>