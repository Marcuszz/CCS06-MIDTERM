<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function start()
    {
        return view('start');
    }

    public function enterAttempts(Request $request)
    {
        $student_1 = $request->name_1;
        $student_2 = $request->name_2;
        $student_3 = $request->name_3;
        $student_4 = $request->name_4;
        $student_5 = $request->name_5;

        return view('attempts', [
            'student_1' => $student_1,
            'student_2' => $student_2,
            'student_3' => $student_3,
            'student_4' => $student_4,
            'student_5' => $student_5,
        ]);
    }

    protected function computeAverageScore($midterm, $final)
    {
        $average = ($midterm + $final) / 2;
        return round($average, 2);
        
    }

    protected function giveRemarks($average)
    {
        if ($average >= 75) {
            $remark = "PASSED";
        } else {
            $remark = "FAILED";
        } 
        return $remark;
    }

    public function computePower(Request $request)
    {
        $student_1 = $request->student_1;
        $student_2 = $request->student_2;
        $student_3 = $request->student_3;
        $student_4 = $request->student_4;
        $student_5 = $request->student_5;

        $s1_average = $this->computeAverageScore($request->s1_midterm, $request->s1_final);
        $s2_average = $this->computeAverageScore($request->s2_midterm, $request->s2_final);
        $s3_average = $this->computeAverageScore($request->s3_midterm, $request->s3_final);
        $s4_average = $this->computeAverageScore($request->s4_midterm, $request->s4_final);
        $s5_average = $this->computeAverageScore($request->s5_midterm, $request->s5_final);
        
        $s1_remarks = $this->giveremarks($s1_average);
        $s2_remarks = $this->giveremarks($s2_average);
        $s3_remarks = $this->giveremarks($s3_average);
        $s4_remarks = $this->giveremarks($s4_average);
        $s5_remarks = $this->giveremarks($s5_average);

        return view('scores', [
            'student_1' => $student_1,
            'student_2' => $student_2,
            'student_3' => $student_3,
            'student_4' => $student_4,
            'student_5' => $student_5,
            // Stdent 1 scores
            's1_midterm' => $request->s1_midterm,
            's1_final' => $request->s1_final,
            's1_average' => $s1_average,
            's1_remarks' => $s1_remarks,
             // Stdent 2 scores
            's2_midterm' => $request->s2_midterm,
            's2_final' => $request->s2_final,
            's2_average' => $s2_average,
            's2_remarks' => $s2_remarks,
             // Stdent 3 scores
            's3_midterm' => $request->s3_midterm,
            's3_final' => $request->s3_final,
            's3_average' => $s3_average,
            's3_remarks' => $s3_remarks,
             // Stdent 4 scores
            's4_midterm' => $request->s4_midterm,
            's4_final' => $request->s4_final,
            's4_average' => $s4_average,
            's4_remarks' => $s4_remarks,
             // Stdent 5 scores
            's5_midterm' => $request->s5_midterm,
            's5_final' => $request->s5_final,
            's5_average' => $s5_average,
            's5_remarks' => $s5_remarks,
        ]);
    }
}