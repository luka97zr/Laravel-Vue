<template>
    <div>
        <h1>test</h1>
        <!-- <lepa-komponenta></lepa-komponenta> -->
    </div>
</template>

<script>

import LepaKomponenta from './LepaKomponenta.vue';

export default {
    name: 'TestComponent',
    props: ['stringToDisplay'],
    data() {
        return {
            names: ['Luka', 'Milos', 'Filip']
        }
    },
    components: {LepaKomponenta}
}
</script>