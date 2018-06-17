<template>
    <el-dropdown trigger="click" class='international' @command="handleSetLanguage">
        <div>
            <fa-icon class-name='language' font-size=20 class="international-icon"></fa-icon>
        </div>
        <el-dropdown-menu slot="dropdown">
            <el-dropdown-item command="zh" :disabled="language==='zh'">中文</el-dropdown-item>
            <el-dropdown-item command="en" :disabled="language==='en'">English</el-dropdown-item>
        </el-dropdown-menu>
    </el-dropdown>
</template>

<script>
export default {
    computed: {
        language() {
            return this.$store.getters.language
        }
    },
    methods: {
        handleSetLanguage(lang) {
            this.$i18n.locale = lang
            this.$store.dispatch('setLanguage', lang)
            this.$message({
                message: 'switch language success',
                type: 'success'
            })
        }
    }
}
</script>

<style lang="scss" scoped>
.international-icon {
    cursor: pointer;
    vertical-align: -5px!important;
}
</style>
