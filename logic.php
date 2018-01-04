<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// generator tag
$this->setGenerator(null);

// template js
$doc->addScript($tpath.'/js/logic.js');

// bootstrap js
$doc->addScript($tpath.'/js/bootstrap.min.js');
$doc->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');

// template css
$doc->addStyleSheet($tpath.'/css/template.css.php');

//set of configurations to Joomla template positions
$config = JFactory::getConfig();
$col_side = $this->params->get('col_side');
$footer_side = $this->params->get('footer_side');
$full_height_class = $this->params->get('full_height_class');
$logo = $this->params->get('logo');
$google_site_verification = $this->params->get('google_site_verification');
$col_middle = '12';
if (($this->countModules('left')) and ($this->countModules('right')))
{
$col_middle = (12 - (2 * $col_side));
}
if ((($this->countModules('left')) and !($this->countModules('right')))   or (!($this->countModules('left')) and ($this->countModules('right')))   )
{
$col_middle = (12 - $col_side);
}


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
if (($value > 0) and ($countOfActivePositions == 2) and (count($position) > 2))
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
