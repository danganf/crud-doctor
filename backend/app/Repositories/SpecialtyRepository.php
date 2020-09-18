<?php

namespace App\Repositories;

use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\Repositories\Contracts\RepositoryAbstract;

class SpecialtyRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct( __CLASS__ );
    }
    
    public function list(){
        return $this->getModel()->selectRaw('id, name')->orderByRaw('name')->get()->toArray();
    }

    public function createOrUpdate(JsonAbstract $json, $id=null)
    {        
        return false;
    }
}
