<?php

class mysql {

    protected $connection;
    protected $hostname;
    protected $database;
    protected $username;
    protected $password;
    public $db_prefix;

    function __construct($dbhost = null, $dbname = null, $dbuser = null, $dbpass = null, $db_prefix = null) {
        $this->database = $dbname;
        $this->hostname = $dbhost;
        $this->username = $dbuser;
        $this->password = $dbpass;
        $this->db_prefix = $db_prefix;
    }
    public function open() {
        if (is_null($this->database))
            die("MySQL database not selected");
        if (is_null($this->hostname))
            die("MySQL hostname not set");
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password);
        if ($this->connection === false)
            die("Could not connect to database. Check your username and password then try again.\n");
        if (!mysqli_select_db($this->connection,$this->database))
            die("Could not select database");
    }

    public function close() {
        mysqli_close($this->connection);
        $this->connection = null;
    }

    public function affectedRows() {
        return mysqli_affected_rows($this->connection);
    }

    public function insertId() {
        return mysqli_insert_id($this->connection);
    }

    public function numRows($result) {
        return mysqli_num_rows($result);
    }

    public function insert($sql) {
        if ($this->connection === false) {
            die('No Database Connection Found.');
        }
        $result = mysqli_query($this->connection,$sql);
        if ($result === false) {
            die(mysqli_error());
        }
    }

    public function query($sql) {
        if ($this->connection === false) {
            die('No Database Connection Found.');
        }
        $result = mysqli_query($this->connection,$sql);
        if ($result === false) {
            die(mysqli_error($this->connection));
        }
        return $result;
    }

    public function fetchArray($result) {
        if ($this->connection === false) {
            die('No Database Connection Found.');
        }
        $i = 0;
        $temp = array();
        while ($data = mysqli_fetch_array($result)) {
            $temp[$i] = $data;
            $i++;
        }
        if (!is_array($temp)) {
            die(mysqli_error());
        }
        return $temp;
    }
    function selectQuery($sql) {
        $this->open();
        $results = $this->fetchArray($this->query($sql));
        $this->close();
        return $results;
    }

    function insertQuery($sql) {
        $this->open();
        $this->query($sql);
        $primary_key = $this->insertId();
        $this->close();
        return $primary_key;
    }

    function executeQuery($sql) {
        $this->open();
        $this->query($sql);
        $results = $this->affectedRows();
        $this->close();
        return $results;
    }

    public function filter_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlspecialchars_decode($data);
        $data = mysqli_real_escape_string($this->connection,$data);
        return $data;
    }

    public function filter_protect_mysql($data) {
        $data = mysqli_real_escape_string($this->connection,$data);
        return $data;
    }

    public function secure_select($select_query, $condition = '', $values = array()) {
        $results = array();
        $this->open();
        $sql = $select_query;
        if (!empty($condition) && count($values) > 0) {
            foreach ($values as $key => $value) {
                $condition = str_replace($key, $this->filter_input($value), $condition);
            }
            $sql.= $condition;
        }
        if (!empty($sql)) {
            $results = $this->fetchArray($this->query($sql));
        }
        return $results;
        $this->close();
    }

    public function secure_insert($table, $values) {
        $this->open();
        $primary_key = 0;
        $sql = '';
        $sql_column = '';
        $sql_value = '';
        $column = array_keys($values);
        for ($i = 0; $i < count($column); $i++) {
            if (!empty($sql_column))
                $sql_column.=', ';
            $sql_column.='`' . $column[$i] . '`';

            $value = $values[$column[$i]];
            $value_validate = 'Y';
            if (is_array($value)) {
                if (count($value) > 1)
                    $value_validate = $value[1];
                $value = $value[0];
            }
            if (!empty($sql_value))
                $sql_value.=', ';

            if ($value_validate == 'Y' || $value_validate == 'y' || $value_validate == 1 || $value_validate === true) {
                $sql_value.="'" . $this->filter_input($value) . "'";
            } else if ($value_validate == 'protected' || $value_validate == 'p' || $value_validate == 'P') {
                $sql_value.="'" . $this->filter_protect_mysql($value) . "'";
            } else {
                $sql_value.="'" . $value . "'";
            }
        }
        if (!empty($sql_column) && !empty($sql_value)) {
            $sql = "INSERT INTO `$table`($sql_column) VALUES ($sql_value)";
        }
        if (!empty($sql)) {
            $this->query($sql);
            $primary_key = $this->insertId();
        }
        $this->close();
        return $primary_key;
    }

    function secure_update($table, $values, $condition) {
        $results = 0;
        $this->open();
        $sql_value = '';
        foreach ($values as $column => $value) {
            $value_validate = 'Y';
            if (is_array($value)) {
                if (count($value) > 1)
                    $value_validate = $value[1];
                $value = $value[0];
            }
            if (!empty($sql_value))
                $sql_value.=', ';
            if ($value_validate == 'protected' || $value_validate == 'p' || $value_validate == 'P')
                $sql_value.=" $column = '" . $this->filter_protect_mysql($value) . "'";
            else if ($value_validate == 'Y' || $value_validate == 'y' || $value_validate == 1 || $value_validate == true)
                $sql_value.=" $column = '" . $this->filter_input($value) . "'";
            else
                $sql_value.=" $column = '" . $value . "'";
        }
        if (!empty($sql_value)) {
            $this->query("UPDATE $table SET $sql_value $condition");
            $results = $this->affectedRows();
        }
        $this->close();
        return $results;
    }

}
$db = new mysql("localhost", "wps", "root", "", "sm_");


/*$con = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/

//$db = new mysql("devspm.db.10526058.hostedresource.com", "devspm", "devspm", "Dev123!@#", "sm_");
//error_reporting(0);

?>