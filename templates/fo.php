<?php
// $events = $this->piratievent->getEvents();

?>
<div id="piratifo" class="tabbale">
     <ul class="nav nav-tabs">
          <li data-toggle="tab"><a href="#tab1"><i class="icon-book"></i> Rozpočet<?php //echo $this->piratievent->getLang('newevent'); ?></a></li>
          <li data-toggle="tab" class="active"><a href="#tab2"><i class="icon-tasks"></i> Účty<?php //echo $this->piratievent->getLang('events'); ?></a></li>
          <li data-toggle="tab"><a href="#tab3"><i class="icon-inbox"></i> Žádosti o proplacení<?php //echo $this->piratievent->getLang('newevent'); ?></a></li>
          <li data-toggle="tab"><a href="#tab4"><i class="icon-cog"></i> Soupis věcí<?php //echo $this->piratievent->getLang('newevent'); ?></a></li>
          <li data-toggle="tab" class="pull-right"><a href="#tab5"><i class="icon-user"></i> Seznam hospodářů<?php //echo $this->piratievent->getLang('newevent'); ?></a></li>
     </ul>

     <div id="piratifo-content" class="tab-content">
          <!-- tab1 -->
          <div class="tab-pane" id="tab1"></div>
          
          <!-- tab2 -->
          <div class="tab-pane active" id="tab2"></div>
     </div>
</div>

