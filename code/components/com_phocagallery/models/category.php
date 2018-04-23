<?php
/*
 * @package		Joomla.Framework
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
defined('_JEXEC') or die();

class PhocagalleryModelCategory extends PhocagalleryModelCategoryDefault
{
	function store($data, $return)
	{
		$return = parent::store($data, $return);

		if ($return && false ) 
		{
			dump($return, '$return');
			dump($data, $return);

			$key       = 'uploadedImages';
			$namespace = 'NotificationAry.PhocaGalleryMultipleUpload';
	
			$session           = \JFactory::getSession();
			$uploadedImages = $session->get($key, [], $namespace);
			$uploadedImages[] = $data;
			$uploadedImages = $session->set($key, $uploadedImages, $namespace);
		}

		return $return;
	}
}
