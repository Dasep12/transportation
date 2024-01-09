<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CarsCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CasetasController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\CosServiceController;
use App\Http\Controllers\Customers\BookingController;
use App\Http\Controllers\Customers\PaymentController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\OrdenPagoController;
use App\Http\Controllers\PrevedorController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\ReportesCarController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\RouteTravelController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UsersController;
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


Route::group(['prefix' => "dashboard", 'middleware' => 'isLoginSession'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/graphicQuotes', [DashboardController::class, 'graphicQuotes']);
    Route::post('/quotesServiceInfo', [DashboardController::class, 'quotesServiceInfo']);
    Route::post('/earningsQuotesMonths', [DashboardController::class, 'earningsQuotesMonths']);
    Route::post('/cotizaciones', [DashboardController::class, 'cotizaciones']);
    Route::post('/car_utility', [DashboardController::class, 'car_utility']);
    Route::post('/serviceList', [DashboardController::class, 'serviceList']);

    Route::post('/solicitud', [DashboardController::class, 'solicitud']);
});

Route::get('/tes',  [DashboardController::class, 'test']);

// login
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// /
Route::get('/index', [DashboardController::class, 'index']);


Route::prefix("users")->group(function () {
    Route::get('/',  [UsersController::class, 'index']);
    Route::get('/form_add',  [UsersController::class, 'formAdd']);
});

// Transportation

Route::group(['prefix' => "drivers", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [DriversController::class, 'index']);
    Route::get('/form_add',  [DriversController::class, 'formAdd']);
    Route::post('/added',  [DriversController::class, 'added']);
    Route::get('/delete',  [DriversController::class, 'delete']);
    Route::get('/changeStatus',  [DriversController::class, 'changeStatus']);
    Route::get('/edited',  [DriversController::class, 'formedited']);
    Route::post('/updated',  [DriversController::class, 'updated']);
    Route::post('/deleteAll',  [DriversController::class, 'deleteAll']);
});


Route::group(['prefix' => "cars", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [CarsController::class, 'index']);
    Route::get('/form_add',  [CarsController::class, 'formAdd']);
    Route::post('/added',  [CarsController::class, 'added']);
    Route::get('/edited',  [CarsController::class, 'formedited']);
    Route::post('/updated',  [CarsController::class, 'updated']);
    Route::post('/deleteAll',  [CarsController::class, 'deleteAll']);
    Route::get('/delete',  [CarsController::class, 'delete']);
    Route::get('/gallery',  [CarsController::class, 'gallery']);
    Route::post('/uploadGallery',  [CarsController::class, 'uploadGallery']);
    Route::post('/ajaxGallery',  [CarsController::class, 'ajaxGallery']);
    Route::get('/deleteGallery',  [CarsController::class, 'deleteGallery']);
});

Route::group(['prefix' => "cars_category", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [CarsCategoryController::class, 'index']);
    Route::get('/form_add',  [CarsCategoryController::class, 'formAdd']);
    Route::post('/added',  [CarsCategoryController::class, 'added']);
    Route::get('/edited',  [CarsCategoryController::class, 'formedited']);
    Route::post('/updated',  [CarsCategoryController::class, 'updated']);
    Route::post('/deleteAll',  [CarsCategoryController::class, 'deleteAll']);
    Route::get('/delete',  [CarsCategoryController::class, 'delete']);
});


Route::group(['prefix' => "routes_travel", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [RouteTravelController::class, 'index']);
    Route::get('/form_add',  [RouteTravelController::class, 'formAdd']);
    Route::post('/added',  [RouteTravelController::class, 'added']);
    Route::get('/delete',  [RouteTravelController::class, 'delete']);
    Route::get('/edited',  [RouteTravelController::class, 'formedited']);
    Route::post('/updated',  [RouteTravelController::class, 'updated']);
    Route::post('/deleteAll',  [RouteTravelController::class, 'deleteAll']);

    Route::post('/getListCasetas',  [RouteTravelController::class, 'getListCasetas']);
});

Route::group(['prefix' => "casetas_route", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [CasetasController::class, 'index']);
    Route::get('/form_add',  [CasetasController::class, 'formAdd']);
    Route::post('/added',  [CasetasController::class, 'added']);
    Route::get('/edited',  [CasetasController::class, 'formedited']);
    Route::post('/updated',  [CasetasController::class, 'updated']);
    Route::post('/deleteAll',  [CasetasController::class, 'deleteAll']);
    Route::get('/delete',  [CasetasController::class, 'delete']);
});


Route::group(['prefix' => "costperservice", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [CosServiceController::class, 'index']);
    Route::get('/form_add',  [CosServiceController::class, 'formAdd']);
    Route::post('/added',  [CosServiceController::class, 'added']);
    Route::get('/edited',  [CosServiceController::class, 'formedited']);
    Route::post('/updated',  [CosServiceController::class, 'updated']);
    Route::get('/delete',  [CosServiceController::class, 'delete']);
    Route::post('/deleteAll',  [CosServiceController::class, 'deleteAll']);
    Route::get('/details',  [CosServiceController::class, 'details']);
    Route::get('/email',  [CosServiceController::class, 'sendMail']);
    Route::post('/getListCars',  [CosServiceController::class, 'getListCars']);
    Route::post('/addedNewRoutes',  [CosServiceController::class, 'addedNewRoutes']);

    Route::post('/casetasSummarize', [CosServiceController::class, 'casetasSummarize']);
    Route::post('/checkCarAvailable', [CosServiceController::class, 'checkCarAvailable']);
});


Route::group(['prefix' => "quotes", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [QuotesController::class, 'index']);
    Route::get('/form_add',  [QuotesController::class, 'formAdd']);
    Route::post('/added',  [QuotesController::class, 'added']);
    Route::get('/edited',  [QuotesController::class, 'formedited']);
    Route::get('/mail_template',  [QuotesController::class, 'mail_template']);
    Route::post('/updated',  [QuotesController::class, 'updated']);
    Route::post('/payment',  [QuotesController::class, 'paymentQuotes']);
    Route::post('/showPayment',  [QuotesController::class, 'showPayment']);
    Route::get('/pdfReport',  [QuotesController::class, 'pdfReport']);
    Route::get('/getQuotes',  [QuotesController::class, 'getQuotes']);
    Route::get('/delete',  [QuotesController::class, 'delete']);
    Route::get('/deletepayment',  [QuotesController::class, 'deletepayment']);
    Route::post('/deleteAll',  [QuotesController::class, 'deleteAll']);


    Route::post('/updateInvoice',  [QuotesController::class, 'updateInvoice']);
    Route::post('/showInvoice',  [QuotesController::class, 'showInvoice']);
    Route::get('/deleteInvoice',  [QuotesController::class, 'deleteInvoice']);


    Route::get('/tesmail',  [QuotesController::class, 'tesmail']);
});


Route::get('/pdfQuotes', [QuotesController::class, 'pdfReport']);
Route::get('/notifEmail',  [QuotesController::class, 'infoApprove']);
Route::get('/approve',  [QuotesController::class, 'approve']);
Route::get('/tesMail',  [QuotesController::class, 'tesmail']);


Route::group(['prefix' => "services", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [ServicesController::class, 'index']);
    Route::get('/form_add',  [ServicesController::class, 'formAdd']);
    Route::post('/added',  [ServicesController::class, 'added']);
    Route::get('/edited',  [ServicesController::class, 'formEdit']);
    Route::post('/updated',  [ServicesController::class, 'updated']);
    Route::get('/deleted',  [ServicesController::class, 'delete']);
    Route::post('/deleteAll',  [ServicesController::class, 'deleteAll']);
    Route::get('/getServices',  [ServicesController::class, 'showServices']);
    Route::post('/loadAnticipo',  [ServicesController::class, 'showAnticipo']);
    Route::post('/updateAnticipo',  [ServicesController::class, 'updateAnticipo']);
    Route::post('/updateNotas',  [ServicesController::class, 'updateNotas']);
    Route::get('/serviceFile',  [ServicesController::class, 'serviceFile']);
    Route::post('/serviceuploadFiles',  [ServicesController::class, 'serviceuploadFiles']);
    Route::post('/ajaxFiles',  [ServicesController::class, 'ajaxFiles']);
    Route::get('/deleteFiles',  [ServicesController::class, 'deleteFiles']);
    Route::get('/gastosPdf',  [ServicesController::class, 'pdfReportGastos']);
    Route::get('/contractPdf',  [ServicesController::class, 'pdfReportContracto']);
});



// 


// Gastos
Route::group(['prefix' => "prevedor", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [PrevedorController::class, 'index']);
    Route::get('/form_add',  [PrevedorController::class, 'formAdd']);
    Route::post('/addedd',  [PrevedorController::class, 'addedd']);
    Route::get('/edited',  [PrevedorController::class, 'formedited']);
    Route::post('/updated',  [PrevedorController::class, 'updated']);
    Route::get('/delete',  [PrevedorController::class, 'delete']);
    Route::post('/deleteAll',  [PrevedorController::class, 'deleteAll']);
});



Route::group(['prefix' => "empresas", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [EmpresasController::class, 'index']);
    Route::get('/form_add',  [EmpresasController::class, 'formAdd']);
    Route::post('/addedd',  [EmpresasController::class, 'addedd']);
    Route::get('/edited',  [EmpresasController::class, 'formedited']);
    Route::post('/updated',  [EmpresasController::class, 'updated']);
    Route::get('/delete',  [EmpresasController::class, 'delete']);
    Route::post('/deleteAll',  [EmpresasController::class, 'deleteAll']);
});




Route::group(['prefix' => "ordendepago", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [OrdenPagoController::class, 'index']);
    Route::get('/form_add',  [OrdenPagoController::class, 'formAdd']);
    Route::post('/addedd',  [OrdenPagoController::class, 'addedd']);
    Route::get('/edited',  [OrdenPagoController::class, 'formedited']);
    Route::get('/view',  [OrdenPagoController::class, 'formView']);
    Route::post('/updated',  [OrdenPagoController::class, 'updated']);
    Route::get('/delete',  [OrdenPagoController::class, 'delete']);
    Route::post('/deleteAll',  [OrdenPagoController::class, 'deleteAll']);
    Route::get('/getOrden',  [OrdenPagoController::class, 'getOrden']);
    Route::get('/pdfReport',  [OrdenPagoController::class, 'pdfReport']);
    Route::get('/sendingMail',  [OrdenPagoController::class, 'sendingMail']);
    Route::get('/formApprove',  [OrdenPagoController::class, 'formApprove']);
    Route::post('/updateStatus',  [OrdenPagoController::class, 'updateStatus']);
    Route::get('/resendMail',  [OrdenPagoController::class, 'resendMail']);
});

Route::group(['prefix' => "reportes", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [ReportesController::class, 'index']);
    Route::post('/ordenempressaAll',  [ReportesController::class, 'ordenempressaAll']);
    Route::post('/ordenPrevedoraAll',  [ReportesController::class, 'ordenPrevedoraAll']);
    Route::post('/ordenConceptoaAll',  [ReportesController::class, 'ordenConceptoaAll']);
    Route::post('/ordenSolicitanteaAll',  [ReportesController::class, 'ordenSolicitanteaAll']);
});


Route::group(['prefix' => "concepto", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [ConceptoController::class, 'index']);
    Route::get('/form_add',  [ConceptoController::class, 'formAdd']);
    Route::post('/addedd',  [ConceptoController::class, 'addedd']);
    Route::get('/edited',  [ConceptoController::class, 'formedited']);
    Route::post('/updated',  [ConceptoController::class, 'updated']);
    Route::get('/delete',  [ConceptoController::class, 'delete']);
    Route::post('/deleteAll',  [ConceptoController::class, 'deleteAll']);
});
// 




Route::group(['prefix' => "adminuser", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [AdministratorController::class, 'index']);
    Route::get('/form_add',  [AdministratorController::class, 'formAdd']);
    Route::post('/addedd',  [AdministratorController::class, 'addedd']);
    Route::get('/edited',  [AdministratorController::class, 'formedited']);
    Route::post('/updated',  [AdministratorController::class, 'updated']);
    Route::get('/deleted',  [AdministratorController::class, 'delete']);
    Route::post('/deleteAll',  [AdministratorController::class, 'deleteAll']);
});

Route::group(['prefix' => "costumers", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [CustomersController::class, 'index']);
    Route::get('/form_add',  [CustomersController::class, 'formAdd']);
    Route::post('/added',  [CustomersController::class, 'added']);
    Route::get('/delete',  [CustomersController::class, 'delete']);
    Route::get('/changeStatus',  [CustomersController::class, 'changeStatus']);
    Route::get('/edited',  [CustomersController::class, 'formedited']);
    Route::post('/updated',  [CustomersController::class, 'updated']);
    Route::post('/deleteAll',  [CustomersController::class, 'deleteAll']);
});



Route::group(['prefix' => "reportcar", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [ReportesCarController::class, 'index']);
    Route::post('/usoenmes',  [ReportesCarController::class, 'usoenmes']);
    Route::post('/presentase',  [ReportesCarController::class, 'presentase']);
    Route::post('/showMonths',  [ReportesCarController::class, 'showMonths']);
    Route::get('/tester',  [ReportesCarController::class, 'tester']);
});


Route::group(['prefix' => "salesreport", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [SalesReportController::class, 'index']);
    Route::post('/report',  [SalesReportController::class, 'report']);
    Route::post('/reportSales',  [SalesReportController::class, 'reportSales']);
    Route::post('/reportCar',  [SalesReportController::class, 'reportCar']);
    Route::post('/reportPerson',  [SalesReportController::class, 'reportPerson']);
});


Route::group(['prefix' => "settings", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [SettingsController::class, 'index']);
    Route::get('/edited',  [SettingsController::class, 'formedit']);
    Route::post('/updated',  [SettingsController::class, 'update']);
});
// 

Route::group(['prefix' => "solicitud", 'middleware' => 'isLoginSession'], function () {
    Route::get('/',  [SolicitudController::class, 'index']);
    Route::get('/getSolicitud',  [SolicitudController::class, 'getSolicitud']);
    Route::get('/details',  [SolicitudController::class, 'details']);
    Route::post('/updateCancelar',  [SolicitudController::class, 'updateCancelar']);
});






Route::get('/booking_details', [BookingController::class, 'index']);
Route::get('/booking_details/details', [BookingController::class, 'details']);
Route::get('/booking_details/getData', [BookingController::class, 'details']);
Route::post('/booking_details/execute', [BookingController::class, 'executeForm']);

Route::get('/payment_form', [PaymentController::class, 'index']);
Route::post('/updatePaymentBonerte', [PaymentController::class, 'updatePaymentBonerte']);
Route::get('/sendPayment', [PaymentController::class, 'sendMail']);
Route::get('/check_cc/{any}', [PaymentController::class, 'check_cc']);
Route::get('/showPaymentRes', [PaymentController::class, 'showPaymentRes']);
// Route::get('/payment_response', [PaymentController::class, 'payment_response']);
// Route::get('/payment_responseJSON', [PaymentController::class, 'payment_responseJSON']);








// DRIVERS 
use App\Http\Controllers\Drivers\ServicesController as SRV;

Route::group(['prefix' => "drivers/services", 'middleware' => 'isLoginDrivers'], function () {
    Route::get('/',  [SRV::class, 'index']);
    Route::get('/getServices',  [SRV::class, 'showServices']);
    Route::get('/edited',  [SRV::class, 'formEdit']);
    Route::post('/adedd',  [SRV::class, 'adedd']);
    Route::get('/gastos',  [SRV::class, 'formgastos']);
    Route::post('/addGastos',  [SRV::class, 'addGastos']);
});
// 