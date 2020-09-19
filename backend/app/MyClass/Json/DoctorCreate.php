<?php

namespace App\MyClass\Json;

use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\MyClass\Json\Contracts\JsonInterface;
use DanganfTools\MyClass\Validator;

class DoctorCreate extends JsonAbstract implements JsonInterface
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function set( $stringJson ) {
        $this->setReturnPadrao();
        $this->setJson( json_decode( $stringJson ) );
        $this->validRequiredFields($this->toArray());
        \Request::merge( [ 'json' => $this ] );
        $this->validator = null;
    }

    public function validRequiredFields( $array ) {
        $this->trataDados();
        $array  = $this->toArray();
        $fields = [ 'name', 'crm', 'phone', 'specialtys' ];

        $this->validator->setRule('specialtys','required|array');
        $this->validator->setMessage('specialtys.array','Especialidade precisa ser um array');

        if ( !$this->validator->valid( $array, $fields ) ) {
            $this->error( $this->validator->error() );
        }

        $this->create('phone', only_number( $this->get('phone') ) );

        return TRUE;
    }

    private function trataDados() {
        $this->get('phone');
        if( $this->get('phone') ){
            $this->create('phone', only_number( $this->get('phone') ) );
        }
    }
}
