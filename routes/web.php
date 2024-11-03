<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use App\Livewire\Ipcr\IpcrForm;
use App\Livewire\Opcr\OpcrForm;
use App\Livewire\Auth\TwoFactor;
use App\Livewire\Ipcr\IpcrTable;
use App\Livewire\Opcr\OpcrTable;
use App\Livewire\Ipcr\IpcrUpdate;
use App\Livewire\Opcr\OpcrUpdate;
use App\Livewire\AccountingDashboard;
use App\Livewire\Employeeinformation;
use App\Livewire\Mytasks\MyTasksForm;
use App\Livewire\Mytasks\MyTasksView;
use App\Livewire\Payroll\PayrollView;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\HrPortal\AddEmployee;
use App\Livewire\Mytasks\MyTasksTable;
use App\Livewire\Payroll\PayrollTable;
use App\Livewire\HrPortal\EditEmployee;
use App\Livewire\HrPortal\ViewEmployee;
use App\Livewire\Mytasks\MyTasksUpdate;
use App\Http\Controllers\IpcrController;
use App\Http\Controllers\OpcrController;
use App\Livewire\Admin\ItChangePassword;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Trainings\TrainingForm;
use App\Livewire\Trainings\TrainingView;
use App\Livewire\Dashboard\DashboardView;
use App\Livewire\HrPortal\CreateEmployee;
use App\Livewire\HrPortal\EmployeesTable;
use App\Livewire\Hrtickets\HrTicketsForm;
use App\Livewire\Hrtickets\HrTicketsView;
use App\Http\Controllers\VerifyController;
use App\Livewire\Dashboard\LoginDashboard;
use App\Livewire\Hrtickets\HrTicketsTable;
use App\Livewire\Trainings\TrainingUpdate;
use App\Http\Controllers\ProfileController;
use App\Livewire\Activities\ActivitiesForm;
use App\Livewire\Activities\ActivitiesView;
use App\Livewire\Dashboard\HrDashboardView;
use App\Livewire\Dashboard\ItDashboardView;
use App\Livewire\Hrtickets\HrTicketsUpdate;
use App\Livewire\Ithelpdesk\ItHelpDeskForm;
use App\Livewire\Ithelpdesk\ItHelpDeskView;
use App\Livewire\Trainings\TrainingGallery;
use App\Livewire\HrPortal\HrDailyTimeRecord;
use App\Livewire\Ithelpdesk\ItHelpDeskTable;
use App\Http\Controllers\PayrolPdfController;
use App\Livewire\Activities\ActivitiesUpdate;
use App\Livewire\Ithelpdesk\ItHelpDeskUpdate;
use App\Livewire\Studypermit\StudyPermitForm;
use App\Livewire\Teachpermit\TeachPermitForm;
use App\Livewire\Activities\ActivitiesGallery;
use App\Livewire\Passwordchange\PasswordReset;
use App\Livewire\Studypermit\StudyPermitTable;
use App\Livewire\Teachpermit\TeachPermitTable;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StudyPermitController;
use App\Http\Controllers\TeachPermitController;
use App\Livewire\Leaverequest\LeaveRequestForm;
use App\Livewire\Leaverequest\LeaveRequestView;
use App\Livewire\Passwordchange\ChangePassword;
use App\Livewire\Passwordchange\PasswordChange;
use App\Livewire\Studypermit\StudyPermitUpdate;
use App\Livewire\Teachpermit\TeachPermitUpdate;
use App\Livewire\Trainings\TrainingPreTestForm;
use App\Http\Controllers\LeaveRequestController;
use App\Livewire\Leaverequest\LeaveRequestTable;

use App\Livewire\Trainings\TrainingPostTestForm;
use App\Http\Controllers\AttendancePdfController;
use App\Livewire\Dailytimerecord\AttendanceTable;
use App\Livewire\Leaverequest\LeaveRequestUpdate;
use App\Http\Controllers\RequestDocumentController;
use App\Livewire\Changeschedule\ChangeScheduleForm;
use App\Livewire\Dashboard\AccountingDashboardView;
use App\Livewire\Onboarding\EmployeeOnboardingForm;
use App\Livewire\Payroll\Accounting\AddPayrollForm;
use App\Livewire\Changeschedule\ChangeScheduleTable;
// use App\Livewire\Approverequests\Leaverequest\ApproveLeaveRequestForm;
// use App\Livewire\Approverequests\Leaverequest\ApproveLeaveRequestTable;
use App\Livewire\Payroll\Accounting\AddPayrollTable;
use App\Livewire\Changeinformation\ChangeInformation;
use App\Livewire\Changeschedule\ChangeScheduleUpdate;
use App\Livewire\Approverequests\Ipcr\ApproveIpcrForm;
use App\Livewire\Approverequests\Opcr\ApproveOpcrForm;
// use App\Livewire\Approverequests\Changeinformation\ApproveChangeInformationForm;
// use App\Livewire\Approverequests\Changeinformation\ApproveChangeInformationTable;
use App\Livewire\Requestdocuments\RequestDocumentForm;
use App\Livewire\Approverequests\Ipcr\ApproveIpcrTable;
use App\Livewire\Approverequests\Opcr\ApproveOpcrTable;
use App\Livewire\Requestdocuments\RequestDocumentTable;
use App\Livewire\Requestdocuments\RequestDocumentUpdate;
use App\Livewire\Changeinformation\ChangeInformationView;
use App\Livewire\Mytasks\Assignedtasks\AssignedTasksView;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Admin\ItReset2fa;
use App\Livewire\Changeinformation\ChangeInformationTable;
use App\Livewire\Mytasks\Assignedtasks\AssignedTasksTable;
use App\Livewire\Payroll\Accounting\AccountingPayrollForm;
use App\Livewire\Sidebar\Notifications\NotificationsTable;
use App\Livewire\Payroll\Accounting\AccountingPayrollTable;
use App\Livewire\MyApprovals\HrTickets\ApproveHrTicketsForm;
use App\Livewire\MyApprovals\ItTickets\ApproveItTicketsForm;
use App\Livewire\Creditsmonetization\CreditsMonetizationForm;
use App\Livewire\MyApprovals\HrTickets\ApproveHrTicketsTable;
use App\Livewire\MyApprovals\ItTickets\ApproveItTicketsTable;
use App\Livewire\Creditsmonetization\CreditsMonetizationTable;
use App\Livewire\Creditsmonetization\CreditsMonetizationUpdate;
use App\Livewire\MyApprovals\Leaverequests\ApproveLeaverequestForm;
use App\Livewire\Approverequests\Studypermit\ApproveStudyPermitForm;
use App\Livewire\Approverequests\Teachpermit\ApproveTeachPermitForm;
use App\Livewire\MyApprovals\Leaverequests\ApproveLeaverequestTable;
use App\Livewire\Approverequests\Studypermit\ApproveStudyPermitTable;
use App\Livewire\Approverequests\Teachpermit\ApproveTeachPermitTable;
use App\Livewire\Approverequests\Requestdocument\ApproveRequestDocumentForm;
use App\Livewire\MyApprovals\ChangeInformation\ApproveChangeInformationForm;
use App\Livewire\Approverequests\Requestdocument\ApproveRequestDocumentTable;
use App\Livewire\MyApprovals\ChangeInformation\ApproveChangeInformationTable;
use App\Livewire\Approverequests\ChangeInformation\ApproveChangeInformationRequest;

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



Route::get('/', function(){
    return redirect()->route('LoginDashboard');
})->name('home');

// Route::middleware('')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
 
    // Route::get('register', Register::class)
    //     ->name('register');
// });

// Route::get('password/reset', Email::class)
//     ->name('password.request');

// Route::get('password/reset/{token}', Reset::class)
//     ->name('password.reset');

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify', Verify::class)
//         ->middleware('throttle:6,1')
//         ->name('verification.notice');

//     Route::get('password/confirm', Confirm::class)
//         ->name('password.confirm');
// });

Route::middleware('auth')->group(function () {
    // Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
    //     ->middleware('signed')
    //     ->name('verification.verify');


    // Original
    Route::get('logout', LogoutController::class)->name('logout');
    // Route::get('logout', LogoutController::class)
    //     ->name('logout');
});

Route::get('/verify', [VerifyController::class, 'verify'])
    ->name('verify');

Route::middleware(['auth', '2fa'])->group(function (){
    Route::get("/dashboard", LoginDashboard::class)->name('LoginDashboard');
    Route::get("/employee", DashboardView::class)->name('EmployeeDashboard');
    // Route::get("/humanresource", HrDashboardView::class)->name('HumanResourceDashboard')->lazy();
    Route::get("/humanresource", HrDashboardView::class)->name('HumanResourceDashboard');

    Route::get("/accounting", AccountingDashboardView::class)->name('AccountingDashboard');

    Route::get('/password-change', ChangePassword::class)->name('ChangePassword');

    Route::get("/profile", Employeeinformation::class)->name('profile');

    Route::get('/profile/{file}', [Employeeinformation::class, 'download'])->name('downloadFile');

    Route::get('/profile/{media}/{filename}', [Employeeinformation::class, 'privateStorage'])->name('privateStorage');

    Route::get('/changeinformation', ChangeInformationTable::class)->name('ChangeInformationTable');

    Route::get('/changeinformation/form', ChangeInformation::class)->name('changeInformation');

    Route::get('/changeinformation/view/{index}', ChangeInformationView::class)->name('ChangeInformationView');


    Route::get('/changeinformationrequests', ApproveChangeInformationTable::class)->name('ApproveChangeInformationTable');
    
    Route::get('/changeinformationrequests/approve/{index}', ApproveChangeInformationForm::class)->name('ApproveChangeInformationForm');

    Route::get('/notifications', NotificationsTable::class)->name('NotificationsTable');
});


Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/change-password', PasswordChange::class)->name('password.change');
});

// Route::get('/password-reset', PasswordReset::class)->name('PasswordReset');

Route::get('/verify', TwoFactor::class)->name('MFAVerify')->middleware(['custom.signed', 'custom.throttle']);



Route::middleware(['auth' , '2fa'])->group(function () {

    Route::get("/leaverequest/requests/{type?}", LeaveRequestTable::class)->name('LeaveRequestTable');

    Route::get("/leaverequest/form/{type?}", LeaveRequestForm::class)->name('LeaveRequestForm');

    Route::get("/leaverequest/view/{index}", LeaveRequestView::class)->name('LeaveRequestView');

    Route::get("leaverequest/approverequests", ApproveLeaverequestTable::class)->name('ApproveLeaveRequestTable');

    Route::get("leaverequest/approverequests/{type?}", ApproveLeaverequestTable::class)->name('ListLeaveRequestTable');

    Route::get("leaverequest/approverequests/approve/{index}", ApproveLeaverequestForm::class)->name('ApproveLeaveRequestForm'); 

    Route::get("leaverequest/approverequests/approve/{type?}/{index}", ApproveLeaverequestForm::class)->name('ApproveListLeaveRequestForm'); 
});


Route::middleware(['auth' , '2fa'])->group(function (){

    Route::get("/helpdesk/requests", ItHelpDeskTable::class)->name('ItHelpDeskTable');

    Route::get("/helpdesk/form", ItHelpDeskForm::class)->name('ItHelpDeskForm');

    Route::get("/helpdesk/view/{index}", ItHelpDeskView::class)->name('ItHelpDeskView');

    Route::get("/helpdesk/approverequests/{index}", ApproveItTicketsForm::class)->name('ApproveItHelpDeskForm');
});


Route::middleware(['auth' , '2fa'])->group(function (){

    Route::get("/mytasks/requests", MyTasksTable::class)->name('TasksTable');

    Route::get("/mytasks/form", MyTasksForm::class)->name('TasksForm');

    Route::get("/mytasks/view/{index}", MyTasksView::class)->name('MyTasksView');

    Route::get("/assignedtasks", AssignedTasksTable::class)->name('AssignedTasksTable');

    Route::get("/assignedtasks/view/{index}", AssignedTasksView::class)->name('AssignedTasksView');
});


Route::middleware(['auth' , '2fa'])->group(function (){

    Route::get("/hrtickets/requests/{type?}", HrTicketsTable::class)->name('HrTicketsTable');

    Route::get("/hrtickets/form/{type?}", HrTicketsForm::class)->name('HrTicketsForm');

    Route::get("/hrtickets/view/{index}", HrTicketsView::class)->name('HrTicketsView');

    Route::get("/hrtickets/approverequests", ApproveHrTicketsTable::class)->name('ApproveHrTicketsTable');
    
    Route::get("/hrtickets/approverequests/{type?}", ApproveHrTicketsTable::class)->name('ListHrTicketsTable');

    Route::get("/hrtickets/approverequests/approve/{index}", ApproveHrTicketsForm::class)->name('ApproveHrTicketsForm');

    Route::get("/humanresource/dailytimerecord", HrDailyTimeRecord::class)->name('HrDailyTimeRecord');

    Route::get('/humanresource/create-employee', CreateEmployee::class)->name('createEmployee');

    Route::get('/editemployees/{index}', EditEmployee::class)->name("EditEmployee");

    Route::get('/viewemployees/{index}', ViewEmployee::class)->name("ViewEmployee");

});


Route::middleware(['auth' , '2fa'])->group(function (){
    Route::get("/activities", ActivitiesGallery::class)->name('ActivitiesGallery');

    Route::get("/activities/view/{index}", ActivitiesView::class)->name('ActivitiesView');

});




Route::middleware(['auth' , '2fa'])->group(function (){
    Route::get("/dailytimerecord", AttendanceTable::class)->name('AttendanceTable');

    Route::get("/dailytimerecord/pdf/{dates}", [AttendancePdfController::class, 'turnToPdf'])->name('AttendancePdf');

});


Route::middleware(['auth' , '2fa'])->group(function (){

    Route::get("/payroll", PayrollTable::class)->name("PayrollTable");

    // Route::get("/human", AccountingPayrollTable::class)->name("AccountingPayrollTable");

    Route::get("/payroll/pdf/{date}", [PayrolPdfController::class, 'turnToPdf'])->name("PayrollPdf");

    Route::get("/payroll/view/{date}", PayrollView::class)->name("PayrollView");

});


Route::middleware(['auth' , '2fa'])->group(function (){

    Route::get("/payroll/pdf/{date}", [PayrolPdfController::class, 'turnToPdf'])->name("PayrollPdf");

    Route::get("/payroll/view/{date}", PayrollView::class)->name("PayrollView");

});

Route::middleware(['auth', '2fa'])->group(function () {

    Route::get("/infosupport", ItDashboardView::class)->name('ItDashboard');

    Route::get("/it-change-password", ItChangePassword::class)->name('ItChangePassword');
    
    Route::get("/it-reset-2fa", ItReset2fa::class)->name('ItReset2Fa');

});
