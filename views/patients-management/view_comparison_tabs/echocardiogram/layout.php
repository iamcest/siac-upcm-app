<v-row>
    <v-col cols="12">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
        </h4>
    </v-col>
    <v-col cols="12">
        <template v-if="comparison.echocardiogram.<?= $item ?>.hasOwnProperty('content')">
            {{ comparison.echocardiogram.<?= $item ?>.content }}
        </template>
        <template v-else>
            <p class="text-center">No se encontró información</p>
        </template>
    </v-col>
</v-row>