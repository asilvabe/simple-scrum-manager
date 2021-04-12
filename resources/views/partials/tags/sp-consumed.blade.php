<div class="control">
    <div class="tags has-addons">
        <span class="tag is-success is-family-monospace">
            @lang('common.story-points-consumed')
        </span>
        <span class="tag is-success is-family-monospace">
            {{ \App\Helpers\NumberFormatter::human($count) }}
        </span>
    </div>
</div>
