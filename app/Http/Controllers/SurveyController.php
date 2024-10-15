<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', [
            'page_title' => 'Surveys',
            'surveys' => $surveys
        ]);
    }
    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $survey = new Survey();
        $survey->title = $request->input('title');

        $surveyData = [
            "logoPosition" => "right",
            "title" => "Sample Survey",
            "pages" => [
                [
                    "name" => "page1",
                    "elements" => [
                        [
                            "type" => "text",
                            "name" => "question1",
                            "title" => "What is your name?"
                        ]
                    ]
                ]
            ]
        ];
        $surveyData = json_encode($surveyData);
    
        // Menyimpan JSON sebagai array (Laravel akan mengonversinya ke JSON)
        $survey->survey_json = $surveyData;
        $survey->save();

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully!');
    }

    public function show(Survey $survey)
    {
        return view('surveys.show', ['survey' => $survey]);
    }
}
