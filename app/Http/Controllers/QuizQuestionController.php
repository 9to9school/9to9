<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizQuestionController extends Controller
{
     // Display all quiz content
  public function index()
    {
        $quizQuestions = QuizQuestion::latest()->get();
        $title = "Quiz Questions List";
        return view('admin.quiz_question.index', compact('quizQuestions', 'title'));
    }

    // Show form to create quiz question
    public function create()
    {
        $title = "Add Quiz Question";
        return view('admin.quiz_question.create', compact('title'));
    }

    // Store new quiz question
    public function store(Request $request)
    {
        $data = $request->all();
$rules = [
        'question' => 'required|string',
        'option1'  => 'required|string|max:255',
        'option2'  => 'required|string|max:255',
        'option3'  => 'required|string|max:255',
        'option4'  => 'required|string|max:255',
        'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Prepare validated data
    $data = $validator->validated();

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $manager = new ImageManager(new Driver());
        $imagePath = 'assets/images/quiz_questions/';
        if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

        $img = $manager->read($request->file('image'));
        $img->resize(464, 408)->encode(new WebpEncoder(quality: 70));
        $filename = uniqid() . '.webp';
        $img->save($imagePath . $filename);

        $data['image'] = $imagePath . $filename;
    }

    // Set default status
    $data['status'] = 1;

    // Create quiz question
    QuizQuestion::create($data);

    return redirect()->route('quiz.list')->with('success', 'Quiz Question added successfully.');
}

    // Show form to edit quiz question
    public function edit($id)
    {
       $quiz = QuizQuestion::findOrFail($id);
        return view('admin.quiz_question.edit', compact('quiz'));
    }

    // Update quiz question
    public function update(Request $request, $id)
    {
        $quizQuestion = QuizQuestion::findOrFail($id);
        $data = $request->all();

        $rules = [
            'question' => 'required|string',
            'option1'  => 'required|string|max:255',
            'option2'  => 'required|string|max:255',
            'option3'  => 'required|string|max:255',
            'option4'  => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If new image is uploaded
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $imagePath = 'assets/images/quiz_questions/';
            if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

            // Delete old image if exists
            if ($quizQuestion->image && file_exists($quizQuestion->image)) {
                unlink($quizQuestion->image);
            }

            $img = $manager->read($request->file('image'));
            $img->resize(464, 408)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $img->save($imagePath . $filename);

            $data['image'] = $imagePath . $filename;
        } else {
            $data['image'] = $quizQuestion->image; // Keep existing image
        }

        // Default status to 1 if not provided
        $data['status'] = $data['status'] ?? 1;

        $quizQuestion->update($data);

        return redirect()->route('quiz.list')->with('success', 'Quiz Question updated successfully.');
    }

    // Delete quiz question
    public function destroy($id)
    {
        $quizQuestion = QuizQuestion::findOrFail($id);

        if ($quizQuestion->image && file_exists($quizQuestion->image)) {
            unlink($quizQuestion->image);
        }

        $quizQuestion->delete();

        return redirect()->route('quiz.list')->with('success', 'Quiz Question deleted successfully.');
    }
}