<template>

    <div>

        <p>Cost: {{ this.makeDecimal(this.selected_player.current_cost) }}m</p>

        <p>Value: {{ this.selected_player.value }}</p>

        <p>Total Points: {{this.selected_player.total_points_season}}</p>

        <p>Popularity: {{ this.selected_player.percent_selected}}%</p>

        <p>Points Per 90: {{ this.selected_player.points_per_90}}</p>

        <p>Points Per Game: {{ this.selected_player.points_per_game}}</p>

        <p v-if="this.selected_player.position == 'GK'">Saves: {{ this.selected_player.saves}}</p>

        <p v-if="this.selected_player.position == 'GK' || 'DEF'">Clean sheets: {{ this.selected_player.clean_sheets}}</p>

        <p v-if="this.selected_player.position !== 'GK'">Goals {{ this.selected_player.goals_scored}}</p>

        <p v-if="this.selected_player.position !== 'GK'">Assists {{ this.selected_player.goals_assisted}}</p>

    </div>

</template>




<script>

export default {

    name: 'MiniPlayer',

    props: ['selected_player'],

    data() {
        return {
            player: this.$attrs.data,
            
        }
    },

    mounted() {

        
        console.log(this.selected_player);
        // let player_data = this.$attrs.data
        // // console.log(this.$attrs.data);
        // return player_data;
        
    },

    methods: {

        makeDecimal(player_cost) {

                let newCost = player_cost/10;

                let decimalCost = newCost.toFixed(1);

                return decimalCost;

            },

        calcValue(player_cost) {

                let newCost = player_cost * 10;

                let decimalCost = newCost.toFixed(2);

                return decimalCost;
        }
    }
}
</script>

<style scoped>
    .ARS {
        background-color: #EF0107;
        color: white;
    }

    .AVL {
        background-color: #670E36;
        color: #95BFE5;
    }

    .BRE {
        background-color: red;
        color: white;
    }

    .BHA {
        background-color: #0057B8;
        color: white;
    }

    .BUR {
        background-color: #6C1D45;
        color: #99D6EA;
    }

    .CHE {
        background-color: #034694;
        color: white;
    }

    .CRY {
        background-color: #1B458F;
        color: #C4122E;
    }

    .EVE {
        background-color: #003399;
        color: white;
    }

    .LEI {
        background-color: #003090;
        color: #FDBE11;
    }

    .LEE {
        background-color: #FFCD00;
        color: white;
    }

    .LIV {
        background-color: #C8102E;
        color: white;
    }

    .MCI {
        background-color: #6CABDD;
        color: white;
    }

    .MUN {
        background-color: #DA291C;
        color: black;
    }

    .NEW {
        background-color: black;
        color: white;
    }

    .NOR {
        background-color: #00A650;
        color: #FFF200;
    }

    .SOU {
        background-color: #D71920;
        color: white;
    }

    .TOT {
        background-color: white;
        color: #132257;
    }

    .WAT {
        background-color: #FBEE23;
        color: #ED2127;
    }

    .WHU {
        background-color: #7A263A;
        color: #1BB1E7;
    }

    .WOL {
        background-color: #FDB913;
        color: black;
    }
</style>
