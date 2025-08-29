<?php

namespace App\Http\Controllers;
use App\Models\partnerSchool;
use App\Models\SchoolBanner;
use App\Models\SchoolGallery;
use App\Models\SchoolAboutus;
use App\Models\Schoolfacility;
use Illuminate\Http\Request;
use App\Models\PartnerSchoolFees;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Hash;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Http;


class PartnerSchoolController extends Controller
{
   public function index()
    {
        $schools = partnerSchool::orderBy('id', 'desc')->get();
        return view('admin.partner-school.school-list', compact('schools'));
    }

   public function create()
    {
        $schfac = Schoolfacility::where('status','active')->where('type','partner_school')->get();
        return view('admin.partner-school.create',compact('schfac'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_email' => 'string|email|unique:partner_schools,school_email',
            'school_phone_1' => 'digits:10|unique:partner_schools,school_phone_1',
            'school_phone_2' => 'nullable|digits:10',
            'principal_name' => 'required|string|max:255',
            'vice_principal_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            'facility' => 'required',
            // 'school_logo' => 'required|image|mimes:jpg,png,jpeg,gif,avif,webp|max:2048',
            'status' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $fees = [];

        foreach ($request->annual_fees as $index => $annualFee) {
            $fees[] = [
                'annual_fees' => $annualFee,
                'per_month_fees' => $request->per_month_fees[$index] ?? null,
            ];
        }
            
            // Create School
            $school = new partnerSchool();
            $school->school_name = $request->school_name;
            $school->school_email = $request->school_email;
            $school->school_phone_1 = $request->school_phone_1;
            $school->school_phone_2 = $request->school_phone_2;
            $school->address = $request->address;
            $school->city = $request->city;
            $school->state = $request->state;
            $school->zip = $request->zip;
            $school->principal_name = $request->principal_name;
            $school->vice_principal_name = $request->vice_principal_name;
            $school->age = json_encode($request->age);
            $school->fees = json_encode($fees);
            $school->rating = $request->rating;
            $school->facility = json_encode($request->facility,true);
            $plainText = strip_tags($request->description);
            $school->description = $plainText;
            $school->lat = $request->latitude;
            $school->long = $request->longitude;

            // Handle Logo Upload
            if ($request->hasFile('school_logo')) {
                $file = $request->file('school_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = 'assets/images/user/partner_school';

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $school->school_logo = 'assets/images/user/partner_school/' . $filename;
            }

            $school->save();

            // Create School Fees
            if ($request->has('age')) {
                foreach ($request->age as $i => $age) {
                    PartnerSchoolFees::create([
                        'age' => $age,
                        'partner_school_id' => $school->id,
                        'per_month_fees' => $request->per_month_fees[$i] ?? null,
                        'annual_fees' => $request->annual_fees[$i] ?? null,
                        'status' => 'active',
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('partner.school.list')->with('success', 'Partner School added successfully.');
    }

    public function edit($id)
    {
        $school = partnerSchool::findOrFail($id);
         $schfac = Schoolfacility::where('status','active')->where('type','partner_school')->get();
        return view('admin.partner-school.edit', compact('school','schfac'));
    }

    public function update(Request $request, $id)
    {
     

        $school = partnerSchool::findOrFail($id);


        $fees = [];

        foreach ($request->annual_fees as $index => $annualFee) {
            $fees[] = [
                'annual_fees' => $annualFee,
                'per_month_fees' => $request->per_month_fees[$index] ?? null,
            ];
        }

        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_email' => 'required|string|email|unique:partner_schools,school_email,' . $school->id,
            'school_phone_1' => 'required|digits:10|unique:partner_schools,school_phone_1,' . $school->id,
            'school_phone_1' => 'required|digits:10',
            'school_phone_2' => 'nullable|digits:10',
            'principal_name' => 'required|string|max:255',
            'vice_principal_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            // 'school_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            // 'document' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required',
            'rating' => 'required',
            'facility' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

      

        $school->school_name = $request->school_name;
        $school->school_email = $request->school_email;
        $school->school_phone_1 = $request->school_phone_1;
        $school->school_phone_2 = $request->school_phone_2;
        $school->address = $request->address;
        $school->city = $request->city;
        $school->state = $request->state;
        $school->zip = $request->zip;
        $school->principal_name = $request->principal_name;
        $school->vice_principal_name = $request->vice_principal_name;
        $school->age = json_encode($request->age);
        $school->fees = json_encode($fees);
        $school->rating = $request->rating;
        $school->facility = json_encode($request->facility,true);
        $plainText = strip_tags($request->description);
        $school->description = $plainText;
        $school->lat = $request->latitude;
        $school->long = $request->longitude;

        if ($request->hasFile('school_logo')) {
            if ($school->school_logo && File::exists($school->school_logo)) {
                File::delete($school->school_logo);
            }

            $file = $request->file('school_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'assets/images/user/partner_school';

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $school->school_logo = 'assets/images/user/partner_school/' . $filename;
        }

        if ($school) {
            // Delete old fee records
            PartnerSchoolFees::where('partner_school_id', $school->id)->delete();

            // Add new fee records
            if ($request->has('age')) {
                for ($i = 0; $i < count($request->age); $i++) {
                    $schoolfees = new PartnerSchoolFees();
                    $schoolfees->age = $request->age[$i];
                    $schoolfees->partner_school_id = $school->id;
                    $schoolfees->per_month_fees = $request->per_month_fees[$i];
                    $schoolfees->annual_fees = $request->annual_fees[$i];
                    $schoolfees->status = 'active';
                    $schoolfees->save();
                }
            }
        }
        // if ($request->hasFile('image')) {
        //     if ($school->image && File::exists(public_path($school->image))) {
        //         File::delete(public_path($school->image));
        //     }

        //     $file = $request->file('image');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/images/user/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->image = 'assets/images/user/school/' . $filename;
        // }

        // if ($request->hasFile('document')) {
        //     if ($school->document && File::exists(public_path($school->document))) {
        //         File::delete(public_path($school->document));
        //     }

        //     $file = $request->file('document');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/documents/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->document = 'assets/documents/school/' . $filename;
        // }

        $school->save();

       return redirect()->route('partner.school.list')->with('success', 'School Partner updated successfully.');
    }

    public function destroy($id)
    {
        $school = partnerSchool::findOrFail($id);
        if ($school->image) {
            Storage::disk('public')->delete($school->image);
        }
        $school->delete();

        return redirect()->route('partner.school.list')->with('success', 'School Partner deleted successfully.');
    }

     /**
     * Display a listing of the resource.
     */
    public function Partnerindex(){
        $banners = SchoolBanner::where('type','partner_school')->where('status','active')->get();
        return view('admin.partner-school.banner.list',compact('banners'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Partnercreate(){
        $schools = partnerSchool::where('status','active')->get();  
       return view('admin.partner-school.banner.create',compact('schools'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Partnersave(Request $request){
    $request->validate([
        'status' => 'required', 
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'school_id'  => 'required'
    ]);

    if ($request->hasFile('banner_image')) {
        $file = $request->file('banner_image');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/images/partnerschooldetail/banner/', $filename);
        $bannerimage = 'assets/images/partnerschooldetail/banner/' . $filename;
    }

    $banner = new SchoolBanner();
    $banner->school_id = $request->school_id;
    $banner->image = $bannerimage ?? null;
    $banner->status = $request->status;
    $banner->type = 'partner_school';
    $banner->save();

    if ($banner) {
        return redirect()->route('partner.banner.list')->with('success', 'Banner added successfully.');
    } else {
        return redirect()->route('partner.banner.list')->with('error', 'There was an issue adding the Banner.');
    }
}



    /**
     * Show the form for editing the specified resource.
     */
    public function Partneredit($id){
        $getdata = SchoolBanner::where('type','partner_school')->where('id',$id)->first();
        $schools = partnerSchool::where('status','active')->get();  

       return view('admin.partner-school.banner.edit',compact('getdata','schools'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function Partnerupdate(Request $request){
        $request->validate([
            'status' => 'required', 
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        $id = $request->id;
        $datafind = SchoolBanner::find($id);


        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/schooldetail/banner/', $filename);
            $bannerimage = 'assets/images/schooldetail/banner/' . $filename;
        }else{
            $bannerimage = $datafind->image;
        }
      
        $datafind->school_id = $request->school_id;
        $datafind->image = $bannerimage;
        $datafind->status = $request->status;
        $datafind->type = 'partner_school';

        $datafind->save();

        if($datafind){
          return redirect()->route('partner.banner.list')->with('success', 'Banner updated successfully.');
        }else{
          return redirect()->route('partner.banner.list')->with('error', 'There was an issue updating the Banner.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function Partnerdestroy($id)
    {
        $banner = SchoolBanner::find($id);

        if (!$banner) {
            return response()->json([
                'success' => false,
                'message' => 'Banner not found',
            ]);
        }

        // Delete image if it exists
        if ($banner->image && File::exists($banner->image)) {
            File::delete($banner->image);
        }

        $deleted = $banner->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Banner deleted successfully' : 'Failed to delete Banner',
        ]);
    }


    // Partner School Gallery
      /**
     * Display a listing of the resource.
     */
    public function galleryindex(){
        $gallerydatas = SchoolGallery::where('type','partner_school')->where('status','active')->get();
        return view('admin.partner-school.gallery.list',compact('gallerydatas'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function gallerycreate(){
          $schools = partnerSchool::where('status','active')->get();  
       return view('admin.partner-school.gallery.create',compact('schools'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function gallerysave(Request $request){
    
        $request->validate([
            'status' => 'required', 
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        if ($request->hasFile('gallery_image')) {
            $file = $request->file('gallery_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/partnerschooldetail/gallery/', $filename);
            $galleryimage = 'assets/images/partnerschooldetail/gallery/' . $filename;
        }
    
        $gallery = new SchoolGallery();
        $gallery->school_id = $request->school_id;
        $gallery->image = $galleryimage;
        $gallery->status = $request->status;
        $gallery->type = 'partner_school';
        $gallery->save();

        if($gallery){
          return redirect()->route('partner.gallery.list')->with('success', 'Gallery added successfully.');
        }else{
          return redirect()->route('partner.gallery.list')->with('error', 'There was an issue adding the gallery.');
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function galleryedit($id){
        $schools = partnerSchool::where('status','active')->get();  
        $getdata = SchoolGallery::where('type','partner_school')->where('id',$id)->first();
       return view('admin.partner-school.gallery.edit',compact('getdata','schools'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function galleryupdate(Request $request){
        $request->validate([
            'status' => 'required', 
            'gallery_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        $id = $request->id;
        $datafind = SchoolGallery::find($id);


        if($request->hasFile('gallery_image')) {
            $file = $request->file('gallery_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/partnerschooldetail/gallery/', $filename);
            $galleryimage = 'assets/images/partnerschooldetail/gallery/' . $filename;
        }else{
            $galleryimage = $datafind->image;
        }
      

        $datafind->school_id = $request->school_id;
        $datafind->image = $galleryimage;
        $datafind->status = $request->status;
        $datafind->type = 'partner_school';
        $datafind->save();

        if($datafind){
          return redirect()->route('partner.gallery.list')->with('success', 'Gallery updated successfully.');
        }else{
          return redirect()->route('partner.gallery.list')->with('error', 'There was an issue updating the gallery.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function gallerydestroy($id)
    {
        $gallery = SchoolGallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
            ]);
        }

        // Delete image if it exists
        if ($gallery->image && File::exists($gallery->image)) {
            File::delete($gallery->image);
        }

        $deleted = $gallery->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Gallery  deleted successfully' : 'Failed to delete gallery',
        ]);
    }


    // facility
    /**
     * Display a listing of the resource.
     */
    public function facilityindex(){
        $facility = Schoolfacility::where('status','active')->where('type','partner_school')->get();
        return view('admin.partner-school.facility.list',compact('facility'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function facilitycreate(){
    $schools = partnerSchool::where('status','active')->get();  
       return view('admin.partner-school.facility.create',compact('schools'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function facilitysave(Request $request){
    
        $request->validate([
            'status' => 'required', 
            'name' => 'required',      
        ]);

        

        $facility = new Schoolfacility();
        // $facility->school_id = $request->school_id;
        $facility->name = $request->name;
        $facility->status = $request->status;
        $facility->type = 'partner_school';
        $facility->save();

        if($facility){
          return redirect()->route('partner.facility.list')->with('success', 'Facility added successfully.');
        }else{
          return redirect()->route('partner.facility.list')->with('error', 'There was an issue adding the Facility.');
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function facilityedit($id){
        $schools = partnerSchool::where('status','active')->get();  
        $getdata = Schoolfacility::where('id',$id)->where('type','partner_school')->first();
       return view('admin.partner-school.facility.edit',compact('getdata','schools'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function facilityupdate(Request $request){
        $request->validate([
            'status' => 'required', 
            'name' => 'required',      
        ]);

        $id = $request->id;
        $datafind = Schoolfacility::find($id);

        // $datafind->school_id = $request->school_id;
        $datafind->name = $request->name;
        $datafind->status = $request->status;
        $datafind->type = 'partner_school';

        $datafind->save();

        if($datafind){
          return redirect()->route('partner.facility.list')->with('success', 'Facility updated successfully.');
        }else{
          return redirect()->route('partner.facility.list')->with('error', 'There was an issue updating the Facility.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function facilitydestroy($id)
    {
        $facility = Schoolfacility::find($id);

        if (!$facility) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }

    

        $deleted = $facility->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Facility deleted successfully' : 'Failed to delete Facility',
        ]);
    }

    // Partner school about us
     /**
     * Display a listing of the resource.
     */
    public function aboutusindex()
    {
        $aboutus = SchoolAboutus::where('status','active')->where('type','partner_school')->get();
        return view('admin.partner-school.aboutus.list',compact('aboutus'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function aboutuscreate()
    {
       $schools = partnerSchool::where('status','active')->get();  
       return view('admin.partner-school.aboutus.create',compact('schools')); 
    }



    /**
     * Display the specified resource.
     */
    public function aboutusstore(Request $request)
    {
     $request->validate([
            'description' => 'required',
            'school_id' => 'required',
        ]);
        
        $about = new SchoolAboutus();
        $plainText = strip_tags($request->description);
        $about->school_id = $request->school_id; 
        $about->description = $plainText;
        $about->type = 'partner_school';
        $save = $about->save();

        if ($save) {
            return redirect()->route('partner.aboutus.list')
                ->with('success', 'About us content Added successfully.');
        } else {
            return redirect()->route('partner.aboutus.list')
                ->with('error', 'There was an issue adding the About us content.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function aboutusedit($id)
    {  
        $schools = partnerSchool::where('status','active')->get(); 
        $data = SchoolAboutus::where('id', $id)->first();
        return view('admin.partner-school.aboutus.aboutus', compact('data','schools'));
    }

    /**SchoolAboutus
     * Update the specified resource in storage.
     */
     public function aboutusupdate(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $id = $request->id;

        if ($id) {
            $about = SchoolAboutus::find($id);
        } 
        $plainText = strip_tags($request->description);
        $about->school_id = $request->school_id; 
        $about->description = $plainText;
        $about->type = 'partner_school';
        $save = $about->save();

        if ($save) {
            return redirect()->route('partner.aboutus.list')
                ->with('success', 'About us content updated successfully.');
        } else {
            return redirect()->route('partner.aboutus.list')
                ->with('error', 'There was an issue updating the About us content.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */


    public function aboutusdestroy($id)
    {
        $facility = SchoolAboutus::find($id);

        if (!$facility) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }


        $deleted = $facility->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'About us deleted successfully' : 'Failed to delete About us',
        ]);
    }

    public function searchPreschools1(Request $request,$state)
    {
        $query = 'preschool+in+' . urlencode($state);
        $apiKey = 'AIzaSyDMtBK-d6Vb-ePgYQdOURRTUQ00aUHKDZU'; // store API key in .env

        // Fetch places
        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => $query,
            'key'   => $apiKey,
            
        ]);

        if (!$response->successful()) {
            return back()->withErrors('Error fetching results from Google Places API.');
        }

        $places = $response->json()['results'] ?? [];

        foreach ($places as &$place) {

            // Skip if school already exists
            if (partnerSchool::where('place_id', $place['place_id'])->exists()) {
                continue; // skip existing schools
            }

            // Image
            $place['image_url'] = isset($place['photos'][0]['photo_reference'])
                ? "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={$place['photos'][0]['photo_reference']}&key={$apiKey}"
                : "https://via.placeholder.com/400x300?text=No+Image";

            // Default values
            $phone = $website = 'Not Available';
            $city = $state = $zip = 'Not Available';

            // Fetch Place Details
            if (!empty($place['place_id'])) {
                $detailsResponse = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                    'place_id' => $place['place_id'],
                    'fields'   => 'formatted_phone_number,website,address_component',
                    'key'      => $apiKey,
                ]);

                if ($detailsResponse->successful()) {
                    $details = $detailsResponse->json()['result'] ?? [];
                    $phone = $details['formatted_phone_number'] ?? 'Not Available';
                    $website = $details['website'] ?? 'Not Available';

                    foreach ($details['address_components'] ?? [] as $component) {
                        if (in_array('locality', $component['types'])) $city = $component['long_name'];
                        if (in_array('administrative_area_level_1', $component['types'])) $state = $component['long_name'];
                        if (in_array('postal_code', $component['types'])) $zip = $component['long_name'];
                    }
                }
            }

            // Save new school only
            partnerSchool::create([
                'place_id'       => $place['place_id'],
                'school_name'    => $place['name'] ?? 'N/A',
                'school_phone_1' => $phone,
                'address'        => $place['formatted_address'] ?? 'N/A',
                'rating'        => $place['rating'] ?? 'N/A',
                'city'           => $city,
                'state'          => $state,
                'zip'            => $zip,
                'school_logo'      => $place['image_url'],
            ]);
        }

        return $places;
    }

    public function searchPreschools(Request $request, $state)
    {
        set_time_limit(120); // Extend script execution time
        $query = 'preschool+in+' . urlencode($state);
        $apiKey = 'AIzaSyDMtBK-d6Vb-ePgYQdOURRTUQ00aUHKDZU'; // store API key securely in .env

        $places = [];
        $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json';
        $params = [
            'query' => $query,
            'key' => $apiKey,
        ];

        do {
            // Fetch API Response
            $response = Http::get($url, $params);
            if (!$response->successful()) {
                return back()->withErrors('Error fetching results from Google Places API.');
            }

            $data = $response->json();
            $results = $data['results'] ?? [];

            foreach ($results as &$place) {
                // Skip if already exists
                if (partnerSchool::where('place_id', $place['place_id'])->exists()) continue;

                // Image URL
                $place['image_url'] = isset($place['photos'][0]['photo_reference'])
                    ? "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={$place['photos'][0]['photo_reference']}&key={$apiKey}"
                    : "https://via.placeholder.com/400x300?text=No+Image";

                // Default values
                $phone = $website = 'Not Available';
                $city = $stateName = $zip = 'Not Available';


                // Latitude & Longitude
                $latitude = $longitude = null;
                if (!empty($place['geometry']['location'])) {
                    // dd('dd');
                    $latitude = $place['geometry']['location']['lat'] ?? null;
                    $longitude = $place['geometry']['location']['lng'] ?? null;
                }
// dd($latitude);
                // Fetch details (optional)
                if (!empty($place['place_id'])) {
                    $detailsResponse = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                        'place_id' => $place['place_id'],
                        'fields'   => 'formatted_phone_number,website,address_component',
                        'key'      => $apiKey,
                    ]);

                    if ($detailsResponse->successful()) {
                        $details = $detailsResponse->json()['result'] ?? [];
                        $phone = $details['formatted_phone_number'] ?? 'Not Available';
                        $website = $details['website'] ?? 'Not Available';

                        foreach ($details['address_components'] ?? [] as $component) {
                            if (in_array('locality', $component['types'])) $city = $component['long_name'];
                            if (in_array('administrative_area_level_1', $component['types'])) $stateName = $component['long_name'];
                            if (in_array('postal_code', $component['types'])) $zip = $component['long_name'];
                        }
                    }
                }

                // Save new school
                partnerSchool::create([
                    'place_id'       => $place['place_id'],
                    'school_name'    => $place['name'] ?? 'N/A',
                    'school_phone_1' => $phone,
                    'address'        => $place['formatted_address'] ?? 'N/A',
                    'rating'         => $place['rating'] ?? 'N/A',
                    'city'           => $city,
                    'state'          => $stateName,
                    'zip'            => $zip,
                    'school_logo'    => $place['image_url'],
                    'lat'       => $latitude,
                    'long'      => $longitude,
                ]);
            }

            // Store all results
            $places = array_merge($places, $results);

            // Check for next page token
            $nextPageToken = $data['next_page_token'] ?? null;

            if ($nextPageToken) {
                // Google API needs a small delay before next_page_token becomes active
                sleep(2);
                $params = ['pagetoken' => $nextPageToken, 'key' => $apiKey];
            }

        } while ($nextPageToken);

        return $places;
    }



}
