<?php 

namespace App\Modules\Setting\Interfaces;

interface SettingInterface
{
	public function getAllSetting();
	public function addSetting($data);
	public function updateSetting($data);
}	
