<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/main.css">
</head>
<body class="d-flex flex-column vh-100 justify-content-center align-items-center w-100">
  <main class="d-flex h-100 col-4 align-items-center w-100 ">
    <aside class="aside__left aside h-100 col-3"></aside>
    <section class="login__middle col-6 d-flex justify-content-center align-items-center flex-column">
      <section class="login container mb-5 d-flex justify-content-center align-items-center " id="login">
        <form method="POST" class="loginForm col-5  h4 text-align-center " id="loginForm" action="./src/library/loginController.php">
          <label for="inputEmail" class="col-sm-2 col-form-label">Email/User</label>
          <input name="email" type="email"  class="form-control border-dark" id="inputEmail" value="email@example.com">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <input name="password" type="password" class="form-control border-dark" id="inputPassword">
          <button type="submit" class="loginButton mt-3 btn btn-lg text-white" id="loginButton">Enviar</button>
        </form>
    </div>
    <div class="container-table">
        <div class=table__title>Dashboard</div>
        <div class="table__header">Nombre</div>
        <div class="table__header">Apellido</div>
        <div class="table__header">Email</div>
        <div class="table__header">Gender</div>
        <div class="table__header">City</div>
        <div class="table__header">Street Address</div>
        <div class="table__header">State</div>
        <div class="table__header">Age</div>
        <div class="table__header">Postal Code</div>
        <div class="table__header">Phone Number</div>
        <?php $resultado = mysqli_query($conexion, $employees);
           while($row=mysqli_fetch_assoc($resultado)) {?>

        <div class="table__item"> <?php echo $row["name"]?> </div>
        <div class="table__item"><?php echo $row["last_name"]?></div>
        <div class="table__item"> <?php echo $row["email"]?></div>
        <div class="table__item"><?php echo $row["gender"]?></div>
        <div class="table__item"> <?php echo $row["city"]?></div>
        <div class="table__item"> <?php echo $row["street_address"]?></div>
        <div class="table__item"> <?php echo $row["state"]?></div>
        <div class="table__item"><?php echo $row["age"]?></div>
        <div class="table__item"><?php echo $row["postal_code"]?></div>
        <div class="table__item"><?php echo $row["phone_number"]?></div>


        <?php             } mysqli_free_result($resultado); ?>
    </div>
      </section>
      <section class="login__msg d-flex justify-content-center align-items-center " id="loginMsg">
        <p class="login__error-msg text-danger" id="loginErrorMsg">
          <?php
            if (isset($_GET['error'])) {
              $msg = $_GET['error'];
              if ($msg === 'user') {
                echo 'The username or email is incorrect.';
              } elseif ($msg === 'pw') {
                echo 'The username and password do not match.';
              }
            }        
          ?>
        </p>
      </section>
    </section>
    
    <aside class="aside__right aside h-100 col-3"></aside>
  </main>
</body>
</html>