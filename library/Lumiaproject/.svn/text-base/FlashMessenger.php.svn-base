<?php
/*
 * Utvecklad för Magellan AS
 */

class Lumiaproject_FlashMessenger extends Zend_View_Helper_Abstract
{
	public static function flashMessenger()
	{
             
		$messages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->getMessages();

		$output = '';

		// If there are no messages, don't bother with this whole process.
		if (count($messages) > 0)
		{

			$output .= '<div class="messages"><ul>';
			foreach ($messages as $message) {
				$output .= '<li>'. $message .'</li>';
			}
			$output .= '</ul></div>';
		}

		// Return the final HTML string to use.
		return $output;
	}

}
