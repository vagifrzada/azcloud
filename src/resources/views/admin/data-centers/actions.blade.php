<a href="{{ route('admin.data-centers.delete', ['id' => $id])  }}"
   class="btn btn-sm btn-icon btn-pure btn-default"
   onclick="return confirm('Are you sure to delete this data center ?')"
>
    <i class="icon md-delete" aria-hidden="true"></i>
</a>
<a href="{{ route('admin.data-centers.edit', ['data_center' => $id])  }}" class="btn btn-sm btn-icon btn-pure btn-default">
    <i class="icon md-edit" aria-hidden="true"></i>
</a>
