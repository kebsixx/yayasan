@extends('admin.layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <div class="p-4 bg-white rounded-lg shadow-sm">
        <h5 class="text-xl font-bold mb-2">Total Schedules</h5>
        <p class="text-3xl font-bold text-blue-600">{{ App\Models\Schedule::count() }}</p>
    </div>
</div>

<div class="p-4 bg-white rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-bold">Recent Schedules</h5>
        <a href="{{ route('admin.schedules.index') }}" class="text-blue-600 hover:text-blue-800">View all</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Month</th>
                    <th class="px-4 py-2">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Schedule::latest()->take(5)->get() as $schedule)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $schedule->title }}</td>
                    <td class="px-4 py-2">{{ $schedule->month }}</td>
                    <td class="px-4 py-2">{{ $schedule->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection