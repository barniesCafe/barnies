<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth2enticationController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test',function(){
   return response(([
         'Message'=>'api is working'
   ]),200);

});

Route::post('/register',[Auth2enticationController::class,'register']);

Route::post('/sanctum/token', function (Request $request) {
   
    $request->validate([
        'phone' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('phone', $request->phone)->first();
    
    if ($user==null){
       return null;
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});


Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user= $request->user();
    $user->tokens()->delete();
    return 'Tokens are Delete';
});