<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MySQL\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TagRequest;

class TagController extends Controller
{
  public function __construct(private Tag $tag){}
 
  public function index()
  {
    try{

      $filters = [
        'name' => 'like' 
      ];

      $query = $this->tag->newQuery();

      foreach ($filters as $field => $type) {
        $value = request($field);

        if ($value === null || $value === '') {
          continue;
        }

        match ($type) {
          'like' => $query->where($field, 'like', '%' . $value . '%'),
          '='    => $query->where($field, $value),
          'date' => $query->whereDate($field, $value),
          default => null,
        };
      }

      $tags = $query
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString();
      if(request()->ajax()) {
          
        return response()->json([
          'table' => view('components.table.tag', ['records' => $tags])->render(),
          'form' => view('components.form.tag', ['element' => $this->tag])->render()
        ], 200); 

      }else{

        $view = View::make('admin.tags.index')
        ->with('records', $tags)
        ->with('element', $this->tag);

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
          'form' => view('components.form.tag', ['element' => $this->tag])->render(),
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
    try{

      $data = $request->validated();
      
      $this->tag->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $tags = $this->tag
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }
      
      return response()->json([
        'table' => view('components.table.tag', ['records' => $tags])->render(),
        'form' => view('components.form.tag', ['element' => $this->tag])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(Tag $tag)
  {
    try{
      return response()->json([
        'form' => view('components.form.tag', ['element' => $tag])->render(),
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(Tag $tag)
  {
    try{
      $tag->delete();

      $tags = $this->tag
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      return response()->json([
        'table' => view('components.table.tag', ['records' => $tags])->render(),
        'form' => view('components.form.tag', ['element' => $this->tag])->render(),
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