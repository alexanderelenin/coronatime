<x-parent>
     <div class="flex justify-between w-full p-8 md:p-10 items-center h-[80px] border-b border-solid-gray">
            <div class="w-[50%]">
                <img src="{{asset('images/logo.svg')}}" alt="logo">
            </div>
            
            <div class="flex justify-around w-[50%] items-center ml-3 md:justify-around md:w-[30%]">
                <div x-data="{ show: false }"
                class="w-26">
                    
                    <button
                    class="self-center px-2 flex items-center justify-around w-[100px] lg:w-24 lg:justify-around"
                     @click= "show = !show">
                     {{App::currentLocale()==='en'? 'English' : 'ქართული'}}
                    <img src={{asset("images/arrow.svg")}} alt="">
                    </button>
                    
                    <div x-show="show" 
                        class="flex flex-col text-base absolute text-center lg:text-center z-10 bg-white">
                        <a href="{{route('language.change', 'en')}}" class="block p-2 text-base hover:bg-gray-300 rounded-xl">English</a>
                        <a href="{{route('language.change', 'ka')}}" class="block  p-2 text-base hover:bg-gray-300 rounded-xl">ქართული</a>
                    </div>
                </div>
                <div x-data="{ show: false }"
                    class="md:hidden">
                    <button @click = "show = !show "
                    class="flex items-center  w-[40px] justify-center ">
                        <img src={{asset("images/hamburger.svg")}} alt="" width="24px" height="24px"> 
                    </button>

                    <div
                    x-show="show" 
                    class="flex flex-col text-left absolute  lg:text-center z-10 bg-white">
                        <p class="py-2 block text-base text-center bg-gray-300 hover:bg-gray-300 rounded-xl">{{auth()->user()->username}}</p>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="p-2 text-base border-x-2 md:block hover:bg-gray-300 rounded-xl hover:text-red-500" >{{__('texts.log_out')}}</button>
                        </form>
                    </div>

                    
                   
                </div>
                
                <p class="p-2 text-base hidden md:block hover:bg-gray-300 rounded-xl font-bold ">{{auth()->user()->username}}</p>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-sm  hidden md:block hover:bg-gray-300 rounded-xl" >{{__('texts.log_out')}}</button>
                </form>
               
                
                
            </div>
        </div>
</x-parent>