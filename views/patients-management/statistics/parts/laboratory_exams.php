<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Promedio de Valores
        </h3>
    </v-col>
    <v-col cols="12" md="4" lg="4" xl="3" v-for="exam in statistics.laboratory_exam.items">
        <v-alert color="secondary" icon="mdi-text-box-search" border="left" outlined prominent>
            <b>{{ exam.name }}</b><template v-if="!statistics.laboratory_exam.loading">: {{ exam.total + ' ' + exam.nomenclature }}</template>
            <template v-else>
                <br>
                <v-btn color="secondary" :loading="true" text small fab></v-btn>
            </template>
        </v-alert>
    </v-col>
</v-row>