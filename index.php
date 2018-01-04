<?php defined( '_JEXEC' ) or die; 
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>"> 
  <head>  
    <jdoc:include type="head" />  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <?php if (!empty($google_site_verification)) { ?>    
    <meta name="google-site-verification" content="<?php $google_site_verification;?>">  
    <?php } ?>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />  
    <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">  
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">  
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">  
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png"> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->    
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->  
  </head>   
  <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">    
    <header>  
      <div class="container">    
        <?php if (!empty($logo)) { ?>                                                                   
        <div class="logo col-md-2 col-xs-4"> 
          <h1><a href="<?php echo $this->baseurl; ?>"><img src="<?php echo $this->params->get('logo'); ?>" alt="<?php echo $config->get('sitename'); ?>" /></a></h1>                                                                   
        </div>
        <?php } ?>                                                             
        <div class="navigation col-md-10 col-xs-8">                                                                        
          <?php if ($this->countModules('menu')): ?>               
          <nav class="navbar navbar-inverse">                                                                                  
            <div class="col-md-8 row">            
              <div class="navbar-header">                                                                                                                
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">              
                  <span class="icon-bar">
                  </span>              
                  <span class="icon-bar">
                  </span>              
                  <span class="icon-bar">
                  </span>              
                </button>                                                                                                 
              </div>                                                                                                 
              <div class="collapse navbar-collapse" id="navbar-main">                                                                                                                
                <jdoc:include type="modules" name="menu" />                                                                                                 
              </div>            	           	           
            </div>            
            <div class="col-md-4 row">          	
              <?php if ($this->countModules('login') or $this->countModules('search')) : ?>                                        		
              <?php echo positions(array('search' => 9,'login' => 3) , 'xhtml'); ?>                                                                      
              <?php endif; ?>           
            </div>                                                                                             
          </nav>                                                           
          <?php endif; ?>   	       
        </div>
         </div>
    </header> 
    <?php if ($this->countModules('slideshow')): ?>                                           
    <section class="slideshow col-md-12">                                                    
      <jdoc:include type="modules" name="slideshow" style="xhtml" />                                     
    </section>                                   
    <?php endif; ?>                                                                        
    <?php if ($this->countModules('top1') or $this->countModules('top2') or $this->countModules('top3')): ?>                                             
    <section class="top-a col-md-12">                                                                          
      <?php echo positions(array('top1' => 4,'top2' => 4,'top3' => 4 ) , 'block'); ?>                                                                  
    </section>                                                
    <?php endif; ?>                                     
    <?php if ($this->countModules('top4') or $this->countModules('top5') or $this->countModules('top6')): ?>                                               
    <section class="top-b col-md-12">                                                                          
      <?php echo positions(array('top4' => 4,'top5' => 4,'top6' => 4 ) , 'block'); ?>                                                                  
    </section>                                                
    <?php endif; ?>     
    <section class="component col-md-12">                                                    
      <div class="container">          
        <?php if ($this->countModules('breadcrumbs')): ?>                                            
        <div class="breadcrumbs col-md-12">                                                    
          <div class="container">        
            <div class="row">                                                                  
              <jdoc:include type="modules" name="breadcrumbs" style="xhtml" />                                                    
            </div>          
          </div>                                     
        </div>                                     
        <?php endif; ?>                                                                     
        <?php if ($this->countModules('left')): ?>                                                                          
        <div class="left col-md-<?php echo $col_side; ?> col-xs-12">                                                                                  
          <jdoc:include type="modules" name="left" style="xhtml" />                                                                   
        </div>                                                                   
        <?php endif; ?>                                                                          
        <div class="main_content col-md-<?php echo $col_middle; ?> col-xs-12">           
          <jdoc:include type="message" />                           
          <?php if ($this->countModules('inner-top1') or $this->countModules('inner-top2') or $this->countModules('inner-top3')): ?>                                                    
          <div class="inner-top col-md-12">                                                                                
            <?php echo positions(array('inner-top1' => 4,'inner-top2' => 4,'inner-top3' => 4 ) , 'xhtml'); ?>                                                                        
          </div>                                                      
          <?php endif; ?>                                                                                                                              
          <?php if ($this->countModules('breadcrumbs')): ?>                                                                                         
          <div class="breadcrumbs col-md-12">                                                                                                 
            <jdoc:include type="modules" name="breadcrumbs" style="none" />                                                                                  
          </div>                                                                                  
          <?php endif; ?>                                                                                         
          <jdoc:include type="component" />                           
          <?php if ($this->countModules('inner-bottom1') or $this->countModules('inner-bottom2') or $this->countModules('inner-bottom3')): ?>                                                    
          <div class="inner-bottom col-md-12">                                                                                
            <?php echo positions(array('inner-bottom1' => 4,'inner-bottom2' => 4,'inner-bottom3' => 4 ) , 'xhtml'); ?>                                                                        
          </div>                                                      
          <?php endif; ?>                                                                     
        </div>                                                                   
        <?php if ($this->countModules('right')): ?>                                                                          
        <div class="right col-md-<?php echo $col_side; ?> col-xs-12">                                                                                  
          <jdoc:include type="modules" name="right" style="xhtml" />                                                                   
        </div>                                                                   
        <?php endif; ?>                                                           
      </div>                                     
    </section>                                     
    <?php if ($this->countModules('bottom1') or $this->countModules('bottom2') or $this->countModules('bottom3')): ?>                                             
    <section class="bottom-a col-md-12">                                                                          
      <?php echo positions(array('bottom1' => 4,'bottom2' => 4,'bottom3' => 4 ) , 'block'); ?>                                                                  
    </section>                                                
    <?php endif; ?>                                     
    <?php if ($this->countModules('bottom4') or $this->countModules('bottom5') or $this->countModules('bottom6')): ?>                                               
    <section class="bottom-b col-md-12">                                                                          
      <?php echo positions(array('bottom4' => 4,'bottom5' => 4,'bottom6' => 4 ) , 'block'); ?>                                                                  
    </section>                                                
    <?php endif; ?>                     
    <footer class="footer">
      <div class="container">        
        <?php if ($this->countModules('inner-footer1') or $this->countModules('inner-footer2') or $this->countModules('inner-footer3')): ?>                                         	  
        <?php echo positions(array('inner-footer1' => 4,'inner-footer2' => 4,'inner-footer3' => 4 ) , 'xhtml'); ?>                                                                                                            
        <?php endif; ?>             
        <?php if ($this->countModules('icons')): ?>                                          	  
        <?php echo positions(array('icons' => 12 ) , 'xhtml'); ?>                                                                                                            
        <?php endif; ?>   
      </div>                                                                                   
    </footer>  
    <jdoc:include type="modules" name="debug" />    
<script>
jQuery(document).ready(function() {
getWidthAndHeight();
});
// make sure div stays full width/height on resize
jQuery(window).resize(function() {
getWidthAndHeight();
});
function getWidthAndHeight (){
var winWidth = jQuery(window).width();
var winHeight = jQuery(window).height();
jQuery('<?php echo $full_height_class;?>').css({'width': winWidth,'min-height': winHeight,'max-height': winHeight,});
}
    </script>
  </body>
</html>
