<?php
/**
 *
 * @SWG\Get(
 *   path="doctor",
 *   summary="List Doctor",
 *   operationId="doctor-list",
 *   tags={"Doctor"},
 *   @SWG\Parameter(in="query",name="q",description="Filter by name or crm",type="string"),
 *   @SWG\Response(response=200, description="successful operation")
 * )
 * 
 * @SWG\Post(
 *   path="doctor",
 *   summary="Created Doctor",
 *   operationId="doctor-create",
 *   tags={"Doctor"},
 *   @SWG\Parameter(in="body",name="body",description="",required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="name", type="string", example="Fulano dos santos"),
 *          @SWG\Property(property="crm", type="string", example="5040-RJ"),
 *          @SWG\Property(property="phone", type="string", example="21981692318"),
 *          @SWG\Property(property="specialtys", type="array", @SWG\Items(
 *                      type="integer"
 *                  )),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. Register created and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 * 
 * @SWG\Put(
 *   path="doctor/{id}",
 *   summary="Updated Doctor",
 *   operationId="doctor-update",
 *   tags={"Doctor"},
 *   @SWG\Parameter(in="path", name="id", description="Doctor id", type="integer", required=true ),
 *   @SWG\Parameter(in="body",name="body",description="",required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="name", type="string", example="Fulano dos santos"),
 *          @SWG\Property(property="crm", type="string", example="5040-RJ"),
 *          @SWG\Property(property="phone", type="string", example="21981692318"),
 *          @SWG\Property(property="specialtys", type="array", @SWG\Items(
 *                      type="integer"
 *                  )),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. Register updated and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 * 
 * @SWG\Delete(
 *   path="doctor/{id}",
 *   summary="Delete Doctor",
 *   operationId="doctor-del",
 *   tags={"Doctor"},
 *   @SWG\Parameter(in="path", name="id", description="Doctor id", type="integer", required=true ),
 *   @SWG\Response(response=200, description="successful operation")
 * )
 * 
 */
