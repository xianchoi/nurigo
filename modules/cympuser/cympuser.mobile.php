<?php
require_once(_XE_PATH_ . 'modules/cympuser/cympuser.view.php');
class cympuserMobile extends cympuserView
{
	function init()
	{
		$config = self::getConfig();
		$template_path = sprintf("%sm.skins/%s/",$this->module_path, $config->mskin);
		if(!is_dir($template_path)||!$config->mskin)
		{
			$config->mskin = 'default';
			$template_path = sprintf("%sm.skins/%s/",$this->module_path, $config->mskin);
		}
		$this->setTemplatePath($template_path);
		$oLayoutModel = getModel('layout');
		$layout_info = $oLayoutModel->getLayout($config->mlayout_srl);
		if($layout_info)
		{
			$this->module_info->mlayout_srl = $config->mlayout_srl;
			$this->setLayoutPath($layout_info->path);
		}
	}
}