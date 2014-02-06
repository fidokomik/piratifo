<?php
/**
*
* Pirati: FO
* 
* @author      Vaclav Malek <vaclav.malek@pirati.cz>
*/

// must be run within DokuWiki
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');
require_once(DOKU_PLUGIN.'piratifo/piratifo.class.php');

/**
* All DokuWiki plugins to extend the parser/rendering mechanism
* need to inherit from this class
*/
class syntax_plugin_piratifo extends DokuWiki_Syntax_Plugin {

     private $started = false;

     function getType(){ return 'formatting'; }
     function getAllowedTypes(){ return array('formatting', 'substition', 'disabled'); }   
     function getSort(){ return 158; }
     function connectTo($mode){ $this->Lexer->addEntryPattern('<pirati_fo>(?=.*?</pirati_fo>)',$mode,'plugin_piratifo'); }
     function postConnect(){ $this->Lexer->addExitPattern('</pirati_fo>','plugin_piratifo'); }

     /**
      * Handle the match
      */
     function handle($match, $state, $pos, &$handler){
          switch ($state) {
               case DOKU_LEXER_ENTER: return array($state, $match);
               case DOKU_LEXER_UNMATCHED:
                    //$piratievent = new Piratievent();
                    //$data = $piratievent->getParsedData($match);
                    return array($state, $data);
               case DOKU_LEXER_EXIT: return array($state, '');
          }
          return array();
     }

     /**
      * Create output    
     */
     function render($mode, &$renderer, $data) {
          $renderer->info['cache'] = false;
          if($mode == 'xhtml'){
               list($state, $match) = $data;
               switch($state){
                    case DOKU_LEXER_ENTER:
                         $this->started = true;
                         break;
                    case DOKU_LEXER_UNMATCHED:
                         // only with content between tags
                         break;
                    case DOKU_LEXER_EXIT:
                         if($this->started){
                              //$piratievent = new Piratievent();
                              //$piratievent->renderEventsSyntax($renderer);
                              $piratifo = new Piratifo();
                              $piratifo->renderFoSyntax($renderer);
                         }
                         break;
               }
          }
     }
}

