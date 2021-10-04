<v-row>
    <v-col cols="12">
        <h5 class="text-h5">
            Notificaciones
        </h5>
        <v-checkbox label="Acceso" v-model="editedItem.meta.notifications_access.access" :true-value="1" :false-value="0"></v-checkbox>
        <v-checkbox label="Publicar" v-model="editedItem.meta.notifications_access.publish" :true-value="1" :false-value="0"></v-checkbox>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
</v-row>