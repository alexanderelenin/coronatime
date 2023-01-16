<x-parent>
    <div class="flex w-full justify-center  ">
        <section class="flex flex-col justify-between h-screen md:h-[60%]">
            <div class="mb-10 xl:self-center p-6 sm:self-start">
                <img src="{{asset('images/logo.svg')}}" alt="">
            </div>

            <div class="flex flex-col justify-between p-6 h-[70%] md:mt-20">
                <div class="flex flex-col items-center">
                    <img src="{{asset('images/checked.svg')}}" alt="" width="56px" height="56px">
                    <p class="text-center text-2xl my-10">{{__('texts.we_have_sent_you_a_confirmation email')}} </p>
                    
                </div>
            </div>
        </section>
    </div>
</x-parent>