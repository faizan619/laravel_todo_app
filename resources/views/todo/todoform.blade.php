<div class="">
    <div class="flex flex-col gap-5 items-center">
        <h1 class="text-2xl font-bold text-[#82498c]">Manage Your Task</h1>
        <div class="flex justify-between w-[90%]">

        <div class="w-[45%] border p-5 rounded-md shadow-md shadow-black">
            <form action="{{ route('task.store') }}" method="POST" class="flex flex-col gap-7">
                @csrf
                <label for="name">
                    <p class="text-[#82498c] uppercase">Task Title</p>
                    <input type="text" name="task_title"
                        class="w-full border-2 @error('task_title') border-red-700 @enderror p-2 hover:border-[#82498c] rounded-md"
                        id="name" placeholder="Eg: Completing Homework" value="{{old('task_title')}}">
                    @if ($errors->any())
                        <span class="text-red-700 px-5 rounded-md mt-[-15px]">
                            @error('task_title')
                                {{ $message }}
                            @enderror
                        </span>
                    @endif
                    {{-- @if ($errors->any()) <ol class="px-2 py-5 flex flex-col gap-5"> @foreach ($errors->all() as $error) <li class="p-3 rounded-md">{{$error}}</li> @endforeach </ol> @endif --}}

                </label>
                <label for="taskdesc">
                    <p class="text-[#82498c] uppercase">Task Description</p>
                    <textarea type="text" name="task_desc" class="w-full border-2 hover:border-[#82498c] @error('task_desc') border-red-700 @enderror h-32 p-2 rounded-md" id="taskdesc"
                        placeholder="Eg: Complete the python and django project for school">{{old('task_desc')}}</textarea>
                        @if ($errors->any())
                        <span class="text-red-700 px-5 rounded-md mt-[-15px]">
                            @error('task_desc')
                                {{ $message }}
                            @enderror
                        </span>
                    @endif
                </label>
                <label for="tasktime">
                    <p class="text-[#82498c] uppercase">Time Needed to Complete</p>
                    <input type="time" name="task_time" id="tasktime"  value="{{old('task_time')}}" class="w-full hover:border-[#82498c] @error('task_time') border-red-700 @enderror border-2 p-2 rounded-md">
                    @if ($errors->any())
                    <span class="text-red-700 px-5 rounded-md mt-[-15px]">
                        @error('task_time')
                            {{ $message }}
                        @enderror
                    </span>
                @endif
                </label>
                <button type="submit"
                    class="text-white bg-[#82498c] py-2 rounded-md hover:bg-[#54255c] transition-all">Submit</button>
            </form>
        </div>

        <div class="w-[45%] shadow-md overflow-scroll h-[29rem] shadow-black p-3">
            @forelse ($users as $user)
                <div class="bg-[#37474f] flex flex-col gap-3 p-3 mb-5 rounded-md text-white">
                    <p class="uppercase font-bold">{{ $user->task_title }}</p>
                    <p class="capitalize">{{ $user->task_desc }}</p>
                    <div class="flex bg-gray-600 py-3 px-1 rounded-md justify-between">
                        <p>Uploaded on : {{ $user->created_at }}</p>
                        <p>Complete within : {{ $user->task_time }}</p>
                    </div>
                    <div class="flex justify-between gap-10">
                        <a href="{{ route('task.edit', $user->id) }}"><button
                                class="px-5 py-2 hover:bg-blue-700 transition-all rounded-md bg-blue-600">Update</button></a>
                        <form action="{{ route('task.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-5 py-2 hover:bg-red-700 transition-all rounded-md bg-red-600">Delete</button>
                        </form>
                        {{-- <a href="{{route('task.destroy',$user->id)}}">
                    </a> --}}
                    </div>
                </div>
                @empty
                <p>No Task Created...</p>
            @endforelse
        </div>

    </div>



    </div>
    {{-- <div class="flex mt-10 justify-center items-center">

    </div> --}}
</div>
