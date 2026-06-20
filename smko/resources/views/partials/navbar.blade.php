<header class="bg-white border-b border-slate-200 p-4 shadow-sm">
    <div class="mx-auto flex max-w-7xl items-center justify-between">
        <div>
            <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-slate-900">SMKO</a>
        </div>
        <div class="flex items-center gap-3">
            @auth
                <div
                    class="flex items-center gap-2 rounded border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700">
                    <div class="text-sm font-medium text-slate-900">{{ auth()->user()->name }}</div>
                    <div class="rounded bg-slate-200 px-2 py-0.5 text-xs uppercase text-slate-600">
                        {{ auth()->user()->role }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center rounded bg-red-600 px-3 py-1.5 text-sm font-medium text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-slate-700">Login</a>
            @endauth
        </div>
    </div>
</header>