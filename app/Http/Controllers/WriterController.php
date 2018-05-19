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
use App\Models\Response;
use Illuminate\Http\Response as HttpResponse;

class WriterController extends Controller
{

    public function showAllWriters()
    {
        $all = Response::make(Writer::all());
        return response()->json($all);
    }

    public function showOneWriter($id)
    {
        $one = Response::make(Writer::findOrFail($id));
        return response()->json($one);
    }

    public function create(Request $request)
    {
        $new = Writer::create($request->all(), HttpResponse::HTTP_CREATED);
        $new = Response::make($new);

        return response()->json($new);
    }

    public function update($id, Request $request)
    {
        $writer = Writer::findOrFail($id);
        $writer->update($request->all());
        $updatedWriter = Response::make(Writer::findOrFail($id));

        return response()->json($updatedWriter);
    }

    public function delete($id)
    {
        Writer::findOrFail($id)->delete();
        $response = Response::make('Deleted successfully');
        return response($response);
    }
}