<?php
session_start();
/**connection info */
$host = 'localhost';
$dbname = 'web_prog';
$user = 'root';
$pass = 'mysql';
/**end connection info */

try {  
    # MySQL через PDO_MYSQL  
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
 }  
  catch(PDOException $e) {  
      echo $e->getMessage();  
  }

if( (isset($_GET['login'])) && (isset($_GET['pass'])) )
{
   
    $stmt = $db->prepare("SELECT * FROM users WHERE login=:login");
    $stmt->execute(['login' => $_GET['login']]); 
    $response = array_shift($stmt->fetchAll(PDO::FETCH_ASSOC));      


    if(empty($response)) echo 'bad login';

    if ($response['password'] == password_verify($_GET['pass'],$response['password']))
    {
        echo true;
        $_SESSION['name'] = $response['login'];
        header("Location: ".$_SERVER['HTTP_REFERER']);
        // print_r($response['password']); 
    }
    else
    {
        echo('invalid login or password');
    }
}
else
{
    echo('miss required parameteter login or password');
}

// $sql = "SELECT * FROM users WHERE login = ";
// $result = $db->query($sql);
// $users = $result->fetchAll(PDO::FETCH_ASSOC);

// if($_GET['pass'] == password_verify($_POST))

function dd ($value)
{
    echo "<pre>";
    print_r($value);
}
?>