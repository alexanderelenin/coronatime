<x-parent>
    <div class="flex flex-col w-full ">
       <x-header/>

       <div class="flex flex-col mt-6 p-4 md:h-screen md:px-8">
        <h1 class="text-3xl font-bold">{{__('texts.worldwide_statistics')}}</h1>

        <section class="mt-16 md:m-10">
            <div class="w-full  border-solid  border-b-[1px] h-10">
                <a class="text-lg font-bold border-solid border-b-[3px] border-black inline-block h-10" href="">{{__('texts.worldwide')}}</a>
                <a class="text-lg px-4 font-base inline-block" href="{{route('by.country')}}">{{__('texts.by_country')}}</a>
            </div>

            <div class="grid grid-rows-2 grid-col-4 gap-y-6 gap-x-0 mt-24 md:flex flex-col  lg:flex-row justify-around md:w-full 2xl:h-[100%] items-center">
                <div class="col-span-4 row-start-1 row-end-2 flex flex-col {{App::currentLocale() =='ka' ? 'mx-2' : 'mx-0'}} items-center justify-around p-4 bg-[#2029F3] bg-opacity-[0.08] rounded-xl min-h-[193px] md:min-w-[350px] 2xl:min-w-[392px] 2xl:min-h-[255px]">

                    <img src="{{asset("images/new-cases.svg")}}" alt="">
                    <p class="text-xl font-bold {{App::currentLocale() =='ka' ? 'text-base' : ''}}">{{__("texts.new_cases")}}</p>
                    <p class="text-[#2029F3] text-2xl md:text-4xl font-bold">{{number_format($countries->pluck('new_cases')->sum(),0,",")}}</p>
                </div>
                <div class="col-start-1 col-end-3 row-start-2 flex flex-col {{App::currentLocale() =='ka' ? 'ml-2 w-[180px] px-6' : ''}} items-center justify-around p-4 bg-[#249E2C] bg-opacity-[0.08] rounded-xl min-h-[193px] md:min-w-[350px] 2xl:min-w-[392px] 2xl:min-h-[255px]">
                    <img src="{{asset("images/recovered.svg")}}" alt="">
                    <p class="text-xl {{App::currentLocale() =='ka' ? 'text-base' : ''}} font-bold">{{__("texts.recovered")}}</p>
                    <p class="text-[#249E2C] text-2xl  md:text-4xl font-bold">{{number_format($countries->pluck('recovered')->sum(),0,",")}}</p>
                </div>
                <div class="col-start-3 col-end-5 flex flex-col {{App::currentLocale() =='ka' ? 'mr-2 w-[180px] px-6' : ''}} items-center justify-around p-4 bg-[#EAD621] bg-opacity-[0.08] rounded-xl min-h-[193px] md:min-w-[350px] 2xl:min-w-[392px] 2xl:min-h-[255px]">
                    <img src="{{asset("images/death.svg")}}" alt="">
                    <p class="text-xl font-bold {{App::currentLocale() =='ka' ? 'text-base' : ''}}">{{__("texts.death")}}</p>
                    <p class="text-[#EAD621] text-2xl md:text-4xl font-bold">{{number_format($countries->pluck('deaths')->sum(),0,",")}}</p>
                </div>
            </div>
        </section>
       </div>
        
    </div>
</x-parent>