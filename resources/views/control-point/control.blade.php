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
                        <div class="mb-2">
                            <x-input-label for="ClockIn" :value="__('Entrada')" />
                            <x-text-input id="ClockIn" name="ClockIn" type="time" class="mt-1 md:w-32 lg:w-48" :value="old('ClockIn', $controlPoint->ClockIn)" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('ClockIn')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="LunchTimeIn" :value="__('Saída Almoço')" />
                            <x-text-input id="LunchTimeIn" name="LunchTimeIn" type="time" :value="old('LunchTimeIn', $controlPoint->LunchTimeIn)" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('LunchTimeIn')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="LunchTimeOut" :value="__('Retorno Almoço')" />
                            <x-text-input id="LunchTimeOut" name="LunchTimeOut" type="time" :value="old('LunchTimeOut', $controlPoint->LunchTimeOut)" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('LunchTimeOut')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="ClockOut" :value="__('Fim do dia')" />
                            <x-text-input id="ClockOut" name="ClockOut" type="time" :value="old('ClockOut', $controlPoint->ClockOut)" class="mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('ClockOut')" />
                        </div>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-2">
                            <x-primary-button aria-setsize="lg">{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</x-app-layout>
