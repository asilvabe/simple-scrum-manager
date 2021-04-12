<button class="button" type="button" title="{{ $text ?? trans('common.delete')}}" @click="$emit('confirm-delete', {{ json_encode(['route' => $route])  }})">
    <b-icon type="is-danger" icon="{{ $icon ?? 'delete' }}"></b-icon>
</button>
