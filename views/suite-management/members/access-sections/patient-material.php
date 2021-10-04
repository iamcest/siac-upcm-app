<v-row>
    <v-col cols="12">
        <h5 class="text-h5">
            Materiales para el paciente
        </h5>
        <v-checkbox label="Acceso" v-model="editedItem.meta.patient_material_access.access" :true-value="1" :false-value="0"></v-checkbox>
    </v-col>
    <v-col cols="12" md="6" v-for="section in editedItem.meta.patient_material_access.sections" v-if="editedItem.meta.patient_material_access.access">
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
                <v-checkbox label="Eliminar" v-model="section.permissions.delete" :true-value="1" :false-value="0"></v-checkbox>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
</v-row>