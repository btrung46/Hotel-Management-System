<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.css')
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        @include('home.header')
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <div class="row" style="padding-top: 40px">
        <div class="col-md-12">
            <div class="titlepage">
                <h2>Booking page</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
            </div>
        </div>
    </div>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-7"><img class="card-img-top mb-5 mb-md-0" src="room/{{ $room->image }}"
                        alt="..." /></div>
                <div class="col-md-5">
                    <h1 style="font-size: 50px">{{ $room->room_title }}</h1>
                    <div class="fs-2 mb-3">
                        <span style="
                            color: black;">Price: {{ $room->price }}$</span> <br>
                        <span style="
                        color: black;">Room type: {{ $room->room_type }}</span>
                    </div>
                    <p class="lead" style="color: black;"> {{ $room->description }}</p>
                    <br>
                    <a href="{{ route('home') }}" class="btn btn-dark">Back</a>
                </div>
            </div>
            <div class="container mt-5" style="width: 800px">
                <h2 style="font-size: 30px" class="text-center mb-4">Book room</h2>
                    <form action="{{route('book_room',$room->id)}}" method="POST"enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <!-- Booking Details -->
                    <div class="mb-3">
                        <label for="checkInDate" class="form-label">Check-In Date</label>
                        <input type="date" class="form-control" id="checkindate" name="checkindate" required>
                    </div>
                    <div class="mb-3">
                        <label for="checkOutDate" class="form-label">Check-Out Date</label>
                        <input type="date" class="form-control" id="checkoutdate" name="checkoutdate" required>
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary w-100">Book Now</button>
                </form>
            </div>
    </section>
    <footer>
        @include('home.footer')
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#checkindate').attr('min', maxDate);
            $('#checkoutdate').attr('min', maxDate);

        });
    </script>
</body>

</html>
