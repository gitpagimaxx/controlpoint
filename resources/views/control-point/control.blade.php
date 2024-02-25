<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Control Point') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('control-point.register') }}">
        @csrf
        @method('patch')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <span class="mx-auto"></span>
                        <div class="mb-5 mx-auto pb-5">
                            <h1 class="text-2xl">{{ \Carbon\Carbon::parse($today)->format('d/m/Y') }}</h1>
                        </div>
                        <div class="mt-4 mb-2">
                            <x-input-label for="ClockIn" :value="__('Entrada')" />
                            <x-text-input id="ClockIn" name="ClockIn" type="time" class="mt-1 md:w-32 lg:w-48" :value="old('ClockIn', $controlPointToday->ClockIn ?? '00:00')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('ClockIn')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="LunchTimeIn" :value="__('Saída Almoço')" />
                            <x-text-input id="LunchTimeIn" name="LunchTimeIn" type="time" :value="old('LunchTimeIn', $controlPointToday->LunchTimeIn ?? '00:00')" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('LunchTimeIn')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="LunchTimeOut" :value="__('Retorno Almoço')" />
                            <x-text-input id="LunchTimeOut" name="LunchTimeOut" type="time" :value="old('LunchTimeOut', $controlPointToday->LunchTimeOut ?? '00:00')" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('LunchTimeOut')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="ClockOut" :value="__('Fim do dia')" />
                            <x-text-input id="ClockOut" name="ClockOut" type="time" :value="old('ClockOut', $controlPointToday->ClockOut ?? '00:00')" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('ClockOut')" />
                        </div>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-2">
                            <x-primary-button aria-setsize="lg">{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </div>

                    <div>
                        <table class="table-auto text-white">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Entrada</th>
                                    <th>Saída Almoço</th>
                                    <th>Retorno Almoço</th>
                                    <th>Saída</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($controlPoints as $controlPoint)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($controlPoint->Date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($controlPoint->ClockIn)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($controlPoint->LunchTimeIn)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($controlPoint->LunchTimeOut)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($controlPoint->ClockOut)->format('H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </form>
</x-app-layout>
