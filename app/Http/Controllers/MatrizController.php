<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Custom\Matriz;

class MatrizController extends Controller
{
      public function index()
      {
          // creation of a matrix
          $matrix = new Matriz([[1,2,3],[4,5,6],[7,8,9]]);
//          $matrix = new Matriz([[1,2],[3,4]]);
         // rotation and output
          $data = $matrix->rotateClockwise()->getData();
          return response()->json($data, 200);
      }

      public function matrix(Request $request) {
          $this->validate($request, [
              'data' => 'array',
              'data.*' => 'array',
              'data.*.*' => 'int'
          ]);
          $req = $request->data;
          $matrix = new Matriz($req);
          $dato = $matrix->rotateClockwise()->getData();
          return response()->json(
              $dato, 200
          );
      }


}
