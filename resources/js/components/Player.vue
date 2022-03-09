<template>
    <div>
        <p>{{ this.player }}</p>
        <p>Minutes</p>
        <p>{{ this.player.minutes_season }}</p>

        <div class="container">
            <table>
                <tr>
                    <th>Cost</th>
                    <th>Average Cost</th>
                </tr>

                <tr>
                    <td>{{ this.player.current_cost }}</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['player'],

        mounted() {
            
            console.log(this.player);
        }
    }
</script>