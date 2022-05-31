<template>
  <div>
      <p :style="'color:' + boja">{{ name[1] }}</p>
      <p :style="'color:' + boja">{{ prvoIme }}</p>
      <button @click="dajMiTreceIme"> {{ tekstBatona }} </button>
      <button @click="dajMiTreceIme"> {{ izkalkulisitekst('jedan') }} </button>
  </div>
</template>

<script>
export default {
    // props: ['name'],
    props: {
        name: {
            type: Array,
            required: false,
            default: () => {return [
                'Jedan',
                'Dva',
                'Tri'
            ]}
        }
    },
    data() {
        return {
            boja: 'green',
            tekstBatona: 'Klikni Me Bebo'
        }
    },
    computed: {
        prvoIme() {
            return this.name[0];
        }
    },
    created() {
        console.log('Resi');
        this.tekstBatona = 'Bas mi se svidja tvoja devojka';
    },
    mounted() {
        this.tekstBatona = 'Bas mi se svidja tvoja devojka 2';
    },
    methods: {
        dajMiTreceIme() {
            console.log(this.name[2]);
            this.tekstBatona = 'Klikni me jos jednom bas mi se svidja';
        },
        izkalkulisitekst(name) {
            return name + ' aezakmi';
        }
    }
}
</script>

<style scoped>

</style>