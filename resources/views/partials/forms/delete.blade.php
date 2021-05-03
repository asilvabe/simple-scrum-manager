<delete-component title="@lang('common.confirmation_delete.title')" message="@lang('common.confirmation_delete.message')" confirm-text="@lang('common.delete')"  cancel-text="@lang('common.cancel')">
    @csrf
    @method('DELETE')
</delete-component>
