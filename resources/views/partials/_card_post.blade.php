<div class="max-w-xl mx-auto my-6">
    <article class="border-t border-b border-gray-400 p-2 hover:bg-gray-100 flex items-start flex-wrap">
        <!-- profile_pic -->
        <img src="{{ $post->user->profile->url_path }}" alt=""
             class="rounded-full w-12 h-12 mr-3">
        <div class="flex flex-wrap justify-start items-start flex-1">

            <div class="flex flex-1 items-center mr-2">
                <div class="flex-1 flex items-center">
                    <h3 class="mr-2 font-bold hover:underline">
                        <!-- username -->
                        <a href="/profile/{{ $post->user->username  }}">
                            {{ $post->user->name }}
                        </a>
                    </h3>
                    <!-- icons color #908E8E -->
                    <!-- username @ -->
                    <a href="/profile/{{ $post->user->username  }}">
                    <span class="text-gray-600 text-sm mr-1 hover:underline">{{ '@' . $post->user->username }}</span>
                    </a>
                    <span class="text-gray-600 text-sm mr-1">·</span>
                    <!-- date of published -->
                    <a href="/p/{{ $post->id }}">
                    <span class="text-gray-600 text-sm hover:underline ">{{ $post->created_at }}</span>
                    </a>
                </div>

                <div class="text-gray-100">
                    <!-- expand icon -->
                    <a href=""
                       class="fill-current flex w-6 h-6 bg-transparent hover:bg-blue-200 rounded-full items-center justify-center hover:text-blue-500">
                        <img src="/card/ic_expand_more_36px.svg" alt="">
                    </a>
                </div>
            </div>

            <div class="w-full">
                <!-- description -->
                <p class="my-1">{{ $post->caption }}</p>
                <!-- image of description -->
                <div class="rounded-lg">
                    <img src="/storage/{{ $post->image }}" class="h-64 object-cover w-full rounded-lg border">
                </div>

                <!-- Comments, likes and RT -->
                <div class="flex items-center justify-start py-2 text-sm " >

                    <!-- comments -->
                    <div class="text-gray-500 flex hover:text-blue-500 items-center mr-6">
                        <a href="#" class="w-8 h-8 hover:bg-blue-200 rounded-full flex items-center justify-center hover:text-blue-500">
                            <img src="/card/comment.png" class="h-6 w-6 fill-current">
                        </a>
                        <span class="ml-1 ">1.5K</span>
                    </div>

                    <!-- RT/share -->
                    <div class="text-gray-500 flex hover:text-green-500 items-center mr-6">
                        <a href="#" class="w-8 h-8 hover:bg-green-200 rounded-full flex items-center justify-center hover:text-green-500">
                            <img src="/card/rt.png" class="h-6 w-6 fill-current">
                        </a>
                        <span class="ml-1 ">6.7K</span>
                    </div>

                    <!-- like -->
                    <div class="text-gray-500 flex hover:text-red-500 items-center mr-6">
                        <a href="#" class="w-8 h-8 hover:bg-red-200 rounded-full flex items-center justify-center hover:text-red-500">
                            <img src="/card/like.png" class="h-6 w-6 fill-current">
                        </a>
                        <span class="ml-1 ">4.5K</span>
                    </div>


                </div>
            </div>

        </div>
    </article>
</div>