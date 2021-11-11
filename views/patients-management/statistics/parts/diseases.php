<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Diagnósticos
        </h3>
    </v-col>
    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
            <b>Hipertensión arterial</b>
            <template v-if="!statistics.diseases.loading">
                <br>
                Total: {{ statistics.diseases.hta.controlled + statistics.diseases.hta.no_controlled }}
                <br>
                Controlados: {{ statistics.diseases.hta.controlled }}
                <br>
                No controlados: {{ statistics.diseases.hta.no_controlled }}
            </template>
            <template v-else>
                <br>
                <v-btn color="info" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
            <b>Diabetes</b>
            <template v-if="!statistics.diseases.loading">
                <br>
                Total: {{ statistics.diseases.dmt2.controlled + statistics.diseases.dmt2.no_controlled }}
                <br>
                Controlados: {{ statistics.diseases.dmt2.controlled }}
                <br>
                No controlados: {{ statistics.diseases.dmt2.no_controlled }}
            </template>
            <template v-else>
                <br>
                <v-btn color="info" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
            <b>Dislipidemia</b>
            <template v-if="!statistics.diseases.loading">
                <br>
                Total: {{ statistics.diseases.dyslipidemia.controlled +statistics.diseases.dyslipidemia.no_controlled }}
                <br>
                Controlados: {{ statistics.diseases.dyslipidemia.controlled }}
                <br>
                No controlados: {{ statistics.diseases.dyslipidemia.no_controlled }}
            </template>
            <template v-else>
                <br>
                <v-btn color="info" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3">
        <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
            <b>Obesidad</b>
            <template v-if="!statistics.diseases.loading">
                <br>
                Total: {{ statistics.diseases.obesity.total }}
                <br>
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="info" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="3" xl="3" v-if="1 == 2">
        <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
            <b>Fumadores</b>
            <template v-if="!statistics.diseases.loading">
                <br>
                Total: {{ statistics.diseases.smoking }}
                <br>
                <br>
                <br>
            </template>
            <template v-else>
                <br>
                <v-btn color="info" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>
</v-row>