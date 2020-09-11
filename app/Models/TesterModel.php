<?php namespace App\Models;

use CodeIgniter\Model;

class TesterModel extends Model
{
    protected $table      = 'test_table';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [  'test1',
                              	  'test2',
                              	  'test3',
                              	  'test4',
                              	  'test5',
                              	  'created_at',
                              	  'updated_at',
                              	  'deleted_at' ];


    public function genericSave($data) {
        return $this->insert($data);
    }

}






?>
