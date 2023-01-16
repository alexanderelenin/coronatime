

<x-parent>
    <div class="flex flex-col w-full">
       <x-header/>

       <div class="flex flex-col mt-6 p-4 md:px-8">
        <h1 class="text-3xl font-bold">{{__("texts.statistics_by_country")}}</h1>

        <section class="mt-16 md:m-10">
            <div class="w-full  border-solid  border-b-[1px] h-10">
                <a class="text-lg inline-block" href="{{route('worldwide')}}">{{__("texts.worldwide")}}</a>
                <a class="text-lg font-bold border-solid border-b-[3px] border-black inline-block h-10 px-4" href="{{route('by.country')}}">{{__("texts.by_country")}}</a>
            </div>

            <div class="mt-4">
                <form action="{{route('country.search')}}" method="POST" class="flex md:border rounded-xl p-4 max-w-[239px] max-h-12 items-center">
                    @csrf
                    <img src={{asset("images/search.svg")}} alt="search">
                    <input type="text" name="search" placeholder="{{__('texts.search_by_country')}}" class="p-2 focus:outline-none" value="{{old('search')}}">
                </form>
            </div>

            
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-10 overflow-y-auto max-h-96 ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  ">
                    <thead class="sticky top-[-5px] text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 overflow-y-scroll">
                        <tr class="bg-gray-200 overflow-y-scroll">
                            <th scope="col" class="py-3 flex items-center px-1 md:px-6 max-w-[100px] md:w-[25%] text-sm capitalize">
                                {{__("texts.location")}}
                                <a href="{{route('by.country', 'column=id&order='. $order)}}"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                            </th>
                            <th scope="col" class="py-3 px-1 sm:px-6">
                                <div class="flex items-center min-w-[90px] md:w-auto capitalize">
                                    {{__("texts.new_cases")}}
                                    <a href="{{route('by.country', 'column=new_cases&order='. $order)}}"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-1 sm:px-6 md:w-[25%] capitalize">
                                <div class="flex items-center">
                                    {{__("texts.death")}}
                                    <a href="{{route('by.country', 'column=deaths&order='. $order)}}"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-1 sm:px-6 md:w-[25%] capitalize">
                                <div class="flex items-center">
                                    {{__("texts.recovered")}}
                                    <a href="{{route('by.country', 'column=recovered&order='. $order)}}"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                                </div>
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            
                        
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-2 px-1 md:px-6 md:py-4 font-medium text-gray-900 md:whitespace-nowrap
                              dark:text-white max-w-[100px] md:w-[25%]">
                                {{$country->name}}
                            </th>
                            <td class="py-4  sm:px-6 md:py-4">
                                {{$country->new_cases}}
                            </td>
                            <td class="py-4  sm:px-6 md:py-4">
                                {{$country->deaths}}
                            </td>
                            <td class="py-4  sm:px-6 md:py-4">
                                {{$country->recovered}}
                            </td>
                        
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>


            
        </section>
       </div>
        
    </div>
</x-parent>