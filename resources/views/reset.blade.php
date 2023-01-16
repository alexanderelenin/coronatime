<x-parent>
    <div class="flex w-full justify-center  ">
        <section class="flex flex-col w-[392px] h-screen md:h-[80%]">
            <div class="mb-10 xl:self-center p-6 sm:self-start">
                <img src="images/logo.svg" alt="">
            </div>
            <form action="" class="w-full h-[90%] md:h-[60%]">
                @csrf
                <div class="flex flex-col justify-between p-6 h-[100%]">
                    <div class="flex flex-col justify-between mb-4 ">
                        <p class="text-center font-bold text-2xl my-10">{{__('texts.reset_password')}}</p>
                        <x-form.input name='email' label="{{__('texts.email')}}" placeholder="{{__("texts.enter_your_email")}}"/>
                    </div>
                    <div class="h-16">
                        <button type="submit" class="flex items-center w-full h-14 justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-bold  text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 uppercase ">
                            {{__('texts.reset_password')}} 
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-parent>