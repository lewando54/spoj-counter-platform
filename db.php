<?php 

class DB {
    private $mysql_con;

    function __construct($host, $username, $password, $db_name){
        $this->mysql_con = new mysqli($host, $username, $password, $db_name);
    }

    function __destruct(){
        $this->mysql_con->close();
    }

    function query($mysql_query_string){
        return $this->mysql_con->query($mysql_query_string);
    }
}

$spoj_db = new DB("localhost", "root", "", "rankingspoj");

function get_scores(){
    global $spoj_db;
    $result = $spoj_db->query("SELECT user, firstname, lastname, klasa, score FROM wyniki ORDER BY score DESC LIMIT 100");
    $licznik = 1;
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
            <td>$licznik.</td>
            <td><a href='http://pl.spoj.com/users/{$row['user']}'>{$row['user']}</a></td>
            <td>{$row['firstname']} {$row['lastname']}</td>
            <td>{$row['klasa']}</td>
            <td>{$row['score']}</td>
        </tr>
            ";
        $licznik = $licznik + 1;
    }
}

?>