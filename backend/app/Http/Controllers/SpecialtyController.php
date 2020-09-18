<?php

namespace App\Http\Controllers;

use App\Repositories\SpecialtyRepository;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function list($id=null, SpecialtyRepository $specialtyRepository ){

        return msgJson( $specialtyRepository->list() );
    }
}
