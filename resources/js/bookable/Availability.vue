<template>
  <div>
      <h6 class="text-uppercase text-secondary font-weigh-bolder">
          Check Availability
          </h6>
          <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
          <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="from">From</label>
              <input type="text" name="from" class="form-control form-control-sm" placeholder="Start date" v-model="from" :class="[{'is-invalid' : this.errorFor('from')}]">
              <div class="invalid-feedback" v-for="(error,index) in this.errorFor('from')" :key="index">{{error}}</div>
          </div>
          <div class="form-group col-md-6">
              <label for="to">To</label>
              <input type="text" name="to" class="form-control form-control-sm" placeholder="End date" v-model="to" :class="[{'is-invalid' : this.errorFor('to')}]">
              <div class="invalid-feedback" v-for="(error,index) in this.errorFor('to')" :key="index">{{ error }}</div>

          </div>
      </div>
      <button type="submit" class="btn btn-secondary btn-block" @click="check" :disabled="loading">Check</button>
  </div>
</template>

<script>
export default {
    data() {
        return {
            from: null,
            to: null,
            loading: false,
            status: null,
            errors: null,
        }
    },
    methods: {
        check() {
            this.loading=true;
            this.errors=null;

            axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`).then(response=>{
                console.log(response)
                this.status = response.data
            }).catch(error => {
                console.log(error)
                if (422 === error.response.status){
                    this.errors = error.response.data.errors
                }
                this.status = error.response.status;
            }).then(()=> this.loading = false)
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    },
    computed: {
        hasErrors() {
            return 422===this.status&&this.errors !== null
        },
        hasAvailability() {
            return 200 === this.status
        },
        noAvailability() {
            return 404 === this.status
        }
    }
}
</script>

<style scoped>
    label {
        font-size: .7rem;
        text-transform: uppercase;
        color: gray;
        font-weight: bolder;
    }
</style>