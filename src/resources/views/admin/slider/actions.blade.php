<a href="{{ route('admin.slider.delete', ['id' => $id])  }}"
   class="btn btn-sm btn-icon btn-pure btn-default"
   onclick="return confirm('Are you sure to delete this slider ?')"
>
    <i class="icon md-delete" aria-hidden="true"></i>
</a>
<a href="{{ route('admin.slider.edit', ['slider' => $id])  }}" class="btn btn-sm btn-icon btn-pure btn-default">
    <i class="icon md-edit" aria-hidden="true"></i>
</a>
