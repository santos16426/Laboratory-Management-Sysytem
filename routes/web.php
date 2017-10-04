<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//pang debug eton route
Route::get('/sam',  'AdminController@empCount');
//
Route::get('/', function () {
    return view('Pages.Login');
});
Route::post('/doLogin','LoginController@doLogin');
// dashboard
Route::get('/Admin/Dashboard','AdminController@dashboard');
Route::get('/Queue','AdminController@queue');

// Department
Route::get('/Maintenance/Laboratory','LaboratoryController@lab');
Route::post('/save_Lab','LaboratoryController@save_Lab');
Route::post('/deleteLaboratory','LaboratoryController@deleteLaboratory');
Route::get('/updateLab','LaboratoryController@updateLab');
Route::post('/update_laboratory','LaboratoryController@update_laboratory');

// Employee
Route::get('/Maintenance/EmployeeType','EmployeeController@emptype');
Route::get('/Maintenance/Employee','EmployeeController@emp');
Route::get('/updateEmployeeType','EmployeeController@updateEmployeeType');
Route::post('/save_empType','EmployeeController@save_empType');
Route::post('/update_empType','EmployeeController@update_empType');
Route::post('/deleteEmployeeType','EmployeeController@deleteEmployeeType');
Route::get('/getFields','EmployeeController@getFields');
Route::get('/updateEmpDetails','EmployeeController@updateEmpDetails');
Route::get('/viewEmpDetails','EmployeeController@viewEmpDetails');
Route::post('/update_employee','EmployeeController@update_employee');
Route::post('/deleteEmployee','EmployeeController@deleteEmployee');
Route::post('/save_employee','EmployeeController@save_employee');

//Rebate
Route::get('/Maintenance/RebatePercentage','RebateController@rebatepercent');
Route::post('/save_rebatePercentage','RebateController@save_rebatePercentage');
Route::get('/Maintenance/EmployeeRebate','RebateController@emprebate');
Route::post('/deleteRebate','RebateController@deleteRebate');
Route::post('/save_empRebate','RebateController@save_empRebate');

//Service
// servgroup
Route::get('/Maintenance/ServiceGroup','ServiceController@servgroup');
Route::get('/updateServGroup','ServiceController@updateServGroup');
Route::post('/update_servGroup','ServiceController@update_servGroup');
Route::post('/save_servGroup','ServiceController@save_servGroup');
Route::post('/deleteServiceGroup','ServiceController@deleteServiceGroup');
// servtype
Route::get('/Maintenance/ServiceType','ServiceController@servtype');
Route::get('/updateServType','ServiceController@updateServType');
Route::post('/deleteServiceType','ServiceController@deleteServiceType');
Route::post('/save_servType','ServiceController@save_servType');
Route::post('/update_servType','ServiceController@update_servType');

//Service
Route::get('/Maintenance/Service','ServiceController@serv');
Route::get('/getServiceType','ServiceController@getServiceType');
Route::get('/getService','ServiceController@getService');
Route::post('/update_Service','ServiceController@update_service');
Route::post('/save_Service','ServiceController@save_Service');
Route::post('/deleteService','ServiceController@deleteService');

//Package
Route::get('/Maintenance/Package','PackageController@package');
Route::get('/updatePackage','PackageController@updatePackage');
Route::get('/viewServiceinPackage','PackageController@viewServiceinPackage');
Route::post('/deletePackage','PackageController@deletePackage');
Route::post('/update_package','PackageController@update_package');
Route::post('/save_package','PackageController@save_package');
Route::get('/getServiceUnderPackage','PackageController@getServiceUnderPackage');
Route::get('/getTotalPrice','PackageController@getTotalPrice');

//Corporate
Route::get('/Maintenance/Corporate','CorporateAccountController@corp');
Route::get('/getTotalPrice','CorporateAccountController@getTotalPrice');
Route::get('/updateCorporate','CorporateAccountController@updateCorporate');
Route::post('/update_Corporate','CorporateAccountController@update_Corporate');
Route::post('/save_corp','CorporateAccountController@save_corp');
Route::post('/deleteCorporate','CorporateAccountController@deleteCorporate');
Route::get('/Maintenance/Corporate/CreatePackage','CorporateAccountController@createpackage');
Route::post('/save_corpPackage','CorporateAccountController@save_corpPackage');
Route::post('/deleteCorporatePackage','CorporateAccountController@deleteCorporatePackage');
Route::get('/updateCorporatePackage','CorporateAccountController@updateCorporatePackage');
Route::post('/update_corpPackage','CorporateAccountController@update_corpPackage');


// Transaction
Route::get('/Transactions/PatientList','TransactionController@patient');
Route::post('/save_patient','TransactionController@save_patient');
Route::get('/Transaction/AvailService','TransactionController@medicalservice');
Route::get('/getDataPackage','TransactionController@getDataPackage');	
Route::get('/getDataService','TransactionController@getDataService');
Route::get('/getCompanyPackage','TransactionController@getCompanyPackage');
Route::post('/proceed_Payment','TransactionController@proceed_Payment');
Route::get('/Transaction/CorporateBilling/ViewTransactions','TransactionController@viewCorpTrans');
Route::post('/saveCorporatePayment','TransactionController@saveCorporatePayment');
Route::get('/Transactions/CorporateBilling','TransactionController@corpbilling');
Route::get('/Transactions/RebateBilling','TransactionController@rebatebilling');
Route::get('/Transaction/Rebate/ViewTransactions','TransactionController@viewrebatetrans');
Route::post('/saveEmpRebatePayment','TransactionController@saveRebatePayment');
Route::get('/maximumAmount','RemoteController@maximumAmount');
//Layouts
Route::get('/medicalReport','ResultController@medicalReport');
Route::get('/ecg','ResultController@ecg');
Route::get('/uploadResult','ResultController@uploadResult');
Route::get('/ultra','ResultController@ultra');
Route::get('/xray','ResultController@xray');
Route::get('/medservice','ResultController@medservice');

//Results
Route::get('/Transactions/EncodeResults','ResultController@encoderesults');
Route::get('/Transactions/UploadOfResults','ResultController@uploadresults');
Route::get('/Transactions/ResultDashboard','ResultController@resultdashboard');
Route::get('/getTransactionperGroup','ResultController@getTransactionperGroup');
Route::get('/AddLayout','ResultController@AddLayout');
Route::get('/Transaction/PatientTransaction','ResultController@PatientTransaction');
Route::post('/uploadResultFile','ResultController@uploadResultFile');
Route::get('/uploadFileResuls','ResultController@uploadFileResuls');

//Remote Validation
Route::get('/checkEmpType','RemoteController@checkEmpType');
Route::get('/checkServgrp','RemoteController@checkServgrp');
Route::get('/checkServtype','RemoteController@checkServtype');
Route::get('/checkService','RemoteController@checkService');
Route::get('/checkPackage','RemoteController@checkPackage');
Route::get('/checkCorpName','RemoteController@checkCorpName');
Route::get('/checkContacts','RemoteController@checkContacts');
Route::get('/checkEmail','RemoteController@checkEmail');
Route::get('/checkUpPack','RemoteController@checkUpPack');

// Reciept
Route::get('/retrieveReciept','TransactionController@retrieveReciept');

//email
Route::get('sendmail', 'SendMailController@sendMail');

// Reports
Route::get('/Result/medrequest','TransactionController@medrequest');




Route::get('/Reports/CorporateReports','ReportController@corporatereports');
Route::get('/allTransactionReport','ReportController@allTransactionReport');
Route::get('/Reports/TransactionReports','ReportController@transactionreport');
Route::get('/dailyTransactionReport','ReportController@dailyTransactionReport');
Route::get('/weeklyTransactionReport','ReportController@weeklyTransactionReport');
Route::get('/monthlyTransactionReport','ReportController@monthlyTransactionReport');
Route::get('/yearlyTransactionReport','ReportController@yearlyTransactionReport');
Route::get('/rangeTransactionReport','ReportController@rangeTransactionReport');

// Utilities
Route::get('/Utilities/Reactivation','UtilitiesController@reactivation');
Route::get('/Utilities/CompanyDetails','UtilitiesController@companydetails');

Route::get('/sendCorporateEmail','SendMailController@sendcorpemail');
