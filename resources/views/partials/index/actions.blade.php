<div class="buttons is-right has-addons">
    <a href="{{ route($module.'.show', $model) }}" class="button is-primary is-inverted is-small">
        <b-icon icon="eye-outline"></b-icon>
    </a>
    <a href="{{ route($module.'.edit', $model) }}" class="button is-primary is-inverted is-small">
        <b-icon icon="pencil-box-outline"></b-icon>
    </a>
    <button class="button is-inverted is-small is-danger" type="button" @click="$emit('confirm-delete', {{ json_encode(['route' => route($module.'.destroy', $model)])  }})">
        <b-icon icon="delete-outline"></b-icon>
    </button>
</div>
