<x-admin-layout>
    <x-slot name="header">
        Tags list
    </x-slot>

    <x-slot name="button">
        <x-admin.create-button :href="route('admin.tags.create')" />
    </x-slot>

    <div class="overflow-auto bg-white">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">#</th>
                    <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">Name</th>
                    <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b border-gray-200">{{ $tag->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $tag->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">
                            <a class="px-4 py-2 text-white font-light mr-3 tracking-wider bg-[#3d68ff] hover:bg-[#1947ee] rounded" href="{{ route('admin.tags.edit', $tag->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="px-4 py-2 font-light tracking-wider text-white bg-red-600 rounded hover:bg-red-800" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $tags->links() }}
    </div>
</x-admin-layout>