<x-parent>
    <div class="flex w-full justify-center  ">
        <section class="flex flex-col justify-between h-screen md:h-[60%]">
            <div class="mb-10 xl:self-center p-6 sm:self-start">
                <img src="images/logo.svg" alt="logo">
            </div>
         
            <div class="flex flex-col justify-between p-6 h-[70%] md:mt-20">
                <div class="flex flex-col items-center">
                    <img src="images/checked.svg" alt="checked" width="56px" height="56px">
                    <p class="text-center text-2xl my-10">{{__('texts.your_password_has_been_updated_successfully')}}</p>
                    
                </div>
                <div class="h-16">
                   
                 <a class="flex items-center w-full h-14 justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-md font-bold  text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 " 
                 href="{{route('login.index')}}">
                     {{__('texts.sign_in')}}
                 </a> 
                    
                </div>
            </div>

        </section>
    </div>
</x-parent>