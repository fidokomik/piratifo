<?php

class PiratifoTemplate {

     private $piratifo = null;
     private $renderer = null;

     public function __construct($piratifo){
          $this->piratifo = $piratifo;
     }

     public function setRenderer($renderer){
          $this->renderer = $renderer;
     }

     /*public function renderNewEvent(){
          $piratievent = $this->piratievent;
          include('templates/newevent.php');
     }
      */
     public function renderFoSyntax(){
          $piratifo = $this->piratifo;
          ob_start();
          include('templates/fo.php');
          $this->renderer->doc .= ob_get_clean();
     }
     
     public function renderBudget(){
          $piratifo = $this->piratifo;
          include('templates/budget.php');
     }

     public function renderAccount(){
          $piratifo = $this->piratifo;
          include('templates/account.php');
     }

     public function renderRequest(){
          $piratifo = $this->piratifo;
          include('templates/request.php');
     }

     public function renderInventory(){
          $piratifo = $this->piratifo;
          include('templates/inventory.php');
     }

     public function renderEconomic(){
          $piratifo = $this->piratifo;
          include('templates/economic.php');
     }
}
