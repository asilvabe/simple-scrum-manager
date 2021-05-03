<div class="control">
    <div class="tags has-addons" title="@lang('Sprints')">
        <span class="tag is-primary is-family-monospace">
            @lang('common.sprints')
        </span>
        <span class="tag is-primary is-family-monospace">
            {{ \App\Helpers\NumberFormatter::human($count) }}
        </span>
    </div>
</div>
