<a href="{{ route('delivery_location.edit', $delivery_location->id) }}" class="btn btn-secondary">Edit</a>
<a href="javascript:void(0);" class="btn btn-secondary" onclick="deleteLocations('{{ route('delivery_location.delete', $delivery_location->id) }}')">Delete</a>