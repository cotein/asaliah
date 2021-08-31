<template >
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <slot name="card_header"></slot>
                </div>
                <div class="card-body">
                    <slot name="card_body"></slot>
                </div>
                <div class="card-footer">
                    <slot name="card_footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>