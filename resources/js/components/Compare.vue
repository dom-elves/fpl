<template>

    <div>

        <p class="text-white">{{ this.search_results[0] }}</p>

        <p class="text-white">{{ this.search_results[1] }}</p>

    </div>

</template>

<script>

    export default {
        
        props: ['search_results'],

        mounted() {
            console.log(this.search_results);
        }

    }
    
</script>
