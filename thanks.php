<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <title>Réponse de validation</title>
</head>
<body>

<?php 
/*
* Check the correct method which is : POST
* Other methods => Bye bye
* Validates inputs
*/
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach($_POST as $keys => $key_value){
        /* Check if value is not empty and not equal to NULL 
         Redirection to the same pasge with a message error*/
        if(empty($key_value) && isset($keys)){
            header("Location:index.html");
            echo "Tous les champs sont requis et ne doivent pas être vides";
        }
    }

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $subject = $_POST['subject'];

    /*Email sanitize and validate*/
    if($sanitizedAndValidateEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL)){
        $email = $sanitizedAndValidateEmail;
    }

    $phone  = $_POST['phone'];
    $msg = $_POST['msg'];
    
?>
    <div class="box-msg">
        <div class="positive-msg">
            <div class="success">
                <p>Merci <span><?php echo $firstname.' '.$lastname; ?></span> de nous avoir contacté à propos de <span><?php echo $subject;?></span>. </p>
                <p>Un de nos conseiller vous contactera soit à l'adresse <span><?php echo $email;?></span> ou par téléphone au <?php echo $phone;?> 
                    dans les plus brefs délais pour traiter votre demande : </p>
                <p> "<?php echo $msg;?>"</p>
                <p>Merci de votre confiance.</p>
                <p>Amadou de la Wild Code School.</p>
            </div>
        </div>
    </div>

<?php }; ?>
</body>
</html>
