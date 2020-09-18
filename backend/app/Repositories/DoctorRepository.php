<?php

namespace App\Repositories;

use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\Repositories\Contracts\RepositoryAbstract;

class DoctorRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct( __CLASS__ );
    }
    
    public function list(){
        return $this->getModel()
                    ->selectRaw('id, name, crm, phone, created_at')
                    ->orderByRaw('id desc')
                    ->get()->toArray();
    }

    public function createOrUpdate(JsonAbstract $json, $id=null)
    {        
        if( !empty( $id ) ){
            $this->find((int)$id);
            if($this->fails()){
                $this->setMsgError( \Lang::get('default.register_not_exist') );
                return false;
            }        
        }
        
        $this->set('name', $json->get('name'));
        $this->set('crm', $json->get('crm'));
        $this->set('phone', $json->get('phone'));

        try{
            $this->save();              
            return $this->toArray();
        } catch ( \Exception $e ){
            $this->setMsgError( $e->getMessage() );
        }

        return false;

    }
}
