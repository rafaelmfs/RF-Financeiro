<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                          </tr>
                        </thead>
                        <tbody>
                            <td class="m-2 p-2" scope="row" >{{$user->id}}</td>
                            <td class="m-2 p-2">{{$user->name}}</td>
                            <td class="m-2 p-2">{{$user->email}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
