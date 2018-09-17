<?php  

namespace App\Modules\setting\Repository;
use App\Modules\setting\Interfaces\SettingInterface;
use App\Modules\setting\Entities\Setting;

class SettingRepository implements SettingInterface
{

private $settingmodel;
public function __construct(Setting $settingModel)
{
	$this->settingmodel = $settingModel;
}

public function getAllSetting()
{
	
}

public function addSetting($data)
{
	try {
		$result = $this->settingmodel->create($data);
	}
	catch (\Throwable $t) {
            print_r($t->getMessage());
        }
	
	return $result;
}

public function updateSetting($data)
{
	try {
		
		// $info['description'] = $data['description'];
		$result = $this->settingmodel->where('type','system_name')->first();
		$result->description = $data['description'];	
		$result->save();
	
	}
	catch(\Throwable $t){
		print_r($t->getMessage());
	}
	return $result;
}


}