    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ClientControlller;
    use App\Http\Controllers\PermessionsController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */



    Route::get('/categories', [CategoryController::class, 'list_categories'])->name('categories');
    Route::get('/products', [ProductController::class, 'list_products'])->name('products');
    Route::get('/roles', [RoleController::class, 'show_roles'])->name('roles');
    Route::post('/addRole', [RoleController::class, 'add_roles'])->name('addRole');
    Route::get('/deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('deleteRole{id}');
    Route::get('/editRole/{id}', [RoleController::class, 'editRole'])->name('editRole{id}');
    Route::post('/updaterole', [RoleController::class, 'update_role'])->name('updaterole');
    ////////////
    // Route::get('/permessions', [PermessionsController::class, 'show_permessions'])->name('permessions');
    // Route::post('/addPermession', [PermessionsController::class, 'addPermessions'])->name('addPermession');
    // Route::get('/deletePermession/{id}', [PermessionsController::class, 'deletePermessions'])->name('deletePermession');
    // Route::get('/editPermession/{id}', [PermessionsController::class, 'editPermessions'])->name('editPermession');
    // Route::post('/updatePermession', [PermessionsController::class, 'updatePermessions'])->name('updatePermession');
    ///////
    // Route::middleware(['check-permission:gestionnaireClient'])->get('/clients', [ClientControlller::class, 'list_clients']);;
   
  
    Route::get('/users', [UserController::class, 'show_users'])->name('users');
    Route::post('/addUser', [UserController::class, 'addUsers'])->name('addUser');
    Route::get('/deleteUser/{id}', [UserController::class, 'deleteUsers'])->name('deleteUser/{id}');
    Route::get('/editUser/{id}', [UserController::class, 'editUsers'])->name('editUser/{id}');
    Route::post('/updateUser', [UserController::class, 'updateUsers'])->name('updateUser');
      
    Route::post('/addcategory', [CategoryController::class, 'create_category'])->name('addcategory');
    Route::post('/updateCategory', [CategoryController::class, 'update_category'])->name('updateCategory');
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete_category'])->name('deletecategory/{id}');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit_category'])->name('editcategory/{id}');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit_product'])->name('editproduct/{id}');
    Route::post('/updateproducts', [ProductController::class, 'update_product'])->name('updateproducts');
    Route::post('/addproducts', [ProductController::class, 'add_product'])->name('addproducts');
    Route::get('/deleteproduct/{id}', [ProductController::class, 'delete_product'])->name('deleteproduct/{id}');
    Route::get('/clients', [ClientControlller::class, 'list_clients'])->name('clients');;
    Route::post('/addclients', [ClientControlller::class, 'add_client'])->name('addclients');
    Route::get('/deleteclient/{id}', [ClientControlller::class, 'delete_client'])->name('deleteclient/{id}');
    Route::get('/editclient/{id}', [ClientControlller::class, 'edit_client'])->name('editclient/{id}');
    Route::post('/updateclients/{id}', [ClientControlller::class, 'update_client'])->name('updateclients/{id}');
    Route::get('/allproducts', [ProductController::class, 'allproducts']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/registerpost', [AuthController::class, 'registerPost']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/forgetpassword', [AuthController::class, 'forgetpassword']);
    Route::post('/resetpasswordPost', [AuthController::class, 'sendemail']);
    Route::post('/newpasswordPost', [AuthController::class, 'addpassword']);

    Route::get('/resetwithemail/{token}', [AuthController::class, 'reset'])->name('resetwithemail');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
    Route::get('/search', [ProductController::class, 'search']);







