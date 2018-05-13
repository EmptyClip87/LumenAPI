<?php
/**
 * Created by PhpStorm.
 * User: empty
 * Date: 5/13/2018
 * Time: 02:18
 */

namespace App\Http\Controllers;

use App\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{

    public function showAllWriters()
    {
        return response()->json(Writer::all());
    }

    public function showOneWriter($id)
    {
        return response()->json(Writer::find($id));
    }

    public function create(Request $request)
    {
        $Writer = Writer::create($request->all());

        return response()->json($Writer, 201);
    }

    public function update($id, Request $request)
    {
        $Writer = Writer::findOrFail($id);
        $Writer->update($request->all());

        return response()->json($Writer, 200);
    }

    public function delete($id)
    {
        Writer::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}