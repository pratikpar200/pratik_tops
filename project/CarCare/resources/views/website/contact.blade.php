@extends('website.layout.main')

@section('main_container')

    <!-- Page Header Banner -->
    <section class="bg-dark text-white py-5">
        <div class="container py-4 text-center" data-aos="fade-down">

            <span class="badge bg-warning text-dark fw-bold px-3 py-2 mb-2">
                GET IN TOUCH
            </span>

            <h1 class="display-4 fw-bold text-white">
                Contact Car Care
            </h1>

            <nav>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-warning text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active text-white">
                        Contact
                    </li>
                </ol>
            </nav>

        </div>
    </section>



    <!-- Contact Information -->

    <section class="py-5 bg-white">

        <div class="container">

            <div class="row g-4 mb-5 text-center">


                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border-top border-warning border-4">

                        <i class="fa-solid fa-location-dot fs-2 text-warning"></i>

                        <h5 class="fw-bold mt-3">
                            Our Location
                        </h5>

                        <p class="text-muted">
                            123 Auto Street, Auto City
                        </p>

                    </div>
                </div>



                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border-top border-primary border-4">

                        <i class="fa-solid fa-phone fs-2 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Phone
                        </h5>

                        <p class="text-muted">
                            +91 98765 43210
                        </p>

                    </div>
                </div>




                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border-top border-success border-4">

                        <i class="fa-solid fa-envelope fs-2 text-success"></i>

                        <h5 class="fw-bold mt-3">
                            Email
                        </h5>

                        <p class="text-muted">
                            info@carcare.com
                        </p>

                    </div>
                </div>




                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border-top border-danger border-4">

                        <i class="fa-solid fa-clock fs-2 text-danger"></i>

                        <h5 class="fw-bold mt-3">
                            Working Hours
                        </h5>

                        <p class="text-muted">
                            Mon-Sat 8AM-8PM
                        </p>

                    </div>
                </div>


            </div>




            <div class="row g-5">


                <!-- Contact Form -->

                <div class="col-lg-6" data-aos="fade-right">


                    <div class="card shadow border-0 rounded-4 p-4">


                        <h3 class="fw-bold mb-4">
                            Send Us A Message
                        </h3>

                        @if(session('success'))
                            <div class="alert alert-success bg-success text-white border-0 alert-dismissible fade show rounded-3 mb-4" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-circle-check fs-5 me-2"></i>
                                    <div>{{ session('success') }}</div>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        <form action="{{ route('contact.store') }}" method="POST">

                            @csrf



                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Name
                                </label>

                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Enter your name">


                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>





                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Enter email">


                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>





                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Subject
                                </label>


                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}"
                                    placeholder="Service Inquiry">


                                @error('subject')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror


                            </div>





                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Message
                                </label>


                                <textarea name="message" class="form-control" rows="5"
                                    placeholder="Write your message">{{ old('message') }}</textarea>



                                @error('message')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror


                            </div>




                            <button type="submit" class="btn btn-warning rounded-pill px-4 py-3 fw-bold">

                                <i class="fa-solid fa-paper-plane me-2"></i>

                                Send Message

                            </button>


                        </form>


                    </div>


                </div>





                <!-- Google Map -->


                <div class="col-lg-6" data-aos="fade-left">


                    <div class="rounded-4 overflow-hidden shadow h-100">


                        <iframe class="w-100" style="height:450px;border:0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.617539659083!2d-73.985428!3d40.748817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1625068250000!5m2!1sen!2sus"
                            loading="lazy">

                        </iframe>


                    </div>


                </div>



            </div>


        </div>


    </section>


@endsection