<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Uczniowie"  }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (isset($message) && $message == "CREATED")
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6 text-gray-900">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ "Utworzono użytkownika: " . $user->name . " " . $user->surname }}</h2>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="overflow-x-auto relative mx-auto" style="width:70%; margin-bottom:2%;">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('user.name','Imię')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('user.surname','Nazwisko')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('user.email','Email')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('grade.letter','Klasa')
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
                </thead>
                <tbody>


                @foreach($students as $student)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$student->user->name}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$student->user->surname}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$student->user->email}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$student->grade->year . $student->grade->letter}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href={{ route('students.show',$student) }}>Szczegóły</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        {!! $students->appends(Request::except('page'))->render() !!}

        <br><br><br>

    </div>

</x-app-layout>
