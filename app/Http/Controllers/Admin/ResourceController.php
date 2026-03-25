<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MongoDB\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResourceRequest;
use App\Services\SitemapService;
use Illuminate\Support\Str;
use App\Events\ResourceStored;

class ResourceController extends Controller
{
  public function __construct(private Resource $resource, private SitemapService $sitemapService){}
 
  public function index()
  {
    try{

      $filters = [
        'name' => 'like',
        'release_date' => 'date',
        'developer' => 'like',
        'publisher' => 'like',
        'rating' => '='   
      ];

      $query = $this->resource->newQuery();

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

      $resources = $query
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString();
      
      if(request()->ajax()) {
            
        return response()->json([
          'table' => view('components.table.resource', ['records' => $resources])->render(),
          'form' => view('components.form.resource', ['element' => $this->resource])->render(),
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

      $data['_id'] = $request->input('id');
      unset($data['images']);

      $resource = $this->resource->updateOrCreate([
        '_id' => $request->input('id')
      ], $data);

      ResourceStored::dispatch(
        $resource, 
        $request->filled('images')
          ? $request->input('images')
          : []
      );

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

      $this->sitemapService->deleteSlug(
        'resources',
        $resource->id
      );

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