<template>
    <div  class="flex justify-center">
        
        <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] flex flex-column items-center">

            <button class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">New Game</button>

            <p class="text-white">{{ this.player_one }}</p>

            <p class="text-white">{{ this.player_two }}</p>

            

        </div>

    </div>
</template>

<script>

    export default {
            
            props: ['players'],

            created() {
               
                this.shuffleAndSplit();

                console.log(this.player_one, this.player_two, 'created');
            },

            mounted() {
                this.testMethod();
            },

            methods: {

                shuffleAndSplit() {

                    const deck = this.players;

                    //for the 'shuffle' aspect, refer back to stack overflow thread for better understanding
                    let currentIndex = deck.length,  randomIndex;

                    // While there remain elements to shuffle...
                    while (currentIndex != 0) {

                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex--;

                    // And swap it with the current element.
                    [deck[currentIndex], deck[randomIndex]] = [
                    deck[randomIndex], deck[currentIndex]];
                    
                    }

                    const half = Math.ceil(deck.length / 2);
                    
                    let player_one = deck.slice(0, half);
                    let player_two = deck.slice(-half);
                    
                    this.player_one = player_one;
                    this.player_two = player_two;
                    
                },

                testMethod() {
                    console.log(this.player_one, this.player_two, 'mounted');
                }
            }

    }

</script>
