    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route; 

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ProductsController;

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');

    });

Route::controller(ProductsController::class)->group(function () {
    Route::get('Products', 'index');
    Route::post('Products', 'store');
    Route::get('Products/{id}', 'show');
    Route::put('Products/{id}', 'update');
    Route::delete('Products/{id}','destroy');
});
