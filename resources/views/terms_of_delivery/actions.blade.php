<a href="{{ route('delivery_location.edit', $terms_of_delivery->id) }}" class="btn btn-secondary">Edit</a>
<a href="javascript:void(0);" class="btn btn-secondary" onclick="deleteLocations('{{ route('terms_of_delivery.delete', $terms_of_delivery->id) }}')">Delete</a>