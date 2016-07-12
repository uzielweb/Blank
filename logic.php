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
