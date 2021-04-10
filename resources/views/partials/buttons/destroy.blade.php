<confirm-delete-component
    title="@lang('Are you sure?')"
    message="@lang('This action cannot be undone!')"
    confirm-text="@lang('Delete')"
    cancel-text="@lang('Cancel')"
    route="{{ $route }}"
    icon="{{ $icon ?? 'delete' }}"
    label="{{ $text ?? trans('Delete') }}"
    size={{ $size ?? null }}>
</confirm-delete-component>
