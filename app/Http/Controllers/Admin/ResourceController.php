<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResourceRequest;

class ResourceController extends Controller
{
  public function __construct(private Resource $resource){}
 
  public function index()
  {
    try{
      $records = $this->resource
        ->with('tags')
        ->with('platforms')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.resources.index')
         ->with('records', $records);

      return $view;
    }
    catch(\Exception $e){
     
    }
  }

  public function create()
  {
   try {
      if (request()->ajax()) {
        return response()->json([
        ], 200);
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function store(ResourceRequest $request)
  {  
    try{

      $data = $request->validated();

      $this->resource->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      return response()->json([
        'message' => $request->input('id') ? \Lang::get('admin/notification.updated') : \Lang::get('admin/notification.created'),
      ], 201);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 422);
    }    
  }

  public function edit(Resource $resource)
  {
    return response()->json([
      'element' => $resource,
    ], 200);
  }

  public function destroy(Resource $resource)
  {
    try{
      $resource->delete();
     
      return response()->json([
        'message' => \Lang::get('admin/notification.deleted'),
      ], 200);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 500);
    }
  }
}