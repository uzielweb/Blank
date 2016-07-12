<?php defined( '_JEXEC' ) or die; 

include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
$config = JFactory::getConfig();
$col_side = $this->params->get('col_side');
$footer_side = $this->params->get('footer_side');
$col_middle = '12';
if (($this->countModules('left')) and ($this->countModules('right')))
{
$col_middle = (12 - (2 * $col_side));
}
if (($this->countModules('left')) or ($this->countModules('right')))
{
$col_middle = (12 - $col_side);
}
$doc = JFactory::getDocument();
$doc->addStyleSheet($this->baseurl . '/media/jui/css/icomoon.css');
?>
<?php
function positions($position, $style)
{
// Default width - for one column
// This gets new value, if there is more than one active position
// For Bootstrap use
if (JFactory::getDocument()->params->get('type_of_layout') == "bootstrap")
{
$width = 'col-md-12';
}
// For Custom width use
if (JFactory::getDocument()->params->get('type_of_layout') == "custom")
{
$width = "100";
}
// Number of positions, which have modules
$countOfActivePositions = 0;
// Positions to search modules in
// Loop over every position
$totalWidth = 0;
foreach($position as $name => $value)
{
// If position has modules
if (JFactory::getDocument()->countModules($name))
{
// Increase active positions count
$countOfActivePositions++;
$totalWidth = $totalWidth + $value;
}
}
if ($countOfActivePositions > 0)
{
// For Bootstrap with equal widths use
if ((JFactory::getDocument()->params->get('type_of_layout') == "bootstrap") and (JFactory::getDocument()->params->get('proportional_equal') == "equal"))
{
$width = "col-md-" . (12 / $countOfActivePositions);
}
// For Custom with equal widths use
if ((JFactory::getDocument()->params->get('type_of_layout') == "custom") and (JFactory::getDocument()->params->get('proportional_equal') == "equal"))
{
$width = (100 / $countOfActivePositions);
}
}
foreach($position as $name => $value)
{
if ($totalWidth < 100)
{
// For Bootstrap remove/comment the $width bellow
// For custom with equal widths add/uncomment the $width bellow
// For custom with proportional widths add/uncomment the $width bellow
if ((JFactory::getDocument()->params->get('type_of_layout') == "custom") and (JFactory::getDocument()->params->get('proportional_equal') == "proportional"))
{
$width = round($value * 100 / $totalWidth);
}
// For Bootstrap with proportional widths add/uncomment the $width bellow
// For Bootstrap with equal widths remove/comment the $width bellow
if ((JFactory::getDocument()->params->get('type_of_layout') == "bootstrap") and (JFactory::getDocument()->params->get('proportional_equal') == "proportional"))
{
$width = 'col-md-' . round($value * 12 / $totalWidth);
}
if ((JFactory::getDocument()->params->get('type_of_layout') == "custom") and (JFactory::getDocument()->params->get('proportional_equal') == "equal"))
{
// For Bootstrap with proportional widths remove/comment the IF bellow
// For Custom with with more then 1 position add/uncomment the IF bellow
if (($value > 0) and ($countOfActivaPositions == 2) and (count($position) > 2))
{
$width = 100 / 2;
}
// For Bootstrap with proportional widths remove/comment the IF bellow
// For Custom with with more then 1 position add/uncomment the IF bellow
if (($value > 0) and ($countOfActivePositions == 3) and (count($position) > 3))
{
$width = 100 / 3;
}
// For Bootstrap with proportional widths remove/comment the IF bellow
// For Custom with with more then 1 position add/uncomment the IF bellow
if (($value > 0) and ($countOfActivePositions == 4) and (count($position) > 4))
{
$width = 100 / 4;
}
}
}
if (JFactory::getDocument()->countModules($name))
{
// For Bootstrap use
if (JFactory::getDocument()->params->get('type_of_layout') == "bootstrap")
{
echo '<div class="' . $name . ' ' . $width . '"><jdoc:include type="modules" name="' . $name . '" style="' . $style . '" /></div>';
}
// For Custom Width use
if (JFactory::getDocument()->params->get('type_of_layout') == "custom")
{
echo '<div class="' . $name . ' ' . '" style="float:left; width:' . $width . '%"><jdoc:include type="modules" name="' . $name . '" style="' . $style . '" /></div>';
}
}
}
}
// For Bootstrap use the grid divisions by 12 in the width keys like this: 1,2,3,4,5,6,7,8,9,10,11
// Then use the code like this bellow
// echo positions(array('menu' => 4, 'login' => 6, 'nada' => 2), 'block');
// If You wish to use with equal widths FOREVER use the code like this bellow
// echo positions(array('menu', 'login', 'nada'), 'block');
// If You wish to use with custom percentages use the code like this bellow
// echo positions(array('menu' => 60, 'login' => 20, 'nada' => 20), 'block');
?>


<!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">
</head>
  
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">
  
<header>
<?php if ($this->countModules('menu')): ?>                                                          
        <div class="navigation col-md-10 col-xs-8">                                                                       
          <nav class="navbar navbar-inverse">                                                                                    
            <div class="navbar-header">                                                                                                 
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>                                                                                    
            </div>                                                                                    
            <div class="collapse navbar-collapse" id="navbar-main">                                                                                                 
              <jdoc:include type="modules" name="menu" />                                                                                    
            </div>                                                                       
          </nav>                                                          
        </div>  
<?php endif; ?> 
  
</header>
 <?php if ($this->countModules('slideshow')): ?>                                      
    <section class="slideshow col-md-12">                                             
      <jdoc:include type="modules" name="slideshow" style="xhtml" />                                
    </section>                                
  <?php endif; ?>                                        
                         
    <?php if ($this->countModules('top1') or $this->countModules('top2') or $this->countModules('top3')): ?>                                       
    <div class="top-a col-md-12">                                                                   
      <?php echo positions(array('top1' => 4,'top2' => 4,'top3' => 4 ) , 'block'); ?>                                                            
    </div>                                           
    <?php endif; ?>                               
    <?php if ($this->countModules('top4') or $this->countModules('top5') or $this->countModules('top6')): ?>                                         
    <div class="top-b col-md-12">                                                                   
      <?php echo positions(array('top4' => 4,'top5' => 4,'top6' => 4 ) , 'block'); ?>                                                            
    </div>                                           
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
          <?php if ($this->countModules('breadcrumb')): ?>                                                                             
          <div class="breadcrumb col-md-12">                                                                                    
            <jdoc:include type="modules" name="breadcrumb" style="none" />                                                                       
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
            
    <footer>
        <?php if ($this->countModules('inner-footer1') or $this->countModules('inner-footer2') or $this->countModules('inner-footer3')): ?>                                        
          <section class="inner-footer col-md-12">                                                                   
            <?php echo positions(array('inner-footer1' => 4,'inner-footer2' => 4,'inner-footer3' => 4 ) , 'xhtml'); ?>                                                            
          </section>                                           
        <?php endif; ?>  
    </footer>
  <jdoc:include type="modules" name="debug" />
</body>

</html>
