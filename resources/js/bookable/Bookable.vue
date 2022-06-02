<template>
    <div>
        <div v-if="!bookable">Loading</div>
        <div v-else>{{bookable.title}}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookable: null
        }
    },
    created() {
        console.log(this.$route.params.id)
        const request = axios.get(`/api/bookables/${this.$route.params.id}`).then(response => {
            this.bookable = response.data
                console.log(this.bookable)
            })
    }
}
</script>

<style>

</style>