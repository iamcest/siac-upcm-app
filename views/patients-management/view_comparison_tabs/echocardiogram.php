<template v-if="viewPatientsComparisonDialog && comparison.echocardiogram.current_patient.hasOwnProperty('content')">
    <v-row class="d-flex justify-center full-width">
        <v-col cols="6">
            <v-row>
                <v-col cols="12">
                    <h4 class="text-h5 text-center"><b>Paciente:</b>
                       <p>{{ comparison.patient_selected.full_name }}</p> 
                    </h4>
                </v-col>
                <v-col cols="12">
                    <template
                        v-if="comparison.echocardiogram.current_patient !== undefined &&  comparison.echocardiogram.current_patient.hasOwnProperty('content')">
                        {{ comparison.echocardiogram.current_patient.content }}
                    </template>
                    <template v-else>
                        <p class="text-center">No se encontró información</p>
                    </template>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6">
            <v-row>
                <v-col cols="12">
                    <h4 class="text-h5 text-center"><b>Paciente:</b>
                        <p>{{ comparison.patient_to_compare.full_name }}</p>
                    </h4>
                </v-col>
                <v-col cols="12">
                    <template
                        v-if="comparison.echocardiogram.patient_to_compare !== undefined && comparison.echocardiogram.patient_to_compare.hasOwnProperty('content')">
                        {{ comparison.echocardiogram.patient_to_compare.content }}
                    </template>
                    <template v-else>
                        <p class="text-center">No se encontró información</p>
                    </template>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</template>