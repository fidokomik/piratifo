jQuery('document').ready(function(){
     if(jQuery('#piratifo').length>0){
          piratifo_initTabs();
     }
});

function piratifo_loadBudget(){
     jQuery('#piratifo-content').load('/lib/exe/ajax.php',
          {
               call: 'piratifo_budget',
               id: JSINFO.id
          }, function(data){
               
          }
     );
}

function piratifo_loadAccount(){
     jQuery('#piratifo-content').load('/lib/exe/ajax.php',
          {
               call: 'piratifo_account',
               id: JSINFO.id
          }, function(data){
               
          }
     );
}

function piratifo_loadRequest(){
     jQuery('#piratifo-content').load('/lib/exe/ajax.php',
          {
               call: 'piratifo_request',
               id: JSINFO.id
          }, function(data){
               
          }
     );
}

function piratifo_loadInventory(){
     jQuery('#piratifo-content').load('/lib/exe/ajax.php',
          {
               call: 'piratifo_inventory',
               id: JSINFO.id
          }, function(data){
               
          }
     );
}

function piratifo_loadEconomic(){
     jQuery('#piratifo-content').load('/lib/exe/ajax.php',
          {
               call: 'piratifo_economic',
               id: JSINFO.id
          }, function(data){
               
          }
     );
}

// tabs
function piratifo_initTabs(){
     // events
     jQuery('#piratifo li[data-toggle="tab"]').click(function(e){
          e.preventDefault();
          var a = jQuery('a',jQuery(this));
          
          a.tab('show');
          jQuery(this).addClass('active');
          if(a.attr('href')=='#tab1') piratifo_loadBudget();
          if(a.attr('href')=='#tab2') piratifo_loadAccount();
          if(a.attr('href')=='#tab3') piratifo_loadRequest();
          if(a.attr('href')=='#tab4') piratifo_loadInventory();
          if(a.attr('href')=='#tab5') piratifo_loadEconomic();
          jQuery(location).attr('hash','loc:'+a.attr('href').replace('#',''));

          e.stopPropagation();
     });

     // url
     var hash = jQuery(location).attr('hash');
     if(hash=='#loc:tab1') jQuery('#piratifo .nav-tabs a[href="#tab1"]').tab('show');
     else if(hash=='#loc:tab2') jQuery('#piratifo .nav-tabs a[href="#tab2"]').tab('show');
     else if(hash=='#loc:tab3') jQuery('#piratifo .nav-tabs a[href="#tab3"]').tab('show');
     else if(hash=='#loc:tab4') jQuery('#piratifo .nav-tabs a[href="#tab4"]').tab('show');
     else if(hash=='#loc:tab5') jQuery('#piratifo .nav-tabs a[href="#tab5"]').tab('show');
     else jQuery('#piratifo .nav-tabs li:eq(1) a').tab('show');

}
