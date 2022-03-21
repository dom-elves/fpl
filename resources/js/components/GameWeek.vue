<template>
    <div class="w-[200px] m-10">
        
        <p>Gameweek {{ this.gameweek.id }}</p>

        <p>Highest Scoring squad</p>
        <p>{{ this.gameweek.highest_team_points }}</p>
       
        <p>Average Squad Score</p>
        <p>{{ this.gameweek.average_team_points }}</p>

        <p>Most Selected Player</p>
        <p>{{ this.gameweek.most_selected_player }}</p>

        <p>Highest Scoring Player (score)</p>
        <p>{{ this.gameweek.highest_scoring_player }} ( {{ this.gameweek.highest_player_score }} )</p>

        <p>Most Captained Player</p>
        <p>{{ this.gameweek.most_captained_player }}</p>

        <p>Most Vice-Captained Player</p>
        <p>{{ this.gameweek.most_vice_captained_player }}</p>

        <p>Most Transferred-In Player</p>
        <p>{{ this.gameweek.most_transferred_in_player }}</p>

    </div>
</template>

<script>
    export default {

        props: ['gameweek'],

        created() {
            
            console.log(this.gameweek);
            
        },

        methods: {

           
        }
    }
</script>