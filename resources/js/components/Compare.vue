<template>

    <div class="flex flex-row justify-around">

        <div class="bg-purple-50 w-[400px]">
        <p>{{ this.search_results[0] }}</p>
        </div>

        <div class="bg-purple-50 w-[400px]">
        <p>{{ this.search_results[1] }}</p>
        </div>

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
