<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PlatformRequest;

class PlatformController extends Controller
{
  public function __construct(private Platform $platform){}
 
  public function index()
  {
    try{
      $records = $this->platform
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.platforms.index')
         ->with('records', $records)
         ->with('element', null);

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

  public function store(PlatformRequest $request)
  {  
    try{

     $data = $request->validated();

      $this->platform->updateOrCreate([
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

  public function edit(Platform $platform)
  {
    return response()->json([
      'element' => $platform,
    ], 200);
  }

  public function destroy(Platform $platform)
  {
    try{
      $platform->delete();
     
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