<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Tower</title>
</head>
<body>
  <h1>Tower</h1>

  <?php
    include 'src/Tower.php';

    if (!isset($_COOKIE['floors'])) {
      $markup = '<form name ="tower" method="post" action="php/form.php">';
      $markup .= '<label for="floors">Enter the number of floors to build a tower.</label><br>';
      $markup .= '<input type="text" name="floors">';
      $markup .= '<input type="submit" value="Send">';
      $markup .= '</form>';
    }
    else {
      $floors = $_COOKIE['floors'];
      $tower = new Tower($floors);
      $markup = "<strong>This is a tower with $floors floors.";
      $markup .= '<pre>' . $tower->build();
      $markup .= '<a href="/" class="cta">Build another tower</a>';
      $markup .= '</pre>';
      delete_cookie('floors');
    }

    echo $markup;

    /**
     * Deletes cookie by name.
     */
    function delete_cookie($name) {
      unset($_COOKIE[$name]);
      // Empty value and old timestamp.
      setcookie($name, '', time() - 3600, '/');
    }

  ?>
</body>
</html>
