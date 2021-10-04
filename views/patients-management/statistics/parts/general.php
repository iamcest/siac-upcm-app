<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Generales
        </h3>
    </v-col>
    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="secondary" icon="mdi-account-group" border="left" dark prominent>
            Pacientes: {{ patients.length }}
            <br>
            Edad promedio: {{ Math.round((statistics.male.age_average + statistics.female.age_average ) / 2) }} años
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="primary" icon="mdi-gender-male" border="left" dark prominent>
            Pacientes masculinos: {{ statistics.male.total_patients }}
            <br>
            Edad promedio: {{ statistics.male.age_average }} años
        </v-alert>
    </v-col>

    <v-col cols="12" md="4" lg="4" xl="3">
        <v-alert color="pink" icon="mdi-gender-female" border="left" dark prominent>
            Pacientes femeninos: {{ statistics.female.total_patients }}
            <br>
            Edad promedio: {{ statistics.female.age_average }} años
        </v-alert>
    </v-col>
</v-row>