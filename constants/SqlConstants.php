<?php
/**
 * Created by PhpStorm.
 * User: kristjanl
 * Date: 07.10.2018
 * Time: 13:08
 */

class SqlConstants
{
    const SAVE_NEW_ENTRY_QUERY = "INSERT INTO Data (code, Longitude, Latitude) VALUES (?, ?, ?)";
    const EMPTY_DATABASE_TABLE = "DELETE * FROM Data";
    const GET_SINGLE_DATA_QUERY = "SELECT Latitude, Longitude FROM Data WHERE code=?";
}