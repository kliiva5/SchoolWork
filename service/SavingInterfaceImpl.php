<?php
/**
 * Created by PhpStorm.
 * User: kristjanl
 * Date: 07.10.2018
 * Time: 13:05
 */

require("../constants/SqlConstants.php");
require("../configuration/Configuration.php");

class SavingInterfaceImpl implements SavingInteface
{

    public function empty()
    {
        $dbConnection = $this->createConnection();

        $dbConnection->query(SqlConstants::EMPTY_DATABASE_TABLE );

        $dbConnection->close();
    }

    public function save($code, $lat, $lang)
    {
        $dbConnection = $this->createConnection();

        $stmt = $dbConnection->prepare(SqlConstants::SAVE_NEW_ENTRY_QUERY );
        $stmt->bind_param("sii", $code, $lat, $lang );

        $stmt->execute();
        $stmt->close();

        $dbConnection->close();
    }

    public function read($code)
    {
        $result = [];

        $dbConnection = $this->createConnection();

        $stmt = $dbConnection->prepare( SqlConstants::GET_SINGLE_DATA_QUERY );
        $stmt->bind_param("s", $code);
        $stmt->bind_result( $lat, $long);

        $stmt->execute();

        while($stmt->fetch())
        {
            array_push($result, $lat);
            array_push($result, $long);
        }

        $stmt->close();
        $dbConnection->close();

        return $result;
    }

    private function createConnection()
    {
        return new mysqli(Configuration::databaseHost, Configuration::databaseUser,
            Configuration::databasePassword, Configuration::databaseName, Configuration::databasePort );
    }
}