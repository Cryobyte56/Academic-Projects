<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }
    </style>
    <title>Your Page Title</title>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <i class="fa fa-snowflake-o fa-lg text-primary mr-2"></i><strong>Cryotech</strong>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link font-italic"> Home </a></li>
                    <li class="nav-item active"><a href="#" class="nav-link font-italic"> About </a></li>
                    <li class="nav-item active"><a href="#" class="nav-link font-italic"> Services </a></li>
                    <li class="nav-item active"><a href="#" class="nav-link font-italic"> Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- About Section -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">About us </h1>
                    <p class="lead text-muted mb-0">Cryotech is a platform that caters to the diverse needs and desires of customers. 
                        As passionate advocates of innovation and customer satisfaction, we not only acknowledge but prioritize the 
                        ever-evolving needs of our tech-savvy users. </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="logo-main-light.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Quality</h2>
                    <p class="font-italic text-muted mb-4">At the heart of our mission is a commitment to delivering products of the highest quality. 
                        We carefully handpick each item, working with trusted suppliers and manufacturers to ensure our customers receive the best. 
                        Whether you're looking for the latest trends in cutting-edge electronics, innovative gadgets, or unique tech essentials for your home, 
                        rest assured that weve got you covered. </p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Diversity</h2>
                    <p class="font-italic text-muted mb-4">We understand that every customer is unique, with individual tastes and preferences. 
                        That's why our catalog provides diverse technology products, allowing you to explore and discover items that resonate 
                        with your needs and interests. From timeless classics to the latest innovations, we strive to provide a variety that caters 
                        to all preferences and lifestyles. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Convenience</h2>
                    <p class="font-italic text-muted mb-4">Shopping at Cryotech is not just about buying products; it's about embracing a lifestyle of 
                        convenience. Our user-friendly interface, secure payment options, and reliable delivery services are designed to make your online 
                        shopping experience as smooth and seamless as possible. We value your time and trust and do our best to exceed your expectations 
                        at every step.</p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            </div>

    <!-- Team Section -->
    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="display-4 font-weight-light">Our team</h2>
                    <p class="font-italic text-muted">The project creators</p>
                </div>
            </div>
            <div class="row text-center">
                <!-- Team item 1 -->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Mary Escarlan</h5>
                        <span class="small text-uppercase text-muted">Project creator</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team item 2 -->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">leoj Ramirez</h5>
                        <span class="small text-uppercase text-muted">Project creator</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="https://www.facebook.com/leoj.ramirez.90" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team item 3 -->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">luis Victor</h5>
                        <span class="small text-uppercase text-muted">Project creator</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team item 4 -->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Daniel Valdez</h5>
                        <span class="small text-uppercase text-muted">Project creator</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-light pb-5">
        <div class="container text-center">
            <p class="font-italic text-muted mb-0">&copy; Copyrights Company.com All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap and Font Awesome JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
