<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherPage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherPageController extends Controller
{
    public function TeacherContent()
    {
        $title= "Teacher Page Content";
        $teacher_content = TeacherPage::latest()->get();
        return view('admin.teacher-page.index', compact('title','teacher_content'));
    }


    public function addOrUpdateTeacher(Request $request, $id = null)
    {
        $teacherPage = $id ? TeacherPage::findOrFail($id) : new TeacherPage();
        $title = $id ? 'Update Teacher Page' : 'Add Teacher Page';
        $message = $id ? 'Teacher page updated successfully.' : 'Teacher page added successfully.';

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'banner_image'     => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_heading'   => 'required|string|max:255',
                'banner_para'      => 'required|string|max:255',
                'btn_name'         => 'required|string|max:255',
                'btn_link'         => 'nullable|string|max:255',

                'why_apply_heading'    => 'nullable|string|max:255',
                'why_apply_para'       => 'nullable|string|max:255',

                'journey_heading'     => 'nullable|string',
                'journey_para'     => 'nullable|string',
                'journey_image'    => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                'position_heading'    => 'nullable|string|max:255',
                'position_para'       => 'nullable|string|max:255',

                'faq_heading'    => 'nullable|string|max:255',
                'faq_para'       => 'nullable|string|max:255',

                'works_heading'    => 'nullable|string|max:255',
                'works_para'       => 'nullable|string|max:255',
                'works_subheading1'=> 'nullable|string|max:255',
                'works_para1'      => 'nullable|string',
                'works_subheading2'=> 'nullable|string|max:255',
                'works_para2'      => 'nullable|string',
                'works_subheading3'=> 'nullable|string|max:255',
                'works_para3'      => 'nullable|string',

                'apply_heading'    => 'nullable|string|max:255',
                'apply_para'       => 'nullable|string|max:255',
                'apply_image'      => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                'status'           => 'nullable|boolean',
            ];

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

//            $imageFields = [
//                'banner_image'  => [1920, 1000, 'assets/images/teacher/banner/'],
//                'journey_image' => [800, 600, 'assets/images/teacher/journey/'],
//                'apply_image'   => [800, 600, 'assets/images/teacher/apply/'],
//            ];
//
//            $manager = new ImageManager(new Driver());
//
//            foreach ($imageFields as $field => [$width, $height, $path]) {
//                if ($request->hasFile($field)) {
//                    if (!is_dir($path)) mkdir($path, 0755, true);
//
//                    $img = $manager->read($request->file($field));
//                    $img->resize($width, $height)->encode(new WebpEncoder(quality: 70));
//                    $filename = uniqid() . '.webp';
//                    $img->save($path . $filename);
//                    $data[$field] = $path . $filename;
//                }
//            }

            $imageFields = [
                'banner_image'  => ['assets/images/teacher/banner/'],
                'journey_image' => ['assets/images/teacher/journey/'],
                'apply_image'   => ['assets/images/teacher/apply/'],
            ];

            $manager = new ImageManager(new Driver());

            foreach ($imageFields as $field => [$path]) {
                if ($request->hasFile($field)) {
                    if (!is_dir($path)) mkdir($path, 0755, true);

                    $img = $manager->read($request->file($field));
                    // Removed resize() to keep original image size
                    $img->encode(new WebpEncoder(quality: 70));

                    $filename = uniqid() . '.webp';
                    $img->save($path . $filename);

                    $data[$field] = $path . $filename;
                }
            }

            if ($id) {
                $teacherPage->update($data);
            } else {
                TeacherPage::create($data);
            }

            return back()->with('success', $message);
        }

        return view('admin.teacher-page.create', compact('teacherPage', 'title'));
    }
}
