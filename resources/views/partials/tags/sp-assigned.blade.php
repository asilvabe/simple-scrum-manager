<div class="control">
    <div class="tags has-addons">
        <span class="tag is-info is-family-monospace">
            @lang('common.story-points-assigned')
        </span>
        <span class="tag is-info is-family-monospace">
            {{ \App\Helpers\NumberFormatter::human($count) }}
        </span>
    </div>
</div>
