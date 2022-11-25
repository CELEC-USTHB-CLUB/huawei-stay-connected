<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/main.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/svg" sizes="32x32" href="./Image/Landing.svg" />
    <title>CELEC Huawei conference</title>
    @livewireStyles
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="./Image/Celec_Logo_Blue.svg" alt="CELEC Logo" />
            </div>
            <nav>
                <ul>
                    <!-- <li><a href="#">Home</a></li> -->
                </ul>
            </nav>
        </div>
    </header>

    <div class="landing">
        <div class="container">
            <div class="form">
                <div class="text">
                    <h1><span>HUAWEI</span> Conference</h1>
                    {{-- @livewire('generate-qr') --}}
                    <form action="{{ url('generate') }}" method="POST" wire:submit.prevent="submit">
                        @csrf
                        <div class="input-info">
                            <input type="email" id="email" placeholder=" " class="form-input" name="email"
                                wire:model.debounce.500ms="email" required />
                            <label for="email">Your registration Email</label>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="submit-btn">
                            <button type="submit" value="Submit">
                                <h5>
                                    Generate
                                    <div wire:loading wire:target="submit">
                                        <div class="spinner-border text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </h5>
                            </button>

                        </div>
                    </form>
                </div>
                <div class="image">
                    <img src="./Image/Huawei_Logo.png" alt="" />
                </div>
            </div>
            <div class="remarque">
                <p>
                    A QR code will be downloaded, this QR code is your ticket to enter
                    the event you must gard it and present it at the entry
                </p>
            </div>
            <div class="remarque">
                <p>
                    <i>Hosted by:</i>
                    <br />
                    <a href="https://adexcloud.dz/"><img style="width: 250px;" src="./Image/adex.png" alt="" /></a>
                </p>
            </div>
        </div>
    </div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
@livewireScripts

</html>