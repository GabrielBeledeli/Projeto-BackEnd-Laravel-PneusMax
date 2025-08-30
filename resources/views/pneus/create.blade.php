<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Pneu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('pneus.store') }}">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 mb-4">Dados do Pneu</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Marca -->
                            <div>
                                <x-input-label for="marca" :value="__('Marca *')" />
                                <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" required autofocus />
                            </div>

                            <!-- Modelo -->
                            <div>
                                <x-input-label for="modelo" :value="__('Modelo *')" />
                                <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')" required />
                            </div>

                            <!-- Aro -->
                            <div>
                                <x-input-label for="aro" :value="__('Aro *')" />
                                <x-text-input id="aro" class="block mt-1 w-full" type="text" name="aro" :value="old('aro')" required oninput="this.value = this.value.replace(/\D/g, '')" />
                            </div>

                            <!-- Medida -->
                            <div>
                                <x-input-label for="medida" :value="__('Medida *')" />
                                <x-text-input id="medida" class="block mt-1 w-full" type="text" name="medida" :value="old('medida')" required />
                            </div>

                            <!-- Preco -->
                            <div>
                                <x-input-label for="preco" :value="__('Preço *')" />
                                <x-text-input id="preco" class="block mt-1 w-full" type="text" name="preco" :value="old('preco')" required />
                            </div>

                            <!-- Quantidade em Estoque -->
                            <div>
                                <x-input-label for="quantidade_estoque" :value="__('Quantidade em Estoque *')" />
                                <x-text-input id="quantidade_estoque" class="block mt-1 w-full" type="text" name="quantidade_estoque" :value="old('quantidade_estoque')" required oninput="this.value = this.value.replace(/\D/g, '')" />
                            </div>
                        </div>

                        <h2 class="text-lg font-medium text-gray-900 mt-6 mb-4">Especificações Técnicas</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Largura -->
                            <div>
                                <x-input-label for="largura" :value="__('Largura *')" />
                                <x-text-input id="largura" class="block mt-1 w-full" type="text" name="largura" :value="old('largura')" required oninput="this.value = this.value.replace(/\D/g, '')" />
                            </div>

                            <!-- Perfil -->
                            <div>
                                <x-input-label for="perfil" :value="__('Perfil *')" />
                                <x-text-input id="perfil" class="block mt-1 w-full" type="text" name="perfil" :value="old('perfil')" required />
                            </div>

                            <!-- Indice Peso -->
                            <div>
                                <x-input-label for="indice_peso" :value="__('Índice de Peso')" />
                                <x-text-input id="indice_peso" class="block mt-1 w-full" type="text" name="indice_peso" :value="old('indice_peso')" />
                            </div>

                            <!-- Indice Velocidade -->
                            <div>
                                <x-input-label for="indice_velocidade" :value="__('Índice de Velocidade')" />
                                <x-text-input id="indice_velocidade" class="block mt-1 w-full" type="text" name="indice_velocidade" :value="old('indice_velocidade')" />
                            </div>

                            <!-- Tipo Construcao -->
                            <div>
                                <x-input-label for="tipo_construcao" :value="__('Tipo de Construção *')" />
                                <x-text-input id="tipo_construcao" class="block mt-1 w-full" type="text" name="tipo_construcao" :value="old('tipo_construcao')" required />
                            </div>

                            <!-- Tipo Terreno -->
                            <div>
                                <x-input-label for="tipo_terreno" :value="__('Tipo de Terreno')" />
                                <x-text-input id="tipo_terreno" class="block mt-1 w-full" type="text" name="tipo_terreno" :value="old('tipo_terreno')" />
                            </div>

                            <!-- Desenho -->
                            <div>
                                <x-input-label for="desenho" :value="__('Desenho *')" />
                                <x-text-input id="desenho" class="block mt-1 w-full" type="text" name="desenho" :value="old('desenho')" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Cadastrar Pneu') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
