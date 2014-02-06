<?php

class PiratifoDatabase {
     
     private $piratifo = null;
     private $db = null;

     public function __construct($piratifo){
          $this->piratifo = $piratifo;
     }

     public function getDbPath(){
          @mkdir(DOKU_INC.'data/piratifo',0710,true); 
          return DOKU_INC.'data/piratifo/'.$this->piratifo->getConf('dbfo');
     }

     public function getDb(){
          if(!is_null($this->db)) return $this->db;
          $this->db = new SQLite3($this->getDbPath());
          $this->db->busyTimeout(5000);
          $this->createTables();
          return $this->db;
     }

     public function closeDb(){
          //$this->db->close();
          //$this->db = null;
     }

     public function getLastId(){
          $lastid = $this->getDb()->lastInsertRowID();
          //$this->closeDb();
          return $lastid;
     }

     public function createTables(){
          // tables?
          // economics
          $table = $this->db->querySingle('SELECT name FROM sqlite_master WHERE name="economic"');
          if(is_null($table)){
               $this->db->exec('CREATE TABLE economic (id INTEGER PRIMARY KEY AUTOINCREMENT, group_gaid VARCHAR(50) UNIQUE NOT NULL, group_name VARCHAR(100) NOT NULL, econom_gaid VARCHAR(50) NOT NULL, econom VARCHAR(100) NOT NULL)');
               //$this->db->exec('CREATE UNIQUE INDEX u_group_gaid ON economic(group_gaid)');
          }
     }

     public function getEconomics(){
          $this->getDb();
          return array();
     }
}
