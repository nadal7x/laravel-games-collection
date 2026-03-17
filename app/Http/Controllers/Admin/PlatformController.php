<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MySQL\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PlatformRequest;

class PlatformController extends Controller
{
  public function __construct(private Platform $platform){}
 
public function index()
  {
    try{

      $filters = [
        'name' => 'like' 
      ];

      $query = $this->platform->newQuery();

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

      $platforms = $query
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString();
      
      if(request()->ajax()) {
            
        return response()->json([
          'table' => view('components.table.platform', ['records' => $platforms])->render(),
          'form' => view('components.form.platform', ['element' => $this->platform])->render()
        ], 200); 

      }else{

        $view = View::make('admin.platforms.index')
        ->with('records', $platforms)
        ->with('element', $this->platform);

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
          'form' => view('components.form.platform', ['element' => $this->platform])->render(),
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

      $platforms = $this->platform
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }
      
      return response()->json([
        'table' => view('components.table.platform', ['records' => $platforms])->render(),
        'form' => view('components.form.platform', ['element' => $this->platform])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(Platform $platform)
  {
    try{
      return response()->json([
        'form' => view('components.form.platform', ['element' => $platform])->render(),
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(Platform $platform)
  {
    try{
      $platform->delete();

      $platforms = $this->platform
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      return response()->json([
        'table' => view('components.table.platform', ['records' => $platforms])->render(),
        'form' => view('components.form.platform', ['element' => $this->platform])->render(),
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