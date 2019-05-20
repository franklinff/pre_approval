<div style="display: flex">
<a href="{{ route('po_number.edit', $po->id) }}" class="btn btn-secondary">Edit</a>
<a href="{{ route('generate.purchase_order_pdf',$po->id.'_po') }}" target="_blank" rel="noopener" class="btn btn-secondary">View</a>
</div>
