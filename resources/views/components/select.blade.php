
<select {{ $attributes->merge(["class"=>"relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border shadow-sm rounded-xl focus:outline-none focus:ring-1"]) }}>
    {{ $slot }}
</select>
