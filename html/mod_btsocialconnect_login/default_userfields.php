<?php
/**
 * @package 	bt_socialconnect - BT Social Connect Component
 * @version		1.0.0
 * @created		February 2014
 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2014 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
jimport( 'joomla.html.editor' );

?>
<?php

if (count($user_fields))
{
	foreach ($user_fields as $key => $el)
	{	
		if($el->required){		
		
			$title =' class="hasTip required" for="user_fields_'.$el->alias.'"';
			$required ='class="validate-'.$el->alias.'"  id="user_fields_'.$el->alias.'" aria-required="true" required="required"';
			$span ='<span class="star"> (*)</span>';
		}
		else{
			$title  ='';
			$required ='class="inputbox"';
			$span ='';
		}
		
?>
<div class="control-group btl-field field-<?php echo $el->alias ?>">
<div class="control-label btl-label"><label title="<?php echo strip_tags($el->description) ;?>" <?php echo $title;?>><?php echo Jtext::_($el->name); ?> <?php echo $span ;?> </label></div>
<div class="controls btl-input"> 	
	<?php Bt_SocialconnectHelper::loadFieldData($el,$required);   ?>
</div>
</div>
<?php

	}
}

?>
