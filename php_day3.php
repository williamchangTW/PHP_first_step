<?php
// Day6: MYSQL
class DatabaseAccessObject
{
    private $mysql_address = "";
    private $mysql_username = "";
    private $mysql_password = "";
    private $mysql_database = "";
    private $link;
    private $last_sql = "";
    private $last_id = 0;
    private $last_num_rows = 0;
    private $error_message = "";
    public function __construct($mysql_address, $mysql_username, $mysql_password, $mysql_database)
    {
        $this->mysql_address = $mysql_address;
        $this->mysql_username = $mysql_username;
        $this->mysql_password = $mysql_password;
        $this->mysql_database = $mysql_database;

        $this->link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->mysql_address, $this->mysql_username, $this->mysql_password));

        if (mysqli_connect_errno())
        {
            $this->error_message = "Failed to connect ot MySQL: ".mysqli_connect_error();
            echo $this->error_message;
            return false;
        }
        mysqli_query($GLOBALS["___mysqli_ston"], "SET NAMES utf8");
        mysqli_query($this->link, "SET NAMES utf8");
        mysqli_query($this->link, "SET CHARACTER_SET_database= utf8");
        mysqli_query($this->link, "SET CHARACTER_SET_CLIENT= utf8");
        mysqli_query($this->link, "SET CHARACTER_SET_RESULTS= utf8");

        if (!(bool)mysqli_query($this->link, "USE ".$this->mysql_database))
            $this->error_message = 'Database '.$this->mysql_database.' do not exist!';
    }
    
    //release the links in construct when keyword "unset" is using in the code
    public function __destruct()
    {
        mysqli_close($this->link);
    }

    //execute the code style for MYSQL
    public function execute($sql = null)
    {
        if ($sql === null)
            return false;
        $this->last_sql = str_ireplace("DROP", "", $sql);
        $result_set = array();
        
        $result = mysqli_query($this->link, $this->last_sql);

        if (((is_object($this->link)) ? mysqli_error($this->link) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)))
        {
            $this->error_message = "MySQL ERROR: ".((is_object($this->link)) ? mysqli_error($this->link) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
        } else {
            $this->last_num_rows = @mysqli_num_rows($result);
            for ($xx = 0; $xx < @mysqli_num_rows($result); $xx++)
            {
                $result_set[$xx] = mysqli_fetch_assoc($result);
            }
            if (isset($result_set))
            {
                return $result_set;
            } else {
                $this->error_message = "result: zero";
            }
        }
    }

    // read data from database and return array
    public function query($table = null, $condition = "1", $order_by = "1", $fields = "*", $limit = "")
    {
        $sql = "SELECT {$fields} FROM {$table} WHERE {$condition} ORDER BY {$order_by} {$limit}";
        return $this->execute($sql);
    }

    // add new data to database, and store the last ID as variable, we can get this ID with getLastId()


    // update the database

    // delete from database

    // return the last MYSQL grammar
    public function getLastSQL()
    {
        return this->last_sql;
    }
    
    // this function is set the SQL brammer as private function
    private function setLastSQL($last_sql)
    {
        $this->last_sql = $last_sql;
    }

    //  get the last ID
    public function getLastID()
    {
        return $this->last_id;
    }
    
    // set the last ID
    private function setLastID($last_id)
    {
        $this->last_id = $last_id;
    }

    //get last numbre of rows
    public function getLastNumRows()
    {
        return $this->last_num_rows;
    }

    //set last number of rows
    private function setLastNumLows($last_num_rows)
    {
        $this->last_num_rows = $last_num_rows;
    }

    //get the error message
    public function getErrorMessage()
    {
        return $this->error_message;
    }
    
    //set the error message
    private function setErrorMessage($error_message)
    {
        $this->error_message = $derror_message;
    }
}


// Using object

