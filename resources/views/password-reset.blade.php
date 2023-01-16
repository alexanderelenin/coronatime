<x-parent>
    <div class="flex w-full justify-center">
        <section class="flex flex-col w-[392px] h-screen md:h-[80%]">
            <div class="mb-10 xl:self-center p-6 sm:self-start">
                <img src="{{asset('images/logo.svg')}}" alt="">
            </div>
            <form action="{{route('password.update')}}" method="POST" class="w-full h-[90%] md:h-[100%]">
                @csrf
                <div class="flex flex-col justify-between p-6 h-[100%] md:mt-10">
                    <div class="flex flex-col justify-between h-[50%] md:h-[100%] md:justify-around ">
                        <p class="text-center font-bold text-2xl my-10 md:my-0">{{__('texts.reset_password')}}</p>
                        <input type="text" name="token" class="hidden" value="{{$token}}">
                        <input type="email" name="email" class="hidden" value="{{$email}}">
                        <x-form.input name='password' label="{{__('texts.new_password')}}" type='password' placeholder="{{__('texts.enter_new_password')}}"/>
                        <x-form.input name='password_confirmation' label="{{__('texts.repeat_new_password')}}" type='password' placeholder="{{__('texts.repeat_password')}}"/>
                    </div>
                    <div class="h-16">
                        <button type="submit" class="flex items-center w-full h-14 justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-md font-bold  text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">
                            {{__('texts.save_changes')}}
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>

</x-parent>