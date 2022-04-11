<?php
use App\User;
use App\item;
use App\category;
use App\contacts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/



Auth::routes();


//============= Search =============//
 Route::get('/search', 'SearchController@searchitem')->name('search');



//=============  User =============//
Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/home', function(){
        if(Auth::user()->role_id ==1 ){
			$user = User::where('id',Auth::id())->first();
       
            return view('admin.home.homeContent', compact('user'));
        
        } else{
			
            return view('admin.home.homeContent');
        }
    });
});

Route::post('/museums', 'FrontController@chooseMuseum')->name('museums');

// Route::get('/home', 'HomeController@index');


Route::get('/','FrontController@index');

Route::get('/mainhome','MainHomeController@main');



Route::get('/staff', 'FrontController@staff');

Route::get('/item', 'FrontController@item');
// Route::get('view/{id}','FrontController@singleItem');
Route::get('/{id}','FrontController@singleItem')->where('id','[0-9]+');




Route::get('/item', 'FrontController@item');
Route::get('/introduction', 'FrontController@aboutIntro');

Route::get('/goals', 'FrontController@aboutGoal');


//============= Home.Contact =============
Route::get('/contact', 'FrontController@contact');

//============= Home.Gallery =============
Route::get('/gallery', 'GalleryController@gallery');
//============= Home.Exhibition =============
Route::get('/exhibition', 'FrontController@exhibitionIntro');

//============= Home.Museums =============
Route::get('/museums', 'FrontController@museums');





//============= Admin.Contact =============//
Route::get('/info2','ContactController@index');

Route::post('/newInfo2','ContactController@store');

Route::get('/contact/edit/{id}',[
	'uses' => 'ContactController@edit',
	'as'   => 'contact.edit'
]);

Route::post('/contact/update/{id}',[
	'uses' => 'ContactController@update',
	'as'   => 'contact.update'
]);

Route::get('/contact/delete/{id}',[
	'uses' => 'ContactController@destroy',
	'as'   => 'contact.delete'
]);





//============= Admin.Message =============
Route::post('/newMsg','MessageController@store');

Route::get('/showMsg','MessageController@index');

Route::get('/readMsg','MessageController@trashed');

Route::get('/msg/delete/{id}',[
	'uses' => 'MessageController@destroy',
	'as'   => 'msg.delete'
]);

Route::get('/msg/kill/{id}',[
	'uses' => 'MessageController@kill',
	'as'   => 'msg.kill'
]);




	//============= Admin.Project =============
	Route::get('/project/entry', 'ProjectController@index');
    Route::post('/project/entry', 'ProjectController@save');
    Route::get('/project/manage','ProjectController@manage');
	Route::get('/project/edit/{id}','ProjectController@edit');
	Route::post('/project/edit','ProjectController@update');
	Route::get('/project/delete/{id}','ProjectController@delete');

		//============= Admin.Site =============
		Route::get('/site/entry', 'SiteController@index');
		Route::post('/site/entry', 'SiteController@save');
		Route::get('/site/manage','SiteController@manage');
		Route::get('/site/edit/{id}','SiteController@edit');
		Route::post('/site/edit','SiteController@update');
		Route::get('/site/delete/{id}','SiteController@delete');

		//============= Admin.Project Expenses =============
	Route::get('/projectExpense/entry', 'ProjectExpenseController@index');
    Route::post('/projectExpense/entry', 'ProjectExpenseController@save');
    Route::get('/projectExpense/manage','ProjectExpenseController@manage');
	Route::get('/projectExpense/edit/{id}','ProjectExpenseController@edit');
	Route::post('/projectExpense/edit','ProjectExpenseController@update');
	Route::get('/projectExpense/delete/{id}','ProjectExpenseController@delete');
	Route::post('/projectExpense/manage','ProjectExpenseController@search');


		//============= Admin.Project Deposit =============
	Route::get('/projectDeposit/entry', 'ProjectDepositController@index');
    Route::post('/projectDeposit/entry', 'ProjectDepositController@save');
    Route::get('/projectDeposit/manage','ProjectDepositController@manage');
	Route::get('/projectDeposit/edit/{id}','ProjectDepositController@edit');
	Route::post('/projectDeposit/edit','ProjectDepositController@update');
	Route::get('/projectDeposit/delete/{id}','ProjectDepositController@delete');
	Route::post('/projectDeposit/manage','ProjectDepositController@search');

	
		//============= Admin.Employee =============
	Route::get('/employee/entry', 'EmployeeController@index');
    Route::post('/employee/entry', 'EmployeeController@save');
    Route::get('/employee/manage','EmployeeController@manage');
	Route::get('/employee/edit/{id}','EmployeeController@edit');
	Route::post('/employee/edit','EmployeeController@update');
	Route::get('/employee/delete/{id}','EmployeeController@delete');

	
		//============= Admin.Salary =============
	Route::get('/salary/entry', 'SalaryController@index');
    Route::post('/salary/entry', 'SalaryController@save');
    Route::get('/salary/manage','SalaryController@manage');
	Route::get('/salary/edit/{id}','SalaryController@edit');
	Route::post('/salary/edit','SalaryController@update');
	Route::get('/salary/delete/{id}','SalaryController@delete');
	Route::post('/salary/manage','SalaryController@search');

			//============= Admin.Company Supliers =============
	Route::get('/companysuppliers/entry', 'CompanySuppliersController@index');
    Route::post('/companysuppliers/entry', 'CompanySuppliersController@save');
    Route::get('/companysuppliers/manage','CompanySuppliersController@manage');
	Route::get('/companysuppliers/edit/{id}','CompanySuppliersController@edit');
	Route::post('/companysuppliers/edit','CompanySuppliersController@update');
	Route::get('/companysuppliers/delete/{id}','CompanySuppliersController@delete');

	
		//============= Admin.Supliers =============
	Route::get('/suppliers/entry', 'SuppliersController@index');
    Route::post('/suppliers/entry', 'SuppliersController@save');
    Route::get('/suppliers/manage','SuppliersController@manage');
	Route::get('/suppliers/edit/{id}','SuppliersController@edit');
	Route::post('/suppliers/edit','SuppliersController@update');
	Route::get('/suppliers/delete/{id}','SuppliersController@delete');
	Route::post('/suppliers/manage','SuppliersController@search');


			//============= Admin.Supliers Due =============
	Route::get('/suppliersDue/entry', 'SuppliersDueController@index');
    Route::post('/suppliersDue/entry', 'SuppliersDueController@save');
    Route::get('/suppliersDue/manage','SuppliersDueController@manage');
	Route::get('/suppliersDue/edit/{id}','SuppliersDueController@edit');
	Route::post('/suppliersDue/edit','SuppliersDueController@update');
	Route::get('/suppliersDue/delete/{id}','SuppliersDueController@delete');
	
			//============= Admin.Supliers Payment =============
	Route::get('/suppliersPayment/entry', 'SuppliersPaymentController@index');
    Route::post('/suppliersPayment/entry', 'SuppliersPaymentController@save');
    Route::get('/suppliersPayment/manage','SuppliersPaymentController@manage');
	Route::get('/suppliersPayment/edit/{id}','SuppliersPaymentController@edit');
	Route::post('/suppliersPayment/edit','SuppliersPaymentController@update');
	Route::get('/suppliersPayment/delete/{id}','SuppliersPaymentController@delete');
    Route::post('/suppliersPayment/manage','SuppliersPaymentController@search');

				//============= Admin.Stock =============
	Route::get('/stock/entry', 'StockController@index');
    Route::post('/stock/entry', 'StockController@save');
    Route::get('/stock/manage','StockController@manage');
	Route::get('/stock/edit/{id}','StockController@edit');
	Route::post('/stock/edit','StockController@update');
	Route::get('/stock/delete/{id}','StockController@delete');

		    //============= Admin.Stock Transfer =============
	Route::get('/stockTransfer/entry', 'StockTransferController@index');
    Route::post('stockTransfer/entry', 'StockTransferController@save');
    Route::get('/stockTransfer/manage','StockTransferController@manage');
	Route::get('/stockTransfer/edit/{id}','StockTransferController@edit');
	Route::post('/stockTransfer/edit','StockTransferController@update');
	Route::get('/stockTransfer/delete/{id}','StockTransferController@delete');
	Route::post('/stockTransfer/manage','StockTransferController@search');


				//============= Admin.Office Expenses =============
	Route::get('/officeExpense/entry', 'OfficeExpenseController@index');
    Route::post('/officeExpense/entry', 'OfficeExpenseController@save');
    Route::get('/officeExpense/manage','OfficeExpenseController@manage');
	Route::get('/officeExpense/edit/{id}','OfficeExpenseController@edit');
	Route::post('/officeExpense/edit','OfficeExpenseController@update');
	Route::get('/officeExpense/delete/{id}','OfficeExpenseController@delete');
	Route::post('/officeExpense/manage','OfficeExpenseController@search');




	//============= Admin.About =============
	Route::get('/about/entry', 'AboutController@index');
    Route::post('/about/entry', 'AboutController@save');
    Route::get('/about/manage','AboutController@manage');
	Route::get('/about/edit/{id}','AboutController@edit');
	Route::post('/about/edit','AboutController@update');
	Route::get('/about/delete/{id}','AboutController@delete');

	
	//themecontrol
	Route::get('/theme/manage','ThemeController@manage');
	Route::get('/theme/color/edit/{id}','ThemeController@color');
	Route::post('/theme/color/edit','ThemeController@savecolor');
	Route::get('/theme/logo/edit/{id}','ThemeController@logo');
	Route::post('/theme/logo/edit','ThemeController@savelogo');
	Route::get('/theme/font/edit/{id}','ThemeController@font');
	Route::post('/theme/font/edit','ThemeController@savefont');
	Route::get('/theme/image/edit/{id}','ThemeController@image');
	Route::post('/theme/image/edit','ThemeController@saveimage');
	Route::get('/theme/textcolor/edit/{id}','ThemeController@textcolor');
	Route::post('/theme/textcolor/edit','ThemeController@savetextcolor');
	Route::get('/theme/footimage/edit/{id}','ThemeController@footimage');
	Route::post('/theme/footimage/edit','ThemeController@savefootimage');
	Route::get('/theme/mapimage/edit/{id}','ThemeController@mapimage');
	Route::post('/theme/mapimage/edit','ThemeController@savemapimage');
	Route::get('/theme/colablink/edit/{id}','ThemeController@colablink');
	Route::post('/theme/colablink/edit','ThemeController@savecolablink');




	//============= Admin.Exhibition =============
	Route::get('/exhi/entry', 'ExhibitionController@index');
    Route::post('/exhi/entry', 'ExhibitionController@save');
    Route::get('/exhi/manage','ExhibitionController@manage');
	Route::get('/exhi/edit/{id}','ExhibitionController@edit');
	Route::post('/exhi/edit','ExhibitionController@update');
	Route::get('/exhi/delete/{id}','ExhibitionController@delete');


	//============= Admin.Category =============
	Route::get('/category/save','CategoryController@index');
	Route::post('/category/save','CategoryController@save');
	Route::get('/category/manage','CategoryController@manage');
	Route::get('/category/edit/{id}','CategoryController@edit');
	Route::post('/category/edit','CategoryController@update');
	Route::get('/category/delete/{id}','CategoryController@delete');

	//============= Admin.Item =============
	Route::get('/item/entry','ItemController@index');
	Route::post('/item/entry','ItemController@save');
	Route::get('/item/manage','ItemController@manage');
	Route::get('/item/view/{id}','ItemController@singleItem');
	Route::get('/item/edit/{id}','ItemController@editItem');
	Route::post('/item/edit','ItemController@updateItem');
	Route::get('/item/delete/{id}','ItemController@deleteItem');


	//============= Admin.Staff =============
	Route::get('/staff/entry','StaffController@index');
	Route::post('/staff/entry','StaffController@save');
	Route::get('/staff/manage','StaffController@manage');
	Route::get('/staff/view/{id}','StaffController@singleStaff');
	Route::get('/staff/edit/{id}','StaffController@editStaff');
	Route::post('/staff/edit','StaffController@updateStaff');
	Route::get('/staff/delete/{id}','StaffController@deleteStaff');


