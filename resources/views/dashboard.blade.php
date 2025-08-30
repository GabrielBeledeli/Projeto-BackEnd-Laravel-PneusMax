<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Estoque de Pneus') }}
            </h2>
            <a href="{{ route('pneus.create') }}">
                <x-primary-button>
                    {{ __('Cadastrar Pneu') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">

            <!-- Session Status -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sucesso!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Erro!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <main class="li-est-main">
                        <section id="tabela-estoque">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">Aro</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medida</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-24">Preço</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">Qtd</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Largura</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perfil</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Índice Peso</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Índice Velocidade</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Construção</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terreno</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Desenho</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($pneus as $pneu)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->id_pneu }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->marca }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->modelo }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->aro }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->medida }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($pneu->preco, 2, ',', '.') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->quantidade_estoque }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->largura ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->perfil ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->indice_peso ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->indice_velocidade ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->tipo_construcao ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->tipo_terreno ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $pneu->especificacao?->desenho ?? 'N/D' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-x-4">
                                                        <a href="{{ route('pneus.edit', $pneu) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                        <form method="POST" action="{{ route('pneus.destroy', $pneu) }}" onsubmit="return confirm('Você tem certeza que deseja excluir este pneu?');" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                    Nenhum pneu encontrado.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $pneus->links() }}
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>