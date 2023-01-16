<x-form>

<div class="md:p-10  items-center lg:items-start flex flex-1 w-[60%] flex-col  py-12 px-4 sm:px-6 xl:flex-none lg:px-20 xl:px-24 lg:py-5">
    <div class="w-full sm:w-[60%] 2xl:max-w-[60%] 2xl:ml-20">
      <div class="h-auto 2xl:w-[60%]  2xl:mt-10">
        <img class="h-12 w-auto mb-10" src="images/logo.svg" alt="Your Company">
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-black-400 w-full  xl:whitespace-nowrap">{{__("texts.welcome_to_coronatime")}}</h2>
        <p class="mt-2 text-l w-full text-gray-400 md:whitespace-nowrap">
          {{__("texts.please_enter_required_info_to_sign_up")}} 
        </p>
      </div>

      <div class=" relative">
        

        <div class="mt-4">
          <form action="{{route('user.create')}}" method="POST" class="space-y-6">
           @csrf
            <x-form.input name='username' label="{{__('texts.username')}}" placeholder="{{__('texts.enter_unique_username')}}"/>

            <x-form.input name='email' label="{{__('texts.email')}}"  type='email' placeholder="{{__('texts.enter_your_email')}}"/>

            <x-form.input name='password' label="{{__('texts.password')}}" type='password' placeholder="{{__('texts.fill_in_password')}}"/>

            <x-form.input name='password_confirmation' label="{{__('texts.repeat_password')}}" type='password' placeholder="{{__('texts.placeholder_repeat_password')}}"/>

           

            <div class="h-16">
              <button type="submit" class="h-14 flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm lg:text-base font-bold text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{__('texts.sign_up')}}</button>
            </div>

            <div class="text-center">
              <p class="text-gray-500">{{__('texts.already_have_an_account?')}} <span class="font-bold text-black"><a href="{{route('login.index')}}">{{__('texts.log_in')}}</a> </span></p>
            </div>
          </form>
        </div> 

        
      </div>
    </div>
</div>

</x-form>