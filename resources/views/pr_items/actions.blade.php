{{--
<a href="javascript:void(0);" class="btn btn-secondary" onclick="editPRitems('{{ route('pr_items.edit', $pr_items_details->id) }}')">Edit</a>
<a href="javascript:void(0);" class="btn btn-secondary" onclick="deletePRitems('{{ route('pr_items.delete', $pr_items_details->id) }}')">Delete</a>
--}}


<a class="btn btn-secondary" href="{{ route('pr_items.edit',$purchase_type_id.'_'.$pr_items_details->id ) }}" >Edit</a>
<a class="btn btn-secondary" href="{{ route('pr_items.delete',$purchase_type_id.'_'.$pr_items_details->id) }}" >Delete</a>

