<?php

if(!defined('DOKU_INC')) die('no DOKU_INC defined!');
if(!defined('DOKU_TPL')) die('no DOKU_TPL defined!');
if(!defined('DOKU_PLUGIN')) die('no DOKU_PLUGIN defined');

include('database.class.php');
include('template.class.php');

class Piratifo {

     // system
     private $lang = array();
     private $conf = array();
     
     //
     private $db = null;
     private $template = null;
     private $helper = null;

     function __construct(){
          global $conf;
          
          // plugin lang
          $path = DOKU_PLUGIN.'piratifo/lang/';
          $lang = array();
          @include($path.'en/lang.php');
          if ($conf['lang'] != 'en') @include($path.$conf['lang'].'/lang.php');
          $this->lang = $lang;

          // plugin conf
          $path = DOKU_PLUGIN.'piratifo/conf/';
          $cnf = array();
          if(@file_exists($path.'default.php')){
               include($path.'default.php');
          }
          $this->conf = $conf;

          //
          //if($this->isAuth()) $this->settings = $this->getDb()->getSettings($this->getUserGaid());
     }

     /***** ACTIONS *****/

     /*
     public function getEvents(){
          $events = $this->getDb()->getEvents();
     }
     */
     public function ajaxAction(&$event, $param){
          if(auth_quickaclcheck($this->getHelper()->getID()) < AUTH_READ) return false;
          $event->preventDefault();
          //$event->stopPropagation();
          switch($event->data){
               case 'piratifo_budget': $this->ajaxActionBudget(); break;
               case 'piratifo_account': $this->ajaxActionAccount(); break;
               case 'piratifo_request': $this->ajaxActionRequest(); break;
               case 'piratifo_inventory': $this->ajaxActionInventory(); break;
               case 'piratifo_economic': $this->ajaxActionEconomic(); break;
          }
     }

     public function ajaxActionBudget(){
          $template = $this->getTemplate();
          $template->renderBudget();
     }

     public function ajaxActionAccount(){
          $template = $this->getTemplate();
          $template->renderAccount();
     }

     public function ajaxActionRequest(){
          $template = $this->getTemplate();
          $template->renderRequest();
     }

     public function ajaxActionInventory(){
          $template = $this->getTemplate();
          $template->renderInventory();
     }

     public function ajaxActionEconomic(){
          $template = $this->getTemplate();
          $template->renderEconomic();
     }

     /***** SYNTAX *****/
     public function renderFoSyntax($renderer){ 
          $template = $this->getTemplate($renderer);
          $template->renderFoSyntax();
     }

     /***** HELPERS *****/

     // other classes
     public function getDb(){
          if(!is_null($this->db)) return $this->db;
          $this->db = new PiratifoDatabase($this);
          return $this->db;
     }
  
     public function getTemplate($renderer = null){
          if(!is_null($this->template)) return $this->template;
          $this->template = new PiratifoTemplate($this);
          $this->template->setRenderer($renderer);
          return $this->template;
     }

     public function getHelper(){
          if(!is_null($this->helper)) return $this->helper;
          $this->helper = plugin_load('helper','piratihelper');
          return $this->helper;
     }

     // globals
     public function getLang($string){
          return $this->lang[$string];
     }
     public function getConf($string){
          return $this->conf[$string];
     }

     /**** ****/
     public function getEconomics(){
          return $this->getDb()->getEconomics();
     }
}
