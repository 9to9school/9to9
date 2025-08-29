<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizContent;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizContentController extends Controller
{
    // Display all quiz content
    public function AllQuizContent()
    {
        $title = "Quiz Content Management";
        $quizContents = QuizContent::latest()->get();
        return view('admin.quiz_content.index', compact('quizContents', 'title'));
    }

    // Add or update quiz content
    public function AddQuizContent(Request $request, $id = null)
    {
        if ($id == null) {
            $title = "Add Quiz Content";
            $quizContent = new QuizContent();
            $message = "Quiz Content added successfully";
        } else {
            $title = "Update Quiz Content";
            $quizContent = QuizContent::findOrFail($id);
            $message = "Quiz Content updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'heading'        => 'required|string|max:255|unique:quiz_content,heading,' . $id,
                'image'              => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'sub_heading'    => 'nullable|string|max:255',
                'description'    => 'nullable|string',
                'btn_name'       => 'nullable|string|max:255',
                'btn_link'       => 'nullable|string|max:255',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Upload main image
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/child_learning/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(464, 408)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $img->save($imagePath . $filename);
            $data['image'] = $imagePath . $filename;
        }
            // Store or update the quiz content
            if ($id == null) {
                QuizContent::create($data);
            } else {
                $quizContent->update($data);
            }

            return redirect()->back()->with('success', $message);
        }
        return view('admin.quiz_content.create', compact('title', 'quizContent'));
    }

    // Delete quiz content
    public function DeleteQuizContent($id)
    {
        $quizContent = QuizContent::findOrFail($id);
        $quizContent->delete();
        return redirect()->back()->with('success', 'Quiz Content deleted successfully');
    }
}
