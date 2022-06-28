<?php include("conection.php");
               $employees = "SELECT * FROM employees";
            ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-add">
        <h2 class="container__title">Registrar Usuario</h2>
        <form class="container__form" action="insertar.php" method="POST">
            <label for=""name="name" class="container__label">Nombre</label><input type="text" class="container__input">
            <label for=""name="last_name" class="container__label">Apellido</label><input type="text" class="container__input">
            <label for=""name="email" class="container__label">Email</label><input type="text" class="container__input">
            <label for=""name="gender_id" class="container__label">Gender</label><input type="text" class="container__input">
            <label for=""name="city"  class="container__label">City</label><input type="text" class="container__input">
            <label for=""name="street_address"  class="container__label">Street Address</label><input type="text" class="container__input">
            <label for=""name="state" class="container__label">State</label><input type="text" class="container__input">
            <label for=""name="age" class="container__label">Age</label><input type="text" class="container__input">
            <label for=""name="postal_code" class="container__label">Postal Code</label><input type="text" class="container__input">
            <label for=""name="phone_number" class="container__label">Phone Number</label><input type="text" class="container__input">
            <input type="submit" class="container__submit" value="Registrar">

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
</body>

</html>