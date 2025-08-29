@extends('layouts.web')
@section('css')
<title>Preschool Admission Enquiry | Contact 9to9 School Admissions Team</title>
<meta name="description" content="Submit your preschool admission enquiry to 9to9 School. Get support with child enrollment, speak directly with our admissions team, and fill out the inquiry form for a smooth preschool admission process.">
<meta name="keywords" content="preschool admission enquiry, preschool enrollment contact, child enrollment support, preschool inquiry form, talk to admissions team, preschool admission help, preschool registration enquiry, early education enrollment, preschool admission process, contact preschool admissions">

<meta property="og:title" content="Preschool Admission Enquiry | Contact 9to9 School Admissions Team">
<meta property="og:description" content="Reach out to 9to9 School to inquire about preschool admissions. Get help from our admissions team and learn more about the enrollment process.">
<meta property="og:url" content="https://9to9school.com/enroll-enquiry">
<meta property="og:type" content="website">
<meta property="og:image" content="https://9to9school.com/assets/images/admission-enquiry.jpg"> <!-- Replace with actual image path -->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Preschool Admission Enquiry | Contact 9to9 School Admissions Team">
<meta name="twitter:description" content="Submit your preschool admission enquiry and connect with our expert admissions team to guide you through the enrollment process.">
<meta name="twitter:image" content="https://9to9school.com/assets/images/admission-enquiry-twitter.jpg"> <!-- Replace with actual image path -->

<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
   />
<style>
   #page-header {
   transition: transform 0.4s ease, opacity 0.4s ease;
   transform: translateY(0);
   opacity: 1;
   }
</style>
@stop
@section('body')
<!-- enquiry form -->
<main data-aos="fade-up" class="px-2 md:px-8 lg:px-10 py-10">
    <div class="container mx-auto">
        <h1 class="text-center text-3xl md:text-4xl font-bold">ENQUIRE NOW</h1>



        <!-- form -->
        <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg border border-black/10 mt-10">


             {{-- Show validation errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

             @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session('success') }}</strong>
                </div>
            @endif

            <form class="space-y-5" method="POST" action="{{ route('enrollenquiry.save') }}">
                <input type="hidden" name="page" value="enroll_enquiry">
            @csrf
            <!-- Full Name -->
                <div>
                    <label class="block font-semibold mb-1">Full Name</label>
                    <input type="text" name="name" placeholder="Full Name" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                </div>
                <!-- Email ID -->
                <div>
                    <label class="block font-semibold mb-1">Email ID</label>
                    <input type="email"  name="email" placeholder="Email ID" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                </div>
                <!-- Phone Number -->
                <div>
                    <label class="block font-semibold mb-1">Phone Number</label>
                    <input type="number" name="mobile"  placeholder="Phone Number" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                </div>
                <!-- Select State & City -->
                <div >
                    <label for="location" class="block font-semibold mb-1">Pin Code *</label>
                    <input type="text" class="form-control" id="pin_code" required name="pin_code">
                </div>
                <div >
                    <label for="location" class="block font-semibold mb-1">City *</label>
                    <input type="text" class="form-control" id="city" required name="city">
                </div>
                <div >
                    <label for="location" class="block font-semibold mb-1">State *</label>
                    <input type="text" class="form-control" id="state" required name="state">
                </div>
                <!-- Message -->
                <div>
                    <label class="block font-semibold mb-1">Message</label>
                    <textarea  name="message" placeholder="Write Message" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 h-32" required></textarea>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="block w-fit mx-auto px-8 py-3 bg-cyan-400 text-white font-semibold rounded-md hover:bg-cyan-500 transition cursor-pointer">
                    Submit
                </button>
            </form>
        </div>
    </div>
</main>
@stop
@section('js')
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.getElementById('pin_code').addEventListener('keyup', function () {
            const pincode = this.value;

            if (pincode.length === 6) {
                fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data[0].Status === "Success") {
                            const postOffice = data[0].PostOffice[0];
                            document.getElementById('city').value = postOffice.District;
                            document.getElementById('state').value = postOffice.State;
                        } else {
                            document.getElementById('city').value = '';
                            document.getElementById('state').value = '';
                            alert('Invalid Pincode or Data Not Found');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Something went wrong. Please try again.');
                    });
            }
        });
    </script>
@stop
