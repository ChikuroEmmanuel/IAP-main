<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('generate-token') }}">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Generate Token for the drugs API</button>
                </form>

                @if (session('token'))
                    <div>
                        Your token is: {{ session('token') }}
                        <div class="mt-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="copyButton">Copy Token</button>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>