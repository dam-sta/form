<!-- Dodano baze danych i hashowanie nazw zdjęcia -->
<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logowanie</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <div class="wrapper">
    <form action="login.php" enctype= "multipart/form-data" method="POST" onsubmit="return walidacjaEmail()">

      <h1>Logowanie</h1>
      <label for="number">numer: </label>
      <input type="number" name="numer" min="0" max="100" value="<?php echo @$_POST['numer']; ?>" required></ion-icon><br>

      <label for="text">nazwa: </label>
      <input type="text" name="nazwa" maxlength="10" minlength="2" value="<?php echo @$_POST['nazwa']; ?>" required></ion-icon><br>

      <label for="select">wybierz: </label>
      <select name="select" id="select" onsubmit="previous_select()">
        <option value="null" hidden>-||-</option>
        <option value="1">wybór 1</option>
        <option value="2">wybór 2</option>
        <option value="3">wybór 3</option>
      </select><br>

      <label for="radio">radio: </label>
      <input type="radio" name="radio" value="radio1">
      <input type="radio" name="radio" value="radio2"><br>

      <label for="check">checkbox: </label>
      <input type="checkbox" name="check1" value="check1">
      <input type="checkbox" name="check2" value="check2">
      <input type="checkbox" name="check3" value="check3"><br>

      <label for="file">daj zdjęcie: </label>
      <input type="file" name="profil" accept=".jpg, .jpeg, .png"><ion-icon name="document"></ion-icon><br>

      <label for="email">email: </label>
      <input type="email" name="email" id="email" value="<?php echo @$_POST['email']; ?>"><ion-icon name="mail" required></ion-icon><br>

      <label for="pemail">potwierdź email: </label>
      <input type="email" name="pemail" id="pemail"><br>

      <label for="pass">hasło: </label>
      <input type="password" name="pass" id="pass"><ion-icon name="lock-closed" required></ion-icon><br>

      <textarea name="textarea" cols="10" rows="5"><?php echo @$_POST['textarea']; ?></textarea><br>

      <input type="submit" value="Wyślij">
      <input type="reset" value="Zresetuj">
    </form>
  </div>

<script type="text/javascript">
    function walidacjaEmail() {
      var email = document.getElementById('email').value;
      var pemail = document.getElementById('pemail').value;
      var pass = document.getElementById('pass').value;
      
      if (email != pemail) 
      {
        alert('Email nie jest taki sam!');
        return false;
      } 

      if (pass.length < 7) {
        alert('Hasło za krótkie!');
        return false;
        } else if (pass.search(/\d/) == -1) {
          alert('Hasło nie ma cyfry!');
          return false;
        } else if (pass.search(/[A-Z]/) == -1) {
          alert('Hasło nie ma dużej litery!');
          return false;
        } else if (pass.search(/[a-z]/) == -1) {
          alert('Hasło nie ma małej litery!');
          return false;
        } else if (pass.search(/[\!\@\#\$\%\^\&\*\(\)\_\+]/) == -1) {
          alert('Hasło nie ma specjalnego znaku!');
         return false;
        }
    }
  </script>

    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'formularz');
      if (!$conn) {
        echo "Wystąpił problem z połączeniem " . mysqli_connect_error();
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numer = @$_POST['numer'];
        $nazwa = @$_POST['nazwa'];
        $select = @$_POST['select'];
        $radio = @$_POST['radio'];
        $check1 = @$_POST['check1'];
        $check2 = @$_POST['check2'];
        $check3 = @$_POST['check3'];
        $email = @$_POST['email'];
        $password = @$_POST['pass'];
        $textarea = @$_POST['textarea'];
        $filename = $_FILES["profil"]["name"];
        $tempname = $_FILES["profil"]["tmp_name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $hashed_file = md5_file($tempname) . "." .$extension;
        $folder = "images/" . $hashed_file;
        
        $insert = "insert into logowanie (numer, nazwa, wybor, radio, checkbox, file, email, haslo, textarea) VALUES ('$numer', '$nazwa', '$select', '$radio', '$check1 ' '$check2 ' '$check3', '$hashed_file', '$email', '$password', '$textarea');";
        $que = mysqli_query($conn, $insert);
        
        if (!move_uploaded_file($tempname, $folder)) echo "<script>alert('Nastąpił błąd z przesłaniem zdjęcia!');</script>";
      }

      mysqli_close($conn);
    ?>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>