

<x-form>

  <div class="md:p-6  min-h-screen items-center  lg:items-start flex flex-1 w-[60%] flex-col py-12 px-4 xl:flex-none  lg:px-24 ">
      <div class="w-full sm:w-[60%] 2xl:max-w-[60%] 2xl:ml-20">
        <div class="h-auto 2xl:w-[60%] 2xl:mt-10 ">
          <img class="h-12 w-auto mb-10" src="images/logo.svg" alt="Your Company">
          <h2 class="mt-6 text-3xl font-bold tracking-tight text-black-400 w-full lg:whitespace-nowrap">{{__('texts.welcome_back')}}</h2>
          <p class="mt-2 text-l w-full text-gray-400">
            {{__('texts.welcome_back_please_enter_your_details')}}
          </p>
        </div>

        <div class="relative">
          

          <div class="mt-6  2xl:mt-10">
            <form action="{{route('login')}}" method="POST" class="space-y-6">
              @csrf
              <x-form.input name='email' label="{{__('texts.username')}}"  placeholder="{{__('texts.enter_unique_username_or_email')}}" />

              <x-form.input name='password' label="{{__('texts.password')}}"  type='password' placeholder="{{__('texts.fill_in_password')}}"/>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                  <label for="remember-me" class="ml-2 block text-sm md:text-base font-bold text-gray-900">{{__('texts.remember_this_device')}}</label>
                </div>

                <div class="text-sm md:text-base">
                  <a href="{{route('password.request')}}" class="font-medium {{App::currentLocale()=='ka'? 'font-bold':''}} text-indigo-600 hover:text-indigo-500">{{__('texts.forgot_your_password?')}}</a>
                </div>
              </div>

              <div class="h-16">
                <button type="submit" class="flex items-center w-full h-14 justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm md:text-base font-bold  text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{__('texts.log_in')}}</button>
              </div>

              <div class="text-center">
                <p class="text-gray-500">{{__("texts.dont_have_an_account?")}} <span class="font-bold text-black"><a href="{{route('signup.index')}}">{{__('texts.sign_up_for_free')}}</a> </span></p>
              </div>
            </form>
          </div>

            <div class="text-white flex flex-row h-auto justify-between  left-42 bottom-[-10%] w-14">

                <div class=" text-black border rounded-full w-6 text-center hover:text-black hover:bg-gray-200 {{App::currentLocale()=='en'? 'bg-gray-200  text-black font-bold' : ''}} ">
                    <a href="{{route('language.change', 'en')}}">en</a>
                </div>
        
                <div class=" text-black rounded-full w-6 text-center hover:text-black hover:bg-gray-200 {{App::currentLocale()=='ka'? 'bg-gray-200 border-black text-black font-bold' : ''}} ">
                    <a href="{{route('language.change', 'ka')}}">ka</a>
                </div>
            </div>
        </div>
      </div>
    </div>

</x-form>  