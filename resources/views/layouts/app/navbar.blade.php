<nav class="mt-6 container px-11 sm:px-20">
    <div class="flex items-center justify-between p-4">
        <button>
            <div class="flex items-center ">
                <h2 class="text-white font-bold text-2xl">Magic</h2>
            </div>
        </button>
        <div class="hidden lg:block">
            <ul class="flex space-x-10 text-base font-bold text-white">
                <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                    <a href="#founder">Founder</a>
                </li>
                <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                    <a href="#berita">Berita</a>
                </li>
                <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                    <a href="#team">Team</a>
                </li>
                <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                    <a href="#info">Info Berita</a>
                </li>
                <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                    <a href="#sponsor">Sponsor</a>
                </li>
            </ul>
        </div>
       
        <div class="flex items-center justify-center lg:hidden">
            <button id="burger-menu" class="block lg:hidden">
                <svg id="burger-icon" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg id="close-icon" class="hidden w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
        </div>
    </div>
    <!--Mobile Nav-->
    <div class="container px-48">
   <div id="mobile-nav" class="hidden absolute top-16 w-[178px] px-4 rounded-l-lg bg-white shadow-lg sm:hidden z-10">
    
       <div class="grid grid-cols-1 gap-3">
                   <a href="#founder" class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">Founder</a>
                   <a href="#berita" class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">Berita</a>
                   <a href="#team" class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">Team</a>

                   <a href="#info" class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">Info Berita</a>

                   <a href="#sponsor" class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">Sponsor</a>

       </div>
     </div>
   </div>

     <script>
       const burgerMenu = document.getElementById('burger-menu');
       const mobileNav = document.getElementById('mobile-nav');
       const burgerIcon = document.getElementById('burger-icon');
       const closeIcon = document.getElementById('close-icon');

     
       burgerMenu.addEventListener('click', () => {
         mobileNav.classList.toggle('hidden');
         burgerIcon.classList.toggle('hidden');
         closeIcon.classList.toggle('hidden');
       });
     </script>
</nav>