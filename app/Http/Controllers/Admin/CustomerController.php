<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CustomerRequest;


class CustomerController extends Controller
{
  public function __construct(private Customer $customer){}
 
 public function index()
  {
    try{

      $customers = $this->customer
        ->orderBy('created_at', 'desc')
        ->paginate(10);
      
      if(request()->ajax()) {
            
        return response()->json([
          'table' => view('components.table.customer', ['records' => $customers])->render(),
          'form' => view('components.form.customer', ['element' => $this->customer])->render()
        ], 200); 

      }else{

        $view = View::make('admin.customers.index')
        ->with('records', $customers)
        ->with('element', $this->customer);

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
          'form' => view('components.form.customer', ['element' => $this->customer])->render(),
        ], 200);
      }
    } catch (\Exception $e) {
      return response()->json([
          'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function store(CustomerRequest $request)
  {            
    try{

      $data = $request->validated();

      unset($data['password_confirmation']);
      
      if (!$request->filled('password') && $request->filled('id')){
        unset($data['password']);
      }
  
      $this->customer->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $customers = $this->customer
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }
      
      return response()->json([
        'table' => view('components.table.customer', ['records' => $customers])->render(),
        'form' => view('components.form.customer', ['element' => $this->customer])->render(),
        'message' => $message,
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(Customer $customer)
  {
    try{
      return response()->json([
        'form' => view('components.form.customer', ['element' => $customer])->render(),
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(Customer $customer)
  {
    try{
      $customer->delete();

      $customers = $this->customer
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      return response()->json([
        'table' => view('components.table.customer', ['records' => $customers])->render(),
        'form' => view('components.form.customer', ['element' => $this->customer])->render(),
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