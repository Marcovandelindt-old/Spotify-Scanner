<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model 
{
	protected $table      = 'settings';
    protected $primaryKey = 'setting_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'value'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /** 
     * Get a setting by name
     *
     * @param  string $name
     *
     * @return mixed object|false
     */
    public function getByName($name)
    {
    	$database = \Config\Database::connect();
    	$builder  = $database->table($this->table);
    	$query 	  = $builder->getWhere(['name' => $name]);
    	$result	  = $query->getRow();

		if (!empty($result)) {
			return $result;
		}    	

		return false;
    }
}