<template>
    <div>
        <p>this is the gameweeks component (working)</p>
    </div>
</template>

<script>
    export default {

        props: ['gameweek'],

        mounted() {
            
            console.log(this.gameweek)

        }
    }
</script>