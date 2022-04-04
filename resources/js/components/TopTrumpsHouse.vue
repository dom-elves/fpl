<template>

    <div>

        <top-trumps :player_one="this.player_one" :player_two="this.player_two" v-on:sendToPlayer1="receivePlayer1Card"></top-trumps>
        
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

    data() {
        return {
            fromChild: null,
        }
    },

    created() {

        this.shuffleAndSplit();
        // console.log(this.player_one, this.player_two, 'created');

    },


    mounted() {

        // console.log(this.deck);

    },

    methods: {

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

            //chop the randomized 'deck' and separate into two props to be handed to child component
            const half = Math.ceil(deck.length / 2);
            
            let player_one = deck.slice(0, half);
            let player_two = deck.slice(-half);
            
            this.player_one = player_one;
            this.player_two = player_two;

            // console.log(this.player_one, this.player_two);
        },

        receivePlayer1Card(playerCard) {
            this.fromChild = playerCard;
            this.player_one.push(playerCard);
            console.log(this.player_one)
        },

        receivePlayer2Card(playerCard) {
            this.fromChild = playerCard;
            console.log(this.fromChild);
        }
    }
}
</script>
