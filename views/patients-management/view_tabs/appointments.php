<?php if (!empty($can_manage_suite)
|| !empty($access['patient_management_access']['sections'][1]['permissions']['update'])
|| !empty($access['patient_management_access']['sections'][0]['permissions']['update'])
): ?>
<v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-2'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-col cols="12">
    <v-data-table :headers="views.patient_appointments.headers" :items="patient_appointments.appointments"
        sort-by="date" class="elevation-1 full-width">
        <template v-slot:no-data>
            <v-btn color="primary" @click="initializeAppointments">
                Recargar
            </v-btn>
        </template>
    </v-data-table>
</v-col>