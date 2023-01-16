@props(['name', 'label', 'placeholder'=> '', 'type'=>'text'])

<div class="relative lg:w-full">
    <label for="{{$name}}" class="block text-base font-bold text-black-700 capitalize">{{ucwords($label)}}</label>
    <div class="mt-1 md:mb-2 {{App::currentLocale()=='ka'? 'mb-1':''}} relative">
      <input id="{{$name}}" name="{{$name}}" type="{{$type}}" value="{{old($name)}}" autocomplete="email" 
            required 
            @class(['block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 md:py-4 placeholder-gray-400 shadow-sm 
            focus:border-indigo-500 focus:shadow-indigo-400 focus:outline-none focus:ring-indigo-500 sm:text-base',
            'border-red-500'=>$errors->has($name),
            'border-green-500'=> !$errors->has($name) & old($name) == true   ]) 
            placeholder="{{$placeholder}}"
          >
          <img src="{{asset('images/passed.svg')}}" alt="passed" class="{{!$errors->has($name) & old($name)==true ? 'block absolute right-2 top-[30%]' : 'hidden'}}">
    </div> 

    @error($name)
      <div class="flex items-center mt-2 absolute bottom-[-25px]">
        <img src="{{asset('images/failed.svg')}}" alt="failed" class="w-[20px] h-[20px]">
        <p class="text-red-500 text-base px-1 font-semibold">{{$message}}</p>
      </div>
    @enderror
</div>