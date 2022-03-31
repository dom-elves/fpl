<template>
    <div  class="flex justify-center">
        
        <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] flex flex-column items-center">

            <button class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">New Game</button>

            <p class="text-white">{{ this.players }}</p>

        </div>

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
