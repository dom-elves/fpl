<template>
    <div>
        <p class="text-white">{{ this.players }}</p>
    </div>
</template>

<script>

    export default {
            
            props: ['players'],

            mounted() {
                console.log(this.players);
            }

    }

</script>
