<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="bg-gradient-to-r from-black via-blue-900 to-purple-900">
    @if (Route::currentRouteName() === 'dashboard.erlangga' || 
    Route::currentRouteName() === 'dashboard.hilmi' ||
    Route::currentRouteName() === 'news.show')
    @include('layouts.app.navbar')
@endif


    <div class="flex flex-col-reverse md:flex-row container px-8 md:px-20 gap-16">
        <div class="my-9 sm:my-28 w-full text-center md:text-left md:w-1/2 text-white">
            <h1 class="text-4xl md:text-5xl font-judul ">All the benefits of web3.<br>None of the stress.</h1>
            <p class="my-6 text-lg md:text-xl font-semibold">Magic provides the leading wallet-as-a-<br>service plus essential NFT
                capabilities.</p>
            <div class="space-x-2 py-6">
                <a href="" class="text-white font-bold bg-black border rounded-full px-7 py-3">Start Now</a>
                <a href="" class="text-white font-bold border bg-gradient-to-b from-black to-blue-500 rounded-full px-7 py-3">Contact Sales</a>
            </div>
        </div>
        <div class="w-full md:w-1/2 mt-20">
            <img src="https://magic.link/_next/image?url=%2F_next%2Fstatic%2Fimages%2Fkeys-f1f5790c68f052c73c42b9aa31b29038.png&w=1920&q=75"
                alt="">
        </div>
    </div>

    <!-- <div class="flex flex-col items-center mt-16 relative">
        <div class="max-w-3xl overflow-hidden bg-cover bg-center relative shadow-2xl rounded-lg">
            <div class="px-6 py-4 relative z-10">
                <div class=" text-base tracking-widest font-bold mb-2 text-center text-white">TRUSTED BY TRAILBLAZERS
                </div>
                <div class="flex my-9 space-x-8 animate-loop-scroll">
                    <img loading="lazy"
                        src="https://blog.sribu.com/wp-content/uploads/2023/05/NicePng_razer-logo-png_1779470.png"
                        class="max-w-none h-12 object-contain" alt="img1" />
                    <img loading="lazy"
                        src="https://blog.sribu.com/wp-content/uploads/2023/05/62a366ce6209494ec2b17063.png"
                        class="max-w-none h-12 object-contain" alt="img2" />
                    <img loading="lazy" src="https://blog.sribu.com/wp-content/uploads/2023/05/Saleen_logo_PNG_2.png"
                        class="max-w-none h-12 object-contain" alt="img3" />
                    <img loading="lazy" src="https://blog.sribu.com/wp-content/uploads/2023/05/Chobani_logo_2017.png"
                        class="max-w-none h-12 object-contain" alt="img4" />
                    <img loading="lazy"
                        src="https://blog.sribu.com/wp-content/uploads/2023/05/Yumbutter-Logotype-Tagline-FullColor-608x190-1.jpg"
                        class="max-w-none h-12 object-contain" alt="img5" />
                    <img loading="lazy" src="https://blog.sribu.com/wp-content/uploads/2023/05/TravelistaLogo-Light.png"
                        class="max-w-none h-12 object-contain" alt="img6" />
                </div>

               
                <div class="">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                        <div class="text-center ">
                            <h4 class="text-lg font-bold mb-2">Wallets</h4>
                            <div class="border-t border-gray-400 "></div>
                            <p class="text-purple-400 text-2xl mt-2 sm:mt-0">25m</p>
                        </div>
                        <div class="text-center sm:text-left mt-4 sm:mt-0">
                            <h4 class="text-lg font-bold mb-2">Developers</h4>
                            <div class="border-t border-gray-400 w-16 mx-auto sm:mx-0"></div>
                            <p class="text-purple-400 text-2xl mt-2 sm:mt-0">170k</p>
                        </div>
                        <div class="text-center sm:text-left mt-4 sm:mt-0">
                            <h4 class="text-lg font-bold mb-2">Funding</h4>
                            <div class="border-t border-gray-400 w-16 mx-auto sm:mx-0"></div>
                            <p class="text-purple-400 text-2xl mt-2 sm:mt-0">$80m+</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="mt-6 container px-6 md:px-16">
        <div class="border bg-gradient-to-r from-black via-blue-900 to-purple-900 rounded-[45px] h-[550px] w-full">
            <h1 class="mt-16  md:text-base tracking-widest font-bold mb-2 text-center text-white">TRUSTED BY TRAILBLAZERS</h1>
            <div class="justify-between items-center grid grid-cols-2 md:grid-cols-3 mt-16 gap-9 sm:gap-14 mx-14 sm:mx-24">
                <div class="flex justify-center items-center"><img src="/assets/company/paypal.svg" alt="paypal" class="w-[75%] h-[75%] sm:w-[40%] sm:h-[40%]"></div>
                <div class="flex justify-center items-center"><img src="/assets/company/walletConnect.svg" alt="wallet" class="sm:w-[72%] sm:h-[72%]"></div>
                <div class="flex justify-center items-center"><img src="/assets/company/helium.svg" alt="helium" class="w-[75%] h-[75%] sm:w-[43%] sm:h-[43%]"></div>
                <div class="flex justify-center items-center"><img src="/assets/company/polymarket.svg" alt="polymarket" class="w-[75%] h-[75%] sm:w-[53%] sm:h-[53%]"></div>
                <div class="flex justify-center items-center"><img src="/assets/company/immutable.svg" alt="immutable" class="w-[83%] h-[83%%] sm:w-[53%] sm:h-[53%]"></div>
                <div class="flex justify-center items-center"><img src="/assets/company/forbes.svg" alt="forbes" class="w-[75%] h-[75%] sm:w-[40%] sm:h-[40%]"></div>
            </div>
            <div class="flex flex-col sm:flex-row my-6 justify-center mt-9 sm:mt-16 sm:gap-48">

                <div class="flex flex-col mb-4 sm:mb-0 sm:flex-row sm:items-center sm:gap-7">
                    <div class="sm:w-px mx-auto px-36 sm:px-0 sm:mx-0 border-t sm:border-l sm:h-24 bg-gray-400"></div>
                    <div class="flex justify-around flex-row  sm:items-baseline sm:flex-col mt-2">
                        <span class="text-gray-50  opacity-35 tracking-widest font-semibold">WALLETS</span>
                        <span class="text-slate-200 text-4xl sm:text-6xl sm:mt-2 tracking-wider">25M</span>
                    </div>
                </div>
                <div class="flex flex-col mb-4 sm:mb-0 sm:flex-row sm:items-center sm:gap-7">
                    <div class="sm:w-px mx-auto px-36 sm:px-0 sm:mx-0 border-t sm:border-l sm:h-24 bg-gray-400"></div>
                    <div class="flex justify-around flex-row items-center sm:items-baseline sm:flex-col mt-2">
                        <span class="text-gray-50 opacity-35 tracking-widest font-semibold">DEVELOPERS</span>
                        <span class="text-slate-200 text-4xl sm:text-6xl tracking-wider">170K</span>
                    </div>
                </div>
                <div class="flex flex-col mb-4 sm:mb-0 sm:flex-row sm:items-center sm:gap-7">
                    <div class="sm:w-px mx-auto px-36 sm:px-0 sm:mx-0 border-t sm:border-l sm:h-24 bg-gray-400"></div>
                    <div class="flex justify-around flex-row items-center sm:items-baseline sm:flex-col mt-2">
                        <span class="text-gray-50 opacity-35 tracking-widest font-semibold">FUNDING</span>
                        <span class="text-slate-200 text-4xl sm:text-6xl mt-2 tracking-wider">$80M+</span>
                    </div>
                </div>          
            </div>    
            </div>
        </div>
    </div>

    <div class="my-24 bg-white rounded-[70px]">
        <div  id="founder" >
        <div class="text-center pt-48">
            <p class="tracking-widest">Founder</p>
            <h1 class="px-8  sm:px-0 text-4xl sm:text-5xl pt-4 mb-20 font-judul">Discover how companies are using <br class="hidden sm:block"><span class="text-blue-800">Magic’s wallet-as-a-service</span> </h1>
        </div>

        <div class="relative pt-28 sm:mt-0">
            <img class="w-full h-full object-cover"
                src="https://magic.link/_next/image?url=%2F_next%2Fstatic%2Fimages%2Fbackgroundmask-b21bd08282f811b749d8fbe66a4804c1.png&w=1920&q=75"
                alt="Background Image">
            <img class="absolute bottom-px left-12 sm:bottom-0 sm:left-0 sm:inset-0 sm:m-auto w-3/4 sm:w-1/2 h-auto"
                src="/assets/img/ERLANGGA.png"
                alt="Overlay Image">
        </div>
        </div>
        @yield('content')
    
        <div class="my-28">
            <div class="text-center ">
                <p class="tracking-widest">PRODUCTS</p>
                <h1 class="text-4xl sm:text-5xl pt-4 mb-20 font-judul">A powerful set of <br class="hidden sm:block"><span class="text-blue-800">web3 capabilities</span> </h1>
            </div>
        </div>
        <div class="container px-5 sm:px-20 mt-16">
            <div class="w-full flex flex-col-reverse sm:flex-row gap-16">
                <div class="text-left sm:w-1/2">
                    <div>
                        <p class="text-sm sm:text-2xl tracking-wider uppercase text-gray-600">wallets</p>
                        <h2 class="text-3xl sm:text-5xl mt-2 font-judul">Seamless onboarding.</h2>
                        <h2 class="text-3xl sm:text-5xl font-judul text-blue-800">High conversion.</h2>
                        <p class="max-w-md text-sm sm:text-base mt-4 text-gray-500 text-left">
                            Wallet infrastructure without seed phrases, downloads, or steps that add friction.
                        </p>
                    </div>
                    <div class="grid text-sm sm:text-base mt-12 grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-10">
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/mata.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold sm:text-md">Invisible wallets</h3>
                                <p class="mt-1 text-gray-500 text-sm">Users get wallets after sign in with email or
                                    social.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/dompet.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold text-md">Non-custodial</h3>
                                <p class="mt-1 text-gray-500 text-sm">Users have sole control over their keys and
                                    /assets.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/sidikjari.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold text-md">Authentication</h3>
                                <p class="mt-1 text-gray-500 text-sm">10+ authentication methods or bring your own</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/label.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold text-md">White-label</h3>
                                <p class="mt-1 text-gray-500 text-sm">Customize to your brand and create familiar UX</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/dollar.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold text-md">Fiat on-ramps</h3>
                                <p class="mt-1 text-gray-500 text-sm">Onboard new web3 users with easy access to crypto
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <img src="/assets/icon/word.svg" alt="" class="w-8 h-8">
                            <div>
                                <h3 class="font-semibold text-md">Multi-chain</h3>
                                <p class="mt-1 text-gray-500 text-sm">Supports 20+ blockchains</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href=""
                                class="bg-purple-100 hover:bg-purple-200 transition-all duration-700 rounded-full px-5 py-2.5 text-purple-900 font-semibold">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- nitip mobile : hidden md:flex md:w-1/4 md:justify-center md:items-center -->
                <div class=" sm:w-1/2">
                    <img src="https://magic.link/_next/image?url=%2F_next%2Fstatic%2Fimages%2Fwalletsplaceholder-8fc0fad38436619a27297a29a2e1e3c5.png&w=1920&q=75"
                        alt="Lock Icon" class="w-[full] h-[full]"> <!-- w532h598 -->
                </div>
            </div>
        </div>
        
@yield('card')
       

    @yield('sponsor')
        @yield('team')
    

    </div>



@include('layouts.app.footer')

 


</body>

</html>