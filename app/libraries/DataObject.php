<?php

class DataObject {

    //protected static $db = null;
    protected static $translator = DB_TRANSLATOR;
    protected static $dataTable = '';

    public function __construct() {

    }

    protected function create() {

    }

    protected function get() {

    }

    protected function getBy() {

    }

    protected function update() {

    }

    protected function delete() {

    }

    public function getDbTable() {
        return static::$dataTable;
    }

    public function getTranslator() {
        return static::$translator;
    }
}