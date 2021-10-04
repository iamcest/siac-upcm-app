<v-row>
    <v-col cols="12">
        <h5 class="text-h5">
            Registro pacientes y Control de la consulta
        </h5>
        <v-checkbox label="Acceso" v-model="upcm_invitations.editedItem.access.patient_management_access.access" :true-value="1" :false-value="0"></v-checkbox>
    </v-col>
    <v-col cols="12" md="6" v-for="section in upcm_invitations.editedItem.access.patient_management_access.sections" v-if="upcm_invitations.editedItem.access.patient_management_access.access">
        <h6 class="text-h6">
            {{ section.name }}
        </h6>
        <v-row>
            <v-col cols="6">
                <v-checkbox label="Ver" v-model="section.permissions.read" :true-value="1" :false-value="0"></v-checkbox>
            </v-col>
            <v-col cols="6">
                <v-checkbox label="Crear" v-model="section.permissions.create" :true-value="1" :false-value="0"></v-checkbox>
            </v-col>
            <v-col cols="6">
                <v-checkbox label="Editar" v-model="section.permissions.update" :true-value="1" :false-value="0"></v-checkbox>
            </v-col>
            <v-col cols="6">
                <v-checkbox label="Eliminar" v-model="section.permissions.delete" :true-value="1" :false-value="0"></v-checkbox>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
</v-row>