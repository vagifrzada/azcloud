<a href="{{ route('admin.product-features.delete', ['id' => $id])  }}"
   class="btn btn-sm btn-icon btn-pure btn-default"
   onclick="return confirm('Are you sure to delete this feature ?')"
>
    <i class="icon md-delete" aria-hidden="true"></i>
</a>
<a href="{{ route('admin.product-features.edit', ['product_feature' => $id])  }}" class="btn btn-sm btn-icon btn-pure btn-default">
    <i class="icon md-edit" aria-hidden="true"></i>
</a>
