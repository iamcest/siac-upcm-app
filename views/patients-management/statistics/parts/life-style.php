<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Estilo de Vida
        </h3>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
            <b>Tabaquismo</b>
            <template v-if="!statistics.life_style.loading">
                <br>
                Sí: {{ statistics.life_style.smoking.active }}
                <br>
                No: {{ statistics.life_style.smoking.inactive }}
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="pink" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
            <b>Consumo <br> de alcohol</b>
            <template v-if="!statistics.life_style.loading">
                <br>
                Sí: {{ statistics.life_style.alcohol_consumption.active }}
                <br>
                No: {{ statistics.life_style.alcohol_consumption.inactive }}
            </template>
            <template v-else>
                <br>
                <v-btn color="pink" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>


    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
            <b>Sedentarismo</b>
            <template v-if="!statistics.life_style.loading">
                <br>
                Sí: {{ statistics.life_style.sedentary.active }}
                <br>
                No: {{ statistics.life_style.sedentary.inactive }}
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="pink" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>


    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
            <b>Ejercicios físico</b>
            <template v-if="!statistics.life_style.loading">
                <br>
                Aeróbicos:
                {{ statistics.life_style.exercises.aerobics }}
                <br>
                Resistencia: {{ statistics.life_style.exercises.resistance }}
                <br>
                Minutos semanal: {{ statistics.life_style.exercises.time_weekly_avg }}
            </template>
            <template v-else>
                <br>
                <v-btn color="pink" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>
</v-row>