<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TagRequest;

class TagController extends Controller
{
  public function __construct(private Tag $tag){}
 
  public function index()
  {
    try{
      $records = $this->tag
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.tags.index')
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

  public function store(TagRequest $request)
  {  
    $data = $request->validated();

    $this->tag->updateOrCreate([
      'id' => $request->input('id')
    ], $data);

    return response()->json([
      'message' => $request->input('id') ? \Lang::get('admin/notification.updated') : \Lang::get('admin/notification.created'),
    ], 201);
  }

  public function edit(Tag $tag)
  {
    return response()->json([
      'element' => $tag,
    ], 200);
  }

  public function destroy(Tag $tag)
  {
    try{
      $tag->delete();
     
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