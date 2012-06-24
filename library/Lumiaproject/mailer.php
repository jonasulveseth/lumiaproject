<?php
/**
 * Lumiastock
 *
 * @category   Lumiastock
 * @package    Lumiastock
 * @copyright  Copyright (c) 2010 Lumia AB (http://www.lumia.se)
 * @version    $Id$
 */

class Lumiaproject_Mailer
{
  public static function sendMail($from,$to,$subject,$body)
  {
    $mail = new Zend_Mail('UTF-8');
    $mail->setFrom('LumiaProject');
    $mail->addTo($to);
    $mail->setSubject($subject);
    $mail->setBodyText($body, 'UTF-8');
    $mail->send();
  }

}
