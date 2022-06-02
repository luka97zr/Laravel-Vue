<template>
  <div>
      <div v-if="loading">Loading</div>
      <div v-else>
          <div class="row mb-4" v-for="row in rows" :key="'row' + row">
              <div class="col" v-for="(bookable,column) in bookablesInRow(row)" :key="'row' + row + column">
                  <bookables-list-item :title="bookable.title" :content="bookable.content" :price="1232"
                    ></bookables-list-item>
              </div>
              <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
          </div>
      </div>
  </div>
</template>

<script>
import BookablesListItem from './BookablesListItem.vue'
export default {
    components: {
        BookablesListItem
    },
    data() {
        return {
           bookables: null,
           loading: false,
           columns: 3
        }
    },
    computed: {
        rows() {
            return this.bookables? Math.ceil(this.bookables.length / this.columns) : 0
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns)
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length
        }
    },
    created() {
        this.loading = true
        setTimeout(()=>{
            this.bookables =[
                {
                title: 'Bookable Item 1',
                content: 'Bookable Content 1'
                },
                {
                title: 'Bookable Item 2',
                content: 'Bookable Content 2'
                },
                {
                title: 'Bookable Item 3',
                content: 'Bookable Content 2'
                },
                {
                title: 'Bookable Item 4',
                content: 'Bookable Content 2'
                },
                {
                title: 'Bookable Item 4',
                content: 'Bookable Content 2'
                },
                {
                title: 'Bookable Item 4',
                content: 'Bookable Content 2'
                },
                {
                title: 'Bookable Item 4',
                content: 'Bookable Content 2'
                }
            ]
            this.loading = false

        },2000)
    }

 
}
</script>

<style scoped>
 
</style>