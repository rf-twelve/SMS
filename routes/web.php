<?php

use App\Http\Livewire\Accounting\BillingPayment;
use App\Http\Livewire\Accounting\TuitionFee as AccountingTuitionFee;
use App\Http\Livewire\Administration\FacultyList;
use App\Http\Livewire\Administration\StudentList;
use App\Http\Livewire\Administration\TeacherList;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Cashier\PaymentAndCollection;
use App\Http\Livewire\Faculty\FacultyProfile;
use App\Http\Livewire\Guest\EnrollmentSteps;
use App\Http\Livewire\Guest\EntranceExam;
use App\Http\Livewire\Guest\MakeReservation;
use App\Http\Livewire\Guest\MissionAndVision;
use App\Http\Livewire\Guest\SchoolHistory;
use App\Http\Livewire\Guidance\Report;
use App\Http\Livewire\Guidance\Reservation;
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
use App\Http\Livewire\Student\AcademicGrades;
use App\Http\Livewire\Student\Attendance;
use App\Http\Livewire\Student\Soa;
use App\Http\Livewire\Student\StudentProfile;
use App\Http\Livewire\Student\TuitionFee;
use App\Http\Livewire\Teacher\ClassRecord;
use App\Http\Livewire\Teacher\ClassSchedule;
use App\Http\Livewire\Teacher\WeeklyWorkload;
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


// Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    ## DASHBOARD
    Route::get('{user_id}/user-dashboard', UserDashboard::class)->name('user-dashboard');

    ## ACCOUNTING
    Route::get('{user_id}/accounting/tuition-fee', AccountingTuitionFee::class)->name('accounting/tuition-fee');
    Route::get('{user_id}/accounting/billing-and-payment', BillingPayment::class)->name('accounting/billing-and-payment');
    Route::get('{user_id}/accounting/contribution', EnrollmentSteps::class)->name('accounting/contribution');

    ## ADMINISTRATION
    Route::get('{user_id}/administration/student-list', StudentList::class)->name('administration/student-list');
    Route::get('{user_id}/administration/faculty-list', FacultyList::class)->name('administration/faculty-list');
    Route::get('{user_id}/administration/teacher-list', TeacherList::class)->name('administration/teacher-list');

    ## CASHIER
    Route::get('{user_id}/cashier/payment-and-collection', PaymentAndCollection::class)->name('cashier/payment-and-collection');

    ## GUEST
    Route::get('{user_id}/guest/school-history', SchoolHistory::class)->name('guest/school-history');
    Route::get('{user_id}/guest/mission-and-vision', MissionAndVision::class)->name('guest/mission-and-vision');
    Route::get('{user_id}/guest/enrollment-steps', EnrollmentSteps::class)->name('guest/enrollment-steps');
    Route::get('{user_id}/guest/make-reservation', MakeReservation::class)->name('guest/make-reservation');
    Route::get('{user_id}/guest/entrance-exam', EntranceExam::class)->name('guest/entrance-exam');

    ## GUIDANCE
    Route::get('{user_id}/guidance/reservation', Reservation::class)->name('guidance/reservation');
    Route::get('{user_id}/guidance/reports', Report::class)->name('guidance/reports');

    ## PARENT & STUDENT
    Route::get('{user_id}/student/academic-grades', AcademicGrades::class)->name('student/academic-grades');
    Route::get('{user_id}/student/attendance', Attendance::class)->name('student/attendance');
    Route::get('{user_id}/student/statement-of-account', Soa::class)->name('student/statement-of-account');
    Route::get('{user_id}/student/student-profile', StudentProfile::class)->name('student/student-profile');
    Route::get('{user_id}/student/tuition-fee', TuitionFee::class)->name('student/tuition-fee');

    ## FACULTY
    Route::get('{user_id}/faculty/faculty-profile', FacultyProfile::class)->name('faculty/faculty-profile');

    ## TEACHER
    Route::get('{user_id}/teacher/class-record', ClassRecord::class)->name('teacher/class-record');
    Route::get('{user_id}/teacher/class-schedule', ClassSchedule::class)->name('teacher/class-schedule');
    Route::get('{user_id}/teacher/weekly-workload', WeeklyWorkload::class)->name('teacher/weekly-workload');

    ## REGISTRAR
    Route::get('{user_id}/registrar/student-admission', StudentAdmission::class)->name('registrar/student-admission');
    Route::get('{user_id}/registrar/enrollment-management', EnrollmentManagement::class)->name('registrar/enrollment-management');
    Route::get('{user_id}/registrar/enrollment-management/view-student/{id}', EnrollmentStudentView::class)->name('registrar/enrollment-management/view-student');
    Route::get('{user_id}/registrar/enrollment-report', EnrollmentReport::class)->name('registrar/enrollment-report');
    Route::get('{user_id}/registrar/billing-and-payment', BillingAndPayment::class)->name('registrar/billing-and-payment');

    ## USER MANAGEMENT
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

// Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    // Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');

});
