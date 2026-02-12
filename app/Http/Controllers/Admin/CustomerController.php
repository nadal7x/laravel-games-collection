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
      $records = $this->customer
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.customers.index')
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

      return response()->json([
        'message' => 'Usuario creado correctamente',
      ], 201);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 422);
    }    
  }

  public function edit(Customer $customer)
  {
    return response()->json([
      'element' => $customer,
    ], 200);
  }

  public function destroy(Customer $customer)
  {
    try{
      $customer->delete();
     
      return response()->json([
        'message' => 'Usuario eliminado correctamente',
      ], 200);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 500);
    }
  }
}