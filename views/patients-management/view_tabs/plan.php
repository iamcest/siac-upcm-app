<v-row class="full-width">
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
    <v-col class="d-flex justify-end" cols="12">
        <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-11'"
            dark>Editar</v-btn>
    </v-col>
    <?php endif ?>
    <v-col cols="12">
        <v-data-table :headers="patient_plan.headers" :items="patient_plan.items" class="elevation-1 table_headers_lg">
            <template v-slot:item.clinics_exams="{ item }">
                <span v-for="(exam, i) in getClinicExamsActive(item.clinics_exams)">
                    - {{ exam.name }}
                </span>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initializePlans">
                    Recargar
                </v-btn>
            </template>
        </v-data-table>
    </v-col>
    </row>