<?php

class Database
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }
}
