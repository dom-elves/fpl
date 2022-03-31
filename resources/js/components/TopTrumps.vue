<template>
    <div  class="flex justify-center">
        
        <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] flex flex-column items-center">

            <button @click="reload()" class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">New Game</button>

    
            <div class="flex flex-row justify-around">

                

                <div class="flex flex-column items-center">

                    <p class="text-white text-4xl">Player One</p>

                    <div class="border-2 border-[#00ff85] w-[300px] h-[450px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-4xl font-bold">{{ this.player_one[0].first_name }}</p>
                            <p class="text-4xl font-bold">{{ this.player_one[0].last_name }}</p>

                        </div>

                        <div class="p-4">

                            <p class="text-2xl mb-2">Total Points: {{ this.player_one[0].total_points_season }}</p>
                            <p class="text-2xl mb-2">Goals Scored: {{ this.player_one[0].goals_scored }}</p>
                            <p class="text-2xl mb-2">Goals Assisted: {{ this.player_one[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2">Cost: £{{ this.makeDecimal(this.player_one[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2">Popularity: {{ this.player_one[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2">Saves: {{ this.player_one[0].saves }}</p>

                        </div>

                    </div>

                </div>

                <div class="flex flex-column items-center">

                    <p class="text-white text-4xl">Player Two</p>

                    <div class="border-2 border-[#00ff85] w-[300px] h-[450px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-4xl font-bold">{{ this.player_two[0].first_name }}</p>
                            <p class="text-4xl font-bold">{{ this.player_two[0].last_name }}</p>

                        </div>

                        <div class="p-4">

                            <p class="text-2xl mb-2">Total Points: {{ this.player_two[0].total_points_season }}</p>
                            <p class="text-2xl mb-2">Goals Scored: {{ this.player_two[0].goals_scored }}</p>
                            <p class="text-2xl mb-2">Goals Assisted: {{ this.player_two[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2">Cost: £{{ this.makeDecimal(this.player_two[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2">Popularity: {{ this.player_two[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2">Saves: {{ this.player_two[0].saves }}</p>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>

    </div>
</template>

<script>


    export default {

            name: 'TopTrumps',
            
            props: ['deck'],

            created() {
               
                this.shuffleAndSplit();

                console.log(this.player_one, this.player_two, 'created');
            },

            mounted() {
                this.testMethod();
                console.log(this.deck, 'child');
            },

            methods: {

                makeDecimal(player_cost) {
                
                let newCost = player_cost/10;

                let decimalCost = newCost.toFixed(1);

                return decimalCost;

                },

                reload() {
                    location.reload();
                },

                shuffleAndSplit() {

                    const deck = this.deck;

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
                    // console.log(this.player_one, this.player_two, 'mounted');
                }
            }

    }

</script>
