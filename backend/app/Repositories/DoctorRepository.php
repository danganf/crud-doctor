<?php

namespace App\Repositories;

use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\Repositories\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;

class DoctorRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct( __CLASS__ );
    }
    
    public function list($search=null){
        $querie = $this->getModel()
                    ->selectRaw('id, name, crm, phone, created_at')
                    ->orderByRaw('id desc');

        if( $search ){
            $querie->whereRaw("name like '%$search%' or crm like '%$search%'");
        }

        return $querie->get()->toArray();
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

        $return = [];
        
        $this->set('name', $json->get('name'));
        $this->set('crm', $json->get('crm'));
        $this->set('phone', $json->get('phone'));

        $items = [];

        //PEGANDO TOTAL DE ESPECIALIDADES ENVIADAS QUE EXISTEM NO BANCO
        $totalSpecialty = count( $this->getModel()->specialtys()->getRelated()
                                    ->whereIn('id', $json->get('specialtys') )
                                    ->select('id')->get()->toArray() );

        if( count($json->get('specialtys')) == $totalSpecialty ){

            DB::beginTransaction();
            try{
                $this->save();
                $this->getModel()->specialtys()->sync($json->get('specialtys'));   
                $return = $this->toArray();
            } catch ( \Exception $e ){
                DB::rollback();
                $this->setMsgError( $e->getMessage() );
            }
            DB::commit();

        } else {
            $this->setMsgError(\Lang::get('default.specialty_not_found'));
        }

        return !$this->getMsgError() ? $return : false;

    }
}
