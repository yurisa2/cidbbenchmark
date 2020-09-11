<?php namespace App\Models;

use CodeIgniter\Model;

class ResultsModel extends Model
{
    protected $table      = 'test_results';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['id',
                              	'runStart',
                              	'runEnd',
                              	'runDuration',
                              	'itemAvg',
                              	'itemMax',
                              	'itemMin',
                              	'idMax',
                              	'idMin'];



    public function genericSave($data) {
        return $this->save($data);
    }

}






?>
