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

      $resources = $this->resource
        ->orderBy('created_at', 'desc')
        ->paginate(10);
      
      if(request()->ajax()) {
            
        return response()->json([
          'table' => view('components.table.resource', ['records' => $resources])->render(),
          'form' => view('components.form.resource', ['element' => $this->resource])->render()
        ], 200); 

      }else{

        $view = View::make('admin.resources.index')
        ->with('records', $resources)
        ->with('element', $this->resource);

        return $view;
      }
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function create()
  {
    try {
      if (request()->ajax()) {
        return response()->json([
          'form' => view('components.form.resource', ['element' => $this->resource])->render(),
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

      $resources = $this->resource
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }
      
      return response()->json([
        'table' => view('components.table.resource', ['records' => $resources])->render(),
        'form' => view('components.form.resource', ['element' => $this->resource])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(Resource $resource)
  {
    try{
      return response()->json([
        'form' => view('components.form.resource', ['element' => $resource])->render(),
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(Resource $resource)
  {
    try{
      $resource->delete();

      $resources = $this->resource
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      return response()->json([
        'table' => view('components.table.resource', ['records' => $resources])->render(),
        'form' => view('components.form.resource', ['element' => $this->resource])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }
}