<template>

    <div>

        <top-trumps :deck="this.deck"></top-trumps>

        
    </div>

</template>

<script>

import TopTrumps from './TopTrumps.vue'


export default {

    name: 'TopTrumpsHouse',

    components: {

        TopTrumps,

    },

    props: ['deck'],


    mounted() {

        console.log(this.deck, 'parent deck');

    }
}
</script>
