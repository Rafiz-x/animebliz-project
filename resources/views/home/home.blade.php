@extends('home.master')


@section('title', $APP_NAME)

@section('main')
    <div id="hero" class="relative w-full min-h-fit flex items-center bg-cover py-20 sm:py-28 md:py-32 lg:py-40"
        style="background:  linear-gradient(90deg, rgb(20, 20, 20, 0.1) 40%, transparent 100%) 0% 0% / cover, 
        linear-gradient(0deg, rgb(20, 20, 20) 1%, transparent 99%),
        url({{ asset('img/narutoBG.jpg') }});
        ">

        {{-- <div class="bg-img absolute top-0 left-0 w-full h-full aspect-[2/3] -z-10">
            <picture>
                <source media="(max-width:770px)" srcset="//image.tmdb.org/t/p/w780/mpsYIytXhDXjI9yYC1Fp1S3PxsS.jpg">
                <source media="(max-width:1280px)" srcset="//image.tmdb.org/t/p/w1280/mpsYIytXhDXjI9yYC1Fp1S3PxsS.jpg">
                <img class="w-full h-full " src="//image.tmdb.org/t/p/original/mpsYIytXhDXjI9yYC1Fp1S3PxsS.jpg">
            </picture>
        </div> --}}

        <div class="absolute top-0 left-0 w-full h-full bg-[rgba(0,0,0,0.6)] opacity-20"
            style="box-shadow: 0px 0px 50px 40px rgba(0,0,0,0.1);"></div>

        {{--

        <div class="absolute bottom-0 left-0 w-full h- bg-[#141414] opacity-100"
            style="box-shadow: 0px 0px 25px 22px #141414;"></div> --}}

        <div class="w-full mx-auto">
            <div
                class="w-full flex flex-col gap-2 font-semibold text-white px-[3.5vw] text-[16px] md:text-lg md:gap-4 lg:text-xl lg:gap-5">
                <div class="logo w-[200px]">
                    <img src="{{ asset('img/narutoLogo.png') }}" alt="LOGO" class="drop-shadow-lg">
                </div>

                <div class="flex gap-3 textShadow">
                    <span class="match text-[#54ff96]">84% Match</span>
                    <span class="year">2002</span>
                    <span>706 Episodes</span>
                </div>

                <p class="overflow-hidden overflow-ellipsis line-clamp-3 max-w-[90vw] textShadow xs:max-w-[80vw] lg:max-w-[35vw] text-sm lg:text-base xl:text-lg">
                    In the Village Hidden in the Leaves, there are few things Naruto and Choji love more than a steaming
                    bowl of Ichiraku ramen, and when the daughter of the owner is kidnapped, they're on the case. Then,
                    missions for the Leaf ninja lead them to the Land of Bears after a fallen meteorite and the Land of
                    Greens to protect a princess. When an evil ninja who's after the princess gets in their way, it's
                    Naruto's life on the line!
                </p>

                <div class="btns mt-4 flex gap-2 text-sm font-normal md:text-[16px] lg:text-lg">
                    <button
                        class="flex justify-center items-center gap-1 px-2 py-1 sm:px-4 sm:py-2 bg-[#ff5f5f] rounded-md drop-shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ddd" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="svgIcon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                        </svg>
                        <span>Watch Now</span>
                    </button>

                    <button class="flex justify-center items-center gap-1 px-2 py-1 bg-[#4664c7] rounded-md drop-shadow-md">
                        <svg class="svgIcon text-[#ddd]" viewBox="0 0 24 24" fill="none" stroke="#ddd" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="16" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                        </svg>
                        <span>More Information</span>
                    </button>

                </div>
            </div>
        </div>

    </div>

    <div class="content mt-10 py-3">
        <section class="py-2">

            <div class="name flex items-center gap-1.5 px-[3vw] cursor-pointer">
                <div class="ball w-3 sm:w-3.5 aspect-square rounded-full"></div>
                <h1 class="text-lg sm:text-xl md:text-[22px] xl:text-2xl">Trending Anime</h1>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 sm:w-[22px] lg:w-6"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#c0bbbb">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>

                </div>
                <span
                    class="show text-[#9d9999] font-semibold tracking-wide -ml-3 opacity-0 pointer-events-none transition-all">Show
                    All</span>
            </div>

            {{-- ### SLIDER ### --}}
            <div class="sliderParent relative">
                <div class="slider w-full overflow-x-scroll overflow-y-hidden">
                    <div class="controls">
                        <div
                            class="left hidden absolute top-[50%] left-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div
                            class="right hidden absolute top-[50%] right-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                    <div class="wrapper flex w-fit gap-2.5 px-[3vw] py-4 -mt-2.5">

                        <div
                            class="slide shadow-current w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>


                    </div>
                </div>

            </div>
            {{-- ### SLIDER END ### --}}

        </section>

        <section class="py-2">

            <div class="name flex items-center gap-1.5 px-[3vw] cursor-pointer">
                <div class="ball w-3 sm:w-3.5 aspect-square rounded-full"></div>
                <h1 class="text-lg sm:text-xl md:text-[22px] xl:text-2xl">Trending Anime</h1>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 sm:w-[22px] lg:w-6"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#c0bbbb">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>

                </div>
                <span
                    class="show text-[#9d9999] font-semibold tracking-wide -ml-3 opacity-0 pointer-events-none transition-all">Show
                    All</span>
            </div>

            {{-- ### SLIDER ### --}}
            <div class="sliderParent relative">
                <div class="slider w-full overflow-x-scroll overflow-y-hidden">
                    <div class="controls">
                        <div
                            class="left hidden absolute top-[50%] left-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div
                            class="right hidden absolute top-[50%] right-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                    <div class="wrapper flex w-fit gap-2.5 px-[3vw] py-4 -mt-2.5">

                        <div
                            class="slide shadow-current w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>


                    </div>
                </div>

            </div>
            {{-- ### SLIDER END ### --}}

        </section>

        <section class="py-2">

            <div class="name flex items-center gap-1.5 px-[3vw] cursor-pointer">
                <div class="ball w-3 sm:w-3.5 aspect-square rounded-full"></div>
                <h1 class="text-lg sm:text-xl md:text-[22px] xl:text-2xl">Trending Anime</h1>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 sm:w-[22px] lg:w-6"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#c0bbbb">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>

                </div>
                <span
                    class="show text-[#9d9999] font-semibold tracking-wide -ml-3 opacity-0 pointer-events-none transition-all">Show
                    All</span>
            </div>

            {{-- ### SLIDER ### --}}
            <div class="sliderParent relative">
                <div class="slider w-full overflow-x-scroll overflow-y-hidden">
                    <div class="controls">
                        <div
                            class="left hidden absolute top-[50%] left-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div
                            class="right hidden absolute top-[50%] right-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                    <div class="wrapper flex w-fit gap-2.5 px-[3vw] py-4 -mt-2.5">

                        <div
                            class="slide shadow-current w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>
                        <div
                            class="slide w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] cursor-pointer relative rounded-sm aspect-[2/3]">
                            <button class="content w-full h-full bg-cover transition-all md:hover:scale-[1.1]"
                                style="background-image: url({{ asset('img/demonSlayer.jpg') }})">
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                </div>
                                <div
                                    class="info absoluteCenter  text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 mt-10">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </button>
                        </div>


                    </div>
                </div>

            </div>
            {{-- ### SLIDER END ### --}}

        </section>
    </div>
@endsection
