<?php

class Database extends PDO
{

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        try {
            parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * selectAll
     * @param string $sql An SQL string
     * @param array $params Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function selectAll($sql, $params = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        if (!empty($params)) {

            foreach ($params as $key => $value) {
                $sth->bindValue("$key", $value);
            }
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * selectOne
     * @param string $sql An SQL string
     * @param array $params Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function selectOne($sql, $params = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($params as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetch($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data, $return = false, $fetchmode = PDO::FETCH_ASSOC)
    {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();

        if ($return) {
            $result = parent::lastInsertId();
            return $result;
        }


    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where, $whereParams = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            if ($value != null) $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        foreach ($whereParams as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
        return $sth->rowCount();
    }
    /**
     * delete
     *
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $params = array(), $limit = 1)
    {
//        return
        $sth = $this->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
        foreach ($params as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        echo $sth->rowCount();
    }

    function getEnum($table, $field)
    {
        $query = $this->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'");
        $result = $query->fetchColumn(1);

        preg_match("/^enum\(\'(.*)\'\)$/", $result, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }

}