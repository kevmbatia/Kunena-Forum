<?php
/**
 * @version $Id$
 * Kunena Component
 * @package Kunena
 *
 * @Copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

kimport ( 'kunena.view' );

/**
 * Users View
 */
class KunenaViewUsers extends KunenaView {
	function displayDefault($tpl = null) {
		$response = array();
		if ($this->me->exists()) {
			$users = $this->get ( 'Items' );
			foreach ($users as $user) {
				$response[] = $user->username;
			}
		}
		// Set the MIME type and header for JSON output.
		$this->document->setMimeEncoding( 'application/json' );
		JResponse::setHeader( 'Content-Disposition', 'attachment; filename="'.$this->getName().'.'.$this->getLayout().'.json"' );

		echo json_encode( $response );
	}
}