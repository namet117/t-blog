<template>
    <span :style="styles">
        <i :class="faClass" aria-hidden="true"></i>
    </span>
</template>

<script>
export default {
    name: 'fa-icon',
    props: {
        className: {
            type: String,
            required: true
        },
        fontSize: {
            type: Number,
            default: 14
        },
        fontColor: {
            type: String,
            default: ''
        },
    },
    computed: {
        styles() {
            let s = {
                fontSize: this.fontSize + 'px'
            };
            if(this.fontColor) {
                s['color'] = this.fontColor;
            }
            return s;
        },
        faClass() {
            return ['fa', 'fa-' + this.className]
        }
    }
}
</script>
