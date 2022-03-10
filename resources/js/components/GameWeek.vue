<template>
    <div class="w-[200px] m-10">
        
        <p>{{ this.gameweek.name }}</p>

        
            <p>Highest Scoring squad</p>
            <p>{{ this.gameweek.highest_score }}</p>
       

        <p>Average Squad Score</p>
        <p>{{ this.gameweek.average_entry_score }}</p>

        <p>Most Selected Player</p>
        <p>{{ this.gameweek.most_selected }}</p>

        <p>Highest Scoring Player (score)</p>
        <p>{{ this.gameweek.top_element }} ( {{ this.gameweek.top_element_info.points }} )</p>

        <p>Most Captained Player</p>
        <p>{{ this.gameweek.most_captained }}</p>

        <p>Most Vice-Captained Player</p>
        <p>{{ this.gameweek.most_vice_captained }}</p>

        <p>Most Transferred-In Player</p>
        <p>{{ this.gameweek.most_transferred_in }}</p>
        
    </div>
</template>

<script>
    export default {

        props: ['gameweek'],

        created() {
            
            // console.log(this.gameweek);
            // console.log(this.gameweek.top_element_info.points);
            this.getPlayerInfo();
        },

        methods: {

            getPlayerInfo() {

                let playerInfo = this.gameweek.top_element_info;
                console.log(playerInfo, this.gameweek.name);

            }
        }
    }
</script>