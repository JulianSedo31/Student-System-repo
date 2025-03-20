namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count(); // Count of students
        $subjectCount = Subject::count(); // Count of subjects
        $enrollmentCount = Enrollment::count(); // Count of enrollments
        $gradeCount = Grade::count(); // Count of grades

        return view('layouts.dashboardlayout', compact('studentCount', 'subjectCount', 'enrollmentCount', 'gradeCount'));
    }
}
