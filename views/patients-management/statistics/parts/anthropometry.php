<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Antropometría
        </h3>
    </v-col>
    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
            Promedio
            <br>
            Cintura abdominal:
            <template v-if="!statistics.anthropometry.loading">
                {{ statistics.anthropometry.abdominal_waist }} cm
            </template>
            <template v-else>
                <br>
                <v-btn color="secondary" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
            Promedio
            <br>
            IMC:
            <template v-if="!statistics.anthropometry.loading">
                {{ statistics.anthropometry.bmi }} kg/m<sup>2</sup>
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="secondary" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
            Promedio
            <br>
            SC:
            <template v-if="!statistics.anthropometry.loading">
                {{ statistics.anthropometry.cs }} m<sup>2</sup>
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="secondary" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>
</v-row>