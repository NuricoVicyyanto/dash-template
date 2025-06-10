@extends('layout.index')

@section('title', 'Dashboard — My App')

@section('content')
    <div class="body-wrapper-inner py-6">
        <div class="container-fluid">
            <div class="card shadow rounded-xl border border-gray-200">
                <div class="card-body p-6">
                    <h5 class="card-title fw-semibold mb-4 text-gray-800 text-2xl">Daftar User</h5>

                    <!-- Search Bar -->
                    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                        <div class="flex items-center gap-2">
                            <input type="text" name="search" value="{{ $search ?? '' }}"
                                placeholder="Cari nama, email, atau role..."
                                class="w-full p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">
                                Cari
                            </button>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="table-responsive rounded-xl overflow-hidden">
                        <table class="min-w-full bg-white border border-gray-200 text-gray-700 text-sm">
                            <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
                                <tr>
                                    <th class="py-3 px-4 text-left">#</th>
                                    <th class="py-3 px-4 text-left">Nama</th>
                                    <th class="py-3 px-4 text-left">Email</th>
                                    <th class="py-3 px-4 text-left">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr class="hover:bg-gray-50 transition duration-300">
                                        <td class="py-3 px-4">{{ $users->firstItem() + $index }}</td>
                                        <td class="py-3 px-4 font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="py-3 px-4">{{ $user->email }}</td>
                                        <td class="py-3 px-4">
                                            <span class="inline-block px-2 py-1 text-xs rounded-full
                                                {{ $user->role === 'admin' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                                            Tidak ada data user.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->withQueryString()->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
