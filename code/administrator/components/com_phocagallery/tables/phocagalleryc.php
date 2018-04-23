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
defined('_JEXEC') or die('Restricted access');
use Joomla\String\StringHelper;

class TablePhocaGalleryc extends TablePhocaGallerycDefault {
	public function check()
	{
		$result = parent::check();

		if ($result && false ) 
		{
			$isNew = empty($this->id) ? true : false;
			JPluginHelper::importPlugin( 'system' );
			$dispatcher = JEventDispatcher::getInstance();
			$dispatcher->trigger( 'onContentBeforSave', array('com_phocadownload.upload', $this, $isNew ) );
		}

		return $result;
	}

	public function store($updateNulls = false)
	{
		$isNew = empty($this->id) ? true : false;
dump('aaaaa');
exit;
		$result = parent::store($updateNulls);

        if ($return) 
		{
			dump($this, $return);

			$key       = 'uploadedImages';
			$namespace = 'NotificationAry.PhocaGalleryMultipleUpload';
	
			$session           = \JFactory::getSession();
			$uploadedImages = $session->get($key, [], $namespace);
			$uploadedImages[] = $this;
			$uploadedImages = $session->set($key, $uploadedImages, $namespace);
		}

		return $result;
	}
	
}
