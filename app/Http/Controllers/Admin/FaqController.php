<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MongoDB\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FaqRequest;

class FaqController extends Controller
{
  public function __construct(private Faq $faq){}
 
  public function index()
  {
    try{

      $filters = [
        'name' => 'like' 
      ];

      $query = $this->faq->newQuery();

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

      $faqs = $query
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString();
      if(request()->ajax()) {
          
        return response()->json([
          'table' => view('components.table.faq', ['records' => $faqs])->render(),
          'form' => view('components.form.faq', ['element' => $this->faq])->render()
        ], 200); 

      }else{

        $view = View::make('admin.faqs.index')
        ->with('records', $faqs)
        ->with('element', $this->faq);

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
          'form' => view('components.form.faq', ['element' => $this->faq])->render(),
        ], 200);
      }
    } catch (\Exception $e) {
      return response()->json([
          'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

   public function store(FaqRequest $request)
  {            
    try{

      $data = $request->validated();
      
      $this->faq->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $faqs = $this->faq
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }
      
      return response()->json([
        'table' => view('components.table.faq', ['records' => $faqs])->render(),
        'form' => view('components.form.faq', ['element' => $this->faq])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(Faq $faq)
  {
    try{
      return response()->json([
        'form' => view('components.form.faq', ['element' => $faq])->render(),
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(Faq $faq)
  {
    try{
      $faq->delete();

      $faqs = $this->faq
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      return response()->json([
        'table' => view('components.table.faq', ['records' => $faqs])->render(),
        'form' => view('components.form.faq', ['element' => $this->faq])->render(),
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