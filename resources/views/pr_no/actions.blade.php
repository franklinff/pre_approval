<a href="{{ route('vendor.edit', $vendor_details->id) }}" class="btn btn-secondary">Edit</a>
<a href="javascript:void(0);" class="btn btn-secondary" onclick="deleteVendor('{{ route('vendor.delete', $vendor_details->id) }}')">Delete</a>