<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dts\Document;
use App\Http\Livewire\Dts\DocumentCreate;
use App\Http\Livewire\Dts\DocumentEdit;
use App\Http\Livewire\Dts\DocumentOverview;
use App\Http\Livewire\Dts\MyDocuments;
use App\Http\Livewire\Dts\OfficeDocuments;
use App\Http\Livewire\Dts\PrivacyPolicy;
use App\Http\Livewire\Dts\SharedDocuments;
use App\Http\Livewire\Faculty\ClassRecord;
use App\Http\Livewire\Faculty\ClassSchedule;
use App\Http\Livewire\Faculty\FacultyProfile;
use App\Http\Livewire\Faculty\WeeklyWorkload;
use App\Http\Livewire\Guest\EnrollmentSteps;
use App\Http\Livewire\Guest\MissionAndVision;
use App\Http\Livewire\Guest\SchoolHistory;
use App\Http\Livewire\Registrar\BillingAndPayment;
use App\Http\Livewire\Registrar\EnrollmentManagement;
use App\Http\Livewire\Registrar\EnrollmentReport;
use App\Http\Livewire\Registrar\EnrollmentStudentView;
use App\Http\Livewire\Registrar\StudentAdmission;
use App\Http\Livewire\Settings\CompanyProfile;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

## Rpt
use App\Http\Livewire\Settings\ProfileSettings;
use App\Http\Livewire\Settings\UsersManagement;
use App\Http\Livewire\Settings\Users as UserSettings;
use App\Http\Livewire\Student\AcademicGrades;
use App\Http\Livewire\Student\StudentProfile;
use App\Http\Livewire\Student\TuitionFee;
use App\Models\Office;
use App\Models\User;

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
## ADD ROLE TO USER
Route::get('/role_add', function () {
    $user = User::find(1);
    $user->assignRole(1);
});
Route::get('/permission_add', function () {
    $user = User::find(1);
    $user->givePermissionTo(2);
});


Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    ## DASHBOARD
    Route::get('{user_id}/user-dashboard', UserDashboard::class)->name('user-dashboard');

    ## GUEST
    Route::get('{user_id}/guest/school-history', SchoolHistory::class)->name('guest/school-history');
    Route::get('{user_id}/guest/mission-and-vision', MissionAndVision::class)->name('guest/mission-and-vision');
    Route::get('{user_id}/guest/enrollment-steps', EnrollmentSteps::class)->name('guest/enrollment-steps');

    ## PARENT & STUDENT
    Route::get('{user_id}/student/student-profile', StudentProfile::class)->name('student/student-profile');
    Route::get('{user_id}/student/academic-grades', AcademicGrades::class)->name('student/academic-grades');
    Route::get('{user_id}/student/tuition-fee', TuitionFee::class)->name('student/tuition-fee');

    ## FACULTY
    Route::get('{user_id}/faculty/faculty-profile', FacultyProfile::class)->name('faculty/faculty-profile');
    Route::get('{user_id}/faculty/class-record', ClassRecord::class)->name('faculty/class-record');
    Route::get('{user_id}/faculty/class-schedule', ClassSchedule::class)->name('faculty/class-schedule');
    Route::get('{user_id}/faculty/weekly-workload', WeeklyWorkload::class)->name('faculty/weekly-workload');

    ## REGISTRAR
    Route::get('{user_id}/registrar/student-admission', StudentAdmission::class)->name('registrar/student-admission');
    Route::get('{user_id}/registrar/enrollment-management', EnrollmentManagement::class)->name('registrar/enrollment-management');
    Route::get('{user_id}/registrar/enrollment-management/view-student/{id}', EnrollmentStudentView::class)->name('registrar/enrollment-management/view-student');
    Route::get('{user_id}/registrar/enrollment-report', EnrollmentReport::class)->name('registrar/enrollment-report');
    Route::get('{user_id}/registrar/billing-and-payment', BillingAndPayment::class)->name('registrar/billing-and-payment');


    // Route::ge{user_id}/t('tracking-numbers', TrackingNumbers::class)->name('Tracking Numbers');
    Route::get('{user_id}/my-documents', MyDocuments::class)->name('my-documents');
    Route::get('{user_id}/office-documents', OfficeDocuments::class)->name('office-documents');
    Route::get('{user_id}/shared-documents', SharedDocuments::class)->name('shared-documents');
    Route::get('{user_id}/document/{id}', DocumentOverview::class)->name('document-overview');
    Route::get('{user_id}/document/{tn}/create', DocumentCreate::class)->name('create-document');
    Route::get('{user_id}/document/{id}/edit', DocumentEdit::class)->name('edit-document');
    Route::get('{user_id}/documents/{type}', Document::class)->name('Documents');
    Route::get('{user_id}/settings', UserSettings::class)->name('Users Setting');

    ## USER MANAGEMENT
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

// Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');

});
