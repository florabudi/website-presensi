@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 ">{{ __('silahkan absen hari ini') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <style>
       
        /* Terapkan animasi pada elemen waktu */
        .clock {
            animation: none;  /* Menghentikan animasi */
        }
    
        /* Tambahkan margin-bottom untuk memberikan jarak antara jam dan tombol */
        #currentTime {
            margin-bottom: 50px; /* Sesuaikan ukuran margin sesuai kebutuhan */
        }
    
        /* CSS untuk bintang */
        .star {
            position: absolute;
            width: 8px; /* Standardized size for stars */
            height: 8px;
            background-color: rgba(1, 138, 250, 0.9); /* Slightly adjusted color */
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(16, 91, 253, 0.658);
            animation: twinkle 2s infinite ease-in-out;
            opacity: 0.8; /* Set a base opacity */
        }
    
        /* Animasi berkedip */
        @keyframes twinkle {
            0%, 100% {
                opacity: 0.6; /* Base opacity for twinkling effect */
            }
            50% {
                opacity: 0.2; /* Reduce opacity for twinkling */
            }
        }
    
        /* Gerakan bintang secara acak */
        @keyframes moveStar {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(15px); /* Slightly less movement */
            }
        }
    
        /* Bintang bergerak */
        .move {
            animation: moveStar 2s ease-in-out infinite alternate; /* Smoother transition */
        }
    </style>
    
    <div id="starContainer" style="position: relative; height: 100vh; overflow: hidden;">
        <div class="row justify-content-center" style="margin-top: 150px;"> <!-- Add margin-top here -->
        <!-- Time and Date Section -->
        <div class="col-lg-12 mt-4 text-center">
            <h5 id="currentDate"></h5>
            <h5 id="currentTime" style="font-size: 5rem; font-weight: bold;"></h5>
        </div>
        <!-- Color System -->
        <form action="{{ route('Datang') }}" method="POST" class="col-lg-3 mb-3">      
            @csrf     
                <button class="card text-white shadow text-center" style="background-color: #67cbf8; border: none; width: 100%; cursor: pointer;" type="submit">
                    <div class="card-body" style="font-size: 1rem;">
                        Datang
                    </div>
                </button>
        </form>
        
        <form action="{{ route('Pulang') }}" method="POST"  class="col-lg-3 mb-3">
            @csrf
                <button class="card text-white shadow text-center" style="background-color: #f300008e; border: none; width: 100%; cursor: pointer;" type="submit">
                    <div class="card-body" style="font-size: 1rem;">
                        Pulang
                    </div>
                </button>
        </form>
        
    <script>
        // Function to update time and date
        function updateTime() {
            const now = new Date();
            
            // Get date in 'Day, Date Month Year' format
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const currentDate = now.toLocaleDateString('en-US', options);
            
            // Get time in 'HH:MM:SS' format
            const currentTime = now.toLocaleTimeString();

            // Display the date and time
            document.getElementById('currentDate').textContent = currentDate;
            const timeElement = document.getElementById('currentTime');
            timeElement.textContent = currentTime;

        }

        // Function to create stars
        function createStars(numStars) {
            const starContainer = document.getElementById('starContainer');
            for (let i = 0; i < numStars; i++) {
                const star = document.createElement('div');
                star.className = 'star move'; // Assign class for styling and animation
                const x = Math.random() * window.innerWidth; // Random x position
                const y = Math.random() * window.innerHeight; // Random y position
                star.style.left = `${x}px`;
                star.style.top = `${y}px`;
                starContainer.appendChild(star);
            }
        }

        // Update the time immediately and every second
        setInterval(updateTime, 1000); // Update every second
        updateTime();

        // Create a set number of stars on page load
        window.onload = function() {
            createStars(100); // Change the number to create more or fewer stars
        };
       
    // Define the function to handle the "Datang" button click
    function handleDatangClick() {
        // Action when "Datang" button is clicked
        alert('anda sudah absen  ');
        // Replace this alert with other actions (like a form submission or page redirect)
    }


        
    </script>
    
@endsection
