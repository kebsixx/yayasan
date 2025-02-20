@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="p-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h4 class="text-xl font-bold">Schedules</h4>
            <a href="{{ route('admin.schedules.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add New Schedule
            </a>
        </div>
    </div>
    
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Month</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $schedule->title }}</td>
                    <td class="px-4 py-3">{{ $schedule->month }}</td>
                    <td class="px-4 py-3">{{ Str::limit($schedule->description, 50) }}</td>
                    <td class="px-4 py-3">
                        <img src="{{ asset($schedule->image) }}" alt="Schedule Image" class="h-12 w-12 object-cover rounded">
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.schedules.edit', $schedule) }}" class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection