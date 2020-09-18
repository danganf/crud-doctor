<?php

namespace App\Http\Controllers;

use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function list($id=null, Request $request, DoctorRepository $doctorRepository ){

        return msgJson( 
            empty($id) 
            ? $doctorRepository->list($request->get('q')) 
            : $doctorRepository->setFields('id, name, crm, phone, created_at')->setWhere("id=".(int)$id)->first() 
        );
    }
    
    public function create( $id=null, Request $request, DoctorRepository $doctorRepository ){
        $doctorRepository->createOrUpdate( $request->get('json'), $id );
        if( !$doctorRepository->getMsgError() ){
            return msgSuccessJson('OK');
        }
        return msgErroJson($doctorRepository->getMsgError());
    }

    public function delete( $id, DoctorRepository $doctorRepository ){
        $result = $doctorRepository->delete($id);
        if( $result ){
            return msgSuccessJson('OK');
        }
        return msgErroJson(\Lang::get('default.action_error'));
    }
}
