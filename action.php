<?php
/**
 *
 * Pirati: FO
 *
 * @author Vaclav Malek <vaclav.malek@pirati.cz>
 *
 */

if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');
require_once (DOKU_PLUGIN . 'action.php');
require_once(DOKU_PLUGIN.'piratifo/piratifo.class.php');

class action_plugin_piratifo extends DokuWiki_Action_Plugin
{

     private $piratifo = null;

     function init(){
          if(is_null($this->piratifo)) $this->piratifo = new Piratifo();
     }

     function register(&$controller){
        $controller->register_hook('AJAX_CALL_UNKNOWN', 'BEFORE', $this, 'ajax');
     }

     public function ajax(&$event, $param){
          global $ID;
          global $INFO;
          $ID = cleanID($_POST['id']);
          $INFO = pageinfo();
          $this->init();
          $this->piratifo->ajaxAction($event, $param);
     }
}
