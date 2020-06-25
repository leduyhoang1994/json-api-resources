<?php

namespace App\Models\Sources;

use App\Models\Package;
use Eav\Attribute\Source;

class PackageSource extends Source
{
	public function getAllOptions()
	{
		$package = new Package();
		$options = $package->selectRaw('code as value, name as label, price')->get();
		return $options->toArray();
	}

	public function getOptionText($value)
	{
		$package = new Package();
		$option = $package->find($value);
		if (!$option) {
			return false;
		}
		return $option->name;
	}

	public function getOptionArray()
	{
		return $this->getAllOptions();
	}
}
